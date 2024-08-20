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

Route::get('/', function () {
    return view('dashboard');
})->name("home");
Route::get('/galeri', function () {
    return view('galery');
})->name("galery");
Route::get('/struktur', function () {
    return view('struktur');
})->name("struktur");

Route::get('/admin', function () {
    return view('admin');
})->name("admin");
Route::get('/admin/Galery', function () {
    return view('adminGalery');
})->name("adminGalery");

