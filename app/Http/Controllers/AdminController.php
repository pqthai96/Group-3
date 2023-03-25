<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin_login');
    }
    
    public function dashboard() {
        return view('admin_pages.dashboard');
    }
}