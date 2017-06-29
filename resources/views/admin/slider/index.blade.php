@extends('admin.layout.master')
@section('title')
    Slider | Index
@endsection


@section('content')
    <section class="content-header">
        <h1>
           Sliders
            <a href="{{route('admin.slider.create')}}" class="btn btn-xs btn-primary"> <i class="fa fa-plus"></i> Add Slider</a>
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
                        <th>Key</th>
                        <th>Value</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    @php $i=1; @endphp
                    @foreach($row as $data)
                        <tr>
                            <td>{{$i}}.</td>
                            <td>{{$data->key}}</td>
                            <td>{{$data->value}}</td>
                            <td><a href="#" class="status" data-attr="{{$data->id}}">
                                    <span class="label label-sm label-{{$data->status==1?'success':'danger'}}">
                                    {{$data->status==1?'Active':'In-Active'}}</span></a>
                            </td>
                            <td>
                                <a href="{{route('admin.slider.edit',$data->id)}}"
                                   class="btn btn-primary btn-xs">Edit</a>

                                <a href="{{route('admin.slider.delete',$data->id)}}"
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


