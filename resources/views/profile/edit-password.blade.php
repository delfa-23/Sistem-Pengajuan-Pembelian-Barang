<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <h2 class="judul-halaman">Ubah Password</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('profile.updatePassword') }}">
        @csrf
        @method('PUT')

        <label>Password Sekarang:</label>
        <input type="password" name="current_password" required>

        <label>Password Baru:</label>
        <input type="password" name="new_password" required>

        <label>Konfirmasi Password Baru:</label>
        <input type="password" name="new_password_confirmation" required>

        <button type="submit">Update Password</button>
    </form>

    <a href="{{ route('profile.edit') }}">
        <button type="button" class="btn-kembali">Kembali ke Profil</button>
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
