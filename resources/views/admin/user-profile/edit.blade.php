@extends('admin.layout.master')

@push('extra_styles')
<style>
    .img_zoom{
        height : 50px;
        width : 50px;
    }

    .img_zoom:hover{
        transform: scale(3.0,3.0);
    }
</style>
@endpush

@section('title')
    User Profiles | Edit
@endsection

@section('content')

    <section class="content-header">
        <h1>
            User Profiles
            <a href="{{route('admin.user-profile.index')}}" class="btn btn-xs btn-primary"> <i class="fa fa-menu"></i>Back to Index</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
            <li class="active">User Profiles</li>
        </ol>
    </section>
    <br/>
    <!-- Main content -->
    @include('admin.layout.includes.errors')
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                {{Form::model($user, ['route'=>['admin.user-profile.update',$user->id],'method'=>'PATCH','role'=>'form','enctype'=>'multipart/form-data'])}}
                @include('admin.user-profile.partials._form', ['btnText'=>'Update Values'])
                {{Form::close()}}

            </div>
        </div>
    </div>
@endsection

{{--User Profile Edit--}}
{{--User Profile Delete--}}
{{--View Composer--}}
{{--Custom Facade--}}
{{--Crop Image--}}
{{--Laravel Intervention, Install It--}}






