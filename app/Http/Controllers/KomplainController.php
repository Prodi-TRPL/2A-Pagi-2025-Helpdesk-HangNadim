<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;


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

        $komplains = Komplain::with('pelapor','kategori','user:id,name')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $komplains = Komplain::with('kategori')->findOrFail($id);
        $kategoris = Kategori::all();

        return view('admin.komplain_edit', compact('komplains', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateTingkat(Request $request, Komplain $komplain)
    {
        $request->validate([
            'tingkat' => 'in:Rendah,Sedang,Tinggi',
        ]);

        $komplain->tingkat = $request->tingkat;
        $komplain->save();

        return redirect()->back()->with('success', 'Berhasil memperbarui tingkat keluhan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function viewTrackComplaint()
    {
        return view('public.lacak_komplain');
    }

    public function trackComplaint(Request $request)
    {
        $tiket = $request->tiket;

        $komplain = Komplain::where('tiket', $tiket)
        ->with('pelapor','kategori')
        ->first();
        
        if($tiket && $komplain){
            return view('public.status_komplain', compact('komplain'));
        } else {
            return redirect()->back()->with('error','Nomor tiket Anda tidak ditemukan, pastikan untuk melihat lagi tiket Anda😊');
        }
    }
}
