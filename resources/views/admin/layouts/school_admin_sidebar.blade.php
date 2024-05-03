<li class="nav-item">
    <a href="{{ url('/') }}/school-admin-dashboard" class="nav-link ">
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
            <a href="{{url('/Class-List')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Class </p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{url('/FSD-List')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Update FSD</p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{url('Subject-List')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Subject</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('assign/subject/view')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Assign Class Subject</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('student/year/view')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Year</p>
            </a>
        </li>
        
       
        <li class="nav-item">
            <a href="{{url('exam/type/view')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Exam</p>
            </a>
        </li>
      
        <li class="nav-item">
            <a href="{{url('Fee-list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Fee</p>
            </a>
        </li>
       
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
            Students
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{-- <li class="nav-item">
            <a href="{{url('/')}}/add-edit-student-reg" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>New Addmission</p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{url('students/reg/view')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Student Regitration</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('student/idcard/view')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All ID Card</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('student-promotion')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Student Promotion</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('students/student-list-fee')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pay Fee</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('students/student-fee-report-byID')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Fee Report</p>
            </a>
        </li>
       
       
     
        {{-- <li class="nav-item">
            <a href="{{url('/')}}/student-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Student List</p>
            </a>
        </li> --}}
       
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-sitemap"></i>
        <p>
            Mark 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
      
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
        <i class="nav-icon fas fa-user"></i>
        <p>
            Staff 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/')}}/add-edit-staff-reg" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>New Registration</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/')}}/staff-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Staff List</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/')}}/Configure-Staff-Salary" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Configure Salary</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{url('/')}}/Staff-Salary-Report/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Salary Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('Teacher-Assign-Subject-List')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Assign Teacher Subject</p>
            </a>
        </li>
        
       
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-sitemap"></i>
        <p>
            Attendance 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/')}}/attendance/employee/view" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Staff Attendance</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/')}}/attendance/report/view" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Staff Attendance Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/')}}/student/report/view" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Std Attendance Report</p>
            </a>
        </li>
         
       
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
            Time Table
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('week-days')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Week-List</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('time-table')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Timetable</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('view-time-table-with-search')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Timetable</p>
            </a>
        </li> 

        <li class="nav-item">
            <a href="{{url('Update-time-table')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Update Timetable</p>
            </a>
        </li>

       
       
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-sitemap"></i>
        <p>
            Leave Request 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/')}}/staffLeave-List" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Staff Leave Request</p>
            </a>
        </li>
       
        <li class="nav-item">
            <a href="{{url('/')}}/StdLeave-List" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Std Leave Request</p>
            </a>
        </li>
         
       
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-sitemap"></i>
        <p>
            Generate Certificate
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/')}}/Generate-Certificate-List" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Compition Certificate</p>
            </a>
        </li>
       
        <li class="nav-item">
            <a href="{{url('/')}}/Character-Certificate" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Character/Transfer</p>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a href="{{url('/')}}/Transfer-Certificate" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Transfer Certificate</p>
            </a>
        </li> --}}
         
       
    </ul>
</li>


