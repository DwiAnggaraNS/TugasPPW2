<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\APIPostController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/gallery', [APIPostController::class, 'index']);

Route::get('/greet', [GreetController::class, 'greet'])->name('greet');
