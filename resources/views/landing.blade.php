<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengajuan Barang</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <h1>Sistem Pengajuan Barang</h1>
            <div class="nav-buttons">
                <a href="{{ route('login') }}" class="btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn-signup">Sign Up</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="hero" style="display: flex; align-items: center; justify-content: space-between; padding: 50px;">
        <div>
            <h2>Permudah Proses Pengajuan Barang di Perusahaan Anda</h2>
            <p>Platform ini dirancang khusus untuk memfasilitasi karyawan dalam mengajukan kebutuhan barang dan memudahkan manajer dalam melakukan persetujuan secara efisien.</p>
            <a href="#contact" class="btn">Hubungi Admin</a>
        </div>
        <div>
            <img src="{{ asset('pengajuan.png') }}" alt="Ilustrasi Pengajuan Barang" style="max-width: 300px;"/>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Sistem Pengajuan Barang Internal. Seluruh hak cipta dilindungi.</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
