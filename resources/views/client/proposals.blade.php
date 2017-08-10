@extends('layouts.master')

@section('page_title', 'Proposals ')

@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                @include('client.inc.sidenav', [ 'client'=> Auth::guard('client')->user() ])
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
                                    <h3>Proposals</h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">

                                    @if( !$proposals->isEmpty() )

                                        <div class="table-responsives">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Handyman</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th class=" text-right">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($proposals as $proposal)
                                                    <tr>
                                                        <td class="col-md-1">{{ $loop->iteration }}</td>
                                                        <td class="col-md-1">{{ date('d-m-Y', strtotime($proposal->created_at)) }}</td>
                                                        <td class="col-md-1">{{ $proposal->provider->full_name }}</td>
                                                        <td class="col-md-1">${{ $proposal->amount }}</td>
                                                        <td class="col-md-1">
                                                            @if($proposal->status == 0)
                                                                Awaiting Moderation
                                                            @elseif($proposal->status == 1)
                                                                Awarded
                                                            @elseif($proposal->status == 2)
                                                                Rejected
                                                            @endif
                                                        </td>
                                                        <td class="col-md-1  text-right">
                                                            <!-- Small button group -->
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li class="dropdown-header">Action</li>
                                                                    <li><a href="{{ route('client.job-proposal-award', [$proposal->job_id, $proposal->id]) }}">Award Job</a></li>
                                                                    <li><a href="{{ route('client.job-proposal-reject', [$proposal->job_id, $proposal->id]) }}">Reject Proposal</a></li>
                                                                    <li role="separator" class="divider"></li>
                                                                    <li><a href="{{ route('client.job-proposal-delete', $proposal->id) }}">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-right">
                                            {{ $proposals->links() }}
                                        </div>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <p>
                                                Sorry! There are no proposals here to show you.
                                                <a href="{{ url()->previous() }}">Return back</a>
                                            </p>

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