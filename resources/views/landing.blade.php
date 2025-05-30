<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <header class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center p-5">
            <h1 class="text-xl font-bold text-blue-600">Sistem Pengajuan Barang</h1>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</a>
                <a href="{{ route('register') }}" class="bg-gray-200 text-blue-700 px-4 py-2 rounded hover:bg-gray-300">Sign Up</a>
            </div>
        </div>
    </header>

    <section class="bg-gradient-to-r from-blue-100 via-white to-blue-50 py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Ajukan Kebutuhan Barang dengan Mudah</h2>
            <p class="text-lg text-gray-600 mb-8 max-w-xl mx-auto">
                Sistem pengajuan barang yang cepat, efisien, dan transparan untuk mendukung kelancaran operasional Anda.
            </p>
            <img src="{{ asset('storage/pengajuan.png') }}" alt="Ilustrasi Pengajuan Barang" class="mx-auto w-3/4 max-w-md">
        </div>
    </section>

    <footer class="bg-white border-t mt-10 py-6">
        <div class="container mx-auto text-center text-gray-500">
            &copy; {{ date('Y') }} Sistem Pengajuan Barang. All rights reserved.
        </div>
    </footer>

</body>
</html>
