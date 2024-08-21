<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin', function () {
    return view('admin/admin');
})->name("admin");
Route::get('/admin/Galery', function () {
    return view('admin/adminGalery');
})->name("adminGalery");
Route::get('/admin/struktur', function () {
    return view('admin/adminStruktur');
})->name("adminStruktur");
Route::get('/admin/banner', function () {
    return view('admin/adminBanner');
})->name("adminBanner");


Route::get('/', function () {
    return view('dashboard');
})->name("home");
Route::get('/galeri', function () {
    return view('galery');
})->name("galery");
Route::get('/struktur', function () {
    return view('struktur');
})->name("struktur");
Route::get('/produk', function () {
    return view('umkm');
})->name("produk");


