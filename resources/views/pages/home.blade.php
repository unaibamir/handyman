@extends('layouts.master')

@section('content')

<section class="__hero-section __mod-hr-long __mod-mega-title jumbotron jumbotron-xlg landing-hero with-cta bg-cloud
green-hero takeover-hero
">
	<div class="container">
		<div class="row">
			<div class="col-sm-7 ng-scope" ng-controller="eeSuggestCtrl as ctrl">
				<h1 class="m-b-40">Rob doubled conversion</h1>

				<p class="text-long m-b-40">Get more done with freelancers</p>

			</div>
		</div>
	</div>

	<ee-preload src="//www.upwork.com/static/marketing/adquiro-webpack/images/welcome-illo.e5d69b1115d3.svg"></ee-preload>
</section>




<section class="section">
	
	<div class="container text-center">
		
		<div class="row">
			
			<h2>Work with someone perfect for your team</h2>
			
			<div class="category-listing">
				
				<ul>
					<li>
						<a href="#">
						<i class="fa fa-area-chart fa-5x"></i>
						
						<h4>Plumber</h4>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="fa fa-bar-chart fa-5x"></i>
						
						<h4>Plumber</h4>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="fa fa-chain-broken fa-5x"></i>
						
						<h4>Plumber</h4>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="fa fa-cut fa-5x"></i>
						
						<h4>Plumber</h4>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="fa fa-paperclip fa-5x"></i>
						
						<h4>Plumber</h4>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="fa fa-heart-o fa-5x"></i>
						
						<h4>Plumber</h4>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="fa fa-stethoscope fa-5x"></i>
						
						<h4>Plumber</h4>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="fa fa-hospital-o fa-5x"></i>
						
						<h4>Plumber</h4>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
				
				<a href="#" class="btn btn-default btn-block-xs m-b-120">See All Categories</a>
				
				<div class="clearfix"></div>
			</div><!--category-->
			
			<div class="clearfix"></div>
		</div><!--row-->
		
	</div><!--container-->
	
</section>

<section class="bg-grey-lighter">
	
	<div class="container text-center">
		
		<div class="row">
			
			<h2>How it works</h2>
			
			<div class="col-md-3 col-sm-3 text-center">
				
				<div class="opion">
				<div class="find-icon"></div>
				<hr />
				<h4>FIND</h4>
				
				<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				
				</div><!--optin-->
			</div><!--col md sm 3-->
			
			<div class="col-md-3 col-sm-3 text-center">
				
				<div class="opion">
				<div class="hire-icon"></div>
				<hr />
				<h4>HIRE</h4>
				
				<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				
				</div><!--optin-->
			</div><!--col md sm 3-->
			
			<div class="col-md-3 col-sm-3 text-center">
				
				<div class="opion">
				<div class="work-icon"></div>
				<hr />
				<h4>WORK</h4>
				
				<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				
				</div><!--optin-->
			</div><!--col md sm 3-->
			
			<div class="col-md-3 col-sm-3 text-center">
				
				<div class="opion">
				<div class="pay-icon"></div>
				<hr />
				<h4>PAY</h4>
				
				<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				
				</div><!--optin-->
			</div><!--col md sm 3-->
			
			<div class="clearfix"></div>
			
		</div><!--row-->
		
	</div><!--container-->
	
</section>


    <section class="testimonial">
    	
    	<div id="carousel-main" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-main" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-main" data-slide-to="1"></li>
    <!-- add indicators for any slides added -->
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div id="slide1" class="item active" ng-swipe-right="carouselPrev()" ng-swipe-left="carouselNext()">
      
      <div class="container">
      	
      	<div class="row">
      		
      		<div class="col-md-6 col-sm-6">
      			
				<h3>
				Our Upwork developers are ahead of the curve.
				</h3>
				<p class="m-b-40 text-short">
				Tyson Quick
				<br>
				CEO &amp; Founder, Instapage
				</p>
                                
				<a href="#" class="btn btn-default bg-white">
				See More Stories
				</a>
      			
      		</div><!--col md sm 6-->
      		
      		<div class="col-md-6 col-sm-6">
      			
      			<iframe width="100%" height="400" src="https://www.youtube.com/embed/jylD0pLXn1k" frameborder="0" allowfullscreen=""></iframe>
      			
      		</div>
      		<div class="clearfix"></div>
      	</div><!--row-->
      	
      </div><!--container-->
      
    </div>

    <div id="slide2" class="item" ng-swipe-right="carouselPrev()" ng-swipe-left="carouselNext()">
      
      <div class="container">
      	
      	<div class="row">
      		
      		<div class="col-md-6 col-sm-6">
      			
				<h3>
				Our Upwork developers are ahead of the curve.
				</h3>
				<p class="m-b-40 text-short">
				Tyson Quick
				<br>
				CEO &amp; Founder, Instapage
				</p>
                                
				<a href="#" class="btn btn-default bg-white">
				See More Stories
				</a>
      			
      		</div><!--col md sm 6-->
      		
      		<div class="col-md-6 col-sm-6">
      			
      			<iframe width="100%" height="400" src="https://www.youtube.com/embed/jylD0pLXn1k" frameborder="0" allowfullscreen=""></iframe>
      			
      		</div>
      		<div class="clearfix"></div>
      	</div><!--row-->
      	
      </div><!--container-->
		
    </div>

    <!-- add more slides as needed -->

  </div>
 
</div>

	</section>



<section class="section-logo-bar bg-ash">
  <div class="container">

    <h4 class="text-uppercase hidden-xs">Top businesses hiring on upwork</h4>
    <div class="logobar m-b-60">
    </div>
  </div>
</section>
   
<section class="text-center bg-grass">
  <div class="container">
    <div class="row">
      <div class=" col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <h2 class="">Build your team</h2>
                          <a href="#" class="btn btn-white-border btn-block-xs m-b-120">
            Get Started
          </a>
        
      </div>
    </div>
  </div>
</section>



@stop