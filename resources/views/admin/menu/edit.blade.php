@extends('admin.layout.master')

@section('title')
    Menu | Edit
@endsection

@section('content')

    <section class="content-header">
        <h1>
            Menu
            <a href="{{route('admin.menu.index')}}" class="btn btn-xs btn-primary"> <i class="fa fa-menu"></i>Back to Index</a>
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
                {{Form::model($menu, ['route'=>['admin.menu.update',$menu->id],'method'=>'PATCH','role'=>'form'])}}
                @include('admin.menu.partials._form', ['btnText'=>'Update Values'])
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






