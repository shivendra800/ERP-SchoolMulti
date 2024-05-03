@extends('admin.layouts.layout')
@section('title', 'Teacher Leave List')

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
                        <li class="breadcrumb-item active">Teacher Leave List</li>
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
                            <h3 class="card-title float-center">Teacher List</h3>
                            @if($teacherleavelist->count() > 0)
                            <a href="{{url('/')}}/get-school-wise-teacher/{{$teacherleavelist[0]['school_id']}}" class="btn btn-danger float-right">Back</a>
                            @endif
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body " style="overflow: auto;">

                            <div class="table-responsive">
                           <table id="example1" class="w-100 table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead class="bg-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Joining Date</th>
                                        <th>Leave Date</th>
                                        <th>Leave Reason</th>
                                       
                                        <th>Status</th>
                                       
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teacherleavelist as $index => $getstaff)
                                        <tr>

                                            
                                            <td class="bg-primary">{{ $index + 1 }}</td>
                                           
                                            <td class="text-danger text-bold">{{ $getstaff['staff_data']['staff_member_id'] }}</td>
                                           
                                            <td>{{ $getstaff['staff_data']['name'] }}</td>
                                            <td>{{ $getstaff['staff_data']['email'] }}</td>
                                            <td>{{ $getstaff['staff_data']['mobile'] }}</td>
                                            <td class="text-danger">{{ $getstaff['staff_data']['e_joining_date'] }}</td>
                                            <td> <span class="text-primary text-bold">{{ \Carbon\Carbon::parse($getstaff['leave_start_date'])->isoFormat('MMM Do YYYY')}}</span> - <span class="text-danger text-bold">{{ \Carbon\Carbon::parse($getstaff['leave_end_date'])->isoFormat('MMM Do YYYY')}}</span></td>
                                            <td>{{ $getstaff['leave_region'] }}</td>
                                           
                                            <td> <span class="btn btn-danger">{{ $getstaff['leave_status'] }}</span> </td>
                                          
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
@section('script')
    

@endsection

