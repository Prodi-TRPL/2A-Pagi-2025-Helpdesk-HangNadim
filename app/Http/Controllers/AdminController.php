<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); 

        return view('admin.kelola_admin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_tambah_admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:80',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string|in:Officer,Team Leader,Manager,Direktur',
            'password' => 'required|min:8',
            'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 80 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'role.required' => 'Role wajib dipilih.',
            'role.string' => 'Role harus berupa teks.',
            'role.in' => 'Role harus salah satu dari: Officer, Team Leader, Manager, atau Direktur.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',

            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp.string' => 'Nomor WhatsApp harus berupa teks.',
            'whatsapp.regex' => 'Nomor WhatsApp harus terdiri dari 12 hingga 15 digit angka.',
        ]);


        User::create([
            'name' =>  $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
            'whatsapp' => $validated['whatsapp']
        ]);

        return redirect()->route('kelola.admin')->with('success', 'Berhasil menambah akun!');
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
    public function edit(User $user)
    {
        return view('admin.form_edit_admin', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($user->id),
        ],
            'role' => 'required|string|in:Officer,Team Leader,Manager,Direktur',
            'password' => 'required|min:8',
            'whatsapp' => 'required|string|regex:/^[0-9]{12,15}$/',
    ],[
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 80 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'role.required' => 'Role wajib dipilih.',
            'role.string' => 'Role harus berupa teks.',
            'role.in' => 'Role harus salah satu dari: Officer, Team Leader, Manager, atau Direktur.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',

            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp.string' => 'Nomor WhatsApp harus berupa teks.',
            'whatsapp.regex' => 'Nomor WhatsApp harus terdiri dari 12 hingga 15 digit angka.',
        ]);
        
        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            'password' => $request->password,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
        ]);

        return redirect()->route('kelola.admin')->with('success', 'Data akun berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete(); 

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
