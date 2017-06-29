<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Site Functions</li>
            <li class="{{Request::is('admin/dashboard') ? 'active':'' }} treeview">
                <a href="{{route('admin.dashboard.index')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="{{Request::is('admin/user-profile/*') ? 'active':''}} treeview">
                <a href="{{route('admin.user-profile.index')}}">
                    <i class="fa fa-users"></i>
                    <span>User Profiles</span>
                </a>
            </li>
            <li class="{{Request::is('admin/menu/*') ? 'active':''}} treeview">
                <a href="{{route('admin.menu.index')}}">
                    <i class="fa fa-list"></i>
                    <span>Menu Management</span>
                </a>
            </li>
            <li class="{{Request::is('admin/slider/*') ? 'active':''}} treeview">
                <a href="{{route('admin.slider.index')}}">
                    <i class="fa fa-photo"></i>
                    <span>Slider Management</span>
                </a>
            </li>
            <li class="{{Request::is('admin/site-configs/*') ? 'active':''}} header">Configs</li>
            <li><a href="{{route('admin.site-configs.index')}}"><i class="fa fa-cogs text-red"></i> <span>Site Configs</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>