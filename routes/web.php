<?php

use Faker\Core\File;
use App\Mail\KirimEmail;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('province', ProvinceController::class);
// Route::resource('categorie', CategoriesController::class);
// Route::resource('city', CityController::class);
// Route::resource('unit', UnitController::class);
// Route::resource('product', ProductController::class);
// Route::resource('customer', CustomerController::class);


Route::get('/layouting',function(){
    return view('pages_home.index');
});

use App\Http\Controllers\PostController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JalankanJobController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ManajerController;
use App\Http\Controllers\KaryawanController;


Route::get('/landing', function () {
    return view('landing');
})->name('landing');

// Halaman login dan register
Route::middleware('guest')->group(function () {
    // Route login yang dibutuhkan oleh Laravel auth
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    // Route register juga tetap disediakan
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

Route::get('/dashboard', function () {
    return redirect()->route('landing');
});

use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/karyawan', [AdminController::class, 'karyawanIndex'])->name('karyawan.index');

    // Data manajer
    Route::get('/manajer', [AdminController::class, 'manajerIndex'])->name('manajer.index');

    Route::resource('users', AdminController::class)->except(['show']);

    Route::resource('users', AdminController::class)->except(['show']);
});

// Routes/web.php

use App\Http\Controllers\AdminAuthController;

// Halaman login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login')->middleware('guest');

// Proses login admin
Route::post('/admin/login', [AdminAuthController::class, 'login'])->middleware('guest');

Route::get('/register/admin', [AuthController::class, 'showRegisterAdmin'])->name('register.admin.show');

// Proses register admin
Route::post('/register/admin', [AuthController::class, 'registerAdmin'])->name('register.admin');


// web.php
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/pengajuan', [App\Http\Controllers\PengajuanController::class, 'index'])->name('admin.pengajuan.index');
    Route::delete('/admin/pengajuan/{id}', [App\Http\Controllers\PengajuanController::class, 'destroy'])->name('admin.pengajuan.destroy');
});

Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Halaman Dashboard (tergantung role, misal karyawan atau manajer)
Route::middleware('auth')->group(function () {
    // Dashboard utama (karyawan atau manajer)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');  // Ini adalah route untuk dashboard umum jika diperlukan

    Route::resource('post',PostController::class);

    // Dashboard untuk karyawan
    Route::get('/dashboard/karyawan', function (){
        return view('dashboard.karyawan');
    })->name('dashboard.karyawan')->middleware('auth'); // Pastikan middleware role sudah ada

    // Dashboard untuk manajer
    Route::get('/dashboard/manajer', function (){
        return view('dashboard.manajer');
    })->name('dashboard.manajer')->middleware('auth'); // Pastikan middleware role sudah ada

    Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
});

Route::resource('manajer', ManajerController::class);
Route::get('/manajer/{id}/edit', [ManajerController::class, 'edit'])->name('manajer.edit');
Route::put('/manajer/{id}', [ManajerController::class, 'update'])->name('manajer.update');
Route::delete('/manajer/{id}', [ManajerController::class, 'destroy'])->name('manajer.destroy');

Route::resource('karyawan', KaryawanController::class);
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/password', [UserController::class, 'editPassword'])->name('profile.updatePassword');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('profile.passwordUpdate');
});





    Route::get('/pengajuan/tambah', [PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan/{id}/approve', [PengajuanController::class, 'approve'])->name('pengajuan.approve');
    Route::get('/pengajuan/{id}/reject', [PengajuanController::class, 'reject'])->name('pengajuan.reject');
    Route::get('/pengajuan/{id}/edit', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{id}', [PengajuanController::class, 'update'])->name('pengajuan.update');
    Route::delete('/pengajuan/{id}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware(['auth'])->group(function () {
    // Form untuk ubah password
    Route::get('/profile/password', [UserController::class, 'editPassword'])->name('profile.editPassword');

    // Proses ubah password
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('profile.updatePassword');
});

// Route::controller(FileUploadController::class)->group(function () {
//     Route::get('file-upload', 'index')->name('fileupload.index');
//     Route::post('file-upload', 'store')->name('fileupload.store');
//     Route::delete('file-upload/{gallery}', 'delete')->name('fileupload.delete');
// });

Route::get('kirim-email-saya', function (){
    Mail::to('degatamerawan@gmail.com')->send(new KirimEmail());
    return 'Email sudah dikirim';
});

Route::get('/email/verify', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verifikasi Email Telah Dikirim!');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    $role = auth()->user()->role;

    if ($role === 'admin') {
        return redirect()->route('admin.dashboard')->with('message', 'Email verified successfully!');
    } elseif ($role === 'manajer') {
        return redirect()->route('dashboard.manajer')->with('message', 'Email verified successfully!');
    } else {
        return redirect()->route('dashboard.karyawan')->with('message', 'Email verified successfully!');
    }
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::middleware(['auth'])->get( '/email/verification-notification', function (Request $request){
$request->user( )->sendEmailVerificationNotification( );
return back( )->with('message', 'Verifikasi Email Telah Dikirim!');
})->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
});
