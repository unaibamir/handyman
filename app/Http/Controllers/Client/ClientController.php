<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Proposal;
use App\Category;
use App\Job;
use App\Client;
use App\Contract;
use function redirect;
use function view;


class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:client');
    }


    /*
     * Client Job Dashboard
     * */
    public function dashboard()
    {
        $data = array();

        $client_id = Auth::guard('client')->id();
        $client = Client::find($client_id);

        // open jobs --- status = 0
        $open_jobs = Job::where('client_id', '=' , $client_id)
                    ->where('status'   ,'=' , 0)
                    ->orderBy('id', 'desc')
                    ->limit(5)
                    ->get();

        // completed jobs --- status = 2
        $completed_jobs = Job::where('client_id', '=' , $client_id)
            ->where('status'   ,'=' , 2)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();


        $data['open_jobs'] = $open_jobs;
        $data['completed_jobs'] = $completed_jobs;
        
        $data['client'] = $client;
        return view('client.dashboard')->with($data);
    }


    /*
     * Client Job Post Page
     * */
    public function getJobPost() {
        $data = array();

        $client_id = Auth::guard('client')->id();
        $client = Client::find($client_id);
        $data['client'] = $client;

        $categories = Category::orderBy('name', 'asc')->get();
        $data['categories'] = $categories;

        // TODO -- Put Credit Card Option, use Stripe
        return view('client.post-job')->with($data);
    }


    /*
     * Client Job Post POST function to save job details
     * */
    public function postJobPost(Request $request)
    {
        $job = new Job();
        $geo_info = getGoogleGeocode($request->job_location);

        $slug = str_slug( $request->job_title );

        $slug = check_slug_exists('jobs', 'slug', $slug);

        if ( Job::where('slug', '=', $slug )->exists() ) {
            $request->session()->flash('error', '<strong>Snap!</strong> This job already exists!');
            return redirect()->route('client.job-post');
        }

        $job->title = $request->job_title;
        $job->slug  = $slug;
        $job->phone = $request->job_phone;
        $job->date = $request->job_date;
        $job->time = $request->job_time;
        $job->exp_level = $request->exp_level;
        $job->job_type = $request->job_type;
        $job->cat_id = $request->job_category;
        $job->desc = $request->job_desc;
        $job->st_address = $request->st_address;

        $job->address = $geo_info['postal_code']['long_name'];
        $job->lat = $geo_info['location']['lat'];
        $job->lng = $geo_info['location']['lng'];
        $job->state = $geo_info['state']['long_name'];
        $job->city = $geo_info['city']['long_name'];
        $job->status = 0;
        $job->end_date = $request->job_end_date;

        $job->client_id = Auth::guard('client')->id();
        $job->save();

        $client = Client::find( Auth::guard('client')->id() );
        $time = $client->time;
        $client->time = $time++;
        $client->save();

        $request->session()->flash('success', 'You have been successfully posted a job.');

        return redirect()->route('client.dashboard');


        // TODO  --  Event for email notifications

    }

    public function postUpdateJob(Request $request, $id) {
        // TODO -- Complete this
        $job = Job::find($id);


        $geo_info = getGoogleGeocode($request->job_location);

        $slug = str_slug( $request->job_title );

        $slug = check_slug_exists('jobs', 'slug', $slug);


        if ( Job::where('slug', '=', $slug )->where('id', '!=', $id)->exists() ) {
            $request->session()->flash('error', '<strong>Snap!</strong> This job already exists!');
            return redirect()->route('client.edit-job', $id);
        }

        $job->title = $request->job_title;
        $job->slug  = $slug;
        $job->phone = $request->job_phone;
        $job->date = $request->job_date;
        $job->time = $request->job_time;
        $job->exp_level = $request->exp_level;
        $job->job_type = $request->job_type;
        $job->cat_id = $request->job_category;
        $job->desc = $request->job_desc;
        $job->st_address = $request->st_address;

        $job->address = $geo_info['postal_code']['long_name'];
        $job->lat = $geo_info['location']['lat'];
        $job->lng = $geo_info['location']['lng'];
        $job->state = $geo_info['state']['long_name'];
        $job->city = $geo_info['city']['long_name'];
        $job->status = 0;
        $job->end_date = $request->job_end_date;

        $job->save();

        Session::flash('success', 'Job has been updated successfully.');

        return redirect()->route('client.dashboard');
    }


    /*
     * shows clients open jobs
     * */
    public function getOpenJobs() {

        $data = array();

        $client_id = Auth::guard('client')->id();
        $client = Client::find($client_id);

        $open_jobs = Job::where('client_id', '=' , $client_id)
            ->where('status'   ,'=' , 0)
            ->orderBy('id', 'desc')
            ->paginate(10);


        $data['open_jobs'] = $open_jobs;
        $data['client'] = $client;

        return view('client.open-jobs')->with($data);

    }


    public function getClosedJobs() {
        $data = array();

        $client_id = Auth::guard('client')->id();
        $client = Client::find($client_id);

        $closed_jobs = Job::where('client_id', '=' , $client_id)
            ->where('status'   ,'=' , 2)
            ->orderBy('id', 'desc')
            ->paginate(10);


        $data['closed_jobs'] = $closed_jobs;
        $data['client'] = $client;

        return view('client.closed-jobs')->with($data);
    }

    public function getOnGoingJobs() {

        $data = array();

        $client_id = Auth::guard('client')->id();
        $client = Client::find($client_id);

        $ongoing_jobs = Job::where('client_id', '=' , $client_id)
            ->where('status'   ,'=' , 1)
            ->orderBy('id', 'desc')
            ->paginate(10);


        $data['ongoing_jobs'] = $ongoing_jobs;
        $data['client'] = $client;

        return view('client.ongoing-jobs')->with($data);

    }



    public function getDeleteJob($id) {
        $job = Job::find($id);
        $job->delete();

        Session::flash('success', 'Job has been successfully deleted!');

        return redirect()->route('client.dashboard');
    }


    public function getEditJob($id) {
        $data = array();
        $job = Job::find($id);
        $client = Client::find($job->client_id);
        $categories = Category::orderBy('name', 'asc')->get();

        $data['categories'] = $categories;
        $data['job'] = $job;
        $data['client'] = $client;

        return view('client.edit-job')->with($data);
    }


    public function getJobProposals($id) {
        /*\DB::enableQueryLog();*/
        $data = array();
        $proposals = Proposal::where('job_id','=',$id)
            ->orderBy('created_at', 'desc')
            ->with(['provider', 'job', 'client'])
            ->paginate(10);

        $data['proposals'] = $proposals;

        /*dd(\DB::getQueryLog());*/

        return view('client.proposals')->with($data);
    }

    public function getJobProposalDelete($id) {
        $proposal = Proposal::find($id);
        $proposal->delete();

        Session::flash('success', 'The proposal has been deleted successfully!');

        return redirect()->back();
    }

    public function getProposalSingleView($job_id, $proposal_id) {
        $data = array();

        $client_id = Auth::guard('client')->id();
        $client = Client::find($client_id);
        $data['client'] = $client;

        $job = Job::find($job_id);
        $data['job'] = $job;

        $proposal = Proposal::find($proposal_id);
        $data['proposal'] = $proposal;


        return view('client.quotation-view')->with($data);


    }

    public function getJobProposalAccept($job_id, $proposal_id) {

        $data = array();

        $client_id = Auth::guard('client')->id();
        $client = Client::find($client_id);
        $data['client'] = $client;

        $job = Job::find($job_id);
        $data['job'] = $job;

        $proposal = Proposal::find($proposal_id);
        $data['proposal'] = $proposal;

        $con = new Contract();
        $con->proposal_id       =   $proposal->id;
        $con->client_id         =   $client_id;
        $con->job_id            =   $proposal->job_id;
        $con->provider_id       =   $proposal->pro_id;
        $con->status            =   0;
        $con->start_time        =   time();
        $con->end_time          =   '';
        $con->amount            =   $proposal->amount;

        if( $con->save() ){
            // TODO -- Put Notification here to client, admin and provider

            $job->status = 1;
            $job->save();

            Session::flash('success', 'You have successfully accepted job quotation.');

            return redirect()->route('client.dashboard');
        }
        else {
            Session::flash('error', 'There has been some error. Please try again.');

            return redirect()->back();
        }

    }

    public function getJobProposalAward($job_id, $proposal_id) {
        // TODO -- Notification for project award, client, admin and provider.
        return redirect()->back();
    }


    public function getJobProposalReject($job_id, $proposal_id) {
        // TODO -- Notification for project reject, provider.
        $proposal = Proposal::find($proposal_id);
        $proposal->status = 2;
        Session::flash('success', 'Proposal has been reject successfully.');
        $proposal->save();
        return redirect()->back();
    }

    public function getJobContract($id) {
        $data = array();
        $con = Contract::where('job_id', '=', $id)->first();
        $proposal = Proposal::find($con->proposal_id);

        $client = Client::find($con->client_id);

        $data['client'] = $client;
        $data['proposal'] = $proposal;
        $data['contract'] = $con;

        return view('client.contract')->with($data);
    }

    public function getJobComplete($contract_id, $job_id) {
        $con = Contract::find($contract_id)
            ->where('status','!=', 2)
            ->first();
        $con->status = 2;
        $con->save();

        $job = Job::find($job_id);
        $job->status = 2;
        $job->save();

        // TODO -- Client, provider and admin notification

        Session::flash('success', 'Congrats, Your job has been completed!');

        return redirect()->route('client.dashboard');


    }

}


