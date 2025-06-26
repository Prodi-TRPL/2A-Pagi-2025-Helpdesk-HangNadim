<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Komplain;
use Illuminate\Http\Request;
use App\Models\KomplainHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {

        $user = Auth::user();

        $dataFilter = match($user->role){
            'Officer' => 'Rendah',
            'Team Leader' => 'Sedang',
            'Manager' => 'Tinggi',
            'Direktur' => null,
            default => abort(403)
            };

        $komplains = Komplain::with('pelapor','kategori','user:id,name,role','histories.changer')
        ->select('komplains.*')
        ->addSelect(DB::raw("FIELD(status, 'Menunggu', 'Diproses', 'Selesai') as status_order"))
        ->when($dataFilter, function ($query, $tingkat) {
        $query->where('tingkat', $tingkat);
        })
        ->orderBy('status_order')
        ->orderBy('created_at', 'asc')
        ->get();
        

        return view('admin.komplain', compact('komplains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('public.form_komplain');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $komplain = Komplain::with('kategori')->findOrFail($id);
        $kategoris = Kategori::all();

        return view('admin.komplain_edit', compact('komplain', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komplain $komplain)
    {
        $data = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'status' => 'required|in:Menunggu,Diproses,Selesai',
            'tingkat' => 'required|in:Rendah,Sedang,Tinggi',
            'deskripsi_penyelesaian' => 'nullable|string',
            'catatan_perubahan' => 'nullable|string',
            'bukti_penyelesaian' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5000',
        ], [
            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus salah satu dari: Menunggu, Diproses, atau Selesai.',
            
            'tingkat.required' => 'Tingkat urgensi wajib diisi.',
            'tingkat.in' => 'Tingkat harus salah satu dari: Rendah, Sedang, atau Tinggi.',
            
            'catatan_perubahan.string' => 'Catatan perubahan harus berupa teks.',

            'bukti_penyelesaian.file' => 'Bukti penyelesaian harus berupa file.',
            'bukti_penyelesaian.mimes' => 'Bukti penyelesaian harus berupa file JPG, JPEG, PNG, atau PDF.',
            'bukti_penyelesaian.max' => 'Ukuran file bukti penyelesaian maksimal 5MB.',
        ]);

        $oldTingkat = $komplain->tingkat;
        $oldStatus = $komplain->status;
        $oldKategori = $komplain->kategori_id;

        $data['user_id'] = Auth::id();

        if ($request->hasFile('bukti_penyelesaian')) {
            $path = $request->file('bukti_penyelesaian')->store('bukti_penyelesaian', 'public');
            $data['bukti_penyelesaian'] = $path;
        }
        
        $komplain->update($data);

        $riwayat = [];

        if ($oldTingkat !== $request->tingkat) {
            $riwayat[] = "Tingkatan diubah dari $oldTingkat menjadi $request->tingkat";
        } 
        
        if ($oldStatus !== $request->status) {
            $riwayat[] = "Status diubah dari $oldStatus  menjadi $request->status";
        } 
        
        if ($oldKategori != $request->kategori_id) {
            $kategoriLama = Kategori::find($oldKategori)?->nama_kategori ?? '(tidak diketahui)';
            $kategoriBaru = Kategori::find($request->kategori_id)?->nama_kategori ?? '(tidak diketahui)';
            $riwayat[] = "Kategori diubah dari $kategoriLama menjadi $kategoriBaru";
        }

        KomplainHistory::create([
            'komplain_id' => $komplain->id,
            'user_id' => Auth::id(),
            'riwayat' => implode('. ', $riwayat),
            'catatan_perubahan' => $request->catatan_perubahan,
         ]);
         
        return redirect()->route('komplain')->with('success', 'Berhasil memperbarui komplain.');
    }

    public function updateStatusTingkat(Request $request, Komplain $komplain)
    {
        if($request->has('status')){
            $request->validate(['status' => 'required|in:Menunggu,Diproses,Selesai']);
            if ($request->status !== $komplain->status) {
                $oldStatus = $komplain->status;
                $komplain->user_id = Auth::id();
                $komplain->status = $request->status;
                $komplain->save();
        
            KomplainHistory::create([
                'komplain_id' => $komplain->id,
                'user_id' => Auth::id(),
                'riwayat' => 'Status diubah dari ' . $oldStatus . ' menjadi ' . $request->status,
            ]);
            }
        }

        if($request->has('tingkat')){
            $request->validate([
                'tingkat' => 'required|in:Rendah,Sedang,Tinggi',
                'catatan_perubahan' => 'required|string',
            ],[
                'catatan_perubahan.required' => 'Catatan Perubahan Wajib Diisi',
            ]);
             if ($request->tingkat !== $komplain->tingkat) {
                $oldTingkat = $komplain->tingkat;
                $komplain->user_id = Auth::id();
                $komplain->tingkat = $request->tingkat;
                $komplain->save();
            
            KomplainHistory::create([
                'komplain_id' => $komplain->id,
                'user_id' => Auth::id(),
                'catatan_perubahan' => $request->catatan_perubahan,
                'riwayat' => 'Tingkatan diubah dari ' . $oldTingkat . ' menjadi ' . $request->tingkat,
            ]);
            }
        }

        return redirect()->back()->with('success', 'Berhasil memperbarui komplain.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function trackComplaint(Request $request)
    {
        $tiket = $request->tiket;

        $komplain = Komplain::where('tiket', $tiket)
        ->with('kategori')
        ->first();
        
        if($tiket && $komplain){
            return view('public.status_komplain', compact('komplain'));
        } else {
            return redirect()->back()->with('error','Nomor tiket Anda tidak ditemukan, pastikan untuk melihat lagi tiket Anda😊');
        }
    }
}
