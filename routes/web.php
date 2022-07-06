<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Core\CoreController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home-magang', [HomeController::class, 'magang']);
Route::get('/home-semua-kelas', [HomeController::class, 'semuaKelas']);

Route::middleware(['auth'])->group(function () {
    // dashboard
    route::get('/dashboard', [CoreController::class, 'index'])->name('dashboard');

    // academy
    route::get('/semua-kelas', [CoreController::class, 'semuaKelas'])->name('semua-kelas');
    route::get('/kelas-langganan', [CoreController::class, 'kelasLangganan'])->name('kelas-langganan');
    route::get('/kompetisi', [CoreController::class, 'kompetisi'])->name('kompetisi');
    route::get('/magang', [CoreController::class, 'magang'])->name('magang');

    // leaderboard
    route::get('/rankings', [CoreController::class, 'rankings'])->name('rankings');
    route::get('/sertifikat', [CoreController::class, 'sertifikat'])->name('sertifikat');
    route::get('/sertifikat_download', [CoreController::class, 'sertifikat_download'])->name('sertifikat_download');

    // pengaturan
    route::get('/profil', [CoreController::class, 'profil'])->name('profil');
});

// login system
Route::get('/login', [LoginController::class, 'login_view'])->name('login');
Route::post('/login_portal', [LoginController::class, 'login_portal'])->name('login_portal');
Route::get('/student', [RegisterController::class, 'student'])->name('student');
Route::post('/create_student', [RegisterController::class, 'create_student'])->name('create_student');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
