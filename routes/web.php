<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
   Route::middleware('auth:sanctum')->get('/admin',[HomeController::class,'index'])->name('home.admin');
});
