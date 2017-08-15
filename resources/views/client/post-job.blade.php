@extends('layouts.master')

@section('page_title', 'Post a Job')

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
                            <div class="widget">
                                {{--<div class="widget-header">
                                    <h3>5 Column</h3>
                                </div>--}}
                                <div class="widget-content">
                                    @if($client->time <= 1)
                                        <div class="text-center">
                                            {{--<h5>Your first job is free. </h5>--}}
                                        </div>
                                    @endif
                                    <div class="post-job-box col-md-10 col-md-offset-1">
                                        <h4>Post a job</h4>
                                        <form class="row validate_form" method="post" action="{{ route('client.post-job-post') }}">
                                            {{ csrf_field() }}

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">Title</label>
                                                    <input type="text" class="form-control field" name="job_title" id="job_title" placeholder="Job Title" required>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">Phone</label>
                                                    <input type="text" class="form-control field" name="job_phone" id="job_phone" placeholder="Phone" required>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">Address</label>
                                                    <input type="text" class="form-control field job_location" name="job_location" id="job_location" placeholder="Address" required>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">Street Address</label>
                                                    <input type="text" class="form-control field st_address" name="st_address" id="st_address" placeholder="Street Address" required>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">Date</label>
                                                    <input type="text" class="form-control field" name="job_date" id="job_date" placeholder="Suitable Date to Approach" required>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">Time</label>
                                                    <input type="text" class="form-control field" name="job_time" id="job_time" placeholder="Suitable Time to Approach" required>
                                                </div>

                                            </div>


                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">Date</label>
                                                    <input type="text" class="form-control field" name="job_end_date" id="job_end_date" placeholder="Job End date" required>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">Job type</label>
                                                    <select name="job_type" id="job_pro_rate" class="option form-control field" required>
                                                        <option value="any">Job Type</option>
                                                        <option value="any">Any</option>
                                                        <option value="hourly">Hourly</option>
                                                        <option value="fixed">Fixed</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">EXPERIENCE LEVEL</label>
                                                    <select name="exp_level" id="job_pro_rate" class="option form-control field" required>
                                                        <option value="any">Experience Level</option>
                                                        <option value="any">Any</option>
                                                        <option value="entry">Entry Level</option>
                                                        <option value="inter">Intermediate</option>
                                                        <option value="exp">Expert</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="form-group">
                                                    <label class="sr-only" for="">area</label>
                                                    {{--<input type="text" class="form-control field job_category" name="job_category" id="job_category" placeholder="Area of Work" required>--}}
                                                    <select name="job_category" id="job_category" class="option form-control field  job_category" required>
                                                        <option value="">Job Category</option>
                                                        @foreach($categories as $key => $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">
							                    <label class="sr-only" for="">Description</label>
                                                <textarea class="form-control field" rows="8" cols="40" name="job_desc" id="job_desc" placeholder="Job Description" required></textarea>

                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <button type="submit" class="btn btn-default btn-signup">Submit</button>
                                            </div>

                                        </form>

                                        <div class="clearfix"></div>
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
<link rel="stylesheet" href="{{ asset('css/plugins/summernote/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('css/plugins/summernote/summernote-bs3.css') }}">
@stop

@section('scripts')
<script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/plugins/clockpicker/clockpicker.js') }}"></script>
<script src="{{ asset('js/plugins/summernote/summernote.min.js') }}"></script>
<script>
    $('#job_desc').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
        ],
        placeholder: 'Job Description',
        height: 200
    });

    $(".validate_form").validate({
        rules: {
            job_phone: {
                required: true,
                phoneUS: true
            },
            job_location: {
                required: true,
                minlength: 5,
                maxlength: 5,
                number: true
            },
            job_title: {
                required: true,
                minlength: 10,
                maxlength: 40,
            }
        },
        messages: {
            job_phone: {
                required: "Please provide phone number",
                minlength: "Phone number should be in US format only i.e.  +14155552671"
            },
            job_location: {
                required: "Please provide postal code",
                minlength: "Only US postal code is allowed"
            },
            job_category: {
                required: "Area of Work or Category is required",
            }
        }
    });
    $('#job_date, #job_end_date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });

    $('#job_time').clockpicker({
        donetext: 'Done'
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
    //initMap();
    function initMap() {
        // Create the autocomplete object and associate it with the UI input control.
        // Restrict the search to the default country, and to place type "cities".
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */ (
                document.getElementById('job_location')), {
                types: [],
                componentRestrictions: countryRestrict
            });

        autocomplete.addListener('place_changed', onPlaceChanged);

        /*document.getElementById('country').addEventListener('change', setAutocompleteCountry);*/
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