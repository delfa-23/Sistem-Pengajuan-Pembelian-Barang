<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $pengajuans = Pengajuan::with('user')->latest()->get();
            return view('admin.pengajuan.index', compact('pengajuans'));
        }

        if ($user->role === 'manajer') {
            $pengajuans = Pengajuan::with('user')->latest()->get();
        } else {
            $pengajuans = Pengajuan::where('user_id', $user->id)->latest()->get();
        }

        return view('pengajuan.index', compact('pengajuans'));
    }

    public function create()
    {
        if (Auth::user()->role === 'manajer') {
            abort(403, 'Manajer tidak diperbolehkan mengajukan barang.');
        }

        return view('pengajuan.tambah');
    }

    public function store(Request $r)
    {
        if (Auth::user()->role === 'manajer') {
            abort(403, 'Manajer tidak diperbolehkan mengajukan barang.');
        }
        $r->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer'
        ]);

        Pengajuan::create([
            'user_id'     => Auth::id(),
            'nama_barang' => $r->nama_barang,
            'jumlah'      => $r->jumlah,
            'keterangan'  => $r->keterangan,
            'status'      => 'menunggu'
        ]);

        return redirect('/pengajuan')->with('pesan', 'Pengajuan berhasil dikirim.');
    }

    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'disetujui';
        $pengajuan->save();
        return back();
    }

    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'ditolak';
        $pengajuan->save();
        return back();
    }

    // Method untuk edit dan update (optional)
    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuan.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer'
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/pengajuan')->with('pesan', 'Pengajuan berhasil diupdate.');
    }

    public function destroy($id)
    {
        Pengajuan::findOrFail($id)->delete();
        return back()->with('pesan', 'Pengajuan berhasil dihapus.');
    }
}
