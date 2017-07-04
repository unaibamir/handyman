@extends('layouts.master')

@section('page_title', $data['page_title'] )

@section('content')

<section class="signup-page">
	
	<div class="container">
		
		<div class="row">

            <div class="col-md-4 col-sm-6 col-md-offset-4 text-center">

                <div class="signup-box">

                    <div class="col-md-12">
                        @include('layouts._notice')
                    </div>

                    <h4>Sign up for HandyMan </h4>

                    <form class="validate_form set_address" method="post" action="{{ route('signup-handyman-post') }}">
                        {{ csrf_field() }}
                        <div class="col-md-12">

                            {{--<a href="#" class="circle">
                                <img src="{{ asset('images/candidate-img.jpg') }}" alt="">
                            </a>--}}

                        </div>

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

                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="sr-only" for="address">Address</label>
                                <input type="text" class="form-control field" id="address" name="address" placeholder="Address" required>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12">

                            <div class="form-group">
                                <label class="sr-only" for="driver_licence">Driver Licence #</label>
                                <input type="text" class="form-control field" id="driver_licence" name="driver_licence" placeholder="Driver Licence #" required>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12">

                            <div class="form-group" id="locationField">
                                <label class="sr-only" for="area_work">Area of Work</label>
                                <input type="text" class="form-control field" id="area_work" name="area_work" placeholder="Area of Work" required>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12" style="display: none;">

                            <div class="form-group" id="controls">
                                <label class="sr-only" for="area_work">Country</label>
                                <select class="form-control option select2" name="country" id="country" required>
                                    <option value="us">U.S.A.</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="sr-only" for="job_type">Type of Handman</label>
                                <select class="form-control option select2" name="job_type" id="job_type" required>
                                    <option value="">Type of Handman</option>
                                    @foreach($data['job_types'] as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="text" class="form-control field" id="email" name="email" placeholder="Email" required>
                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" class="form-control field" id="password" name="password" placeholder="Password" required>
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
                                <label class="sr-only" for="">Bank Account #</label>
                                <input type="text" class="form-control field" id="bank_account" name="bank_account" placeholder="Bank Account #" required>
                            </div>

                        </div>
                        <input type="hidden" name="lat" class="pro_lat">
                        <input type="hidden" name="long" class="pro_long">
                        <button type="submit" class="btn btn-default btn-signup">Next</button>
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

<script>

    var map, places, infoWindow;
    var markers = [];
    var autocomplete;
    var countryRestrict = {'country': 'us'};
    var MARKER_PATH = 'https://developers.google.com/maps/documentation/javascript/images/marker_green';
    var hostnameRegexp = new RegExp('^https?://.+?/');

    var countries = {
        'us': {
            center: {lat: 37.1, lng: -95.7},
            zoom: 3
        }
    };
    initMap();
    function initMap() {
        // Create the autocomplete object and associate it with the UI input control.
        // Restrict the search to the default country, and to place type "cities".
        autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */ (
            document.getElementById('area_work')), {
            types: ['(regions)'],
            componentRestrictions: countryRestrict
        });

        autocomplete.addListener('place_changed', onPlaceChanged);

        document.getElementById('country').addEventListener('change', setAutocompleteCountry);
    }

    // When the user selects a city, get the place details for the city and
    // zoom the map in on the city.
    function onPlaceChanged() {
        var place = autocomplete.getPlace();
        if (place.geometry) {
            /*map.panTo(place.geometry.location);
             map.setZoom(15);*/
            //search();
        } else {
            document.getElementById('autocomplete').placeholder = 'Enter a city';
        }
    }

    function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
            if (markers[i]) {
                markers[i].setMap(null);
            }
        }
        markers = [];
    }

    function clearResults() {
        var results = document.getElementById('results');
        while (results.childNodes[0]) {
            results.removeChild(results.childNodes[0]);
        }
    }

    // Set the country restriction based on user input.
    // Also center and zoom the map on the given country.
    function setAutocompleteCountry() {
        var country = document.getElementById('country').value;
        if (country == 'all') {
            autocomplete.setComponentRestrictions({'country': []});
            /*map.setCenter({lat: 15, lng: 0});
             map.setZoom(2);*/
        } else {
            autocomplete.setComponentRestrictions({'country': country});
            /*map.setCenter(countries[country].center);
             map.setZoom(countries[country].zoom);*/
        }
        clearResults();
        clearMarkers();
    }
</script>
@stop