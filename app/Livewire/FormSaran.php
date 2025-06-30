<?php

namespace App\Livewire;

use App\Models\Saran;
use App\Models\Pelapor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class FormSaran extends Component
{
    use WithFileUploads;

    public $nama, $email, $whatsapp, $pekerjaan, $gender, $umur;
    public $message, $bukti;
    public $success = '';
    public $error = '';
    public $step = 1;
    public $pelapor, $saran;

    protected $rules = [
        'nama' => 'required|string',
        'email' => 'required|email',
        'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
        'pekerjaan' => 'required|string',
        'umur' => 'required|int|min:10|max:100',
        'gender' => 'required|in:Laki-Laki,Perempuan',
        'message' => 'required|string',
        'bukti' => 'nullable|file|mimes:jpg,jpeg,png|max:5000',
    ];

    public function submitDataDiri()
    {
        $this->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
            'pekerjaan' => 'required|string',
            'umur' => 'required|int|min:10|max:100',
            'gender' => 'required|in:Laki-Laki,Perempuan',
        ]);
        $this->step = 2;    
    }

    public function previousStep()
    {
        $this->step = 1;
    }

    public function submitSaran()
    {
        $this->validate();

        try{
            DB::beginTransaction();
            
            $pelapor = Pelapor::firstOrCreate(
                ['email' => $this->email, 'whatsapp' => $this->whatsapp],
                ['nama' => $this->nama,
                'pekerjaan' => $this->pekerjaan,
                'umur' => $this->umur,
                'gender' => $this->gender,
                ]   
              );
              
            $saran = Saran::create([
                'pelapor_id' => $pelapor->id,
                'message' => $this->message
              ]);

              DB::statement('SAVEPOINT bukti');

                if ($this->bukti) {
                    try {
                        $path = $this->bukti->store('bukti', 'public');
                        $saran->update(['bukti' => $path]);
                    } catch (\Exception $e) {
                        DB::statement('ROLLBACK TO SAVEPOINT bukti');
                    }
                }

              DB::commit();

              $this->pelapor = $pelapor;
              $this->saran = $saran;
              $this->success = ' ';
              $this->step = 1;
              
              $this->reset(['nama', 'email', 'whatsapp', 'pekerjaan', 'gender', 'umur', 'message', 'bukti']);
        
        } catch (\Exception $e){
            DB::rollBack();

            $this->error = 'Terjadi kesalahan, silahkan coba lagi!';
            $this->step = 1;
        }
    }
    public function render()
    {
        return view('livewire.form-saran');
    }
}
