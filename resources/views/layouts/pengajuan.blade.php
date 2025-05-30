@extends('layouts.app')

@section('content')
<h3>Tambah Pengajuan</h3>

<form action="{{ route('pengajuan.store') }}" method="POST">
    @csrf
    <div>
        <label>Nama Barang</label><br>
        <input type="text" name="nama_barang" required>
    </div>

    <div>
        <label>Jumlah</label><br>
        <input type="number" name="jumlah" required>
    </div>

    <div>
        <label>Keterangan</label><br>
        <textarea name="keterangan" required></textarea>
    </div>

    <br>
    <button class="btn" type="submit">Kirim</button>
</form>

<br>
<a href="{{ route('pengajuan.index') }}">← Kembali</a>
@endsection
