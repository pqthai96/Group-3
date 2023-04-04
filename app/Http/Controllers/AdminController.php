<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index() {
        return view('admin_login');
    }
    
    public function show_dashboard() {
        return view('admin_pages.dashboard');
    }

    public function dashboard(Request $rqst) {
        $admin_name = $rqst->admin_name;
        $admin_password = $rqst->admin_password;

        $result = DB::table('Admin')->where('AdminName', $admin_name)->where('AdminPassword', $admin_password)->first();
        if($result) {
            Session::put('admin_name', $result->AdminName);
            Session::put('admin_id', $result->AdminID);
            return redirect::to('dashboard');
        } else {
            Session::put('msg','Wrong username or password!');
            return redirect::to('index');
        }
    }

    public function logout() {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect::to('index');
    }

    public function add_pizza() {
        return view('admin_pages.add_pizza');
    }

    public function all_pizza() {
        return view('admin_pages.all_pizza');
    }

    public function all_admin() {
        return view('admin_pages.all_admin');
    }

    public function add_admin() {
        return view('admin_pages.add_admin');
    }
}