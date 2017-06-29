@extends('admin.layout.master')

@section('title')
    Site Configs | Index
@endsection


@section('content')
    <section class="content-header">
        <h1>
           Site Configs
            <a href="{{route('admin.site-configs.create')}}" class="btn btn-xs btn-primary"> <i class="fa fa-plus"></i> Add Site Configs</a>
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
                    @foreach($site_configs as $site_config)
                        <tr>
                            <td>{{$i}}.</td>
                            <td>{{$site_config->key}}</td>
                            <td>{{$site_config->value}}</td>
                            <td><a href="#" class="status" data-attr="{{$site_config->id}}">
                                    <span class="label label-sm label-{{$site_config->status==1?'success':'danger'}}">
                                    {{$site_config->status==1?'Active':'In-Active'}}</span></a>
                            </td>
                            <td>
                                <a href="{{route('admin.site-configs.edit',$site_config->id)}}"
                                   class="btn btn-primary btn-xs">Edit</a>

                                <a href="{{route('admin.site-configs.delete',$site_config->id)}}"
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

@push('extra-scripts')
<script type="text/javascript">
    $(function(){
        $(".status").click(function(e){
            e.preventDefault;
            var $this= $(this);
            var id= $this.attr('data-attr');
            var v_token = '{{ csrf_token() }}';
            var params = {'id':id,'_token':v_token};
            $.ajax({
                method:"POST",
                url: "{{route('admin.site-configs.status')}}",
                data: params,
                error: function (request) {
                    console.log(request.responseText);
                },

                success: function (data) {
                    var newData = jQuery.parseJSON(data);
                    if(newData.status==1){
                        $this.html('').html("<span class='label label-sm label-success'>Active</span>");
                    } else {
                        $this.html('').html("<span class='label label-sm label-danger'>In-Active</span>");
                    }
                }

            });
        });
    });
</script>

@endpush
