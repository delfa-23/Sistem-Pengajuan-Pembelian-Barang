<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Manajer</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <h2 class="judul-halaman">Tambah Manajer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('manajer.store') }}" method="POST">
        @csrf
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Tambah</button>
    </form>

    <a href="{{ route('admin.manajer.index') }}">
        <button type="button" class="btn-kembali">Kembali</button>
    </a>
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

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 25px;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: 600;
        color: #2d79f3;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 10px 12px;
        border: 1.5px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    input:focus {
        outline: none;
        border-color: #2d79f3;
    }

    button[type="submit"] {
        background-color: #2d79f3;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #1b4fd8;
    }

    .btn-kembali {
        background-color: #555;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 16px;
        display: block;
        margin: 20px auto 0;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-kembali:hover {
        background-color: #333;
    }

    .alert {
        max-width: 400px;
        margin: 0 auto 20px;
    }
</style>
