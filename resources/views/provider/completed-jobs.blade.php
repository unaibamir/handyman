@extends('layouts.master')

@section('page_title', 'Completed Jobs ')

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
                                    <h3>Completed Jobs</h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">

                                    @if( !$completed_jobs->isEmpty() )

                                        <div class="table-responsives">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Job Title</th>
                                                    <th>Amount</th>
                                                    <th>Client Name</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
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
                                                        <td class="col-md-1">
                                                            <!-- Small button group -->
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="{{ route('provider.job-contract', $jobs->id) }}">View Report</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-right">
                                            {{ $completed_jobs->links() }}
                                        </div>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <p>Sorry! There are no jobs here to show you.</p>
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