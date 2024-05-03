<li class="nav-item">
    <a href="{{ url('/') }}/school_owner_dashboard" class="nav-link ">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Dashboard
            <span class="right badge badge-danger">Home</span>
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-cog"></i>
        <p>
            Configuration
            <i class="fas fa-angle-left right"></i>

        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('/') }}/School-List" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>School Registration</p>
            </a>
        </li>
       
       

    </ul>
</li>

{{-- <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
            Students
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('get-school-list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>School Wise Student</p>
            </a>
        </li>

       
    </ul>
</li> --}}
