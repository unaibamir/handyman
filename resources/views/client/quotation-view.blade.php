@extends('layouts.master')

@section('page_title', 'View Quote for '. $job->title.' ')

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
                                    <h3>View Quote for - {{ $job->title }} </h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">
                                    <form class="form-horizontal validate_form" action="" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Expected completion time of the project
                                            </label>
                                            <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>{{ $proposal->end_time }}</strong>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Expected completion date of the project
                                            </label>
                                            <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>{{ $proposal->end_date }}</strong>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Labour cost of the project
                                            </label>
                                            <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>${{ $proposal->labour_cost }}</strong>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Material cost of the project
                                            </label>
                                            <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>${{ $proposal->material_cost }}</strong>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                Total Cost
                                            </label>
                                            <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                <strong>${{ $proposal->amount }}</strong>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-5 control-label">
                                                &nbsp;
                                            </label>
                                            <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                <a href="{{ route('client.proposal.accept', [$job->id, $proposal->id]) }}" class="btn btn-default btn-signup" style="padding: 10px 0px !important;width: 110px;">
                                                    Accept
                                                </a>
                                                &nbsp;
                                                <a href="{{ url()->previous() }}" class="btn btn-warning" style="padding: 10px 0px !important;width: 110px;">
                                                    Cancel
                                                </a>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-12 text-left">
                                                <p class="text-muted" style="font-size: 12px; font-weight: 400;">
                                                    <sup class="">*</sup> A notification will be sent to Handyman and Admin
                                                </p>
                                            </label>

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

        @section('stylesheets')
            <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
            <link href="{{ asset('css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet">
        @stop

        @section('scripts')
            <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
            <script src="{{ asset('js/plugins/clockpicker/clockpicker.js') }}"></script>

            <script>
                $(function () {
                    $('.material_cost, .labour_cost').on('change', function () {
                        var material_cost = $('.material_cost').val();
                        if( material_cost < 0 ) {material_cost = 0;}

                        var labour_cost = $('.labour_cost').val();
                        if( labour_cost < 0 ) {labour_cost = 0;}

                        $('.total_cost').val( parseFloat(material_cost) + parseFloat(labour_cost ));
                    });
                    $(".validate_form").validate({
                        rules: {
                            labour_cost: {
                                required: true,
                                number: true
                            },
                            material_cost: {
                                required: true,
                                number: true
                            },
                            total_cost: {
                                required: true,
                                number: true
                            }
                        },
                        messages: {
                            labour_cost: {
                                required: "Pleas enter only decimals"
                            },
                            material_cost: {
                                required: "Pleas enter only decimals"
                            },
                            total_cost: {
                                required: "Metrial and Labour cost should be filled"
                            }
                        }
                    });
                    $('.end_date').datepicker({
                        todayBtn: "linked",
                        keyboardNavigation: false,
                        forceParse: false,
                        autoclose: true
                    });

                    $('.end_time').clockpicker({
                        donetext: 'Done',
                        autoclose: true
                    });
                });
            </script>
@stop