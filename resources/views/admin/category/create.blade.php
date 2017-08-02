@extends('admin.layouts.master')

@section('page_title', 'Add New Category - ')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Add New Category</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Add New Category</strong>
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
                    <div class="ibox-title row">
                        <h5>Category Information</h5>
                    </div>
                    <div class="ibox-content border-bottom row">
                        @include('admin.layouts._notice')
                        <div class="col-md-7 col-md-offset-2">
                        {!! Form::open([
                            'method' => 'POST',
                            'route' => ['admin.category.store'],
                            'class' => 'form-horizontal validate_form',
                            'files'=> true
                            ]
                        ) !!}

                            <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Please enter name" required>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="description" cols="30" rows="4" class="form-control"  required></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Icon Type</label>
                                <div class="col-sm-10">
                                    <select name="icon_type" id="icon_type" class="select2 icon_type">
                                        <option value="">Please Select</option>
                                        <option value="image">Image</option>
                                        <option value="font">Font Icon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group icon_font_div" style="display: none;">
                                <label class="col-sm-2 control-label" id="icon_font">Font Icon</label>
                                <div class="col-sm-10">
                                    <select name="icon_font" id="icon_font" class="fa custom-select icon_font">
                                        <option value="">Please Select</option>
                                        <?php
                                        $selected = '';
                                        foreach ($icons as $key => $icon) {
                                            $icon  = str_replace('/','',$icon['unicode']);
                                            echo '<option '.($selected==$key ? 'selected' : '').' value="'.$key.'">&#x'.$icon.' &nbsp;&nbsp;'.$key.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group icon_image_div" style="display: none;">
                                <label class="col-sm-2 control-label">Icon Image</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="icon_image" class="icon_image">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>


                            <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="icon_type" class="select2 status">
                                        <option value="">Please Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>


                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <a href="{{ route('admin.category.index') }}"><button class="btn btn-white" type="button">Cancel</button></a>
                                    <button class="btn btn-primary btn-submit" type="submit">Save changes</button>
                                </div>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
<script>
    $(function () {
        $(".validate_form").validate();

        $('.custom-select').select2({
            theme: "default fa"
        });

        $(".icon_type").on("select2:select", function (e) {
            var select_val = $(e.currentTarget).val();

            if(select_val == 'font') {
                $('.icon_font_div').show();
                $('.icon_image_div').hide();
            }
            if(select_val == 'image') {
                $('.icon_image_div').show();
                $('.icon_font_div').hide();
            }
            if(select_val == ''){
                $('.icon_image_div').hide();
                $('.icon_font_div').hide();
            }
        });
    });

    $('.btn-submit').on('click', function (e) {
        e.preventDefault();
        var icon_type = $('.icon_type').val();

        if(icon_type == 'image') {
            var icon_image = $('.icon_image').val();
            if(icon_image.length < 1){
                swal('Ooops...!', 'Image icon is required' , 'error');
                return false;
            }
        }

        if(icon_type == 'font') {
            var icon_font = $('.icon_font').val();

            if(icon_font == ''){
                swal('Ooops...!', 'Font icon is required' , 'error');
                return false;
            }
        }

        if(icon_type == '' || icon_type.length < 1) {
            swal('Oops!... ', 'Please select Icon Type', 'error');
            return false;
        }
        $('form').submit();
    });
</script>
@stop


@section('stylesheets')
    <link href="{{ asset('css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
@stop