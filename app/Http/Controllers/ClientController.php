<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function route;

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
