<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;

class JobsController extends Controller
{
    /*
     * show job browser view
     * */
    public function getBrowseJobsSimple() {
        $data = array();
        $faker = Faker::create();
        $data['job_slug'] = $faker->word;
        $data['job_id'] = $faker->randomDigitNotNull;

        return view('jobs.browse-jobs')->with($data);
    }

    /*
     * get single job details view
     */
    public function getSingleJobDetail($name = null, $id= null){

        $data = array();
        $faker = Faker::create();
        $data['job_title'] = $faker->name();

        return view('jobs.single-job')->with($data);

    }
}
