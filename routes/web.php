<?php

use App\Models\User;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\AbsensiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login
Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        $title = 'Dashboard';
        return view('admin.dashboard', compact('title'));
    });

    Route::get('/absen', function () {
        $title = 'absensi';
        $absen = Absen::latest()->get();
        return view('admin.absen.index', compact('absen', 'title'));
    });
    Route::resource('/rayons', RayonController::class)->except('show');
    Route::resource('/rombels', RombelController::class)->except('show');
    Route::resource('/siswa', SiswaController::class)->except('show');
    Route::resource('/admins', AdminController::class)->except('show');

    // profile user
    Route::get('/profile', function () {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->get();
        return view('users.profile', compact('user'));
    });

    // profile admin
    Route::get('/admin/profile', function () {
        $title = 'Profile';
        $id = Auth::user()->id;
        $user = User::where('id', $id)->get();
        return view('admin.profile.index', compact('title', 'user'));
    });

    // absen hadir
    Route::get('/absensi-siswa', [AbsensiController::class, 'absensi_siswa']);
    Route::post('/absensi-siswa', [AbsensiController::class, 'store']);

    Route::get('/absensi-siswa2', [AbsensiController::class, 'absensi_siswa2']);
    Route::post('/absensi-siswa2', [AbsensiController::class, 'update']);

    Route::get('/dashboard-siswa', [AbsensiController::class, 'dashboard_siswa']);
    Route::post('/dashboard-siswa', [AbsensiController::class, 'destroy']);

    //  Absen tidak hadir
    Route::get('absensi-tidak-hadir', [AbsensiController::class, 'absensi_tidak_hadir']);
    Route::post('absensi-tidak-hadir', [AbsensiController::class, 'tidak_hadir']);
});
