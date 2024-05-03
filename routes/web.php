<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Route::get('<url>',[App\Http\Controllers\Nama_Controller::class,'nama_method']);
Route::get('/',[PageController::class,'index']);
Route::get('/tampil',[PageController::class,'tampil']);

