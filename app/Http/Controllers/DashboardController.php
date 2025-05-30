<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    // Untuk menampilkan dashboard khusus untuk karyawan
    public function karyawan()
    {
        return view('dashboard.karyawan');
    }

    // Untuk menampilkan dashboard khusus untuk manajer
    public function manajer()
    {
        return view('dashboard.manajer');
    }
}
