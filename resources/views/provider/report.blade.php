@extends('layouts.master')

@section('page_title', 'Report of '. $report->job->title.' ')

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
                                    <h3>Contract Details - </h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">
                                                Cost of work done
                                            </label>
                                            <div class="col-sm-8 col-sm-offset-1 control-label" style="text-align: left">
                                                ${{ $report->amount }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">
                                                Type of work done
                                            </label>
                                            <div class="col-sm-8 col-sm-offset-1 control-label" style="text-align: left">
                                                {{ $report->job->category->name }}
                                                -
                                                <a href="{{ route('job.single', [$report->job->slug, $report->job->id]) }}" target="{{ $report->job->title }}" target="_blank">
                                                    {{ $report->job->title }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">
                                                Customer Name
                                            </label>
                                            <div class="col-sm-8 col-sm-offset-1 control-label" style="text-align: left">
                                                {{ $report->client->full_name }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">
                                                Date of Work Completed
                                            </label>
                                            <div class="col-sm-8 col-sm-offset-1 control-label" style="text-align: left">
                                                {{ date('d/m/Y', strtotime($report->created_at)) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">
                                                &nbsp;
                                            </label>
                                            <div class="col-sm-8 col-sm-offset-1 control-label" style="text-align: left">
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