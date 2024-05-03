
<li class="nav-item">
    <a href="{{ url('/') }}/teacher-dashboard" class="nav-link ">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Dashboard
            <span class="right badge badge-danger">Home</span>
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/') }}/view-teacher-wise-timetable" class="nav-link ">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Time Table 
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
            Student Attendance 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/')}}/Class-Wise-Student/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Class Wise Attendance</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/')}}/Class-Wise-Student-Attendance/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View  Attendance</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
            Content Section
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('Unit-List')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Unit Setup</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('ContentList-Classwise')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Upload content</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
           Marks
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('marks/entry/add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mark Entry</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('marks/entry/edit')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Update Mark</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('marks/report')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mark Report</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-sitemap"></i>
        <p>
            Leave 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/')}}/Leave-List" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave Request</p>
            </a>
        </li>
       
        <li class="nav-item">
            <a href="{{url('/')}}/approvel-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave Approvel List</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/')}}/cancel-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave Cancel List</p>
            </a>
        </li>
         
       
    </ul>
</li>

<li class="nav-item">
    <a href="{{ url('/') }}/view-teacher-attendance" class="nav-link ">
        <i class="nav-icon fas fa-th"></i>
        <p>
           Attendance
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/') }}/view-teacher-salary" class="nav-link ">
        <i class="nav-icon fas fa-th"></i>
        <p>
        Salary
        </p>
    </a>
</li>

