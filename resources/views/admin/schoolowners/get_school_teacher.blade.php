@extends('admin.layouts.layout')
@section('title', 'Staff List')

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
                        <li class="breadcrumb-item active">Staff List</li>
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
                            <h3 class="card-title">Staff List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body" style="overflow: auto;">


                           <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead class="bg-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Staff ID</th>
                                        <th>Staff Type</th>
                                        <th>Staff Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Joining Date</th>
                                        <th>Details</th>
                                        <th>Leave</th>
                                        <th>Attendance</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getteacherall as $index => $getstaff)
                                        <tr>
                                           
                                            <td class="bg-primary">{{ $index + 1 }}</td>
                                            <td class="text-danger text-bold">{{ $getstaff['staff_member_id'] }}</td>
                                            <td>{{ $getstaff['staff_type'] }}</td>
                                            <td>{{ $getstaff['name'] }}</td>
                                            <td>{{ $getstaff['email'] }}</td>
                                            <td>{{ $getstaff['mobile'] }}</td>
                                            <td class="text-danger">{{ $getstaff['e_joining_date'] }}</td>

                                           <td>
                                                <div style="display:inline-flex;">
                                                    <a target="_blank" title="Details in pdf" href="{{ url('staff-reg/details',$getstaff['id']) }}"   class=""><i class="fa fa-eye "></i></a>
                                                </div>
                                            </td>

                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a target="_blank" title="Leave Details " href="{{url('/')}}/get-schoolwise-teacherleave/{{$getstaff->school_id}}/{{$getstaff['id']}}"   class=""><i class="fa fa-list ">Leave</i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a target="_blank" title="Leave Details " href="{{url('/')}}/get-schoolwise-teacherattendance/{{$getstaff->school_id}}/{{$getstaff['id']}}"   class=""><i class="fa fa-list ">Attendance</i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a target="_blank" title="Leave Details " href="{{url('/')}}/get-schoolwise-teachersalary/{{$getstaff->school_id}}/{{$getstaff['id']}}"   class=""><i class="fa fa-list ">Salary</i></a>
                                                </div>
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


