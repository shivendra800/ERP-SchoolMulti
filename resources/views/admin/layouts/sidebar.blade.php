<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-orange elevation-4" style=" background-color: #2d1741fc;">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex bg-danger">
            <div class="image pt-2">
                <img src="{{ asset('admin_assets/dist/img/dummy-user.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info pt-2">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->type }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2" >
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false" >
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
               @if(Auth::guard('admin')->user()->type == "Super-Admin")
                <li class="nav-item">
                    <a href="{{ url('/') }}/Dashboard" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">Home</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}/admin" class="nav-link @if(Request::segment(1)=="admin") active @endif  @if(Request::segment(1)=="add-edit-admin") active @endif">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                             School Admin Owner

                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ url('/') }}/School-Subscription" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                             Subscription

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}/School-unSubscription" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                             UnSubscribed

                        </p>
                    </a>
                </li>
                @endif
                @if (Auth::guard('admin')->user()->type == 'Admin')
                    @include('admin.layouts.admin_sidebar')
                @endif

                @if (Auth::guard('admin')->user()->type == 'School-Admin')
                    @include('admin.layouts.school_admin_sidebar')
                @endif

                @if (Auth::guard('admin')->user()->type == 'Teacher')
                @include('admin.layouts.teacher_sidebar')
                @endif
                @if (Auth::guard('admin')->user()->type == 'Student')
                @include('admin.layouts.student_side')
                @endif

                









            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
