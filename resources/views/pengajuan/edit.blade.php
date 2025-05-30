<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit Pengajuan</title>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f6fa;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    h3 {
        margin-bottom: 20px;
        color: #2c3e50;
        text-align: center;
    }

    .container {
        width: 100%;
        max-width: 600px;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #34495e;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .btn {
        display: inline-block;
        padding: 12px 20px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        width: 100%;
        border: none;
    }

    .btn:hover {
        background-color: #2980b9;
    }

    a {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        color: #3498db;
        text-align: center;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <h3>Edit Pengajuan</h3>

    <div class="container">
        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input
                    type="text"
                    id="nama_barang"
                    name="nama_barang"
                    value="{{ $pengajuan->nama_barang }}"
                    required
                />
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input
                    type="number"
                    id="jumlah"
                    name="jumlah"
                    value="{{ $pengajuan->jumlah }}"
                    required
                />
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" required>{{ $pengajuan->keterangan }}</textarea>
            </div>

            <div class="form-group">
                <button class="btn" type="submit">Simpan Perubahan</button>
            </div>
        </form>

        <br />
        <a href="{{ route('pengajuan.index') }}">← Kembali</a>
    </div>
</body>
</html>

