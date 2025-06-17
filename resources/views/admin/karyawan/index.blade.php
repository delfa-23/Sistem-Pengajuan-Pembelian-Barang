<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container">
    <a href="{{ route('karyawan.create') }}" class="btn">+ Tambah Karyawan</a>

    @if(session('pesan'))
        <p>{{ session('pesan') }}</p>
    @endif
    <h2 class="judul-halaman">Daftar Karyawan</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
            <tr>
                <td>{{ $karyawan->name }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>
                    <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
</div>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f6fa;
        margin: 0;
        padding: 0;
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

    .btn-secondary:hover {
        background-color: #7f8c8d;
    }

    .btn-danger {
        background-color: #e74c3c;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .btn-warning {
        background-color: #f39c12;
    }

    .btn-warning:hover {
        background-color: #d68910;
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
    .judul-halaman {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 30px;
    }

</style>
