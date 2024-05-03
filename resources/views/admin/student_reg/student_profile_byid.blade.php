@extends('admin.layouts.layout')
@section('title', 'Student Profile')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Student Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ url('/') }}/upload/student_images/{{ $student_data['student']->stu_image }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                {{ $student_data['student']->s_name }}({{ $student_data['student_year']->name }})</h3>

                            <p class="text-muted text-center ">Registration No: <span
                                    class="text-danger">{{ $student_data['student']->reg_no }}</span></p>
                            <p class="text-muted text-center ">Roll Number: <span
                                    class="text-success">{{ $student_data['student']->student_id }} </span></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Class</b> <a class="float-right">{{ $student_data['student_class']->class_name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Section</b> <a
                                        class="float-right">{{ $student_data['student_section']->section_name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Stream</b> <a
                                        class="float-right">{{ $student_data['student_stream']->stream_name }}</a>
                                </li>
                            </ul>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>
                                        Admission Date</b> <a
                                        class="float-right">{{ $student_data['student']->s_addmission_date }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Date Of Birth</b> <a class="float-right">{{ $student_data['student']->s_dob }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Category</b> <a class="float-right">{{ $student_data['student']->s_category }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile Number</b> <a
                                        class="float-right">{{ $student_data['student']->f_mobile_no }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Gender</b> <a class="float-right">{{ $student_data['student']->s_gender }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Religion</b> <a class="float-right">{{ $student_data['student']->s_relision }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $student_data['student']->email }}</a>
                                </li>


                            </ul>
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                {{ $student_data['getschooldata']->name }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{{ $student_data['student']->s_address }}</p>

                            <hr>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#Document"
                                        data-toggle="tab">Document</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#Attendance" data-toggle="tab">Attendance</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="Document">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="table-responsive" style="clear: both;">
                                            <table class="table table-striped table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th> Title </th>
                                                        <th class="mailbox-date text-right"> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Previous School TC(Transfer Certificate)</td>
                                                       
                                                        <td class="mailbox-date text-right">
                                                            <a href="{{ url('/') }}/document/previous_school_transfer_cerificate/{{ $student_data['student_more_detail']['previous_school_transfer_cerificate']}}"
                                                                class="btn btn-default btn-xs" data-toggle="tooltip" download=""
                                                                title="Download">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                            <a href="{{ url('/') }}/document/previous_school_transfer_cerificate/{{ $student_data['student_more_detail']['previous_school_transfer_cerificate']}}"
                                                            class="btn btn-default btn-xs" data-toggle="tooltip"
                                                            title="Download" target="_blank">
                                                            <i class="fa fa-eye">view</i>
                                                        </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Previous School CC(Character Certificate)</td>
                                                       
                                                        <td class="mailbox-date text-right">
                                                            <a href="{{ url('/') }}/document/previous_school_character_cerificate/{{ $student_data['student_more_detail']['previous_school_character_cerificate']}}"
                                                                class="btn btn-default btn-xs" data-toggle="tooltip" download=""
                                                                title="" data-original-title="Download">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                            <a href="{{ url('/') }}/document/previous_school_character_cerificate/{{ $student_data['student_more_detail']['previous_school_character_cerificate']}}"
                                                            class="btn btn-default btn-xs" data-toggle="tooltip" target="_blank"
                                                            title="" data-original-title="Download">
                                                            <i class="fa fa-eye">view</i>
                                                        </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- /.post -->
                                    </div>

                                </div>
                                <!-- /.tab-content -->
                                <div class="tab-pane" id="Attendance">
                                    <section class="content">
                                        <div class="container-fluid bg-info ">
                                            <div class="row p-3">
                                
                                
                                                <div class="col-md-12">
                                                    <div class="card card-primary">
                                                        <div class="card-header card-header bg-navy disabled color-palette">
                                                            <h3 class="card-title">Student Attendance Report</h3>
                                                        </div>
                                                        <div class="card-body text-dark">
                                                            <div class="row">
                                
                                
                                                                <div class="col-12">
                                                                    <div class="box bb-3 border-warning">
                                                                    
                                            
                                                                        <div class="box-body">
                                            
                                                                            <form method="post" action="{{url('/')}}/students/search-attendance_bydate/{{$student_data['student_id']}}" target="_blank">
                                                                                @csrf
                                                                                <div class="row">
                                            
                                            
                                            
                                                                                  
                                                        
                                            
                                                                                    <div class="col-md-3">
                                            
                                                                                        <div class="form-group">
                                                                                            <h5>Start Date<span class="text-danger">*</span></h5>
                                                                                            <div class="controls">
                                                                                                <input type="date" name="start_date" class="form-control"
                                                                                                    required="">
                                                                                            </div>
                                                                                        </div>
                                            
                                                                                    </div> <!-- End Col md 4 -->
                                            
                                                                                    <div class="col-md-3">
                                            
                                                                                        <div class="form-group">
                                                                                            <h5>End Date<span class="text-danger">*</span></h5>
                                                                                            <div class="controls">
                                                                                                <input type="date" name="end_date" class="form-control"
                                                                                                    required="">
                                                                                            </div>
                                                                                        </div>
                                            
                                                                                    </div> <!-- End Col md 4 -->
                                            
                                            
                                                                                   
                                            
                                            
                                                                                    <div class="col-md-2" style="padding-top: 25px;">
                                            
                                                                                        <input type="submit" class="btn btn-rounded btn-primary" value="Search">
                                            
                                            
                                                                                    </div> <!-- End Col md 4 -->
                                                                                </div><!--  end row -->
                                            
                                            
                                            
                                                                            </form>

                                                                            <div class="card">
                                                                                <div class="row">
                                                                                    <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example1_info">






                                                                                        <thead>
                                                                                            <tr class="bg-primary">
                                                                                                <th width="5%">SL</th>
                                                                                                <th>Name</th>
                                                                                                <th>ID No </th>
                                                                                                <th>Class</th>
                                                                                                <th>Subject</th>
                                                                                                <th>Section</th>
                                                                                                <th>Date </th>
                                                                                                <th>Attend Status</th>
                                                            
                                                            
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach($student_attendance as $key => $value )
                                                                                            <tr>
                                                                                                <td class="bg-primary">{{ $key+1 }}</td>
                                                                                                <td> {{ $value['getstudent']['s_name'] }}</td>
                                                                                                <td> {{ $value['getstudent']['student_id'] }}</td>
                                                                                                <td> {{ $value['getclass']['class_name'] }}</td>
                                                                                                <td> {{ $value['getsubject']['subject_name'] }}</td>
                                                                                                <td> {{ $value['getsection']['section_name'] }}</td>
                                                                                                
                                                                                                <td> {{ \Carbon\Carbon::parse($value->date)->isoFormat('MMM Do YYYY')}}</td>
                                                                                                <td> {{ $value->attend_status }}</td>
                                                            
                                                            
                                                                                            </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                            
                                            
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                  <!-- /.tab-pane -->
                               
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    

@endsection
