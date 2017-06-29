@extends('admin.layout.master')

@section('title')
    Menu | Index
@endsection

@push('extra_styles')
<style>
    .ui-menu {
        width: 150px;
        padding-left: 5px;
    }

</style>
@endpush


@section('content')
    <section class="content-header">
        <h1>
           Menu Management
            <a href="{{route('admin.menu.create')}}" class="btn btn-xs btn-primary"> <i class="fa fa-plus"></i> Add Menus</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <br/>
    <!-- Main content -->
    @include('admin.layout.includes.message')
    <div class="col-md-8 col-md-offset-2">
        <ul id="menu">
                @foreach($menus as $menu)
                <li><div><a href="{{route('admin.menu.edit',$menu->id)}}">{{$menu->name}}</a></div>
                    <ul>
                        @foreach($menu->allChildren as $menuChild)
                            <li><div><a href="{{route('admin.menu.edit',$menuChild->id)}}">{{$menuChild->name}}</a></div>
                            {{--<ul>--}}
                                {{--<li><div>Alternative</div></li>--}}
                                {{--<li><div>Classic</div></li>--}}
                            {{--</ul>--}}
                        </li>
                        @endforeach
                        {{--<li><div>Jazz</div>--}}
                            {{--<ul>--}}
                                {{--<li><div>Freejazz</div></li>--}}
                                {{--<li><div>Big Band</div></li>--}}
                                {{--<li><div>Modern</div></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    </ul>
                </li>
                @endforeach
        </ul>

    </div>

@endsection
@push('extra-scripts')
<script>
    $( function() {
        $( "#menu" ).menu();
    } );
</script>
@endpush

