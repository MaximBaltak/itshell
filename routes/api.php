<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use \App\Http\Controllers\UploadVideoController;

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
Route::post('register', [IndexController::class, 'register']);
Route::post('login', [IndexController::class, 'login']);
Route::get('video/all',[UploadVideoController::class,'getVideosAll']);
Route::middleware([EnsureFrontendRequestsAreStateful::class, 'auth:sanctum'])->group(function () {
    Route::get('logout', [IndexController::class, 'logout']);
    Route::get('user', [UsersController::class, 'getUser']);
    Route::post('video',[UploadVideoController::class,'save']);
    Route::get('video',[UploadVideoController::class,'getVideos']);
    Route::get('video/{id}',[UploadVideoController::class,'getVideo']);
    Route::delete('video/{id}',[UploadVideoController::class,'removeVideo']);
});
