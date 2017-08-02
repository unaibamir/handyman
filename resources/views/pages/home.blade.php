@extends('layouts.master')

@section('page_title', 'Find the Best Rated Local Home Improvement Professionals')

@section('content')

<section class="__hero-section __mod-hr-long __mod-mega-title jumbotron jumbotron-xlg landing-hero with-cta bg-cloud
green-hero takeover-hero
">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				{{--<h1 class="m-b-40">Getting your projects done is our top priority</h1>
				<p class="text-long m-b-40">The Handyman Guarantee gives you peace of mind for all of your home improvement projects.</p>--}}
                <h1 class="m-b-40">Handyman Electrician Services</h1>

                <h2 class="text-long m-b-40">Installation, Maintenance</h2>

			</div>
		</div>
	</div>

	<ee-preload src="//www.upwork.com/static/marketing/adquiro-webpack/images/welcome-illo.e5d69b1115d3.svg"></ee-preload>
</section>

<section class="section">

    <div class="container text-center">

        <div class="row">

            <div class="user-picks">

                <ul>
                    <li>
                        <a href="{{ route('signup-handyman') }}">
                            <i class="fa fa-briefcase fa-5x"></i>

                            <h4>Looking For a Job</h4>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('signup-homeowner') }}">
                            <i class="fa fa-send fa-5x"></i>

                            <h4>Post a Job</h4>
                        </a>
                    </li>

                    <div class="clearfix"></div>
                </ul>



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
                    <div class=""><i class="fa fa-search fa-5x"></i></div>
                    <hr />
                    <h4>FIND</h4>

                    <p>Looking for reliable Maintenance & Repair, Construction</p>

                </div><!--optin-->
            </div><!--col md sm 3-->

            <div class="col-md-3 col-sm-3 text-center">

                <div class="opion">
                    <div class=""><i class="fa fa-handshake-o fa-5x"></i></div>
                    <hr />
                    <h4>HIRE</h4>

                    <p>Looking for reliable Maintenance & Repair, Construction</p>

                </div><!--optin-->
            </div><!--col md sm 3-->

            <div class="col-md-3 col-sm-3 text-center">

                <div class="opion">
                    <div class=""><i class="fa fa-building fa-5x"></i></div>
                    <hr />
                    <h4>WORK</h4>

                    <p>Looking for reliable Maintenance & Repair, Construction</p>

                </div><!--optin-->
            </div><!--col md sm 3-->

            <div class="col-md-3 col-sm-3 text-center">

                <div class="opion">
                    <div class=""><i class="fa fa-money fa-5x"></i></div>
                    <hr />
                    <h4>PAY</h4>

                    <p>Looking for reliable Maintenance & Repair, Construction</p>

                </div><!--optin-->
            </div><!--col md sm 3-->

            <div class="clearfix"></div>

        </div><!--row-->

    </div><!--container-->

</section>


@if( !$categories->isEmpty() )
<section class="section">
	
	<div class="container text-center">
		
		<div class="rows">
			
			<h2>Work with someone perfect for your team</h2>
			
			<div class="category-listing">
				
				<ul>
                    @foreach($categories as $key => $category)
                        <li class="col-xs-6 col-sm-6 col-md-3">
                            <a href="{{ route('category.jobs', [$category->slug, $category->id]) }}" title="{{ $category->name }}">
                                <div class="front_layer">
                                    @if($category->icon_type == 1)
                                        <i class="fa {{$category->icon}} fa-5x"></i>
                                    @else
                                        <img src="{{$category->icon}}" alt="{{ $category->name }}" class="img-responsive img-thumbnail img-circle cat_thumb">
                                    @endif
                                    <h4>{{ $category->name }}</h4>
                                </div>
                                <div class="back_layer">
                                    {{--<span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>--}}
                                    <span>{{ strtoupper(str_limit($category->description, 70, '')) }}</span>
                                    <br>
                                    <em>and more...</em>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    {{--<li class="col-xs-6 col-sm-6 col-md-3">
						<a href="#">
                            <div class="front_layer">
                                <i class="fa fa-area-chart fa-5x"></i>
                                <h4>Plumber</h4>
                            </div>
                            <div class="back_layer">
                                <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>
                                <br>
                                <em>and more...</em>
                            </div>
						</a>
					</li>
                    <li class="col-xs-6 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="front_layer">
                                <i class="fa fa-bar-chart fa-5x"></i>
                                <h4>Plumber</h4>
                            </div>
                            <div class="back_layer">
                                <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>
                                <br>
                                <em>and more...</em>
                            </div>
                        </a>
					</li>
                    <li class="col-xs-6 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="front_layer">
                                <i class="fa fa-chain-broken fa-5x"></i>
                                <h4>Plumber</h4>
                            </div>
                            <div class="back_layer">
                                <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>
                                <br>
                                <em>and more...</em>
                            </div>
                        </a>
					</li>
                    <li class="col-xs-6 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="front_layer">
                                <i class="fa fa-cut fa-5x"></i>
                                <h4>Plumber</h4>
                            </div>
                            <div class="back_layer">
                                <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>
                                <br>
                                <em>and more...</em>
                            </div>
                        </a>
					</li>
                    <li class="col-xs-6 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="front_layer">
                                <i class="fa fa-paperclip fa-5x"></i>
                                <h4>Plumber</h4>
                            </div>
                            <div class="back_layer">
                                <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>
                                <br>
                                <em>and more...</em>
                            </div>
                        </a>
					</li>
                    <li class="col-xs-6 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="front_layer">
                                <i class="fa fa-heart-o fa-5x"></i>
                                <h4>Plumber</h4>
                            </div>
                            <div class="back_layer">
                                <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>
                                <br>
                                <em>and more...</em>
                            </div>
                        </a>
					</li>
                    <li class="col-xs-6 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="front_layer">
                                <i class="fa fa-stethoscope fa-5x"></i>
                                <h4>Plumber</h4>
                            </div>
                            <div class="back_layer">
                                <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>
                                <br>
                                <em>and more...</em>
                            </div>
                        </a>
					</li>
                    <li class="col-xs-6 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="front_layer">
                                <i class="fa fa-hospital-o fa-5x"></i>
                                <h4>Plumber</h4>
                            </div>
                            <div class="back_layer">
                                <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span>
                                <br>
                                <em>and more...</em>
                            </div>
                        </a>
					</li>--}}
					<div class="clearfix"></div>
				</ul>
				
				<a href="#" class="btn btn-default btn-block-xs m-b-120">See All Categories</a>
				
				<div class="clearfix"></div>
			</div><!--category-->
			
			<div class="clearfix"></div>
		</div><!--row-->
		
	</div><!--container-->
	
</section>

@endif
{{--<section class="bg-grey-lighter">
	
	<div class="container text-center">
		
		<div class="row">
			
			<h2>How it works</h2>
			
			<div class="col-md-3 col-sm-6 text-center">
				
				<div class="opion">
				<div class="find-icon"></div>
				<hr />
				<h4>FIND</h4>
				
				<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				
				</div><!--optin-->
			</div><!--col md sm 3-->
			
			<div class="col-md-3 col-sm-6 text-center">
				
				<div class="opion">
				<div class="hire-icon"></div>
				<hr />
				<h4>HIRE</h4>
				
				<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				
				</div><!--optin-->
			</div><!--col md sm 3-->
			
			<div class="col-md-3 col-sm-6 text-center">
				
				<div class="opion">
				<div class="work-icon"></div>
				<hr />
				<h4>WORK</h4>
				
				<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				
				</div><!--optin-->
			</div><!--col md sm 3-->
			
			<div class="col-md-3 col-sm-6 text-center">
				
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
	
</section>--}}


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
      		
      		<div class="col-md-6 col-sm-6 col-md-offset-3 text-center">
      			
				<h3>
				Our Handymans deliver their work fast.
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
      		
      		<!-- <div class="col-md-6 col-sm-6">
      			
      			<iframe width="100%" height="400" src="https://www.youtube.com/embed/jylD0pLXn1k" frameborder="0" allowfullscreen=""></iframe>
      			
      		</div>
      		<div class="clearfix"></div> -->
      	</div><!--row-->
      	
      </div><!--container-->
      
    </div>

    <div id="slide2" class="item" ng-swipe-right="carouselPrev()" ng-swipe-left="carouselNext()">
      
      <div class="container">
      	
      	<div class="row">
      		
      		<div class="col-md-6 col-sm-6 col-md-offset-3 text-center">
      			
				<h3>
				Our Handymans deliver their work fast.
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
      		
      		<!-- <div class="col-md-6 col-sm-6">
      			
      			<iframe width="100%" height="400" src="https://www.youtube.com/embed/jylD0pLXn1k" frameborder="0" allowfullscreen=""></iframe>
      			
      		</div>
      		<div class="clearfix"></div> -->
      	</div><!--row-->
      	
      </div><!--container-->
		
    </div>

    <!-- add more slides as needed -->

  </div>
 
</div>

	</section>

   
<section class="text-center bg-grass">
  <div class="container">
    <div class="row">
      <div class=" col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <h2 class="">Are you professional?</h2>
                          <a href="{{ route('signup-handyman') }}" class="btn btn-white-border btn-block-xs m-b-120">
            Get Started
          </a>
        
      </div>
    </div>
  </div>
</section>



@stop