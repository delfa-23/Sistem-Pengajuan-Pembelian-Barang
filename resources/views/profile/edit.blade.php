<h2>Edit Profil</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nama:</label><br>
    <input type="text" name="name" value="{{ Auth::user()->name }}" required><br><br>

    <label>Foto Profil Sebelumnya:</label><br><br>
    @if(Auth::user()->photo_url)
        <img src="{{ asset(Auth::user()->photo_url) }}" alt="Foto Profil" width="100" class="profile-pic"><br>
    <br>
    @endif
    <label>Foto Profil Baru:</label><br><br>
    <input type="file" name="photo"><br><br>
    <img id="preview-photo" class="profile-pic" style="display: none;" alt="Preview Foto Profil" width="100"><br><br>


    <button type="submit">Simpan</button>
</form>
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


<a href="{{ route('dashboard.manajer') }}" class="back-btn">← Kembali</a>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f6fa;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        flex-direction: column;
    }

    h2 {
        margin-bottom: 20px;
        color: #2c3e50;
    }

    .form-box {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 400px;
    }

    label {
        font-weight: bold;
        color: #34495e;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .profile-pic {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

    .profile-pic {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ccc;
    }

    .btn {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn:hover {
        background-color: #2980b9;
    }

    .back-btn {
        margin-top: 20px;
        display: inline-block;
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
    }

    .back-btn:hover {
        text-decoration: underline;
    }

    .success-msg {
        color: green;
        margin-bottom: 15px;
    }
</style>
