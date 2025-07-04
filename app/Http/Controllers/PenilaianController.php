<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tiket)
    {
        $komplain = Komplain::where('tiket', $tiket)->firstOrFail();
        
        return view('public.form_penilaian', compact('komplain'));
    }

    public function store(Request $request, $tiket)
    {
        $komplain = Komplain::where('tiket', $tiket)->firstOrFail();

        if ($komplain->penilaian) {
            return redirect()->back()->with('error', 'Anda sudah memberikan rating untuk komplain ini.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string',
        ]);

        Penilaian::create([
            'komplain_id' => $komplain->id,
            'rating' => $validated['rating'],
            'feedback' => $validated['feedback'],
        ]);

        return redirect()->route('lacak.komplain.submit', $tiket);
    }

    public function show()
    {
        $penilaians = Penilaian::with(['komplain:id,pelapor_id', 'komplain.pelapor:id,nama'])
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.penilaian', compact('penilaians'));
    }

}
