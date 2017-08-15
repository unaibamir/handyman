@extends('layouts.master')

@section('page_title', 'Contract Details ')

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
                                    <h3>Contract Details - {{ $contract->job->title }}</h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Expected completion time of the project
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>{{ $proposal->end_time }}</strong>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Expected completion date of the project
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>{{ $proposal->end_date }}</strong>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Labour cost of the project
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>${{ $proposal->labour_cost }}</strong>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Material cost of the project
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>${{ $proposal->material_cost }}</strong>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Total Cost
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                ${{ $contract->amount }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Job Title & Category
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                <a href="{{ route('job.single', [$contract->job->slug, $contract->job->id]) }}">
                                                    {{ $contract->job->title }}
                                                </a>
                                                 - {{ $contract->job->category->name }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Handyman Name
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                {{ $contract->provider->full_name }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Date of Work Started
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                {{ date('d/m/Y', strtotime($contract->created_at)) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                &nbsp;
                                            </label>
                                            <div class="col-sm-6 col-sm-offset-1 control-label" style="text-align: left">
                                                @if( $contract->status != 2 )
                                                <a href="{{ route('client.job.complete', [$contract->id, $contract->job_id]) }}" class="btn btn-default btn-signup" style="padding: 10px 0px !important;width: 170px;">
                                                    Mark as Completed
                                                </a>
                                                &nbsp;
                                                @endif
                                                <a href="{{ url()->previous() }}" class="btn btn-default btn-filter" style="width: auto;"> OK </a>
                                            </div>
                                            
                                        </div>

                                    </form>


                                </div> <!-- /widget-content -->
                            </div> <!-- /widget -->

                        </div> <!-- /span5 -->

                    </div> <!-- /row -->
                </div> <!-- /span9 -->
            </div> <!-- /row -->
        </div> <!-- /container -->
@stop