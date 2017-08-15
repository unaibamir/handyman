@extends('layouts.master')

@section('page_title', 'Submit Quote for '. $job->title.' ')

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
                                    <h3>Submit Quote for - {{ $job->title }} </h3>
                                </div> <!-- /widget-header -->
                                <div class="widget-content">
                                    <div id="wizard">
                                        <h1>First Step</h1>
                                        <div class="step-content">
                                            <div class="text-left m-t-md">
                                                <h3>How it works?</h3>
                                                <ul>
                                                    <li>Speak to the client</li>
                                                    <li>Schedual an appoinment</li>
                                                    <li>Visit the client</li>
                                                    <li>Access the job</li>
                                                    <li>Click Nex to quote</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <h1>Second Step</h1>
                                        <div class="step-content">
                                            <div class="text-center m-t-md">
                                                <h3>Submit your quote</h3>
                                                <form class="form-horizontal validate_form" action="{{ route('provider.pick-job-post', base64_decode( \Input::get('job_id')) )}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-5 control-label">
                                                            Expected completion time of the project
                                                        </label>
                                                        <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                            <input type="text" class="form-control field end_time" name="end_time" placeholder="Enter end time" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-5 control-label">
                                                            Expected completion date of the project
                                                        </label>
                                                        <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                            <input type="text" class="form-control field end_date" name="end_date" placeholder="Enter date time" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-5 control-label">
                                                            Labour cost of the project
                                                        </label>
                                                        <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                            <input type="text" class="form-control field labour_cost" name="labour_cost" placeholder="Enter labout cost" required value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-5 control-label">
                                                            Material cost of the project
                                                        </label>
                                                        <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                            <input type="text" class="form-control field material_cost" name="material_cost" placeholder="Enter material cost" required value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-5 control-label">
                                                            Total Cost
                                                        </label>
                                                        <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                            <input type="text" readonly="readonly" class="form-control field total_cost" name="total_cost" placeholder="Enter total cost" required value="">
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-5 control-label">
                                                            &nbsp;
                                                        </label>
                                                        <div class="col-sm-5 col-sm-offset-1 control-label" style="text-align: left">
                                                            <input type="hidden" name="job_id" value="{{ \Input::get('job_id') }}">
                                                            <input type="hidden" name="client_id" value="{{ \Input::get('client_id') }}">
                                                            <input type="hidden" name="provider_id" value="{{ \Input::get('provider_id') }}">
                                                            {{--<input type="submit" class="btn btn-default btn-signup" value="Submit" style="padding: 10px 0px !important;width: 110px;">--}}
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-12 text-left">
                                                            <p class="text-muted" style="font-size: 12px; font-weight: 400;">
                                                                <sup class="">*</sup> A notification will be sent to Client and Admin
                                                            </p>
                                                        </label>

                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>


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
    {{--<link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
@stop

@section('scripts')
<script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/plugins/clockpicker/clockpicker.js') }}"></script>
<script src="{{ asset('js/plugins/steps/jquery.steps.min.js') }}"></script>
<script>
    $(function () {
        $("#wizard").steps({
            onFinished: function (event, currentIndex)
            {
                //alert("Submitted!");
                $('form.form-horizontal.validate_form').submit();
            }
        });
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