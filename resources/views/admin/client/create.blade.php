@extends('admin.layouts.master')

@section('page_title', 'Clients')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Add New Client</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Add New Client</strong>
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
                        <form method="post" class="form-horizontal validate_form" action="{{ route('admin.client.store') }}" enctype="multipart/form-data">
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

                            <div class="form-group"><label class="col-sm-2 control-label">Email <small class="text-danger"><sup>*</sup></small></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Bio</label>
                                <div class="col-sm-10">
                                    <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
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
                                        <option value="">Please select</option>
                                        @foreach($states as $short => $name)
                                            <option value="{{ $short }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">State</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b select2" name="country">
                                        <option value="US">United States of America</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Postal Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="postcode">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>




                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="{{ route('admin.client.index') }}"><button class="btn btn-white" type="button">Cancel</button></a>
                                    <button class="btn btn-primary" type="submit">Save changes</button>
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
        $(".validate_form").validate();
    </script>
    @endsection