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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th data-hide="phone">Icon</th>
                                    <th data-hide="phone,tablet">Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach( $categories as $category )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            @if($category->icon_type == 1)
                                                <i class="fa {{ $category->icon }}" style="font-size: 50px;"></i>
                                            @else
                                                <img src="{{ asset($category->icon) }}" alt="{{ $category->name }}" class="img-responsive img-thumbnail img-circle" style="max-width: 60px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if( $category->status == 1 )
                                                <span class="label label-primary">Active</span>
                                            @else
                                                <span class="label label-danger">Deactive</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" style="right:0;left:inherit;">
                                                    <li>
                                                        @if( $category->status == 1 )
                                                            <a href="{{ route('admin.category.deactivate', $category->id) }}">Deactivate</a>
                                                        @else
                                                            <a href="{{ route('admin.category.activate', $category->id) }}">Activate</a>
                                                        @endif
                                                    </li>
                                                    <li><a href="{{ route('admin.category.edit', $category->id) }}">Edit</a></li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="{{ route('admin.category.delete', $category->id) }}" id="{{$category->id}}" class="delete_user" data-token="{{ csrf_token() }}">
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="text-right">
                                {{ $categories->links() }}
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <p>No Categories found!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop