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

Route::middleware('auth')->group(function () {

    Route::middleware('cekrole:student')->group(function () {
        route::get('/kelas-kamu', [CoreController::class, 'kelasKamu'])->name('kelas-kamu');
        route::get('/sertifikat_download', [CoreController::class, 'sertifikat_download'])->name('sertifikat_download');
    });


    Route::middleware('cekrole:admin,bloger')->group(function () {
        route::get('/blogs', [CoreController::class, 'blogs'])->name('blogs');
        route::get('/buat_blog', [CoreController::class, 'buat_blog'])->name('buat_blog');
        route::post('/posting_blog', [CoreController::class, 'posting_blog'])->name('posting_blog');
        Route::post('ckeditor/image_upload', [CoreController::class, 'upload'])->name('upload');
    });


    Route::middleware('cekrole:admin')->group(function () {
        route::get('/del_user/{id}', [CoreController::class, 'del_user'])->name('del_user');
        route::post('/nonaktif_user/{id}', [CoreController::class, 'nonaktif_user'])->name('nonaktif_user');
        route::post('/aktif_user/{id}', [CoreController::class, 'aktif_user'])->name('aktif_user');
        route::get('/semuaUser', [CoreController::class, 'semuaUser'])->name('semuaUser');
        route::get('/verifikasiMentor', [CoreController::class, 'verifikasiMentor'])->name('verifikasiMentor');
        route::get('/hapus_trainer/{crud_token}', [CoreController::class, 'hapus_trainer']);
    });

    // dashboard
    route::get('/dashboard', [CoreController::class, 'index'])->name('dashboard');

    // academy
    route::get('/semua-kelas', [CoreController::class, 'semuaKelas'])->name('semua-kelas');
    route::get('/kompetisi', [CoreController::class, 'kompetisi'])->name('kompetisi');
    route::get('/magang', [CoreController::class, 'magang'])->name('magang');

    // certificate
    route::get('/sertifikat', [CoreController::class, 'sertifikat'])->name('sertifikat');

    // blog
    route::get('/blog/{id}', [CoreController::class, 'blog_template']);

    // pengaturan
    route::get('/profil', [CoreController::class, 'profil'])->name('profil');
});

// login system
Route::get('/login', [LoginController::class, 'login_view'])->name('login');
Route::post('/login_portal', [LoginController::class, 'login_portal'])->name('login_portal');
Route::get('/student', [RegisterController::class, 'student'])->name('student');
Route::post('/create_student', [RegisterController::class, 'create_student'])->name('create_student');
Route::get('/mentor', [RegisterController::class, 'mentor'])->name('mentor');
Route::post('/create_mentor', [RegisterController::class, 'create_mentor'])->name('create_mentor');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
// Route::get('/crop', [CoreController::class, 'loadImage']);
// Route::post('/cropImg', [CoreController::class, 'uploadCropImage'])->name('cropImg');
