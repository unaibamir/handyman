<?php

namespace App\Http\Controllers\Provider;

use App\Proposal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Provider;
use App\Contract;
use function redirect;
use Validator;
use Mail;
use function view;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:provider');
    }

    public function getDashboardPage()
    {
        /*\DB::enableQueryLog();*/
        $data = array();

        $provider_id = Auth::guard('provider')->id();
        $provider = Auth::guard('provider')->user();
        $data['provider'] = $provider;

        $contracts = Contract::where('provider_id', '=', $provider_id)
            ->with(['job'])
            ->limit(5)
            ->get();
        $data['completed_jobs'] = $contracts;

        $qued_jobs = Proposal::where('pro_id', '=', $provider_id)
            ->where('proposals.status', '!=', '2')
            ->join('jobs', 'jobs.id', '=', 'proposals.job_id')
            ->where('jobs.status', '=', '0')
            ->select('proposals.*')
            ->with(['job'])
            ->limit(5)
            ->get();

        $data['qued_jobs'] = $qued_jobs;



        /*dd(\DB::getQueryLog());*/
        return view('provider.dashboard')->with($data);
    }

    public function postSignup_handyman(Request $request) {

        if ( Provider::where('email', '=', $request->email)->exists() ) {
            $request->session()->flash('error', '<strong>Snap!</strong> This provider already exists!');
            return redirect()->route('signup-handyman');
        }

        $validator = Validator::make($request->all(), [
            'fname'     =>  'required|max:191',
            'lname'     =>  'required|max:191',
            'email'     =>  'required|email|unique:providers,email',
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



    public function getCompletedJobs() {

        $data = array();

        $provider_id = Auth::guard('provider')->id();
        $provider = Auth::guard('provider')->user();
        $data['provider'] = $provider;

        $completed_jobs = Contract::where('provider_id', '=', $provider_id)
            ->with(['job'])
            ->paginate(10);
        $data['completed_jobs'] = $completed_jobs;

        return view('provider.completed-jobs')->with($data);

    }

    public function getQuedJobs() {

        $data = array();

        $provider_id = Auth::guard('provider')->id();
        $provider = Auth::guard('provider')->user();
        $data['provider'] = $provider;

        $qued_jobs = Proposal::where('pro_id', '=', $provider_id)
            ->where('proposals.status', '!=', '2')
            ->join('jobs', 'jobs.id', '=', 'proposals.job_id')
            ->where('jobs.status', '=', '0')
            ->select('proposals.*')
            ->with(['job'])
            ->paginate(10);

        $data['qued_jobs'] = $qued_jobs;

        return view('provider.qued-jobs')->with($data);
    }

    public function getDeleteQuedJob($id) {

        $proposal = Proposal::find($id);

        $proposal->delete();


        Session::flash('success', 'Your Proposal has been deleted successfully.');

        return redirect()->back();
    }

    public function getJobContract($id) {
        $data = array();

        $provider_id = Auth::guard('provider')->id();
        $provider = Auth::guard('provider')->user();
        $data['provider'] = $provider;


        $report= Contract::where('job_id', '=', $id)->first();

        $data['report'] = $report;



        return view('provider.report')->with($data);
    }


    public function postPickJob(Request $request) {
        return redirect()->back();
    }

}
