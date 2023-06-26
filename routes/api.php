<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
Route::post('register',[IndexController::class,'register']);
Route::post('login',[IndexController::class,'login']);
Route::post('logout',[IndexController::class,'logout']);
Route::get('user',[IndexController::class,'getUser']);
