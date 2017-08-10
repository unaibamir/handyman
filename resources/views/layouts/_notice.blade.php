@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {!! Session::get('error') !!}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning" role="alert">
        {!! Session::get('warning') !!}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {!! Session::get('success') !!}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger text-left">
        <ul style="padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li style="font-size: 13px;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif