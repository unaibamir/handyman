@extends('admin.layouts.master')

@section('page_title', 'Clients')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Clients</h2>
            <a href="{{ route('admin.client.create') }}" class="btn btn-primary">Add New Client</a>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">


        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <form action="{{ route('admin.client.filter') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="form_name" value="client_filter">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="client_name">Client Name</label>
                            <input type="text" id="client_name" name="client_name" value="" placeholder="Client Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="client_email">Email</label>
                            <input type="email" id="client_email" name="client_email" value="" placeholder="Email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="status">Status</label>
                            <select name="is_approved" id="status" class="form-control">
                                <option value="1" selected>Approved</option>
                                <option value="0">Not Approved</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="status">Filter</label>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="filter_client" value="Filter">
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        @if( !empty($clients) )
                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th data-toggle="true">No. </th>
                                    <th data-hide="phone">Date</th>
                                    <th>Name</th>
                                    <th data-hide="phone">Username</th>
                                    <th data-hide="phone">Email</th>
                                    <th data-hide="phone">Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach( $clients as $client )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($client->created_at)) }}</td>
                                        <td>{{ $client->fname . ' ' . $client->lname }}</td>
                                        <td>{{ $client->username }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>
                                            @if( $client->is_active == 1 )
                                                <span class="label label-primary">Active</span>
                                            @else
                                                <span class="label label-danger">Disabled</span>
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button class="btn-white btn btn-xs">View</button>
                                                <button class="btn-white btn btn-xs">Edit</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                            <div class="text-right">
                                {{ $clients->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {

            $('.footable').footable({ paginate:false });

        });
    </script>
@endsection
