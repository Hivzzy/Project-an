<?php

namespace App\Http\Controllers;

use App\Models\MonthlyReport;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userLogin()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function dashboard()
    {
        $monthlyInformation = MonthlyReport::all();
        // dd($monthlyInformation);
        $summaryEmployees = Payroll::count();
        return view('pages.DashboardView', [
            'title'     => 'Dashboard',
            'active'    => 'dashboard',
            'data'      => $monthlyInformation,
            'sum'       => $summaryEmployees,
        ]);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records. Please refresh page This.',
        ])->onlyInput('username');
    }

    public function viewslip()
    {
        return view('pages.gaji');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
