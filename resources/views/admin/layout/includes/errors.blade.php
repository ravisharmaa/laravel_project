@if(Session::has('errors'))
    @foreach($errors->all() as $error)
        <span class="alert alert-danger">
            {{$error}}
        </span>
    @endforeach
@endif