<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\SendEmailController;
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
    return view('home');
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

Route::get('/sendMail', [SendEmailController::class, 'index']);
Route::POST('/upload', [PayrollController::class, 'uploadExcel'])->name('upload.file');
