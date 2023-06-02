<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Mail\MyTestMail;
use App\Models\MonthlyReport;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SendEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payroll = Payroll::all();
        $periode = MonthlyReport::first()->periode;

        if ($payroll != null && $periode != null) {
            $data = ['name' => 'Gaji Karyawan'];

            foreach ($payroll as $data_payroll) {
                $pdf = Pdf::loadView('pages.invoice', compact('data_payroll', 'periode'));
                $content = $pdf->download()->getOriginalContent();
                $path = 'public/invoice/' . $data_payroll->nama_karyawan . '.pdf';
                Storage::disk('local')->put($path, $content);
            }

            ini_set('max_execution_time', 300);
            foreach ($payroll as $myPayroll) {
                $validator = Validator::make($payroll->all(), [
                    'email' => 'required|email',
                ]);

                if ($validator->fails()) {
                    return redirect()->route('show.data')->with('failed', '<strong>FORMAT EMAIL UNTUK KARYAWAN ' . $myPayroll->nama_karyawan . ' TIDAK VALID</strong>, silahkan periksa kembali file excel.');
                }

                $path = 'storage/invoice/' . $myPayroll->nama_karyawan . '.pdf';
                $files = [
                    public_path($path),
                ];

                $details = [
                    'title' => 'Slip Gaji Periode',
                    'files' => $files,
                ];

                Mail::to($myPayroll->email)->send(new MyTestMail($details, $myPayroll, $periode));
            }

            return redirect()->route('show.data')->with('success', '<strong>PAYROLL BERHASIL TERKIRIM</strong>, silahkan reset data untuk menghapus semua data demi keamanan. (optional)');
        } else {
            return redirect()->route('show.data')->with('failed', '<strong>MOHON UPLOAD FILE</strong> terlebih dahulu untuk melakukan Send to Email.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
