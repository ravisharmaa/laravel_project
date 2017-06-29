@extends('admin.layout.master')

@section('title')
    Site Configs | Edit
@endsection

@section('content')

    <section class="content-header">
        <h1>
            Site Configs
            <a href="{{route('admin.site-configs.index')}}" class="btn btn-xs btn-primary"> <i class="fa fa-menu"></i>Site
                Configs Index</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <br/>
    <!-- Main content -->
    @include('admin.layout.includes.errors')
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                {{Form::model($site_config, ['route'=>['admin.site-configs.update',$site_config->id],'method'=>'PATCH','role'=>'form'])}}
                    @include('admin.site-configs.partials._form', ['btnText'=>'Update Values'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection






