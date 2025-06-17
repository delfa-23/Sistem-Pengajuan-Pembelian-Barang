<?php

namespace App\Http\Controllers;

use App\Models\User; // Asumsi Manajer di tabel users
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    public function index()
    {
        $manajers = User::where('role', 'manajer')->get();
        return view('admin.manajer.index', compact('manajers'));
    }

    public function create()
    {
        return view('manajer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'manajer',
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.manajer.index')->with('success', 'Manajer berhasil ditambah');
    }

    public function edit($id)
    {
        $manajer = User::findOrFail($id);
        return view('manajer.edit', compact('manajer'));
    }

    public function update(Request $request, $id)
    {
        $manajer = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $manajer->update($request->only('name', 'email'));
        return redirect()->route('admin.manajer.index')->with('success', 'Manajer berhasil diupdate');
    }

    public function destroy($id)
    {
        $manajer = User::findOrFail($id);
        $manajer->delete();
        return redirect()->route('admin.manajer.index')->with('success', 'Manajer berhasil dihapus');
    }
}
