<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $req)
    {
        $is_admin = $req->user()->is_admin;

        if($is_admin)
            return view('dashboard');

        return view('welcome');
    }
}
