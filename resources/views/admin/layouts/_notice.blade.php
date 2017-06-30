@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {!! Session::get('error') !!}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {!! Session::get('success') !!}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif