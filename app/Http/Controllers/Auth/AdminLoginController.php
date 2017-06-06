<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function route;

class AdminLoginController extends Controller
{
    /**
     * AdminLoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {

        $this->validate($request, [
            'email' =>  'required|email',
            'password'  =>  'required|min:6'
        ]);

        if( Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember) ) {
            return redirect()->intended( route('admin.dashboard') );
        }

        return redirect()->back()->withInput($request->only('email','remember'));

    }
}
