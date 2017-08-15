@extends('layouts.master')

@section('page_title', 'Open Jobs ')

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
                                    <h3>Open Jobs</h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">
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
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($open_jobs as $job)
                                                    <tr>
                                                        <td class="col-md-1">{{ $loop->iteration }}</td>
                                                        <td class="col-md-1">{{ date('d-m-Y', strtotime($client->created_at)) }}</td>
                                                        <td class="col-md-3">
                                                            <a href="{{ route('job.single', [$job->slug, $job->id]) }}" target="_blank">
                                                                {{ $job->title }}
                                                            </a>
                                                        </td>
                                                        <td class="col-md-2">{{ $job->category->name }}</td>
                                                        <td class="col-md-2">{{ $job->proposals->count() }}</td>
                                                        <td class="col-md-1">
                                                            <!-- Small button group -->
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                                <ul class="dropdown-menu dropdown-menu-right">

                                                                    <li class="dropdown-header">Action</li>
                                                                    <li><a target="_blank" title="{{ $job->title }}" href="{{ route('job.single', [$job->slug, $job->id] ) }}">View</a></li>
                                                                    <li><a href="{{ route('client.job-proposal', $job->id) }}">View Proposals</a></li>
                                                                    <li role="separator" class="divider"></li>
                                                                    <li><a href="{{ route('client.edit-job', $job->id) }}">Edit</a></li>
                                                                    <li><a class="delete_user" href="{{ route('client.delete-job', $job->id) }}">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-right">
                                            {{ $open_jobs->links() }}
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