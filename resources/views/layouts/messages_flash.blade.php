@if($message = Session::get('danger'))
    <div class="alert alert-danger">{{$message}}</div>
@endif

@if($message = Session::get('success'))
    <div class="alert alert-success">{{$message}}</div>
@endif