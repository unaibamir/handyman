@extends('layouts.master')

@section('page_title', 'Browse Jobs ')


@section('content')

    <section class="signup-page">

        <div class="container">

            <div class="rows">

                <div class="air-card">

                    <div class="col-md-8 col-sm-6">

                        <div class="search-panel">
                            <input type="text" class="form-control field" placeholder="Search for Job">

                        </div><!--search panel-->

                    </div><!--col md sm 7-->

                    <div class="col-md-2 col-sm-3">
                        <a href="#" class="btn btn-default btn-filter show_filters"><i class="fa fa-sliders"></i> Filters</a>
                    </div>

                    <div class="col-md-2 col-sm-3">
                        <a href="#" class="btn btn-default btn-filter"><i class="fa fa-folder"></i> Save Search</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="s-panel col-md-12">

                        <p class="pull-left rss-feeds"><i class="fa fa-rss-square"></i> 135,761 jobs found</p>

                        <div class="btn-group dropdown btn-group-sm pull-right">
                            <label class="pull-left">View</label>

                            <button class="btn btn-default" type="button" data-toggle="dropdown" role="button" id="" data-target="#">
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

                            <button class="btn btn-default" type="button" data-toggle="dropdown" role="button" id="" data-target="#">
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

                    <div class="col-md-12 job-filters" id="job-filters">
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="radio">
                                        JOB TYPE
                                    </label>
                                    <div class="radio">
                                        <input type="radio" id="jobtype_any" name="cc" />
                                        <label for="jobtype_any"><span></span>Any Job Type</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="jobtype_hourly" name="cc" />
                                        <label for="jobtype_hourly"><span></span>Hourly</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="jobtype_fixed" name="cc" />
                                        <label for="jobtype_fixed"><span></span>Fixed Price</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="radio">
                                        EXPERIENCE LEVEL
                                    </label>
                                    <div class="radio">
                                        <input type="radio" id="exp_any" name="cc" />
                                        <label for="exp_any"><span></span>Any Experience Level</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="exp_entry" name="cc" />
                                        <label for="exp_entry"><span></span>Entry Level</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="exp_inter" name="cc" />
                                        <label for="exp_inter"><span></span>Intermediate</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="exp_exp" name="cc" />
                                        <label for="exp_exp"><span></span>Expert</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="radio">
                                        CATEGORY
                                    </label>
                                    <select name="job_category" id="" class="form-control select2">
                                        <option value="">Select Categories</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                            </div>
                        </div>
                    </div>

                </div><!--air card-->

                <div class="air-card job-listing">

                    <div class="col-md-8 col-sm-8">

                        <h4><a href="{{ route('job.single', [$job_slug, $job_id] ) }}">We are looking for game animators who are proficient in the Spine tool</a></h4>

                        <small>
                            <span>Hourly - Intermediate ($$)</span>
                            <span>Est. Time: 1 to 3 months, 30+ hrs/week</span>
                            <span>Posted: 14 minutes ago</span>
                        </small>

                        <p>
                            Hi. I'm looking For experienced factory buyers within China to help source factories for new products. The products will be for Theme Parks within Asia and the factories must complete our internal audit forms for compliance. Ideally someone with a gr ...<a href="#">Read more</a>
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
                        <span class="m-sm-left-right"><span class="client-spendings display-inline-block">
                        <strong>$0</strong>
                        <small class="text-muted">spent</small>
                        </span>
                        </span>
                            </div>
                            <div class="pull-left">
                        <span><span class="nowrap">
                        <span class="fa fa-map-marker"></span>
                        <small class="text-muted client-location">United States</small>
                        </span><!---->
                        </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div><!--col md sm 8-->

                    <div class="col-md-4 col-sm-4">

                        <a href="#" class="btn btn-default pull-right"><i class="fa fa-thumbs-down"></i> Not Relevent</a>

                        <a href="#" class="btn btn-default btn-signup pull-right"><i class="fa fa-heart-o"></i> Save Job</a>

                    </div><!--col md sm 4-->

                    <div class="clearfix"></div>
                </div><!--air card job list-->

                <div class="air-card job-listing">

                    <div class="col-md-8 col-sm-8">

                        <h4><a href="{{ route('job.single', [$job_slug, $job_id] ) }}">We are looking for game animators who are proficient in the Spine tool</a></h4>

                        <small>
                            <span>Hourly - Intermediate ($$)</span>
                            <span>Est. Time: 1 to 3 months, 30+ hrs/week</span>
                            <span>Posted: 14 minutes ago</span>
                        </small>

                        <p>
                            Hi. I'm looking For experienced factory buyers within China to help source factories for new products. The products will be for Theme Parks within Asia and the factories must complete our internal audit forms for compliance. Ideally someone with a gr ...<a href="#">Read more</a>
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
                        <span class="m-sm-left-right"><span class="client-spendings display-inline-block">
                        <strong>$0</strong>
                        <small class="text-muted">spent</small>
                        </span>
                        </span>
                            </div>
                            <div class="pull-left">
                        <span><span class="nowrap">
                        <span class="fa fa-map-marker"></span>
                        <small class="text-muted client-location">United States</small>
                        </span><!---->
                        </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div><!--col md sm 8-->

                    <div class="col-md-4 col-sm-4">

                        <a href="#" class="btn btn-default pull-right"><i class="fa fa-thumbs-down"></i> Not Relevent</a>

                        <a href="#" class="btn btn-default btn-signup pull-right"><i class="fa fa-heart-o"></i> Save Job</a>

                    </div><!--col md sm 4-->

                    <div class="clearfix"></div>
                </div><!--air card job list-->

                <div class="air-card job-listing">

                    <div class="col-md-8 col-sm-8">

                        <h4><a href="{{ route('job.single', [$job_slug, $job_id] ) }}">We are looking for game animators who are proficient in the Spine tool</a></h4>

                        <small>
                            <span>Hourly - Intermediate ($$)</span>
                            <span>Est. Time: 1 to 3 months, 30+ hrs/week</span>
                            <span>Posted: 14 minutes ago</span>
                        </small>

                        <p>
                            Hi. I'm looking For experienced factory buyers within China to help source factories for new products. The products will be for Theme Parks within Asia and the factories must complete our internal audit forms for compliance. Ideally someone with a gr ...<a href="#">Read more</a>
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
                        <span class="m-sm-left-right"><span class="client-spendings display-inline-block">
                        <strong>$0</strong>
                        <small class="text-muted">spent</small>
                        </span>
                        </span>
                            </div>
                            <div class="pull-left">
                        <span><span class="nowrap">
                        <span class="fa fa-map-marker"></span>
                        <small class="text-muted client-location">United States</small>
                        </span><!---->
                        </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div><!--col md sm 8-->

                    <div class="col-md-4 col-sm-4">

                        <a href="#" class="btn btn-default pull-right"><i class="fa fa-thumbs-down"></i> Not Relevent</a>

                        <a href="#" class="btn btn-default btn-signup pull-right"><i class="fa fa-heart-o"></i> Save Job</a>

                    </div><!--col md sm 4-->

                    <div class="clearfix"></div>
                </div><!--air card job list-->

                <div class="air-card job-listing">

                    <div class="col-md-8 col-sm-8">

                        <h4><a href="{{ route('job.single', [$job_slug, $job_id] ) }}">We are looking for game animators who are proficient in the Spine tool</a></h4>

                        <small>
                            <span>Hourly - Intermediate ($$)</span>
                            <span>Est. Time: 1 to 3 months, 30+ hrs/week</span>
                            <span>Posted: 14 minutes ago</span>
                        </small>

                        <p>
                            Hi. I'm looking For experienced factory buyers within China to help source factories for new products. The products will be for Theme Parks within Asia and the factories must complete our internal audit forms for compliance. Ideally someone with a gr ...<a href="#">Read more</a>
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
                        <span class="m-sm-left-right"><span class="client-spendings display-inline-block">
                        <strong>$0</strong>
                        <small class="text-muted">spent</small>
                        </span>
                        </span>
                            </div>
                            <div class="pull-left">
                        <span><span class="nowrap">
                        <span class="fa fa-map-marker"></span>
                        <small class="text-muted client-location">United States</small>
                        </span><!---->
                        </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div><!--col md sm 8-->

                    <div class="col-md-4 col-sm-4">

                        <a href="#" class="btn btn-default pull-right"><i class="fa fa-thumbs-down"></i> Not Relevent</a>

                        <a href="#" class="btn btn-default btn-signup pull-right"><i class="fa fa-heart-o"></i> Save Job</a>

                    </div><!--col md sm 4-->

                    <div class="clearfix"></div>
                </div><!--air card job list-->

                <div class="air-card job-listing">

                    <div class="col-md-8 col-sm-8">

                        <h4><a href="{{ route('job.single', [$job_slug, $job_id] ) }}">We are looking for game animators who are proficient in the Spine tool</a></h4>

                        <small>
                            <span>Hourly - Intermediate ($$)</span>
                            <span>Est. Time: 1 to 3 months, 30+ hrs/week</span>
                            <span>Posted: 14 minutes ago</span>
                        </small>

                        <p>
                            Hi. I'm looking For experienced factory buyers within China to help source factories for new products. The products will be for Theme Parks within Asia and the factories must complete our internal audit forms for compliance. Ideally someone with a gr ...<a href="#">Read more</a>
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
                        <span class="m-sm-left-right"><span class="client-spendings display-inline-block">
                        <strong>$0</strong>
                        <small class="text-muted">spent</small>
                        </span>
                        </span>
                            </div>
                            <div class="pull-left">
                        <span><span class="nowrap">
                        <span class="fa fa-map-marker"></span>
                        <small class="text-muted client-location">United States</small>
                        </span><!---->
                        </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div><!--col md sm 8-->

                    <div class="col-md-4 col-sm-4">

                        <a href="#" class="btn btn-default pull-right"><i class="fa fa-thumbs-down"></i> Not Relevent</a>

                        <a href="#" class="btn btn-default btn-signup pull-right"><i class="fa fa-heart-o"></i> Save Job</a>

                    </div><!--col md sm 4-->

                    <div class="clearfix"></div>
                </div><!--air card job list-->

                <div class="clearfix"></div>
            </div><!--row-->

        </div><!--container-->
        <div class="clearfix"></div><br /><br />
    </section>


@stop