@extends('admin.layouts.master')

@section('page_title', 'Add New Hanyman - ')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Add New Handyman</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Add New Handyman</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Client Information</h5>
                    </div>
                    <div class="ibox-content">

                        @include('admin.layouts._notice')

                        <form method="post" class="form-horizontal validate_form" action="{{ route('admin.handyman.store') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group"><label class="col-sm-2 control-label">First Name <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fname" required>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Last Name <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lname" required>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Username <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" required="required">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Email <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email"  required="required">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Password <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" required="required">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Bio</label>
                                <div class="col-sm-10">
                                    <textarea name="bio" class="form-control" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="city">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">State</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b select2" name="state">
                                        {{--<option value="">Please select</option>--}}
                                        @foreach($states as $short => $name)
                                            <option value="{{ $name }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b select2" name="country">
                                        <option value="United States of America">United States of America</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Postal Code <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="postcode" id="postcode" required>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Location <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control location" name="location" id="location" required>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            {{--<div class="form-group"><label class="col-sm-2 control-label">Location <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <fieldset class="gllpLatlonPicker" id="custom_id">
                                        <div class="input-group">
                                            <input type="text" class="gllpSearchField form-control location" required name="location">
                                            <span class="input-group-btn" style="vertical-align: top;">
                                                <button type="button" class="gllpSearchButton btn btn-primary">Search!</button>
                                            </span>
                                        </div>


                                        <div class="gllpMap" style="height: 300px;">Google Maps</div>
                                        <input type="hidden" name="latitude" class="gllpLatitude" value="0" />
                                        <input type="hidden" name="longitude" class="gllpLongitude" value="0"/>
                                        <input type="hidden" class="gllpZoom" value="12"/>
                                    </fieldset>
                                </div>
                            </div>--}}


                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="{{ route('admin.handyman.index') }}"><button class="btn btn-white" type="button">Cancel</button></a>
                                    <button class="btn btn-primary submit-user" type="submit">Save changes</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
    <script>
        $(".validate_form").validate({
            rules: {
                postcode: {
                    required: true,
                    number: true
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
                zoom: 12
            }
        };
        initMap();
        function initMap() {
            // Create the autocomplete object and associate it with the UI input control.
            // Restrict the search to the default country, and to place type "cities".
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */ (
                    document.getElementById('location')), {
                    types: [],
                    componentRestrictions: countryRestrict
                });

            autocomplete.addListener('place_changed', onPlaceChanged);

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
                document.getElementById('location').placeholder = 'Enter a city';
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