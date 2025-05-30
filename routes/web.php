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

    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');


    // Pengajuan
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
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

    if (auth()->user()->role==='manajer')
    {
        return redirect()->route('dashboard.manajer')->with('message', 'Email verified successfully!');
    }
    else
    {
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
