@extends('admin.layout.master')
@section('title')
    Slider | Create
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Slider
            <a href="{{route('admin.slider.index')}}"
               class="btn btn-xs btn-primary"> <i class="fa fa-menu"></i>
                Slider Index</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <br/>
    <!-- Main content -->

    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                @include('admin.layout.includes.errors')
                {{Form::open(['route'=>'admin.slider.store','method'=>'POST',
                            'role'=>'form',
                            'enctype'=>'multipart/form-data'])}}

                    @include('admin.slider.partials._form',
                                ['btnText'=>'Save Values'])

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("#sliderImage").change(function () {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                console.log(e.target);
                $('#imgPreview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush






