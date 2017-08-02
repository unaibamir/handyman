<?php
/**
 * Created by PhpStorm.
 * User: Unaib
 * Date: 20/7/2017
 * Time: 11:48 AM
 */
?>

@extends('admin.layouts.master')

@section('page_title', 'Edit Client')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Client</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Edit Client</strong>
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

                        <!-- <?php echo '<pre>'.print_r($client, true).'</pre>'; ?> -->

                        {!! Form::model($client, [
                            'method' => 'PUT',
                            'route' => ['admin.client.update', $client->id],
                            'class' => 'form-horizontal validate_form',
                            'files'=> true
                            ]
                        ) !!}


                            <div class="form-group"><label class="col-sm-2 control-label">Username <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" requried value="{{$client->username}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">First Name <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fname" required value="{{$client->fname}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Last Name <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lname" required value="{{$client->lname}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Email <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" required value="{{$client->email}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" >
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>


                            <div class="form-group">
                                <label for="user_image" class="col-sm-2 control-label">Profile Picture</label>
                                @if($client->user_thumb != '')
                                    <div class="col-sm-6">
                                        <input type="file" name="user_image" value="{{ $client->user_image }}" id="user_image" class="form-control">
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <img src="{{ asset($client->user_thumb) }}" class="img-responsive img-thumbnail img-circle" style="max-width: 150px;">
                                    </div>
                                @else
                                    <div class="col-sm-10">
                                        <input type="file" name="user_image" id="user_image" class="form-control">
                                    </div>
                                @endif

                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Bio</label>
                                <div class="col-sm-10">
                                    <textarea name="bio" class="form-control" cols="30" rows="4">{{$client->bio}}</textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" value="{{$client->address}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" value="{{$client->phone}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="city" value="{{$client->city}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">State</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b select2" name="state">
                                        {{--<option value="">Please select</option>--}}
                                        @foreach($states as $short => $name)
                                            <option value="{{ $name }}" <?php if($client->state == $name) {echo 'selected';} ?>>{{ $name }}</option>
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
                                    <input type="text" class="form-control" name="postcode" id="postcode" required value="{{$client->postcode}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Location <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <fieldset class="gllpLatlonPicker" id="custom_id">
                                        <div class="input-group">
                                            <input type="text" class="gllpSearchField form-control" required name="location" value="{{$client->location}}">
                                            <span class="input-group-btn" style="vertical-align: top;">
                                                <button type="button" class="gllpSearchButton btn btn-primary">Search!</button>
                                            </span>
                                        </div>


                                        <div class="gllpMap" style="height: 300px;">Google Maps</div>
                                        <input type="hidden" name="latitude" class="gllpLatitude" value="{{$client->latitude}}" />
                                        <input type="hidden" name="longitude" class="gllpLongitude" value="{{$client->longitude}}"/>
                                        <input type="hidden" class="gllpZoom" value="12"/>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>


                            <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b select2" name="is_active">
                                        <option value="">Please Select</option>
                                        <option value="1" <?php if($client->is_active == 1) {echo 'selected';} ?>>Active</option>
                                        <option value="0" <?php if($client->is_active == 0) {echo 'selected';} ?>>Deactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>


                            <div class="form-group"><label class="col-sm-2 control-label">Approved</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b select2" name="is_approved">
                                        <option value="">Please Select</option>
                                        <option value="1" <?php if($client->is_approved == 1) {echo 'selected';} ?>>Yes</option>
                                        <option value="0" <?php if($client->is_approved == 0) {echo 'selected';} ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="{{ route('admin.client.index') }}"><button class="btn btn-white" type="button">Cancel</button></a>
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop


@section('scripts')
    <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
    <script>
        $(".validate_form").validate({
            rules: {
                user_image: {
                    required: false,
                    extension: "png|jpg|jpeg|bmp"
                },
                postcode: {
                    required: true,
                    digits: true
                },
                location: {
                    required: true
                }
            }
        });

        $(".gllpLatlonPicker").each(function() {
            $obj = $(document).gMapsLatLonPicker();

            $obj.params.strings.markerText = "Drag this Marker (example edit)";

            $obj.params.displayError = function(message) {
                console.log("MAPS ERROR: " + message); // instead of alert()
            };

            $obj.init( $(this) );
        });
    </script>
@endsection