<?php

namespace App\Livewire;

use App\Jobs\KirimEmailKomplainBaru;
use App\Models\Pelapor;
use Livewire\Component;
use App\Models\Kategori;
use App\Models\Komplain;
use Livewire\WithFileUploads;
use App\Models\KomplainHistory;
use Illuminate\Support\Facades\DB;

class FormKomplain extends Component
{
    use WithFileUploads;

    public $nama, $email, $whatsapp, $pekerjaan, $gender, $umur;
    public $message, $kategori_id, $bukti;
    public $step = 1;
    public $success = '';
    public $error = ''; 
    public $pelapor, $komplain;
    public $is_penumpang = null;
    public $maskapai;
    public $no_penerbangan;
    protected $tiket;

    protected $rules = [
        'nama' => 'required|string',
        'email' => 'required|email',
        'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
        'pekerjaan' => 'required|string',
        'gender' => 'required|in:Laki-Laki,Perempuan',
        'umur' => 'required|int|min:10|max:100',
        'message' => 'required|string',
        'kategori_id' => 'required|exists:kategori,id',
        'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5000',
        'is_penumpang' => 'required',
       
    ];

    public function isPenumpang()
    {
        $this->is_penumpang = true;
    }
    
    public function isNotPenumpang()
    {
        $this->is_penumpang = false;
    }

  public function submitDataDiri()
{
    $rules = [
        'nama' => 'required|string',
        'email' => 'required|email',
        'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
        'pekerjaan' => 'required|string',
        'umur' => 'required|integer|min:10|max:100',
        'gender' => 'required|in:Laki-Laki,Perempuan',
        'is_penumpang' => 'required',
    ];

    if ($this->is_penumpang === 'ya') {
        $rules['maskapai'] = 'required|string';
        $rules['no_penerbangan'] = 'required|string';
    }

    $this->validate($rules);
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
                'umur' => $this->umur,
                'gender' => $this->gender,
                'pekerjaan' => $this->pekerjaan,
                ]
            );
            
            $komplain = Komplain::create([
                'pelapor_id' => $pelapor->id,
                'message' => $this->message,
                'kategori_id' => $this->kategori_id,
                'bukti' => null,
                'is_penumpang' => $this->is_penumpang,
            ]);

            if($komplain->is_penumpang == true) {
                $komplain->maskapai = $this->maskapai;
                $komplain->no_penerbangan = $this->no_penerbangan;
                $komplain->save();
            }

            DB::statement('SAVEPOINT bukti');

            if ($this->bukti && $this->bukti->isValid()) {
                try{
                    $path = $this->bukti->store('bukti', 'public');
                    $komplain->update(['bukti' => $path]);
                } catch (\Exception $e) {
                    DB::statement('ROLLBACK TO SAVEPOINT bukti'); 
                }
            }

            DB::commit();

            KomplainHistory::create([
                'komplain_id' => $komplain->id,
                'user_id' => null,
                'riwayat' => 'Komplain dibuat oleh pengguna.',
            ]);
            
            // $data = [
            //     "email" => $this->email,
            //     "nama" => $this->nama,
            //     "tiket" => $komplain->tiket,
            //     "target" => $this->whatsapp,
            // ];
            
            // $token = env('FONTTE_TOKEN');
            // dispatch(new \App\Jobs\KirimWhatsappJob($token, $data));

            KirimEmailKomplainBaru::dispatch($komplain, $pelapor);

            $this->pelapor = $pelapor;
            $this->komplain = $komplain;
            $this->success = ' ';
            $this->step = 1;

            $this->reset(['nama', 'email', 'whatsapp', 'pekerjaan', 'message', 'kategori_id', 'bukti', 'gender','is_penumpang', 'umur', 'maskapai', 'no_penerbangan']);


        } catch (\Exception $e) {
            DB::rollBack();
            $this->error = 'Terjadi kesalahan, silahkan coba lagi!';
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
