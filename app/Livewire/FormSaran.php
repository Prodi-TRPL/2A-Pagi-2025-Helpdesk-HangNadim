<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Saran;
use App\Models\Pelapor;
use Illuminate\Support\Facades\DB;

class FormSaran extends Component
{

    public $nama, $email, $whatsapp, $pekerjaan;
    public $message;
    public $success = '';
    public $error = '';
    public $step = 1;

    protected $rules = [
        'nama' => 'required|string',
        'email' => 'required|email',
        'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
        'pekerjaan' => 'required|string',
        'message' => 'required|string'
    ];

    public function submitDataDiri()
    {
        $this->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
            'pekerjaan' => 'required|string'
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
                'pekerjaan' => $this->pekerjaan
                ]   
              );
              
              Saran::create([
                'pelapor_id' => $pelapor->id,
                'message' => $this->message
              ]);

              DB::commit();

              $this->success = 'Saran berhasil dibuat! Terima kasih.';
              $this->step = 1;
              
              $this->reset(['nama', 'email', 'whatsapp', 'pekerjaan', 'message']);
        
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
