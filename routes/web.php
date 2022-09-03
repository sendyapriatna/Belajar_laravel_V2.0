<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\NilaiController;

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
    return view('welcome');
});

// Route::get('/mahasiswa', function () {
//     return view('mahasiswa');
// });

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa/insertMahasiswa', [MahasiswaController::class, 'insertMahasiswa']);
Route::get('/mahasiswa/editMahasiswa/{id}', [MahasiswaController::class, 'editMahasiswa']);
Route::post('/mahasiswa/updateMahasiswa', [MahasiswaController::class, 'updateMahasiswa']);
Route::get('/mahasiswa/hapusMahasiswa/{id}', [MahasiswaController::class, 'hapusMahasiswa']);

Route::get('/matkul', [MatkulController::class, 'index']);
Route::get('/matkul/create', [MatkulController::class, 'create']);
Route::post('/matkul/insertMatkul', [MatkulController::class, 'insertMatkul']);
Route::get('/matkul/editMatkul/{id}', [MatkulController::class, 'editMatkul']);
Route::post('/matkul/updateMatkul', [MatkulController::class, 'updateMatkul']);
Route::get('/matkul/hapusMatkul/{id}', [MatkulController::class, 'hapusMatkul']);

Route::get('/nilai', [NilaiController::class, 'index']);
Route::get('/nilai/create', [NilaiController::class, 'create']);
Route::post('/nilai/insertNilai', [NilaiController::class, 'insertNilai']);
Route::get('/nilai/editNilai/{id}', [NilaiController::class, 'editNilai']);
Route::post('/nilai/updateNilai', [NilaiController::class, 'updateNilai']);
Route::get('/nilai/hapusNilai/{id}', [NilaiController::class, 'hapusNilai']);
