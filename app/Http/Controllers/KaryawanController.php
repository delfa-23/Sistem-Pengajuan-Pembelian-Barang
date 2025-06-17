<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = User::where('role', 'karyawan')->get();
        return view('admin.karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'karyawan'
        ]);

        return redirect()->route('admin.karyawan.index')->with('pesan', 'Karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $karyawan = User::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $karyawan->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('admin.karyawan.index')->with('pesan', 'Karyawan berhasil diupdate.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('pesan', 'Karyawan berhasil dihapus.');
    }
}
