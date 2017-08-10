@extends('layouts.master')

@section('page_title', 'Find Top Rated '.$category->name.' Contractors in Your Area Today')

@section('content')

    <section class="bg-grey-lighter">

        <div class="container text-center">

            <div class="row">

                <h2>{{ $category->name }}</h2>

                <div class="col-md-8 col-md-offset-2 col-sm-12 text-center" style="margin-top: 20px; font-size: 16px;">

                    <p>{{ $category->description }}</p>

                </div><!--col md sm 3-->



                <div class="clearfix"></div>

            </div><!--row-->

        </div><!--container-->

    </section>

    <section class="signup-page">

        <div class="container">

            <div class="rows">

                <div class="air-card">
                    <form action="{{ route('job.browse') }}" method="post" class="validate_form">
                        {{ csrf_field() }}
                        <div class="col-md-12 col-xs-12 map_error">
                            <div class="alert alert-warning">
                                <p>We cannot locate you. Distance search will not work</p>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-6">
                            <div class="search-panel">
                                <input type="text" name="job_title" class="form-control field" placeholder="Search for Job">
                            </div><!--search panel-->
                        </div><!--col md sm 7-->
                        <div class="col-md-2 col-sm-3">
                            <button type="submit" class="btn btn-default btn-filter" name="submit" value="submit_filter"><i class="fa fa-sliders"></i> Filters</button>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <a href="#" class="btn btn-default btn-filter"><i class="fa fa-folder"></i> Save Search</a>
                        </div>
                        <div class="clearfix"></div>

                        <div class="clearfix"></div>
                        <div class="s-panel col-md-12">
                            <p class="pull-left rss-feeds"><i class="fa fa-rss-square"></i> 135,761 jobs found</p>

                            <div class="btn-group dropdown btn-group-sm pull-right">
                                <label class="pull-left">View</label>
                                <button class="btn btn-default" type="button" data-toggle="dropdown" role="button" id="" data-target="">
                                    <span class=""><i class="fa fa-reorder"></i></span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li><a href="javascript:">Compact</a></li>
                                    <li class="active"><a href="javascript:">Expanded</a></li>
                                </ul>
                            </div>
                            <div class="btn-group dropdown btn-group-sm pull-right">
                                <label class="pull-left">Sort:</label>
                                <button class="btn btn-default" type="button" data-toggle="dropdown" role="button" id="" data-target="">
                                    <span class="eo-select-label ellipsis">Newest</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li><a href="javascript:">Relevance</a></li>
                                    <li class="active"><a href="javascript:">Newest</a></li>
                                    <li><a href="javascript:">Client Spending</a></li><li><a href="javascript:">Client Rating</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div><!--s panel-->
                        <div class="clearfix"></div>
                        <div class="col-md-12 job-filters">

                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="radio">
                                            JOB TYPE
                                        </label>
                                        <div class="radio">
                                            <input type="radio" id="jobtype_any" name="job_type" value="any" >
                                            <label for="jobtype_any"><span></span>Any Job Type</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" id="jobtype_hourly" name="job_type" value="hourly" />
                                            <label for="jobtype_hourly"><span></span>Hourly</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" id="jobtype_fixed" name="job_type" value="fixed" />
                                            <label for="jobtype_fixed"><span></span>Fixed Price</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="radio">
                                            EXPERIENCE LEVEL
                                        </label>

                                        <div class="radio">
                                            <input type="radio" id="exp_any" name="exp_level" value="any" />
                                            <label for="exp_any"><span></span>Any Experience Level</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" id="exp_entry" name="exp_level" value="entry" />
                                            <label for="exp_entry"><span></span>Entry Level</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" id="exp_inter" name="exp_level" value="inter" />
                                            <label for="exp_inter"><span></span>Intermediate</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" id="exp_exp" name="exp_level" value="exp" />
                                            <label for="exp_exp"><span></span>Expert</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="radio">
                                            CATEGORY
                                        </label>
                                        <select name="job_category" id="job_category" class="option form-control field">
                                            <option value="">Select Categories</option>
                                            @foreach($categories as $key => $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="radio">
                                            SEARCH WITHIN MILES
                                        </label>
                                        <input type="text" class="form-control" id="range_slider" name="distance" value="">
                                        <input type="hidden" value="" class="current_lat" name="current_lat">
                                        <input type="hidden" value="" class="current_lng" name="current_lng">
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label class="radio">
                                            LOCATION
                                        </label>
                                        <input type="text" id="user_location" name="user_location" class="form-control field user_location" placeholder="Only US Postal Code">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="radio">
                                            CLIENT LOCATION
                                        </label>
                                        <select name="job_location" id="" class="form-control select2">
                                            <option value="">Select Locations</option>
                                            <option>1asdsa asd asd sad a s</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>--}}
                            </div>

                            <div class="row">
                                {{--<div class="col-md-6 col-md-offset-3 ">
                                    <div class="form-group">
                                        <label class="radio">
                                            SEARCH WITHIN MILES
                                        </label>
                                        <input type="text" class="form-control" id="range_slider" name="distance" value="">
                                        <input type="hidden" value="" class="current_lat" name="current_lat">
                                        <input type="hidden" value="" class="current_lng" name="current_lng">
                                    </div>
                                </div>--}}
                            </div>
                    </form>
                </div>
            </div><!--air card-->

            <div class="clearfix"></div>
            @if( !$open_jobs->isEmpty() )
            @foreach($open_jobs as $key=>$job)
                <div class="air-card job-listing">
                    <div class="col-md-8 col-sm-8">
                        <h4>
                            <a href="{{ route('job.single', [$job->slug, $job->id] ) }}">
                                {{ $job->title }}
                            </a>
                        </h4>
                        <small>
                            <span>Hourly - Intermediate ($$)</span>
                            <span>Est. Time: 1 to 3 months, 30+ hrs/week</span>
                            <span>Posted: {{ Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>

                        </small>
                        <p>
                            {!! str_limit($job->desc, 250, ' ...') !!} <a href="{{ route('job.single', [$job->slug, $job->id] ) }}">Read more</a>
                        </p>
                        <div class="clearfix"></div>
                        <div class="client-info">
                            <div class="pull-left">
                                <span class="text-muted display-inline-block m-sm-top">Client:</span>
                                <span>
                                        <span class="payment-status badge-unverified m-sm-right p-md-left">
                                            <span class="text-muted">
                                                <i class="fa fa-certificate"></i>
                                                <small>Payment unverified</small>
                                            </span>
                                        </span><!---->
                                    </span>
                            </div>
                            <div class="pull-left">
                                <div class="rating-stars-db">
                                    <div class="rating left">
                                        <div class="stars right">
                                            <a class="star rated"></a>
                                            <a class="star rated"></a>
                                            <a class="star rated"></a>
                                            <a class="star"></a>
                                            <a class="star"></a>
                                        </div>
                                    </div><!--rating-->
                                </div>
                            </div>
                            <div class="pull-left">
                                    <span class="m-sm-left-right">
                                        <span class="client-spendings display-inline-block">
                                        <strong>$0</strong>
                                        <small class="text-muted">spent</small>
                                        </span>
                                    </span>
                            </div>
                            <div class="pull-left">
                                    <span>
                                        <span class="nowrap">
                                            <span class="fa fa-map-marker"></span>
                                            <small class="text-muted client-location">United States</small>
                                        </span><!---->
                                    </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--col md sm 8-->
                    <div class="col-md-4 col-sm-4">
                        @if( Auth::guard('provider')->check() )

                        @elseif( Auth::guard('client')->check() )

                        @else
                            {{-- TODO -- SET THIS UP FOR PROVIDER TO APPLY ON A JOB --}}
                            <a href="{{ route('job.single', [$job->slug, $job->id] ) }}" class="btn btn-default pull-right"><i class="fa fa-thumbs-down"></i> Not Relevent</a>
                            <a href="{{ route('job.single', [$job->slug, $job->id] ) }}" class="btn btn-default btn-signup pull-right"><i class="fa fa-heart-o"></i> Pick a Jo
                                @endif
                            </a>
                    </div><!--col md sm 4-->
                    <div class="clearfix"></div>
                </div><!--air card job list-->

                <div class="clearfix"></div>
            @endforeach
            @else
                <div class="air-card job-listing">
                    <div class="alert alert-warning">
                        <p style="padding: 0;">Sorry! There are no jobs to show in this category.</p>
                    </div>
                </div>
            @endif
            <div class="clearfix"></div>

            <div class="text-right">
                {{ $open_jobs->links() }}
            </div>





                <div class="clearfix"></div>
            </div><!--row-->

        </div><!--container-->
        <div class="clearfix"></div><br /><br />
    </section>


@stop


@section('stylesheets')

    <link href="{{ asset('css/plugins/ionRangeSlider/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet">

@stop

@section('scripts')
    <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/ionRangeSlider/ion.rangeSlider.min.js') }}"></script>
    <script>
        $(function(){
            $("#range_slider").ionRangeSlider({
                min: 0,
                max: 50,
                from: 20,
                prefix: "Mi "
            });
            $(".validate_form").validate({
                rules: {
                    user_location: {
                        minlength: 5,
                        maxlength: 5,
                        number: true
                    }
                },
                messages: {
                    user_location: {
                        minlength: "Only US postal code is allowed"
                    }
                }
            });
        });
        getCurrentLocation();
        function getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    $('.current_lat').val(pos.lat);
                    $('.current_lng').val(pos.lng);
                }, function() {
                    $('.map_error').show();
                });
            } else {
                $('.map_error').show();
            }
        }
    </script>

@stop