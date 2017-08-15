<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('page_title') | {{ config('app.name', 'Handy Man') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('assets/css/adminia-1.1.css?ver='.time()) }}" rel="stylesheet">
    <link href="{{ asset('assets/css/adminia-1.1-responsive.css?ver='.time()) }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css?ver='.time()) }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    @yield('stylesheets')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('homepage') }}"><img src="{{ asset('images/logo.png') }}" width="100%" alt=""/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">

         <form class="navbar-form hidden-sm navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
         </form>

          <ul class="nav navbar-nav">
            {{--<li class=""><a href="{{ route('homepage') }}">Home <span class="sr-only">(current)</span></a></li>--}}
            <li><a href="{{ route('job.browse') }}">Browse</a></li>
            <li><a href="#">How it works</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            @if( Auth::guard('admin')->check() )
              <li><a href="{{ route('admin.dashboard') }}">Admin Area</a></li>
              <li><a href="{{ route('admin.logout') }}">Logout</a></li>
            @elseif( Auth::guard('client')->check() )
              {{-- Client Header Link --}}

              <li>
                <div class="dropdown">
                  <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset( Auth::guard('client')->user()->user_image ) }}" class="avatar avatar-xs img-circle" alt=""/>
                      {{ Auth::guard('client')->user()->full_name }}
                      <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" aria-labelledby="dLabel">
                    <li><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('client.logout') }}">Logout</a></li>
                  </ul>
                </div>
              </li>


            @elseif( Auth::guard('provider')->check() )

              {{-- Handyman Header Link --}}
                  <li>

                      <div class="dropdown">
                          <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                              <img src="{{ asset( Auth::guard('provider')->user()->user_image ) }}" class="avatar avatar-xs img-circle" alt=""/>
                              {{ Auth::guard('provider')->user()->full_name }}
                              <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dLabel">
                              <li><a href="{{ route('provider.dashboard') }}">Dashboard</a></li>
                              <li><a href="{{ route('client.logout') }}">Logout</a></li>
                          </ul>
                      </div>
                  </li>
            @else
              <li><a href="{{ route('signup-link') }}"><i class="fa fa-pencil"></i> Sign up</a></li>
              <li><a href="{{ route('login.main') }}"><i class="fa fa-sign-in"></i> Login</a></li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


  @yield('content')




<section class="page-footer ng-scope">
  <div class="container">
  <div class="footer-sitemap">
  <div class="row ng-isolate-scope accordion-footer">
  <div class="col-sm-4">
    <div class="item ng-scope">
      <h4 class="text-uppercase title">
        Company Info
      </h4>
      <ul class="list-unstyled text-short content" style="max-height: 301px;">
        <li><a href="{{ route('homepage') }}">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="item ng-scope">
      <h4 class="text-uppercase title">
        Additional Services
      </h4>
      <ul class="list-unstyled text-short content">
        <li><a href="#">Handy man Pro</a></li>
        <li><a href="">Enterprise Solutions</a></li>
        <li><a href="">Enterprise Summit</a></li>
        <li><a href="">Local Business Resources</a></li>
      </ul>
    </div>

  </div>
  <div ui-accordion-item="" class="col-sm-4 ng-scope">
    <div ui-accordion-item="" class="item ng-scope">
      <h4 class="text-uppercase title">
        Browse
      </h4>
      <ul class="list-unstyled text-short content">
        <li><a href="#">Handymen by Skill</a></li>
        <li><a href="#">Handymen in USA</a></li>
        <li><a href="#">Find Jobs</a></li>

      </ul>
    </div>
  </div>
  </div>
  </div>
  <div class="footer-social">
  <hr class="hidden-xs">
  <div class="row ng-isolate-scope accordion-footer">
  <div class="col-sm-12 social-links">
    <div ui-accordion-item="" class="item ng-scope">

      <ul class="list-inline content text-center">
        <li class=""><a title="" target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li class=""><a title="" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
        <li class=""><a title="" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li class=""><a title="" target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
        <li class=""><a title="" target="_blank" href="#"><i class="fa fa-youtube"></i></a></li>
        <li class=""><a title="" target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
      </ul>
      
      <p class="text-center">© 2015 - 2017 Handyman Inc.</p>
      
      <div class="clearfix"></div>
    </div>
  </div>

  </div>

  </div>

  </div>
  </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY', 'AIzaSyBMVkumI3QtPusxZCmAjHOkNJs7V7hoicA') }}&libraries=places"></script>
    <script src="{{ asset('front/js/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('front/js/functions.js') }}"></script>
    @yield('scripts')

    
  </body>
</html>