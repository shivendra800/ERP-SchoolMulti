@extends('admin.layouts.layout')
@section('title', 'Subject Wise Attendance List')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Subject Wise Attendance List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class=" card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Subject Wise Attendance List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 " style="background-color: white">



                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">






                                <thead class="bg-primary">
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Student Name
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Student ID
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Class
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Subject
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Teacher Name
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Date
                                        </th>
                                        <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">
                                            Attendance Status</th>
                                    </tr>

                                    <tr class="">
                                        <th class="text-center btn present_all"
                                            style="display: table-cell; background-color: green">Present</th>
                                        <th class="text-center btn leave_all"
                                            style="display: table-cell; background-color: red">Leave</th>
                                        <th class="text-center btn absent_all bg-warning"
                                            style="display: table-cell; ">Absent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjectwiseAttendlist as $key => $value)
                                        <tr>
                                            <td class="bg-primary">{{ $key + 1 }}</td>
                                            <td> {{ $value['getstudent']['s_name'] }}</td>
                                            <td> {{ $value['getstudent']['student_id'] }}</td>
                                            <td> {{ $value['getclass']['class_name'] }}</td>
                                            <td> {{ $value['getsubject']['subject_name'] }}</td>
                                            <td> {{ $value['getteachername']['name'] }}</td>
                                            <td class="text-bold">
                                                {{ \Carbon\Carbon::parse($value['date'])->isoFormat('MMM Do YYYY') }}</td>


                                            <td colspan="3">
                                              
                                                    @if ($value['attend_status'] == 'Present')
                                                        
                                                        <div class="">
                                                            <button type="button" class="btn btn-success">Present</button>
                                                          </div>
                                                    @endif

                                                    @if ($value['attend_status'] == 'Leave')
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-danger">Leave</button>
                                                      </div>
                                                    @endif
                                                    @if ($value['attend_status'] == 'Absent')
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-warning">Absent</button>
                                                      </div>
                                                       
                                                    @endif
                                              
                                            </td>




                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
