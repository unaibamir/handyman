<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('page_title', config('app.name', 'Handy Man') )</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
   
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
          <a class="navbar-brand" href="#"><img src="images/logo.png" width="100%" alt=""/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         
         <form class="navbar-form hidden-sm navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
          </form>
          
          <ul class="nav navbar-nav">
            <li class=""><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Blog</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-pencil"></i> Sign up</a></li>
            <li><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>
            
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
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Compaines</a></li>
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
        <li><a href="#">Freelancers by Skill</a></li>
        <li><a href="#">Freelancers in USA</a></li>
        <li><a href="#">Freelancers in UK</a></li>
        <li><a href="#">Freelancers in Canada</a></li>
        <li><a href="#">Freelancers in Australia</a></li>
        <li><a href="#">Find Jobs</a></li>
        <li><a href="#">Hiring Resources</a></li>
        <li><a href="#">Jobs in USA</a></li>
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
      
      <p class="text-center">© 2015 - 2017 Upwork Global Inc.</p>
      
      <div class="clearfix"></div>
    </div>
  </div>

  </div>

  </div>

  </div>
  </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
    <script>
    carouselNext = function() {
      $('#carousel-main').carousel('next');
    }
    carouselPrev = function() {
      $('#carousel-main').carousel('prev');
    }
    </script>
    
  </body>
</html>