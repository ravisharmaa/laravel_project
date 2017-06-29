@if(Session::has('message'))
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-success alert-dismissable">
            {{Session::get('message')}}
        </div>
    </div>
@endif