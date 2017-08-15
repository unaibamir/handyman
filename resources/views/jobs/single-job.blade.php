@extends('layouts.master')

@section('page_title', $job->title)

@section('content')

    <section class="signup-page">

        <div class="container">

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">

                </div>

                <div class="col-md-9 col-sm-12">

                    <div class="custom-padding job_feaures">
                        @if($job->status != 0)
                        <div class="alert alert-danger m-lg-bottom">
                            <strong>This job is no longer available</strong>
                        </div>
                        @endif

                        <h3>{{ $job->title }}</h3>

                        <small>
                            <span class="badge">{{ $job->category->name }}</span>
                            <span> Posted {{ Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                        </small>

                        <div class="clearfix"></div><br />

                        <div class="col-md-4 col-sm-4">
                            <div class="pull-left">
                                <span class="fa fa-clock-o fa-2x" style="color: #ccc;"></span>
                            </div>
                            <div class="pull-left m-sm-left m-md-bottom col-md-10 p-0-left-right">
                                <p class="m-0-bottom"><strong>Job Type</strong></p>
                                <small class="text-muted">
                                    @if($job->job_type = 'hourly')
                                        Hourly
                                    @elseif($job->job_type = 'fixed')
                                        Fixed
                                    @else
                                        Any
                                    @endif
                                </small>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="pull-left">
                                <span class="fa fa-usd fa-2x" style="color: #ccc;"></span>
                            </div>
                            <div class="pull-left m-sm-left m-md-bottom col-md-10 p-0-left-right">
                                <p class="m-0-bottom"><strong>Experience Level</strong></p>
                                <small class="text-muted">
                                    @if($job->exp_level = 'exp')
                                        Experienced
                                    @elseif($job->exp_level = 'inter')
                                        Intermediate
                                    @elseif($job->exp_level = 'entry')
                                        Entery
                                    @endif
                                </small>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="pull-left">
                                <span class="fa fa-calendar fa-2x" style="color: #ccc;"></span>
                            </div>
                            <div class="pull-left m-sm-left m-md-bottom col-md-10 p-0-left-right">
                                <p class="m-0-bottom"><strong>End Date</strong></p>
                                <small class="text-muted">
                                    {{ $job->end_date }}
                                </small>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @if( Auth::guard('provider')->check() )
                            <div class="col-md-4 col-sm-4">
                                <div class="pull-left">
                                    <span class="fa fa-calendar fa-2x" style="color: #ccc;"></span>
                                </div>
                                <div class="pull-left m-sm-left m-md-bottom col-md-10 p-0-left-right">
                                    <p class="m-0-bottom"><strong>Date/Time to Approch</strong></p>
                                    <small class="text-muted">
                                        {{ Carbon\Carbon::parse($job->date)->format('m/d/Y') }}
                                        <br>
                                        {{ Carbon\Carbon::parse($job->time)->format('g:i A') }}
                                    </small>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="pull-left">
                                    <span class="fa fa-map-marker fa-2x" style="color: #ccc;"></span>
                                </div>
                                <div class="pull-left m-sm-left m-md-bottom col-md-10 p-0-left-right">
                                    <p class="m-0-bottom"><strong>Location</strong></p>
                                    <small class="text-muted">
                                        {{ $job->address }}
                                        <br>
                                        {{ $job->city }}
                                    </small>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @if($job->st_address != '')
                            <div class="col-md-4 col-sm-4">
                                <div class="pull-left">
                                    <span class="fa fa-map-marker fa-2x" style="color: #ccc;"></span>
                                </div>
                                <div class="pull-left m-sm-left m-md-bottom col-md-10 p-0-left-right">
                                    <p class="m-0-bottom"><strong>Street Address</strong></p>
                                    <small class="text-muted">
                                        {{ $job->st_address }}
                                    </small>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                        @endif

                        <div class="clearfix"></div>
                    </div><!--custom padding-->

                    <div class="air-card job-detail">

                        <div class="col-md-12 col-sm-12">

                            <h4>Details</h4>

                            {!! $job->desc !!}

                            <div class="clearfix"></div>

                        </div><!--col md sm 8-->



                        <div class="clearfix"></div>
                    </div><!--air card job list-->

                    {{--<div class="air-card job-detail">

                        <div class="col-md-6 col-sm-6">

                            <h5>Preferred Qualifications</h5>

                            <p>
                                Job Success Score: <span>At least 90%</span> <a href="#"><i class="fa fa-info-circle"></i></a>
                            </p>
                            <p>
                                Include Rising Talent: <span>Yes</span> <a href="#"><i class="fa fa-info-circle"></i></a>
                            </p>

                            <div class="clearfix"></div>

                        </div><!--col md sm 6-->

                        <div class="col-md-6 col-sm-6">

                            <h5>Activity on this Job</h5>

                            <p>
                                Proposals: <span>20 to 50</span>
                            </p>
                            <p>
                                Interviewing: <span>6</span>
                            </p>
                            <p>
                                Invites Sent: <span>0</span>
                            </p>

                            <div class="clearfix"></div>

                        </div><!--col md sm 6-->

                        <div class="clearfix"></div>
                    </div><!--air card job list-->--}}



                    <div class="air-card">

                        <div class="col-md-12">

                            <h4>Client's Work History and Feedback ({{ $job->client->jobs->count() }})</h4>

                            @if( $job->client->jobs->count() > 1 )

                                @foreach($open_jobs as $client_job)
                                    <div class="post-listing">

                                        <div class="col-md-8 col-sm-8 nopadding">

                                            <h4>
                                                <a href="{{ route('job.single', [$client_job->slug, $client_job->id] ) }}">
                                                    {{ $client_job->title }}
                                                </a>
                                            </h4>
                                            <span class="text-muted"><em>
                                                @if( $client_job->status == 0 )
                                                    Open Job
                                                @elseif( $client_job->status == 1 )
                                                    In Progress
                                                @elseif( $client_job->status == 2 )
                                                    Completed
                                                @endif
                                                </em>
                                                </span>

                                            <p class="nopadding">
                                                {!! str_limit($client_job->desc, 95, '...')  !!}
                                            </p>


                                        </div><!--col md sm 8-->

                                        <div class="col-md-4 col-sm-4">

                                            <p class="text-right">
                                                {{ Carbon\Carbon::parse($client_job->created_at)->format('F Y') }}
                                                {{--{{ date('F Y')  }}--}}
                                            </p>

                                        </div><!--col md sm 4-->

                                        <div class="clearfix"></div>
                                    </div><!--post job-->
                                @endforeach

                            @endif


                        </div>
                        <div class="clearfix"></div>
                    </div><!--air card job list-->

                </div><!--col md sm 8-->


                <div class="col-md-3 col-sm-12">

                    <div class="custom-padding">
                        @if( $job->status == 0 )

                            @if( Auth::guard('client')->check() )

                                @if( Auth::guard('client')->id() == $job->client_id )
                                    <a href="{{ route('client.job-proposal', $job->id) }}" class="btn btn-default btn-signup pull-right" style="width: 100%;">View Proposals</a>
                                @else
                                    <a href="#" class="btn btn-default btn-signup pull-right" style="width: 100%;">Post a job a like</a>
                                @endif


                            @elseif( Auth::guard('provider')->check()  )
                                @if(check_already_applied( Auth::guard('provider')->id(), $job->id ) == true )

                                    <a href="{{ route('provider.qued-jobs') }}" class="btn btn-default btn-signup pull-left">
                                        See Applied Jobs
                                    </a>
                                    <div class="clearfix"></div><br>
                                    <p>
                                        You have already picked this job.
                                    </p>
                                @else

                                    <form action="{{ route('provider.pick-job', $job->id) }}" method="GET" class="">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="job_id" value="{{ base64_encode($job->id) }}">
                                        <input type="hidden" name="client_id" value="{{ base64_encode($job->client->id) }}">
                                        <input type="hidden" name="provider_id" value="{{ base64_encode( Auth::guard('provider')->id() ) }}">
                                        <button class="btn btn-default btn-signup pull-right" style="width: 100%;">Pick job</button>
                                    </form>

                                @endif

                            @else
                                <a href="{{ route('provider.login') }}" class="btn btn-default btn-signup pull-right" style="width: 100%;">Login For Apply</a>
                            @endif

                            <hr />

                        @endif
                        <div class="clearfix"></div>

                        <div>

                            <p class="m-md-bottom">
                                <strong>About the Client </strong>

                            </p>

                            {{--<div class="rating-stars-db nomargin">

                                <div class="rating left">
                                    <div class="stars right">
                                        <a class="star rated"></a>
                                        <a class="star rated"></a>
                                        <a class="star rated"></a>
                                        <a class="star"></a>
                                        <a class="star"></a>
                                    </div>
                                </div><!--rating-->

                            </div>--}}

                            {{-- TODO --}}

                            <div class="clearfix"></div>

                            <p class="m-md-bottom">
                                <strong>{{ $job->client->country }}</strong><br>
                                <span class="text-muted">
                                    {{ $job->client->state }}
                                    {{--{{ Carbon\Carbon::now('America/'.str_replace(' ','_', $job->client->state)) }} <br>
                                    03:37 AM--}}
                                </span>
                            </p>
                            <p class="m-md-bottom">
                                <strong>
                                    {{ $job->client->jobs->count()  }}
                                    Jobs Posted
                                </strong>
                                <br>
                                {{-- TODO --}}
                                <span class="text-muted">
                                    {{ $client_open_jobs }} Open Jobs
                                </span>
                            </p>
                            <p class="m-md-bottom">

                                <strong>
                                    <span ng-bind="1176.01 | moneyRange" class="ng-binding">
                                        ${{ $job->client->contract->where('status','=',2)->sum('amount') }}
                                    </span>
                                    Total Spent
                                </strong><br>
                            </p>
                            @if( Auth::guard('provider')->check() )
                            <p class="m-md-bottom">
                                <strong>
                                    Contact Info
                                </strong><br>
                                <span class="text-muted">
                                    Ph. <a href="tel:{{ $job->phone }}">{{ $job->phone }}</a>
                                </span>
                            </p>
                            @endif
                            <small class="text-muted">
                                Member Since {{ Carbon\Carbon::parse($job->client->created_at)->format('F Y') }}
                            </small>
                        </div>

                    </div>
                </div><!--col md sm 3-->

                <div class="clearfix"></div>
            </div><!--row-->

        </div><!--container-->
        <div class="clearfix"></div><br /><br />
    </section>

@stop