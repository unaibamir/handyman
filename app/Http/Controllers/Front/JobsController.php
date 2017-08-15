<?php

namespace App\Http\Controllers\Front;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Factory as Faker;
use App\Job;
use App\Client;
use App\Provider;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Input;


class JobsController extends Controller
{
    /*
     * show job browser view
     * */
    public function getBrowseJobsSimple(Request $request) {
        $data = array();

        // TODO -- SET TOTAL AMOUNT OF CLIENT
        $open_jobs = Job::where('status'   ,'=' , 0)
            ->orderBy('id', 'desc')
            ->paginate(10);



        $data['open_jobs'] = $open_jobs;


        // Getting categories

        $categories = Category::where('status','=','1')
            ->orderBy('name', 'asc')
            ->get();

        $data['categories'] = $categories;

        return view('jobs.browse-jobs')->with($data);
    }

    /*
     *  Shows searched jobs
     * */
    public function postSearchJobs( Request $request ) {
        $data = array();

        \DB::enableQueryLog();
        /*$query = 'SELECT * FROM jobs WHERE 1 ';*/
        $query = Job::query();
        if($request->exists('submit')) {

            if($request->has('user_location')) {

                $user_location = getGoogleGeocode($request->user_location);

                $max_distance  = $request->distance;

                $current_lat = $user_location['location']['lat'];
                $current_lng = $user_location['location']['lng'];


                $distance_select = sprintf(
                    "( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance",
                    $current_lat,
                    $current_lng,
                    $current_lat
                );

                $query->selectRaw( DB::raw( '*' . ' ,' .  $distance_select  ) );


            }

            if($request->has('job_title')) {
                $job_title = $request->job_title;
                $query->where('title','like', "%$job_title%");
                /*$query .= 'AND title like "%'.$job_title.'%"';*/
            }

            if($request->has('job_type')) {
                $job_type = $request->job_type;
                /*$query->where('job_type', '=', "'$job_type'");*/
                $query->where('job_type', '=', $job_type);
                /*$query .= ' AND job_type = "'.$job_type.'"';*/
            }

            if($request->has('exp_level')) {
                $exp_level = $request->exp_level;
                $query->where('exp_level', '=', $exp_level);
                /*$query .= ' AND exp_level = "'.$exp_level.'"';*/
            }

            if($request->has('job_category')) {
                $job_category = $request->job_category;
                $query->where('cat_id', '=', $job_category);
                /*$query .= ' AND cat_id = '.$job_category.'';*/
            }

            if($request->has('user_location')) {
                $query->havingRaw('distance <= ' . $request->distance);
            }

            $open_jobs = $query->where('status'   ,'=' , 0)
                ->orderBy('id', 'desc')->get();

            $currentPage = LengthAwarePaginator::resolveCurrentPage();

            $perPage = 10;
            $currentPageSearchResults = $open_jobs->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $entries = new LengthAwarePaginator($currentPageSearchResults, count($open_jobs), $perPage);

            $entries->withPath(route('job.browse-search'));




            //dd($entries->links());

            //echo '<pre>'.print_r(\DB::getQueryLog(), true).'</pre>'; exit;
            //dd($entries);
            /*dd(\DB::getQueryLog());*/
            //return $paginator->make($open_jobs, count($open_jobs), Input::get('limit') ?: '10');

            // TODO -- SET TOTAL AMOUNT OF CLIENT

            //dd($entries);
            $data['open_jobs'] = $entries;


            // Getting categories

            $categories = Category::where('status','=','1')
                ->orderBy('name', 'asc')
                ->get();

            $data['categories'] = $categories;

            return view('jobs.browse-jobs')->with($data);



        }

        // Getting categories

        $categories = Category::where('status','=','1')
            ->get();

        $data['categories'] = $categories;

        return view('jobs.browse-jobs')->with($data);
    }



    /*
     * get single job details view
     */
    public function getSingleJobDetail($name = null, $id= null){
        $data = array();
        $job = Job::find($id);
        $data['job'] = $job;

        // get total open jobs
        $open_jobs = Job::where('status','=','0')
            ->where('client_id','=', $job->client_id)
            ->where('id', '!=', $id)
            ->get();

        $data['open_jobs'] = $open_jobs;
        $data['client_open_jobs'] = $open_jobs->count();



        return view('jobs.single-job')->with($data);

    }

    public function getCategoryJobs($name, $id = null) {
        $data = array();

        if(!empty($id)) {
            $category = Category::find($id);
        }else {
            $category = Category::where('slug', $name)->first();
        }


        $data['category']   = $category;

        $cat_jobs = Job::where('status'   ,'=' , 0)
            ->where('cat_id', '=', $id)
            ->orderBy('id', 'desc')
            ->paginate(10);



        $data['open_jobs'] = $cat_jobs;

        $categories = Category::where('status','=','1')
            ->get();

        $data['categories'] = $categories;


        return view('jobs.category-jobs')->with($data);

    }
}
