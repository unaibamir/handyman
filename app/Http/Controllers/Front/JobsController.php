<?php

namespace App\Http\Controllers\Front;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Factory as Faker;
use function redirect;
use function route;

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

        $jobs = array(
            [
                'title' =>  'We are looking for Some handyman who can work instantly',
                'desc'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel consectetur nunc. Aliquam nec velit semper nibh egestas egestas sit amet a nisi. Donec condimentum tellus ipsum, eu scelerisque justo ultrices eget. Vivamus nec auctor quam, non convallis nulla. Suspendisse auctor ullamcorper consequat. Fusce odio ligula, aliquet at lacinia non, pellentesque placerat tortor. Ut venenatis est ornare orci porttitor consequat. Nullam scelerisque tristique tortor, nec sagittis nibh mattis non. Donec facilisis egestas metus eget suscipit. Curabitur ultricies, ligula vel pretium euismod, elit quam interdum orci, ac egestas nulla eros a odio. Nulla aliquam lacinia leo. Fusce eget ex sed ligula malesuada blandit non et turpis.'
            ],
            [
                'title' =>  'Handyman required for urgent job',
                'desc'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel consectetur nunc. Aliquam nec velit semper nibh egestas egestas sit amet a nisi. Donec condimentum tellus ipsum, eu scelerisque justo ultrices eget. Vivamus nec auctor quam, non convallis nulla. Suspendisse auctor ullamcorper consequat. Fusce odio ligula, aliquet at lacinia non, pellentesque placerat tortor. Ut venenatis est ornare orci porttitor consequat. Nullam scelerisque tristique tortor, nec sagittis nibh mattis non. Donec facilisis egestas metus eget suscipit. Curabitur ultricies, ligula vel pretium euismod, elit quam interdum orci, ac egestas nulla eros a odio. Nulla aliquam lacinia leo. Fusce eget ex sed ligula malesuada blandit non et turpis.'
            ],
            [
                'title' =>  'We are looking for handyman who are proficient in all home work',
                'desc'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel consectetur nunc. Aliquam nec velit semper nibh egestas egestas sit amet a nisi. Donec condimentum tellus ipsum, eu scelerisque justo ultrices eget. Vivamus nec auctor quam, non convallis nulla. Suspendisse auctor ullamcorper consequat. Fusce odio ligula, aliquet at lacinia non, pellentesque placerat tortor. Ut venenatis est ornare orci porttitor consequat. Nullam scelerisque tristique tortor, nec sagittis nibh mattis non. Donec facilisis egestas metus eget suscipit. Curabitur ultricies, ligula vel pretium euismod, elit quam interdum orci, ac egestas nulla eros a odio. Nulla aliquam lacinia leo. Fusce eget ex sed ligula malesuada blandit non et turpis.'
            ],
            [
                'title' =>  'Urgent work needed! Long time work',
                'desc'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel consectetur nunc. Aliquam nec velit semper nibh egestas egestas sit amet a nisi. Donec condimentum tellus ipsum, eu scelerisque justo ultrices eget. Vivamus nec auctor quam, non convallis nulla. Suspendisse auctor ullamcorper consequat. Fusce odio ligula, aliquet at lacinia non, pellentesque placerat tortor. Ut venenatis est ornare orci porttitor consequat. Nullam scelerisque tristique tortor, nec sagittis nibh mattis non. Donec facilisis egestas metus eget suscipit. Curabitur ultricies, ligula vel pretium euismod, elit quam interdum orci, ac egestas nulla eros a odio. Nulla aliquam lacinia leo. Fusce eget ex sed ligula malesuada blandit non et turpis.'
            ]
        );
        shuffle($jobs);

        $data['jobs'] = $jobs;

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

    public function getCategoryJobs($name, $id = null) {
        $data = array();

        if(!empty($id)) {
            $category = Category::find($id);
        }else {
            $category = Category::where('slug', $name)->first();
        }


        $data['category']   = $category;

        $faker = Faker::create();
        $data['job_slug'] = $faker->word;
        $data['job_id'] = $faker->randomDigitNotNull;

        $jobs = array(
            [
                'title' =>  'We are looking for Some handyman who can work instantly',
                'desc'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel consectetur nunc. Aliquam nec velit semper nibh egestas egestas sit amet a nisi. Donec condimentum tellus ipsum, eu scelerisque justo ultrices eget. Vivamus nec auctor quam, non convallis nulla. Suspendisse auctor ullamcorper consequat. Fusce odio ligula, aliquet at lacinia non, pellentesque placerat tortor. Ut venenatis est ornare orci porttitor consequat. Nullam scelerisque tristique tortor, nec sagittis nibh mattis non. Donec facilisis egestas metus eget suscipit. Curabitur ultricies, ligula vel pretium euismod, elit quam interdum orci, ac egestas nulla eros a odio. Nulla aliquam lacinia leo. Fusce eget ex sed ligula malesuada blandit non et turpis.'
            ],
            [
                'title' =>  'Handyman required for urgent job',
                'desc'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel consectetur nunc. Aliquam nec velit semper nibh egestas egestas sit amet a nisi. Donec condimentum tellus ipsum, eu scelerisque justo ultrices eget. Vivamus nec auctor quam, non convallis nulla. Suspendisse auctor ullamcorper consequat. Fusce odio ligula, aliquet at lacinia non, pellentesque placerat tortor. Ut venenatis est ornare orci porttitor consequat. Nullam scelerisque tristique tortor, nec sagittis nibh mattis non. Donec facilisis egestas metus eget suscipit. Curabitur ultricies, ligula vel pretium euismod, elit quam interdum orci, ac egestas nulla eros a odio. Nulla aliquam lacinia leo. Fusce eget ex sed ligula malesuada blandit non et turpis.'
            ],
            [
                'title' =>  'We are looking for handyman who are proficient in all home work',
                'desc'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel consectetur nunc. Aliquam nec velit semper nibh egestas egestas sit amet a nisi. Donec condimentum tellus ipsum, eu scelerisque justo ultrices eget. Vivamus nec auctor quam, non convallis nulla. Suspendisse auctor ullamcorper consequat. Fusce odio ligula, aliquet at lacinia non, pellentesque placerat tortor. Ut venenatis est ornare orci porttitor consequat. Nullam scelerisque tristique tortor, nec sagittis nibh mattis non. Donec facilisis egestas metus eget suscipit. Curabitur ultricies, ligula vel pretium euismod, elit quam interdum orci, ac egestas nulla eros a odio. Nulla aliquam lacinia leo. Fusce eget ex sed ligula malesuada blandit non et turpis.'
            ],
            [
                'title' =>  'Urgent work needed! Long time work',
                'desc'  =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel consectetur nunc. Aliquam nec velit semper nibh egestas egestas sit amet a nisi. Donec condimentum tellus ipsum, eu scelerisque justo ultrices eget. Vivamus nec auctor quam, non convallis nulla. Suspendisse auctor ullamcorper consequat. Fusce odio ligula, aliquet at lacinia non, pellentesque placerat tortor. Ut venenatis est ornare orci porttitor consequat. Nullam scelerisque tristique tortor, nec sagittis nibh mattis non. Donec facilisis egestas metus eget suscipit. Curabitur ultricies, ligula vel pretium euismod, elit quam interdum orci, ac egestas nulla eros a odio. Nulla aliquam lacinia leo. Fusce eget ex sed ligula malesuada blandit non et turpis.'
            ]
        );
        shuffle($jobs);

        $data['jobs'] = $jobs;


        return view('jobs.category-jobs')->with($data);

    }
}
