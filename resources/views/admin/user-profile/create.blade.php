@extends('admin.layout.master')

@section('title')
    User Profiles | Create
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
                {{Form::open(['route'=>'admin.user-profile.save','method'=>'POST','role'=>'form','enctype'=>'multipart/form-data'])}}
                    @include('admin.user-profile.partials._form', ['btnText'=>'Save Values'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection






