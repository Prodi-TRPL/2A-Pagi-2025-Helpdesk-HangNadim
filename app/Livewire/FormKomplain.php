<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pelapor;
use App\Models\Kategori;
use App\Models\Komplain;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class FormKomplain extends Component
{
    use WithFileUploads;

    public $nama, $email, $whatsapp, $pekerjaan;
    public $message, $kategori_id, $bukti;
    public $step = 1;
    public $success = '';
    public $error = ''; 

    protected $rules = [
        'nama' => 'required|string',
        'email' => 'required|email',
        'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
        'pekerjaan' => 'required|string',
        'message' => 'required|string',
        'kategori_id' => 'required|exists:kategori,id',
        'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
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

    public function submitKomplain()
    {
        $this->validate();

        try{
            DB::beginTransaction();
            $pelapor = Pelapor::firstOrCreate(
                ['email' => $this->email, 'whatsapp' => $this->whatsapp],
                ['nama' => $this->nama,
                'pekerjaan' => $this->pekerjaan,
                ]
            );

            $komplain = Komplain::create([
                'pelapor_id' => $pelapor->id,
                'message' => $this->message,
                'kategori_id' => $this->kategori_id,
                'bukti' => null
            ]);

            DB::statement('SAVEPOINT bukti');

            if ($this->bukti && $this->bukti->isValid()) {
                try{
                    $namaFile = time() . '_' . $this->bukti->getClientOriginalName();
                    $path = $this->bukti->storeAs('bukti', $namaFile, 'public');
                    $komplain->update(['bukti' => $path]);
                } catch (\Exception $e) {
                    DB::statement('ROLLBACK TO SAVEPOINT bukti'); 
                }
            }

            DB::commit();

            $this->success = "Komplain anda berhasil dibuat dengan nomor tiket: $komplain->tiket.";
            $this->step = 1;

            $this->reset(['nama', 'email', 'whatsapp', 'pekerjaan', 'message', 'kategori_id', 'bukti']);


        } catch (\Exception $e) {
            DB::rollBack();
            $this->error = 'Terjadi kesalahan, coba lagi!';
            $this->step = 1;
        }

    }

    public function previousStep()
    {
        $this->step = 1;
    }
    
    public function render()
    {
        $kategoris = Kategori::all();

        return view('livewire.form-komplain', compact('kategoris'));
    }
}
