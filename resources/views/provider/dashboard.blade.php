@extends('layouts.master')

@section('page_title', 'Handyman Dashboard')

@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                @include('provider.inc.sidenav', ['provider'=>$provider])
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <h1 class="page-title">
                        <i class="fa fa-home"></i>
                        Dashboard
                    </h1>
                    <div class="row">
                        <div class="col-md-12">
                            @include('layouts._notice')
                        </div>
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-header">
                                    <h3>Qued List</h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">
                                    @if( $qued_jobs->isNotEmpty() )
                                    <div class="table-responsives">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Job Title</th>
                                                <th>Amount</th>
                                                <th>Client</th>
                                                <th>Category</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($qued_jobs as $q_jobs)

                                                <tr>
                                                    <td class="col-md-1">{{ $loop->iteration }}</td>
                                                    <td class="col-md-3">
                                                        <a href="{{ route('job.single', [$q_jobs->job->slug, $q_jobs->job->id]) }}" title="{{ $q_jobs->job->title }}" target="_blank">
                                                            {{ $q_jobs->job->title }}
                                                        </a>
                                                    </td>
                                                    <td class="col-md-1">${{ $q_jobs->amount }}</td>
                                                    <td class="col-md-1">{{ $q_jobs->job->client->full_name }}</td>
                                                    <td class="col-md-1">{{ $q_jobs->job->category->name }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>

                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <p>Sorry! There are no qued jobs.</p>
                                        </div>

                                    @endif

                                </div> <!-- /widget-content -->
                            </div> <!-- /widget -->

                            <div class="widget">
                                <div class="widget-header">
                                    <h3>Completed Jobs</h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">
                                    @if( $completed_jobs->isNotEmpty() )
                                    <div class="table-responsives">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Job Title</th>
                                                <th>Amount</th>
                                                <th>Client</th>
                                                <th>Category</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($completed_jobs as $jobs)

                                                <tr>
                                                    <td class="col-md-1">{{ $loop->iteration }}</td>
                                                    <td class="col-md-3">
                                                        <a href="{{ route('job.single', [$jobs->job->slug, $jobs->job->id]) }}" title="{{ $jobs->job->title }}" target="_blank">
                                                            {{ $jobs->job->title }}
                                                        </a>
                                                    </td>
                                                    <td class="col-md-1">${{ $jobs->amount }}</td>
                                                    <td class="col-md-1">{{ $jobs->job->client->full_name }}</td>
                                                    <td class="col-md-1">{{ $jobs->job->category->name }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    @else

                                        <div class="alert alert-warning" role="alert">
                                            <p>Sorry! There are no closed jobs.</p>
                                        </div>

                                    @endif

                                </div> <!-- /widget-content -->
                            </div> <!-- /widget -->

                        </div> <!-- /span5 -->

                    </div> <!-- /row -->
                </div> <!-- /span9 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
@stop