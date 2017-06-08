<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:provider');
    }

    public function dashboard()
    {
        echo 'Provider logged in <a href="'.route("provider.logout").'">logout</a>';
    }
}
