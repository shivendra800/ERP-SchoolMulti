{{-- 
<li class="nav-item">
    <a href="{{ url('/') }}/Student-dashboard" class="nav-link ">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Dashboard
            <span class="right badge badge-danger">Home</span>
        </p>
    </a>
</li> --}}
<li class="nav-item">
    <a href="{{url('st-profile')}}" class="nav-link">
        <i class="fas fa-edit nav-icon"></i>
        <p>
            Profile
            <span class="right badge badge-danger">Home</span>
        </p>
    </a>
   
</li>
<li class="nav-item">
    <a href="{{url('st-timetable')}}" class="nav-link">
        <i class="fas fa-edit nav-icon"></i>
        <p>
            TimeTable
           
        </p>
    </a>
   
</li>


<li class="nav-item">
    <a href="{{url('student-attendance-subjectwise')}}" class="nav-link">
        <i class="fas fa-edit nav-icon"></i>
        <p>
            Student Attendance 
           
        </p>
    </a>
   
</li>

<li class="nav-item">
    <a href="{{url('ContentList-Subjectwise')}}" class="nav-link">
        <i class="fas fa-edit nav-icon"></i>
        <p>Content</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{url('/')}}/Student-ExamType" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
           Marks
        </p>
    </a>
  
</li>


<li class="nav-item">
    <a href="{{url('/')}}/studentfee-paid-list" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
           Fee Report
        </p>
    </a>
  
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
            <a href="{{url('/')}}/stLeave-List" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave Request</p>
            </a>
        </li>
       
        <li class="nav-item">
            <a href="{{url('/')}}/Stdapprovel-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave Approvel List</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/')}}/Stdcancel-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave Cancel List</p>
            </a>
        </li>
         
       
    </ul>
</li>

