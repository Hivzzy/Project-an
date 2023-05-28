<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', 'login');
// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/app', function () {
//     return view('app');
// });

Route::get('login', [AuthController::class, 'userLogin'])->name('login');
Route::post('/user/login', [AuthController::class, 'authenticate']);

Route::middleware(['auth', 'auth.session'])->group(function(){
    //Dashboard
    
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::post('user/logout', [AuthController::class, 'logout']);

    //Kelola Akun
    Route::get('/akun', [UserController::class, 'indexAkun']);
    Route::get('/akun/edit/{id}', [UserController::class, 'displayEditUser']);
    Route::post('/akun/edit/{id}', [UserController::class, 'updateUser']);

    //Data Karyawan
    Route::get('/data', [UserController::class, 'index'])->name('show.data');
    Route::POST('/upload', [PayrollController::class, 'uploadExcel'])->name('upload.file');
    Route::get('/sendMail', [SendEmailController::class, 'index']);

    //Slip Gaji
    Route::get('/generatepdf', [UserController::class, 'generatepdf'])->name('user.pdf');
    Route::get('/viewpdf', [UserController::class, 'viewPdf']);
    Route::get('/test', [AuthController::class, 'viewslip']);
    

});




