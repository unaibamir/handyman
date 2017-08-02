<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function dashboard()
    {
        echo 'Client logged in <a href="'.route("client.logout").'">logout</a>';
    }
}
