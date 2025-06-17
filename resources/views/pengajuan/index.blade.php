<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container">
    @if(Auth::user()->role === 'manajer')
        <a href="{{ route('dashboard.manajer') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
    @elseif(Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
    @else
        <a href="{{ route('dashboard.karyawan') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
    @endif

    @if(Auth::user()->role == 'karyawan')
        <a href="{{ route('pengajuan.create') }}" class="btn">+ Tambah Pengajuan</a>
    @endif

    @if(session('pesan'))
        <p>{{ session('pesan') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Status</th>
                @if(in_array(Auth::user()->role, ['manajer', 'admin']))
                    <th>User</th>
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuans as $p)
                <tr>
                    <td>{{ $p->nama_barang }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ ucfirst($p->status) }}</td>

                    @if(Auth::user()->role == 'karyawan' && $p->status == 'menunggu' && $p->user_id == Auth::id())
                        <td colspan="2">
                            <a href="{{ route('pengajuan.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    @elseif(in_array(Auth::user()->role, ['manajer', 'admin']))
                        <td>{{ $p->user->name ?? '-' }}</td>
                        <td>
                            @if($p->status == 'menunggu')
                                <a class="btn" href="{{ route('pengajuan.approve', $p->id) }}">Setujui</a>
                                <a class="btn btn-secondary" href="{{ route('pengajuan.reject', $p->id) }}">Tolak</a>
                                <form action="{{ route('pengajuan.destroy', $p->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            @else
                                -
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
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
