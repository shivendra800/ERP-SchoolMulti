@extends('admin.layouts.layout')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Welcome <span class="text-primary"> {{Auth::guard('admin')->user()->type}}</span> Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  {{-- <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-
      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content --> --}}

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$staffpresttodaycount}}</h3>

              <p>This Month Present</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('view-teacher-attendance')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3> {{$staffLeavetodaycount}}</h3>

              <p>This Month Leave</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('view-teacher-attendance')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$staffAbsenttodaycount}}</h3>

              <p>This Month Absent</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('view-teacher-attendance')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-12">


            <!-- /.card -->

            <div class="card">
                <div class="card-header bg-navy disabled color-palette">
                    <h3 class="card-title ">Time Table </h3>

                </div>
                <!-- /.card-header -->

                <div class="row">

                    <div class="table-responsive">
                        <div class="card-body p-4 " >


                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                {{-- <thead>
                                    <tr class="text-center bg-primary">
                                        <th>ID</th>
                                        <th class="text">Period-1</th>
                                        <th class="text">Period-2</th>
                                        <th class="text">Period-3</th>
                                        <th class="text">Period-4</th>
                                        <th class="text">Period-6</th>
                                        <th class="text">Period-7</th>
                                        <th class="text">Period-8</th>
                                    </tr> --}}
                                </thead>
                                <tbody class="bg-secondary">

                                    <tr class="text-center bg-secondary">
                                        <td>Monday</td>

                                        @if ($gettimetsbledataclass->count() > 0)
                                            @foreach ($gettimetsbledataclass as $index => $alldataweekaa)
                                               
                                                <td class="text-center ">
                                                  <strong class="btn btn-info">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Period:
                                                        {{ $alldataweekaa['class_period'] }}
                                                    </div>
                                                </strong>

                                                    <strong class="btn btn-warning">

                                                        <div class="relative attachment-left-space"><i
                                                                class="fa fa-book"></i>
                                                            Subject:
                                                            {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                        </div>
                                                    </strong>
                                                    
                                                    <strong class="btn btn-danger">
                                                        <div class="relative attachment-left-space">
                                                                Assign Class: {{ $alldataweekaa['student_class']['class_name'] }}
                                                                Assign Section:  {{ $alldataweekaa['getsection']['section_name'] }} 
                                                                Assign Stream:  {{ $alldataweekaa['getstream']['stream_name'] }}
                                                        </div>
                                                    </strong>
                                                    <strong class="btn btn-success">
                                                        <div class="relative attachment-left-space"><i
                                                                class="fa fa-book"></i>
                                                            Class Room Number :
                                                            {{ $alldataweekaa['room_no'] }}
                                                        </div>
                                                    </strong>
                                                    <strong class="btn btn-warning">

                                                        <div class="relative attachment-left-space"><i
                                                                class="fa fa-book"></i>
                                                            Start Time:
                                                            {{ $alldataweekaa['class_start_time'] }}
                                                        </div>
                                                        <div class="relative attachment-left-space"><i
                                                                class="fa fa-book"></i>
                                                            End Time:
                                                            {{ $alldataweekaa['class_end_time'] }}
                                                        </div>
                                                    </strong>

                                                </td>
                                             
                                            @endforeach
                                           
                                        @else
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                        @endif


                                    </tr>
                                   

                                    <tr class="text-center bg-secondary">
                                        <td>Tuesday</td>
                                        @if ($gettimetsbledataclass2->count() > 0)
                                            @foreach ($gettimetsbledataclass2 as $index => $alldataweekaa)
                                            <td class="text-center ">
                                              <strong class="btn btn-info">

                                                <div class="relative attachment-left-space"><i
                                                        class="fa fa-book"></i>
                                                    Period:
                                                    {{ $alldataweekaa['class_period'] }}
                                                </div>
                                            </strong>

                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Subject:
                                                        {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-danger">
                                                  <div class="relative attachment-left-space">
                                                          Assign Class: {{ $alldataweekaa['student_class']['class_name'] }}
                                                          Assign Section:  {{ $alldataweekaa['getsection']['section_name'] }} 
                                                          Assign Stream:  {{ $alldataweekaa['getstream']['stream_name'] }}
                                                  </div>
                                              </strong>
                                                <strong class="btn btn-success">
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Class Room Number :
                                                        {{ $alldataweekaa['room_no'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Start Time:
                                                        {{ $alldataweekaa['class_start_time'] }}
                                                    </div>
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        End Time:
                                                        {{ $alldataweekaa['class_end_time'] }}
                                                    </div>
                                                </strong>

                                            </td>
                                            @endforeach
                                        @else
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                    <tr class="text-center bg-secondary">
                                        <td>Wednesday</td>
                                        @if ($gettimetsbledataclass3->count() > 0)
                                            @foreach ($gettimetsbledataclass3 as $index => $alldataweekaa)
                                            <td class="text-center ">

                                                  <strong class="btn btn-info">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Period:
                                                        {{ $alldataweekaa['class_period'] }}
                                                    </div>
                                                </strong>

                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Subject:
                                                        {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-danger">
                                                  <div class="relative attachment-left-space">
                                                          Assign Class: {{ $alldataweekaa['student_class']['class_name'] }}
                                                          Assign Section:  {{ $alldataweekaa['getsection']['section_name'] }} 
                                                          Assign Stream:  {{ $alldataweekaa['getstream']['stream_name'] }}
                                                  </div>
                                              </strong>
                                                <strong class="btn btn-success">
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Class Room Number :
                                                        {{ $alldataweekaa['room_no'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Start Time:
                                                        {{ $alldataweekaa['class_start_time'] }}
                                                    </div>
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        End Time:
                                                        {{ $alldataweekaa['class_end_time'] }}
                                                    </div>
                                                </strong>

                                            </td>
                                            @endforeach
                                        @else
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                    <tr class="text-center bg-secondary">
                                        <td>Thursday</td>
                                        @if ($gettimetsbledataclass4->count() > 0)
                                            @foreach ($gettimetsbledataclass4 as $index => $alldataweekaa)
                                            <td class="text-center ">

                                                <strong class="btn btn-info">

                                                  <div class="relative attachment-left-space"><i
                                                          class="fa fa-book"></i>
                                                      Period:
                                                      {{ $alldataweekaa['class_period'] }}
                                                  </div>
                                              </strong>

                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Subject:
                                                        {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-danger">
                                                  <div class="relative attachment-left-space">
                                                          Assign Class: {{ $alldataweekaa['student_class']['class_name'] }}
                                                          Assign Section:  {{ $alldataweekaa['getsection']['section_name'] }} 
                                                          Assign Stream:  {{ $alldataweekaa['getstream']['stream_name'] }}
                                                  </div>
                                              </strong>
                                                <strong class="btn btn-success">
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Class Room Number :
                                                        {{ $alldataweekaa['room_no'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Start Time:
                                                        {{ $alldataweekaa['class_start_time'] }}
                                                    </div>
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        End Time:
                                                        {{ $alldataweekaa['class_end_time'] }}
                                                    </div>
                                                </strong>

                                            </td>
                                            @endforeach
                                        @else
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                    <tr class="text-center bg-secondary">
                                        <td>Friday</td>
                                        @if ($gettimetsbledataclass5->count() > 0)
                                            @foreach ($gettimetsbledataclass5 as $index => $alldataweekaa)
                                            <td class="text-center ">

                                                <strong class="btn btn-info">

                                                  <div class="relative attachment-left-space"><i
                                                          class="fa fa-book"></i>
                                                      Period:
                                                      {{ $alldataweekaa['class_period'] }}
                                                  </div>
                                              </strong>

                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Subject:
                                                        {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-danger">
                                                  <div class="relative attachment-left-space">
                                                          Assign Class: {{ $alldataweekaa['student_class']['class_name'] }}
                                                          Assign Section:  {{ $alldataweekaa['getsection']['section_name'] }} 
                                                          Assign Stream:  {{ $alldataweekaa['getstream']['stream_name'] }}
                                                  </div>
                                              </strong>
                                                <strong class="btn btn-success">
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Class Room Number :
                                                        {{ $alldataweekaa['room_no'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Start Time:
                                                        {{ $alldataweekaa['class_start_time'] }}
                                                    </div>
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        End Time:
                                                        {{ $alldataweekaa['class_end_time'] }}
                                                    </div>
                                                </strong>

                                            </td>
                                            @endforeach
                                        @else
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>

                                    <tr class="text-center bg-secondary">
                                        <td>Saturday</td>
                                        @if ($gettimetsbledataclass6->count() > 0)
                                            @foreach ($gettimetsbledataclass6 as $index => $alldataweekaa)
                                            <td class="text-center ">

                                                <strong class="btn btn-info">

                                                  <div class="relative attachment-left-space"><i
                                                          class="fa fa-book"></i>
                                                      Period:
                                                      {{ $alldataweekaa['class_period'] }}
                                                  </div>
                                              </strong>

                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Subject:
                                                        {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-danger">
                                                  <div class="relative attachment-left-space">
                                                          Assign Class: {{ $alldataweekaa['student_class']['class_name'] }}
                                                          Assign Section:  {{ $alldataweekaa['getsection']['section_name'] }} 
                                                          Assign Stream:  {{ $alldataweekaa['getstream']['stream_name'] }}
                                                  </div>
                                              </strong>
                                                <strong class="btn btn-success">
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Class Room Number :
                                                        {{ $alldataweekaa['room_no'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Start Time:
                                                        {{ $alldataweekaa['class_start_time'] }}
                                                    </div>
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        End Time:
                                                        {{ $alldataweekaa['class_end_time'] }}
                                                    </div>
                                                </strong>

                                            </td>
                                            @endforeach
                                        @else
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                    <tr class="text-center bg-secondary">
                                        <td>Sunday</td>

                                        @if ($gettimetsbledataclass7->count() > 0)
                                            @foreach ($gettimetsbledataclass7 as $index => $alldataweekaa)
                                            <td class="text-center ">

                                                  <strong class="btn btn-info">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Period:
                                                        {{ $alldataweekaa['class_period'] }}
                                                    </div>
                                                </strong>

                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Subject:
                                                        {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-danger">
                                                  <div class="relative attachment-left-space">
                                                          Assign Class: {{ $alldataweekaa['student_class']['class_name'] }}
                                                          Assign Section:  {{ $alldataweekaa['getsection']['section_name'] }} 
                                                          Assign Stream:  {{ $alldataweekaa['getstream']['stream_name'] }}
                                                  </div>
                                              </strong>
                                                <strong class="btn btn-success">
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Class Room Number :
                                                        {{ $alldataweekaa['room_no'] }}
                                                    </div>
                                                </strong>
                                                <strong class="btn btn-warning">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Start Time:
                                                        {{ $alldataweekaa['class_start_time'] }}
                                                    </div>
                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        End Time:
                                                        {{ $alldataweekaa['class_end_time'] }}
                                                    </div>
                                                </strong>

                                            </td>
                                            @endforeach
                                        @else
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="attachment-block block-b-noraml clearfix">
                                                    <b class="text text-danger"><i
                                                            class="fa fa-times-circle text-danger"></i> Not
                                                        Scheduled</b><br>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
    
@endsection
