<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>

    @if(session('pesan'))
        <p>{{ session('pesan') }}</p>
    @endif

    <h2>Daftar Semua Pengajuan Barang</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Pengaju</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuans as $p)
                <tr>
                    <td>{{ $p->nama_barang }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ ucfirst($p->status) }}</td>
                    <td>{{ $p->user->name ?? '-' }}</td>
                    <td>
                        <form action="{{ route('admin.pengajuan.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pengajuan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f6fa;
    }

    .container {
        max-width: 1000px;
        margin: 40px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        margin: 10px 5px 20px 0;
        font-size: 14px;
    }

    .btn-secondary {
        background-color: #95a5a6;
    }

    .btn:hover {
        background-color: #2980b9;
    }

    .btn-danger {
        background-color: #e74c3c;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table thead {
        background-color: #2980b9;
        color: white;
    }

    table th, table td {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: center;
    }

    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    p {
        color: green;
        margin-top: 10px;
    }
</style>
