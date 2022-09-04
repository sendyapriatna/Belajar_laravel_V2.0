<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('Login.index');
});

// Route::get('/mahasiswa', function () {
//     return view('mahasiswa');
// });

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->middleware('auth');
Route::post('/mahasiswa/insertMahasiswa', [MahasiswaController::class, 'insertMahasiswa'])->middleware('auth');
Route::get('/mahasiswa/editMahasiswa/{id}', [MahasiswaController::class, 'editMahasiswa'])->middleware('auth');
Route::post('/mahasiswa/updateMahasiswa', [MahasiswaController::class, 'updateMahasiswa'])->middleware('auth');
Route::get('/mahasiswa/hapusMahasiswa/{id}', [MahasiswaController::class, 'hapusMahasiswa']);

Route::get('/matkul', [MatkulController::class, 'index'])->middleware('auth');
Route::get('/matkul/create', [MatkulController::class, 'create'])->middleware('auth');
Route::post('/matkul/insertMatkul', [MatkulController::class, 'insertMatkul'])->middleware('auth');
Route::get('/matkul/editMatkul/{id}', [MatkulController::class, 'editMatkul'])->middleware('auth');
Route::post('/matkul/updateMatkul', [MatkulController::class, 'updateMatkul'])->middleware('auth');
Route::get('/matkul/hapusMatkul/{id}', [MatkulController::class, 'hapusMatkul']);

Route::get('/nilai', [NilaiController::class, 'index'])->middleware('auth');
Route::get('/nilai/create', [NilaiController::class, 'create'])->middleware('auth');
Route::post('/nilai/insertNilai', [NilaiController::class, 'insertNilai'])->middleware('auth');
Route::get('/nilai/editNilai/{id}', [NilaiController::class, 'editNilai'])->middleware('auth');
Route::post('/nilai/updateNilai', [NilaiController::class, 'updateNilai'])->middleware('auth');
Route::get('/nilai/hapusNilai/{id}', [NilaiController::class, 'hapusNilai'])->middleware('auth');
Route::get('/cetak', [NilaiController::class, 'cetak'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/insertLogin', [LoginController::class, 'insertLogin']);
Route::post('/login/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register/insertRegister', [RegisterController::class, 'insertRegister']);


// Route::get(
//     '/dashboard',
//     function () {
//         return view('Dashboard.index');
//     }
// )->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/cetak_pdf', [NilaiController::class, 'cetak_pdf'])->middleware('auth');
