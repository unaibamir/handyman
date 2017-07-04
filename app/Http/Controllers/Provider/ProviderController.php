<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Provider;
use Validator;
use Mail;

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

    public function postSignup_handyman(Request $request) {

        if ( Provider::where('email', '=', $request->email)->exists() ) {
            $request->session()->flash('error', '<strong>Snap!</strong> This client already exists!');
            return redirect()->route('signup-handyman');
        }

        $validator = Validator::make($request->all(), [
            'fname'     =>  'required|max:191',
            'lname'     =>  'required|max:191',
            'email'     =>  'required|email|unique:clients,email',
            'password'  =>  'required|min:6|alpha_dash',
            'address'  	=>  'required',
            'phone'		=>	'required'
        ]);

        if ( $validator->fails() ) {
            return redirect( route('signup-handyman') )
                ->withErrors($validator)
                ->withInput();
        }

        $handyman = new Provider;

        $handyman->fname 	=	$request->fname;
        $handyman->lname 	=	$request->lname;
        $handyman->password =	bcrypt($request->password);
        $handyman->username =	$request->email;
        $handyman->email 	=	$request->email;
        $handyman->address 	=	$request->address;
        $handyman->phone 	=	$request->phone;

        $handyman->save();

        $request->session()->flash('success', 'We sent you an activation code. Check your email.');

        /*Mail::send('emails.send', ['title' => 'TItle', 'content' => 'Content'], function ($message)
        {

            $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to('chrisn@scotch.io');

        });
        */
        return redirect()->route('signup-handyman');

    }
}
