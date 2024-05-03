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
                       src="{{url('/')}}/upload/student_images/{{$student_data['student']->stu_image}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$student_data['student']->s_name}}({{$student_data['student_year']->name}})</h3>

                <p class="text-muted text-center ">Registration No: <span class="text-danger">{{$student_data['student']->reg_no}}</span></p>
                <p class="text-muted text-center ">Roll Number: <span class="text-success">{{$student_data['student']->student_id}} </span></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Class</b> <a class="float-right">{{$student_data['student_class']->class_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Section</b> <a class="float-right">{{$student_data['student_section']->section_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Stream</b> <a class="float-right">{{$student_data['student_stream']->stream_name}}</a>
                  </li>
                </ul>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
          
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>
                        Admission Date</b> <a class="float-right">{{$student_data['student']->s_addmission_date}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Date Of Birth</b> <a class="float-right">{{$student_data['student']->s_dob}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Category</b> <a class="float-right">{{$student_data['student']->s_category}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Mobile Number</b> <a class="float-right">{{$student_data['student']->f_mobile_no}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Gender</b> <a class="float-right">{{$student_data['student']->s_gender}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Religion</b> <a class="float-right">{{$student_data['student']->s_relision}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{$student_data['student']->email}}</a>
                      </li>
                     

                  </ul>
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                    {{$student_data['getschooldata']->name}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{$student_data['student']->s_address}}</p>

                <hr>

             
            
              </div>
              <!-- /.card-body -->
            </div>
            {{-- <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    

                 

                   
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div> --}}
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
@endsection