@extends('admin.layouts.master')

@section('page_title', 'Clients');

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Clients</h2>
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
                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th data-toggle="true">No. </th>
                                    <th>Name</th>
                                    <th data-hide="phone">Username</th>
                                    <th data-hide="phone">Email</th>
                                    <th data-hide="phone,tablet" >Quantity</th>
                                    <th data-hide="phone">Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Example product 1
                                    </td>
                                    <td>
                                        Model 1
                                    </td>
                                    <td>
                                        making it look like readable English.
                                    </td>
                                    <td>
                                        $50.00
                                    </td>
                                    <td>
                                        1000
                                    </td>
                                    <td>
                                        <span class="label label-primary">Enable</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Example product 2
                                    </td>
                                    <td>
                                        Model 2
                                    </td>
                                    <td>
                                        making it look like readable English.
                                    </td>
                                    <td>
                                        $40.00
                                    </td>
                                    <td>
                                        4300
                                    </td>
                                    <td>
                                        <span class="label label-primary">Enable</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Example product 3
                                    </td>
                                    <td>
                                        Model 3
                                    </td>
                                    <td>
                                        making it look like readable English.
                                    </td>
                                    <td>
                                        $22.00
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        <span class="label label-danger">Disabled</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {

            $('.footable').footable();

        });
    </script>
@endsection
