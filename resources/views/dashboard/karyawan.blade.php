<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <h1>Dashboard Karyawan</h1>

        <div class="user-info">
            <div class="dropdown">
                <button class="dropdown-toggle">
                    <div class="profile-wrapper">
                        <img src="{{ asset(Auth::user()->photo_url) }}" alt="Foto Profil" class="navbar-profile">
                        <span class="profile-name">{{ Auth::user()->name }}</span>
                    </div>
                </button>


                <div class="dropdown-content">
                    <a href="{{ route('profile.edit') }}">Profil</a>
                    <a href="{{ route('profile.updatePassword') }}">Update Password</a>
                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin Logout?')">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p>Ajukan kebutuhan barangmu dengan mudah.</p>
        <a href="{{ route('pengajuan.index') }}" class="btn">Lihat / Ajukan Barang</a>
        <a href="{{ route('verification.notice') }}" class="btn1">Verifikasi Email</a><br><br>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownBtn = document.querySelector('.navbar .dropdown button');
            const dropdown = document.querySelector('.navbar .dropdown');

            dropdownBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdown.classList.toggle('open');
            });

            document.addEventListener('click', function () {
                dropdown.classList.remove('open');
            });
        });
    </script>

</body>
</html>


<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background-color: #2c3e50;
        padding: 15px 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 100;
    }

    .navbar h1 {
        margin: 0;
        font-size: 24px;
        flex-grow: 1;
        text-align: left;
    }

    .navbar-profile {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-top: 2px;
    }

    .navbar .dropdown {
        position: relative;
        display: inline-block;
    }

    .navbar .dropdown button {
        background-color: #2c3e50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 6px;
        font-size: 16px;
    }

    .navbar .dropdown-content {
        display: none;
        position: absolute;
        top: 100%;
        right: 10px;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 6px;
        overflow: hidden;
    }

    .navbar .dropdown-content a,
    .navbar .dropdown-content form button {
        color: #333;
        padding: 12px 20px;
        text-decoration: none;
        display: block;
        background: none;
        width: 100%;
        text-align: left;
        border: none;
    }

    .navbar .dropdown-content a:hover,
    .navbar .dropdown-content form button:hover {
        background-color: #f1f1f1;
    }

    .navbar .dropdown.open .dropdown-content {
        display: block;
    }

    .navbar .dropdown button:hover {
        background-color: #34495e;
    }
    .dropdown-toggle {
        display: flex;
        align-items: center;
        padding: 8px 12px;
        gap: 10px;
    }

    .profile-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-name {
        font-weight: bold;
        color: white;
        font-size: 16px;
        white-space: nowrap;
    }


    .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        text-align: center;
    }

    .btn {
        display: inline-block;
        padding: 12px 20px;
        margin-top: 20px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-size: 16px;
    }
    .btn1 {
        display: inline-block;
        padding: 12px 20px;
        margin-top: 20px;
        background-color: #2ecc71;
        color: #fff;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #2980b9;
    }

    button.logout-btn {
        background-color: #e74c3c;
        padding: 12px 20px;
        font-size: 16px;
        color: white;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

    button.logout-btn:hover {
        background-color: #c0392b;
    }

    @media (max-width: 768px) {
        .container {
            padding: 20px;
            max-width: 90%;
        }

        .navbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .navbar .dropdown {
            margin-top: 10px;
        }

        .navbar .dropdown button {
            width: 100%;
        }

        .navbar h1 {
            text-align: left;
        }
    }
</style>
