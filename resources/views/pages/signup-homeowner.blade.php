@extends('layouts.master')

@section('page_title', $page_title )

@section('content')

    <section class="signup-page">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-sm-6 col-md-offset-4 text-center">

                    <div class="signup-box">
                        <h4>Sign up</h4>

                        <div class="col-md-12">
                            @include('layouts._notice')
                        </div>

                        <form class="validate_form" action="{{ route('signup-homeowner-post') }}" method="post">

                            {{ csrf_field() }}

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="sr-only" for="fname">First Name</label>
                                    <input type="text" class="form-control field" id="fname" name="fname" placeholder="First Name" required="required">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="sr-only" for="lname">Last Name</label>
                                    <input type="text" class="form-control field" id="lname" name="lname" placeholder="Last Name" required="required">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="email" class="form-control field" id="email" name="email" placeholder="Email" required="required">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <input type="password" class="form-control field" id="password" name="password" placeholder="Password" required="required">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="sr-only" for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control field" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="sr-only" for="address">Address</label>
                                    <input type="text" class="form-control field" id="address" name="address" placeholder="Address" required="required">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="sr-only" for="phone">Phone</label>
                                    <input type="text" class="form-control field" id="phone" name="phone" placeholder="Phone" required="required">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-default btn-signup">Get Register</button>

                        </form>

                        <div class="clearfix"></div>
                    </div>
                </div><!--col md sm 7-->

                <div class="clearfix"></div>
            </div><!--row-->

        </div><!--container-->

    </section>

@stop


@section('scripts')
    <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
    <script>
        $(".validate_form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }

            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                }
            }
        });
    </script>
@stop