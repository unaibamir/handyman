@extends('layouts.master')

@section('content')

    <section class="signup-page">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-sm-6 col-md-offset-4 text-center">

                    <div class="login-box">
                        <h4>Log in as Handyman</h4>

                        <form class="" role="form" method="POST" action="{{ route('provider.login.submit') }}">
                            {{ csrf_field() }}
                            <div class="col-md-12">

                                <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                                    <label class="sr-only" for="">Email</label>
                                    <input id="email" type="text" class="form-control field {{ $errors->has('login') ? ' error' : '' }}" name="login" value="{{ old('login') }}" required autofocus placeholder="E-Mail or Username">

                                    @if ($errors->has('login'))
                                        <label class="error" for="email">{{ $errors->first('login') }}</label>
                                    @endif

                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <label class="sr-only" for="">Password</label>
                                    <input id="password" type="password" class="form-control field {{ $errors->has('password') ? ' error' : '' }}" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                        <label class="error" for="password">{{ $errors->first('password') }}</label>
                                    @endif
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="checkbox nomargin pull-left">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>

                                <a style="color: #37a000;" href="{{ route('password.request') }}"><p class="pull-right">Forgot password?</p></a>

                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-12"><button type="submit" class="btn btn-default btn-login">Log in</button>
                            </div>
                            <div class="clearfix"></div><br />
                            <p>Don't have an account? <a href="{{ route('signup-link') }}">Sign up</a></p>

                        </form>

                        <div class="clearfix"></div>
                    </div>
                </div><!--col md sm 7-->

                <div class="clearfix"></div>
            </div><!--row-->

        </div><!--container-->

    </section>

@endsection