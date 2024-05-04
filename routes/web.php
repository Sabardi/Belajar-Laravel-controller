<?php

use Illuminate\Support\Facades\Route;
// sebelum di pindah file controller nya
// use App\Http\Controllers\PageController;

// sesudah di pindah
use App\Http\Controllers\admin\PageController;

// Route::get('<url>',[App\Http\Controllers\Nama_Controller::class,'nama_method']);
Route::get('/',[PageController::class,'index']);
Route::get('/tampil',[PageController::class,'tampil']);
Route::get('/coba/kelas',[PageController::class,'coba']);
