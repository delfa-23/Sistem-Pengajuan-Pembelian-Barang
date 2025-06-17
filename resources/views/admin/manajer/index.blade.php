<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Manajer</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <h2 class="judul-halaman">Daftar Manajer</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('manajer.create') }}">
            <button type="button">Tambah</button>
        </a>
        <a href="{{ route('admin.dashboard') }}">
            <button type="button">Kembali</button>
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($manajers as $manajer)
                <tr>
                    <td>{{ $manajer->name }}</td>
                    <td>{{ $manajer->email }}</td>
                    <td>
                        <a href="{{ route('manajer.edit', $manajer->id) }}">Edit</a>

                        <form action="{{ route('manajer.destroy', $manajer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin hapus?')" type="submit">Hapus</button>
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
        margin: 0;
        padding: 0;
    }

    .judul-halaman {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
    }

    thead tr {
        background-color: #2d79f3;
        color: white;
        text-align: left;
    }

    thead th, tbody td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:hover {
        background-color: #f0f4ff;
    }

    button {
        background-color: #2d79f3;
        color: white;
        border: none;
        padding: 8px 18px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 5px 0;
    }

    button:hover {
        background-color: #1b4fd8;
    }

    a {
        text-decoration: none;
    }

    td > a {
        margin-right: 10px;
        color: #2d79f3;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    td > a:hover {
        color: #1b4fd8;
    }

    form button {
        padding: 6px 14px;
        font-weight: 600;
        background-color: #e55353;
        border-radius: 8px;
    }

    form button:hover {
        background-color: #b03030;
    }
</style>
