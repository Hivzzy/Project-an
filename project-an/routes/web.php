<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/app', function () {
    return view('app');
});

Route::get('login', [AuthController::class, 'userLogin'])->name('login');
Route::post('/user/login', [AuthController::class, 'authenticate']);

Route::get('/home', [HalamanController::class, 'home']);
Route::get('/data', [UserController::class, 'index']);
Route::get('/test', [HalamanController::class, 'test']);
Route::get('/generatepdf', [UserController::class, 'generatepdf'])->name('user.pdf');
Route::get('/coba', [HalamanController::class, 'test']);