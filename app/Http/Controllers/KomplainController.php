<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Komplain;
use Illuminate\Http\Request;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {

        $user = auth()->user();

        $dataFilter = match($user->role){
            'Officer' => 'Rendah',
            'Team Leader' => 'Sedang',
            'Manager' => 'Tinggi',
            'Direktur' => null,
            default => abort(403)
            };

        $komplains = Komplain::with('pelapor','kategori','user:id,name')
        ->addSelect('*')
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function viewTrackStatus()
    {
        return view('public.lacak_komplain', [
            'komplain' => null,
            'error' => null
        ]);
    }

    public function trackStatus($tiket)
    {
        $komplain = Komplain::where('tiket', $tiket)->with('pelapor','kategori')->first();

        if($komplain)
        {
            return view('public.lacak_komplain', compact('komplain'));
        } else {
            return view('public.lacak_komplain', [
                'komplain' => null,
                'error' => "Komplain dengan tiket $tiket tidak ditemukan"]);
        }
    }
}
