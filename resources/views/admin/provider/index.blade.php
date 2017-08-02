@extends('admin.layouts.master')

@section('page_title', 'Handymen - ')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Handymen</h2>
            <a href="{{ route('admin.handyman.create') }}" class="btn btn-primary">Add New Handyman</a>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">


        <div class="ibox-content m-b-sm border-bottom">

            <form action="{{ route('admin.handyman.filter') }}" method="POST">
                <div class="row">
                    {{ csrf_field() }}
                    <input type="hidden" name="form_name" value="client_filter">

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label" for="provider_name">User name</label>
                            <input type="text" id="provider_name" name="provider_name" value="" placeholder="Handyman Name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label" for="provider_email">Email</label>
                            <input type="email" id="provider_email" name="provider_email" value="" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label" for="status">Status</label>
                            <select name="is_approved" id="status" class="form-control select2">
                                <option value="">Please Select</option>
                                <option value="1">Approved</option>
                                <option value="0">Not Approved</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
                        <div class="form-group">
                            <label class="control-label" for="status">Filter</label>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="filter_client" value="Filter">
                            </div>

                        </div>
                    </div>

                </div>
            </form>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">

                        @include('admin.layouts._notice')

                        @if( !$providers->isEmpty() )
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th data-toggle="true">No. </th>
                                    <th data-hide="phone">Date</th>
                                    <th>Name</th>
                                    <th data-hide="phone">Username</th>
                                    <th data-hide="phone">Email</th>
                                    <th data-hide="phone,tablet">Status</th>
                                    <th data-hide="phone,tablet">Approved</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach( $providers as $provider )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($provider->created_at)) }}</td>
                                        <td>{{ $provider->fname . ' ' . $provider->lname }}</td>
                                        <td>{{ $provider->username }}</td>
                                        <td>{{ $provider->email }}</td>
                                        <td>
                                            @if( $provider->is_active == 1 )
                                                <span class="label label-primary">Active</span>
                                            @else
                                                <span class="label label-danger">Disabled</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if( $provider->is_approved == 1 )
                                                <span class="label label-primary">Yes</span>
                                            @else
                                                <span class="label label-danger">No</span>
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" style="right:0;left:inherit;">
                                                    <li>
                                                        @if( $provider->is_active == 1 )
                                                            <a href="{{ route('admin.handyman.deactivate', $provider->id) }}">Deactivate</a>
                                                        @else
                                                            <a href="{{ route('admin.handyman.activate', $provider->id) }}">Activate</a>
                                                        @endif
                                                    </li>
                                                    @if( $provider->is_approved != 1 )
                                                        <li>
                                                            <a href="{{ route('admin.handyman.approve', $provider->id) }}">Approve</a>
                                                        </li>
                                                @endif
                                                    <!-- TODO -->
                                                    <li><a href="#">View All Requests</a></li>
                                                    <li><a href="{{ route('admin.handyman.edit', $provider->id) }}">Edit</a></li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="{{ route('admin.handyman.delete', $provider->id) }}" id="{{$provider->id}}" class="delete_user" data-token="{{ csrf_token() }}">
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        @else
                            <div class="alert alert-warning">
                                <p>No Providers found!</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop