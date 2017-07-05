<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Provider;
use App\Client;
use App\JobType;
use Validator;
use Mail;

class PagesController extends Controller
{
	public function getHomepage() {
		return view('pages.home');
	}

    public function getLoginMain(){
	    return view('pages.login-main');
    }

    public function getSignupMain() {
    	return view('pages.signup');
    }

    public function getSignupHandyman(Request $request) {
	    $jobtypes = JobType::where('status', '=' , 1)->get();
	    $data = [
	        'page_title'    =>  'HandyMan Sign Up',
            'job_types'     =>  $jobtypes
        ];

	    //dd( request()->ip() );

    	return view('pages.signup-handyman')->with('data', $data );
    }

    public function postSignupHandyman(Request $request) {
        $area_work_coord = GMGetCoordinates($request->area_work);

        if ( Provider::where('email', '=', $request->email)->exists() ) {
            $request->session()->flash('error', '<strong>Snap!</strong> This email already exists!');
            return redirect()->route('signup-handyman');
        }

        $validator = Validator::make($request->all(), [
            'fname'     =>  'required|max:191',
            'lname'     =>  'required|max:191',
            'email'     =>  'required|email|unique:providers,email',
            'password'  =>  'required|min:6|alpha_dash',
            'address'  	=>  'required',
            'job_type'  =>  'required',
            'area_work' =>  'required'
        ]);

        if ( $validator->fails() ) {
            return redirect( route('signup-handyman') )
                ->withErrors($validator)
                ->withInput();
        }

        $provider = new Provider;

        $provider->fname 	    =	$request->fname;
        $provider->lname 	    =	$request->lname;
        $provider->password     =	bcrypt($request->password);
        $provider->username     =	$request->email;
        $provider->email 	    =	$request->email;
        $provider->address 	    =	$request->address;
        $provider->phone 	    =	$request->phone;
        $provider->location     =   $request->area_work;
        $provider->country      =   $request->country;
        $provider->jobtype_id   =   $request->job_type;
        $provider->latitude     =   $area_work_coord['lat'];
        $provider->longitude    =   $area_work_coord['lng'];
        $provider->setMeta('bank_account', $request->bank_account);

        $provider->save();

        $request->session()->flash('success', 'You have been successfully registered.');

        return redirect()->route('signup-handyman');

    }


    public function getSignupHomeowner() {
        return view('pages.signup-homeowner')->with('page_title', 'Home Owner Signup');
    }

    public function postSignupHomeowner(Request $request) {

    	if ( Client::where('email', '=', $request->email)->exists() ) {
            $request->session()->flash('error', '<strong>Snap!</strong> This email already exists!');
            return redirect()->route('signup-homeowner');
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
            return redirect( route('signup-homeowner') )
                ->withErrors($validator)
                ->withInput();
        }

        $client = new Client;

        $client->fname 	    =	$request->fname;
        $client->lname 	    =	$request->lname;
		$client->password   =	bcrypt($request->password);
        $client->username   =	$request->email;
        $client->email 	    =	$request->email;
        $client->address 	=	$request->address;
        $client->phone 	    =	$request->phone;

        $client->save();

        $request->session()->flash('success', 'You have been successfully registered.');

        return redirect()->route('signup-homeowner');

    }

}
