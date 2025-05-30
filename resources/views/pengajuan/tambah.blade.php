<div class="container">
    <h3>Tambah Pengajuan</h3>

    <form action="{{ route('pengajuan.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" required placeholder="Masukkan nama barang">
        </div>

        <div>
            <label>Jumlah</label>
            <input type="number" name="jumlah" required placeholder="Masukkan jumlah barang">
        </div>

        <div>
            <label>Keterangan</label>
            <textarea name="keterangan" required></textarea>
        </div>

        <button class="btn" type="submit">Kirim</button>
    </form>

    <a href="{{ route('pengajuan.index') }}">← Kembali</a>
</div>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h3 {
            margin-bottom: 25px;
            color: #333;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
