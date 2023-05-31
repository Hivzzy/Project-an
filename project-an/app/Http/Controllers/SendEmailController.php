<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Mail\MyTestMail;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        // dd($payroll[0]);
        // $myPayroll = $payroll[0];
        // Mail::to('ikra8520@gmail.com')->send(new HelloMail("Slip Gaji", $myPayroll));
        // Mail::to($myPayroll->email)->send(new HelloMail("Slip Gaji", $myPayroll));
        // Mail::send()

        ini_set('max_execution_time', 300);
        foreach ($payroll as $myPayroll) {
            $path = 'storage/invoice/' . $myPayroll->id . '.pdf';
            $files = [
                public_path($path),
            ];
            
            $details = [
                'title' => 'Slip Gaji Periode',
                'files' => $files,
            ];
            Mail::to($myPayroll->email)->send(new MyTestMail($details, $myPayroll));
        }
  
         
         
        dd("Email is Sent.");
    
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
