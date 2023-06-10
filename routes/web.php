<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Matkul;
use App\Models\Mahasiswa;

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

Route::get('/home', [UserController::class, 'home'])->middleware('auth', 'admin');

// Route::get('/absen', [QrController::class, 'index'])->middleware('auth', 'admin');
Route::resource('/absen', QrController::class)->middleware('admin', 'auth');


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/', function(){
    $title = "Web Absensi Mahasiswa";
    $slug = "landing";
    return view('index', compact('title', 'slug'));
})->name('index');

Route::get('/index', function(){
    $title = "Web Absensi Mahasiswa";
    $slug = "landing";
    return view('index', compact('title', 'slug'));
});

Route::get('/rekap', [MahasiswaController::class, 'matkul']) -> name('rekap')->middleware('auth');

// Route::get('/rekap/matkul', [MahasiswaController::class, 'index'])->middleware('auth');

Route::get('/rekap/{matkul:nama}', function (Matkul $matkul) {
    return view('rekap.rekap', [
        'title' => $matkul->nama,
        'matkul' => $matkul->nama,
        "mahasiswas" => Mahasiswa::orderBy('nim', 'ASC')->get(),
        "matkuls" => $matkul->where('nama', '=', $matkul->nama)->get(),
        "no" => 1,
        'slug' => $matkul->nama,
    ]);
});

// ROUTE ADMIN
Route::get('/admin', function () {
    $title = "Admin | Web Absensi Mahasiswa";
    $slug = "admin";
    return view('admin.index', compact('title', 'slug'));
})->middleware('admin','auth');

//Route::get('/admin/matkul', [MatkulController::class, 'index'])->middleware('admin', 'auth');

// Route::get('/admin/dosen', function(){
//     $title = "Data Dosen | Web ";
//     $slug = "dosen";
//     return view('admin.dosen', compact('title', 'slug'));
// })->middleware('admin', 'auth');

// Route::get('/admin/mhs/d3tib', function(){
//     $title = "Data Mahasiswa | Web ";
//     $slug = "mhs";
//     return view('admin.mhs.d3tib', compact('title', 'slug'));
// })->middleware('admin');

Route::get('/admin/mhs/d3tia', function(){
    $title = "Data Mahasiswa | Web ";
    $slug = "mhs";
    return view('admin.mhs.d3tia', compact('title', 'slug'));
})->middleware('admin');



Route::resource('/admin/matkul', MatkulController::class)->middleware('admin');

Route::resource('/admin/dosen', DosenController::class)->middleware('admin');

Route::get('/admin/mhs/d3tia', [UserController::class, 'd3tia'])->middleware('admin');
Route::get('/admin/mhs/d3tib', [UserController::class, 'd3tib'])->middleware('admin');
Route::get('/admin/mhs/d3tic', [UserController::class, 'd3tic'])->middleware('admin');

Route::resource('/admin/mhs/', UserController::class)->middleware('admin');
