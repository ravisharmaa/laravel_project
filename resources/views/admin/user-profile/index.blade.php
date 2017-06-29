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
    User Profile | Index
@endsection


@section('content')
    <section class="content-header">
        <h1>
           User Profile
            <a href="{{route('admin.user-profile.create')}}" class="btn btn-xs btn-primary"> <i class="fa fa-plus"></i> Add Users and Profiles</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <br/>
    <!-- Main content -->
    @include('admin.layout.includes.message')

    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>

                    @php $i=1; @endphp
                    @foreach($users as $user)
                    <tr>
                        <td>{{$i}}.</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>
                            <img src="{{route('admin.user-profile.serve', $user->user_image)}}"
                                 class="img-thumbnail img_zoom"/>
                        </td>
                        <td>
                            <a href="{{route('admin.user-profile.edit',$user->id)}}"
                               class="btn btn-primary btn-xs">Edit</a>

                            <a href="{{route('admin.user-profile.delete',$user->id)}}"
                               class="btn btn-warning btn-xs">Delete</a>
                        </td>

                    </tr>
                        @php $i++; @endphp
                    @endforeach

                    </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
        <!-- /.box -->
        <!-- /.box -->
    </div>
@endsection

