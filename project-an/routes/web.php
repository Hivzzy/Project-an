<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;

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
Route::get('/home', [HalamanController::class, 'home']);
Route::get('/data', [HalamanController::class, 'data']);
Route::get('/coba', [HalamanController::class, 'test']);

Route::get('/sendMail', function(){
    Mail::to('ikra8520@gmail.com')->send(new HelloMail("Slip Gaji"));
});