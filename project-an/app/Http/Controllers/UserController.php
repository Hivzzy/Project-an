<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Payroll;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;
use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data = Payroll::all();

        return view('pages.data', ['data' => $data]);
    }

    public function indexAkun()
    {

        $user = new UserModel();
        $data = $user->getUser();

        return view('pages.user.UserView', [
            'title' => 'Akun User',
            'active' => 'user-account',
            'users' => $data,
        ]);
    }

    public function displayTambahUser()
    {
        $role = new RoleModel();
        $data = $role->getRole();

        return view('pages.user.addUserView', [
            'title' => 'Tambah User',
            'active' => 'user-account',
            'roles' => $data,
        ]);
    }

    public function displayEditUser($id)
    {
        $user = new UserModel();
        $detail_user = $user->getDataUser($id);

        $role = new RoleModel();
        $data_role = $role->getRole();

        return view('pages.user.editUserView', [
            'title' => 'Edit User',
            'active' => 'user-account',
            'user' => $detail_user,
            'roles' => $data_role,
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required',
            'role' => 'required',
            'username' => 'required|min:8|max:16',
            'password' => 'required|max:16',
        ]);

        $user = new UserModel();
        $edit_user = $user->updateUser($request->all(), $id);

        if ($edit_user) {
            return redirect('/akun');
        }
    }

    public function viewPdf()
    {
        $data_payroll = Payroll::all()->first();

        $data = ['name' => 'Gaji Karyawan'];
        $pdf = Pdf::loadView('pages.invoice', compact('data_payroll'));

        $content = $pdf->download()->getOriginalContent();
        // dd($content);
        Storage::disk('local')->put('ikram/invoice.pdf', $content);
        // Storage::put('payrollpdf2/payroll.pdf', $content);
        return $pdf->stream('invoice.pdf');
    }
}
