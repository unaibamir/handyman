@extends('layouts.master')

@section('page_title', 'Login')

@section('content')

    <section class="signup-page">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-sm-6 col-md-offset-4 text-center">

                    <div class="signup-box">
                        <h4>Login</h4>

                        <a href="{{ route('client.login') }}" class="link-btn">As a Home Owner</a>
                        <a href="{{ route('provider.login') }}" class="link-btn">As a Handy Man</a>

                        <div class="clearfix"></div>
                    </div>
                </div><!--col md sm 7-->

                <div class="clearfix"></div>
            </div><!--row-->

        </div><!--container-->

    </section>

@stop