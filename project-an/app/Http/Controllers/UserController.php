<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = Payroll::all();

        return view('pages.data', ['data' => $data]);

    }

    public function viewPdf(){

        $data = ['name' => 'Gaji Karyawan'];
        $pdf = Pdf::loadView('pages.invoice', compact('data'));
        return $pdf ->stream('invoice.pdf');
    }



}