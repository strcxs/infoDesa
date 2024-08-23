<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::apiResources([
        '/dashboard' => 'dashboardController',
        '/galeri' => 'galeriController',
        '/struktur' => 'strukturController',
        '/banner' => 'bannerController',
        '/produk' => 'controllerProduk',
        '/produkImg' => 'imgController',
        '/geografis' => 'geoController',
        '/anggaran' => 'anggaranController',
        '/atraksi' => 'atraksiController',
        '/atraksiImg' => 'atraksiImgController',
        '/auth' => 'authController',
    ]);
    Route::post('/dashboard/{id}', 'dashboardController@update');
    Route::post('/galeri/{id}', 'galeriController@update');
    Route::post('/struktur/{id}', 'strukturController@update');
    Route::post('/banner/{id}', 'bannerController@update');
    Route::post('/produkImg/{id}', 'imgController@update');
    Route::post('/atraksiImg/{id}', 'atraksiImgController@update');



    Route::get('/auth', 'authController@getUser');
    Route::post('/auth', 'authController@auth');
    Route::post('/auth/{id}', 'authController@change');
});