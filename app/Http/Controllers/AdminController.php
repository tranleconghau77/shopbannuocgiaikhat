<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

session_start();

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->input('admin_email');
        $admin_password = $request->input('admin_password');

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($result != null) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return redirect('/dashboard');
        } else {
            Session::put('message', 'User or password wrong. Please type again.');
            return redirect('/admin');
        }
    }
    public function log_out()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);

        return redirect('/admin');

    }

}