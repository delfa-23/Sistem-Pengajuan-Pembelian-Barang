<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Mencari user berdasarkan email
    // $user = \App\Models\User::where('email', $request->email)->first();

    if (! auth()->attempt($request->only('email', 'password'))) {

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    event(new \App\Events\UserEvent(auth()->user()));


    // Jika user adalah manajer, arahkan ke dashboard manajer
    if (auth()->user()->role == 'manajer') {
        return redirect()->route('dashboard.manajer'); // Atur route sesuai dengan yang ada
    }

    // Jika user adalah karyawan, arahkan ke dashboard karyawan
    return redirect()->route('dashboard.karyawan'); // Atur route sesuai dengan yang ada
}



    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:3',
        'secret' => 'nullable|string', // tambahkan validasi kode rahasia
    ]);

    // Default role = karyawan
    $role = 'karyawan';

    // Jika secret cocok, set jadi manajer
    if (!empty($request->secret)) {
        if ($request->secret === 'manajer123') {
            $role = 'manajer';
        } else {
            return back()->withInput()->withErrors([
                'secret' => 'Kode akses salah. Silakan coba lagi.',
            ]);
        }
    }

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $role,
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); //menghapus semua session data (termasuk CSRF lama).
        $request->session()->regenerateToken(); //mencegah CSRF reuse setelah logout.

        return redirect('/login');
    }
}
