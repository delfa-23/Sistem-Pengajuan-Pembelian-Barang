<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="form-box mt-5">
    <h2>Edit Profil</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-start">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" required>

        <label>Foto Profil Sebelumnya:</label><br>
        @if(Auth::user()->photo_url)
            <img src="{{ asset(Auth::user()->photo_url) }}" alt="Foto Profil" class="profile-pic mb-3"><br>
        @endif

        <label>Foto Profil Baru:</label>
        <input type="file" name="photo" class="form-control">
        <img id="preview-photo" class="profile-pic mt-3" style="display: none;" alt="Preview Foto Profil">

        <button type="submit" class="btn mt-4">Simpan</button>
    </form>

    @if(Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="back-btn mt-3">← Kembali</a>
    @elseif(Auth::user()->role === 'manajer')
        <a href="{{ route('dashboard.manajer') }}" class="back-btn mt-3">← Kembali</a>
    @else
        <a href="{{ route('dashboard.karyawan') }}" class="back-btn mt-3">← Kembali</a>
    @endif
</div>

<script>
    document.querySelector('input[name="photo"]').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (evt) {
                const img = document.getElementById('preview-photo');
                img.src = evt.target.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f6fa;
        margin: 0;
        padding: 0;
    }

    .form-box {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: auto;
        text-align: center;
    }

    label {
        font-weight: 600;
        color: #2d79f3;
        display: block;
        text-align: left;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1.5px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    .profile-pic {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ccc;
        margin-bottom: 10px;
    }

    .btn {
        background-color: #2d79f3;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #1b4fd8;
    }

    .back-btn {
        display: inline-block;
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
        margin-top: 15px;
    }

    .back-btn:hover {
        text-decoration: underline;
    }

    .alert {
        font-size: 14px;
    }
</style>
