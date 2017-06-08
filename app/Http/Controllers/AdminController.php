<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        echo 'Admin logged in <a href="'.route("admin.logout").'">logout</a>';
    }
}
