<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container">
    <h2 class="judul-halaman">Tambah Karyawan</h2>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Simpan</button>
        <a href="{{ route('karyawan.index') }}"><button type="button">Batal</button></a>
    </form>
</div>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f6fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 40px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .judul-halaman {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    form label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
    }

    input:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
    }

    button[type="submit"],
    button[type="button"] {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
        margin-right: 10px;
        transition: background-color 0.2s ease;
    }

    button[type="submit"] {
        background-color: #3498db;
        color: white;
    }

    button[type="submit"]:hover {
        background-color: #2980b9;
    }

    button[type="button"] {
        background-color: #bdc3c7;
        color: #333;
    }

    button[type="button"]:hover {
        background-color: #95a5a6;
    }

    .error-box {
        color: red;
        background: #ffe5e5;
        border: 1px solid #e74c3c;
        padding: 10px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .error-box ul {
        padding-left: 20px;
        margin: 0;
    }
</style>
