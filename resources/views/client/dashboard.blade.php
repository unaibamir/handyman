@extends('layouts.master')

@section('page_title', 'Client Dashboard')

@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                @include('client.inc.sidenav', ['client'=>$client])
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
                                    <h3>Recent Open Jobs</h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">
                                    @if($client->time <= 1)
                                        {{--<p>your first job is free</p> TODO -- Correct this one  --}}
                                    @endif

                                    @if( !$open_jobs->isEmpty() )

                                        <div class="table-responsives">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Job Title</th>
                                                    <th>Category</th>
                                                    <th>Proposals</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($open_jobs as $job)
                                                <tr>
                                                    <td class="col-md-1">{{ $loop->iteration }}</td>
                                                    <td class="col-md-1">{{ date('d-m-Y', strtotime($client->created_at)) }}</td>
                                                    <td class="col-md-3">{{ $job->title }}</td>
                                                    <td class="col-md-2">{{ $job->category->name }}</td>
                                                    <td class="col-md-2">{{ $job->proposals->count() }}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <p>Sorry! There are no recent opened jobs.</p>
                                        </div>
                                    @endif

                                </div> <!-- /widget-content -->
                            </div> <!-- /widget -->
                            <div class="widget">
                                <div class="widget-header">
                                    <h3>Recent Closed Jobs</h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">

                                    @if( !$completed_jobs->isEmpty() )

                                        <div class="table-responsives">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Job Title</th>
                                                    <th>Category</th>
                                                    <th>Proposals</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($completed_jobs as $job)
                                                    <tr>
                                                        <td class="col-md-1">{{ $loop->iteration }}</td>
                                                        <td class="col-md-1">{{ date('d-m-Y', strtotime($client->created_at)) }}</td>
                                                        <td class="col-md-3">{{ $job->title }}</td>
                                                        <td class="col-md-2">{{ $job->category->name }}</td>
                                                        <td class="col-md-2">{{ $job->proposals->count() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <p>Sorry! There are no recent opened jobs.</p>
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