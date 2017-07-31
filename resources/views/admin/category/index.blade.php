@extends('admin.layouts.master')

@section('page_title', 'Categories ')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Categories</h2>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add New Category</a>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content border-bottom">
                        @include('admin.layouts._notice')

                        @if( !$categories->isEmpty() )
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th data-toggle="true">No. </th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th data-hide="phone">Username</th>
                                    <th data-hide="phone">Email</th>
                                    <th data-hide="phone,tablet">Status</th>
                                    <th data-hide="phone,tablet">Approved</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach( $categories as $category )
                                    <tr>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="text-right">
                                {{ $categories->links() }}
                            </div>
                        @else
                            <div class="alert alert-warning">
                                No Categories found!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop