<?php

namespace App\Http\Controllers\Provider;

use App\Proposal;
use function base64_decode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Provider;
use App\Contract;
use App\Job;
use function redirect;
use Validator;
use Mail;


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
            ->where('status','=', 2)
            ->with(['job'])
            ->limit(5)
            ->get();
        $data['completed_jobs'] = $contracts;

        $qued_jobs = Proposal::where('pro_id', '=', $provider_id)
            ->where('proposals.status', '!=', '2')
            ->join('jobs', 'jobs.id', '=', 'proposals.job_id')
            ->where('jobs.status', '=', '0')
            ->select('proposals.*')
            ->orderBy('proposals.id','desc')
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
            ->where('status', '=', 2)
            ->with(['job'])
            ->paginate(10);
        $data['completed_jobs'] = $completed_jobs;

        return view('provider.completed-jobs')->with($data);

    }

    public function getOnGoingJobs() {

        $data = array();

        $provider_id = Auth::guard('provider')->id();;
        $provider = Provider::find($provider_id);


        $ongoing_jobs = Contract::where('status','=',0)
            ->orderBy('id', 'desc')
            ->with(['job'])
            ->paginate(10);

        //dd($ongoing_jobs);


        $data['ongoing_jobs'] = $ongoing_jobs;
        $data['provider'] = $provider;

        return view('provider.ongoing-jobs')->with($data);
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
            ->orderBy('proposals.id','desc')
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
        //dd($report);
        $data['report'] = $report;



        return view('provider.report')->with($data);
    }


    public function getPickJob(Request $request) {
        $data =array();
        // TODO - Send notificiations when applied on job

        $provider = Auth::guard('provider')->user();
        $data['provider'] = $provider;

        $job_id = base64_decode($request->job_id);
        $client_id = base64_decode($request->client_id);
        $provider_id = base64_decode($request->provider_id);

        $proposal = Proposal::where('job_id', '=', $job_id)
            ->where('client_id', '=', $client_id)
            ->where('pro_id', '=', $provider_id)
            ->get();

        $data['job_id'] = $job_id;
        $data['client_id'] = $client_id;
        $data['provider_id'] = $provider_id;


        if( $proposal->isEmpty() ) {
            // Submit the proposal

            $data['job'] = Job::find($job_id)->first();


            $data['proposal'] = $proposal;
            return view('provider.quote-submit')->with($data);
        }
        else {
            // Show error message
            Session::flash('error', 'You have already applied on this job');
            return redirect()->route('provider.dashboard');
        }
    }

    public function postPickJob(Request $request) {

        $job_id = base64_decode($request->job_id);
        $client_id = base64_decode($request->client_id);
        $provider_id = base64_decode($request->provider_id);

        $proposal = Proposal::where('job_id', '=', $job_id)
            ->where('client_id', '=', $client_id)
            ->where('pro_id', '=', $provider_id)
            ->get();

        if( !$proposal->isEmpty() ) {
            // Show error message
            Session::flash('error', 'You have already applied on this job');
            return redirect()->route('provider.dashboard');
        }

        $proposal = new Proposal();
        $proposal->job_id = base64_decode($request->job_id);
        $proposal->client_id = base64_decode($request->client_id);
        $proposal->pro_id = base64_decode($request->provider_id);
        $proposal->desc = '';
        $proposal->material_cost = $request->material_cost;
        $proposal->labour_cost = $request->labour_cost;
        $proposal->amount = $request->total_cost;
        $proposal->end_date = $request->end_date;
        $proposal->end_time = $request->end_time;
        $proposal->status = 0;
        $proposal->save();

        Session::flash('success', 'Your quotation has been submitted successfully!');
        return redirect()->route('provider.dashboard');

    }

}
