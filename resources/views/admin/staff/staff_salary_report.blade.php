@extends('admin.layouts.layout')
@section('title', 'Staff Salary Report')

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
                        <li class="breadcrumb-item active">Staff Salary Report</li>
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
                            <h3 class="card-title">Staff Salary Report</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body " style="overflow: auto;">


                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead class="text-center bg-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Staff ID</th>
                                        <th>Staff Type</th>
                                        <th>Staff Name</th>
                                        <th>View Details</th>
                                      
                                    </tr>
                                </thead>
                                <tbody class="text-center bg-info">
                                    @foreach ($salaryreport as $index => $getstaff)
                                        <tr >

                                            <td>{{ $index + 1 }}</td>
                                            <td class="bg-warning"><a href="{{url('/')}}/Monthwise-Salary-Histroy/{{$getstaff['id']}}" class="text-danger ">{{ $getstaff['staff_member_id'] }}</a></td>
                                            <td>{{ $getstaff['staff_type'] }}</td>
                                            <td>{{ $getstaff['name'] }}</td>
                                            <td><a href="{{url('/')}}/Monthwise-Salary-Histroy/{{$getstaff['id']}}" title="View Salary Details history"><i class="fa fa-list text-danger" ></i></a></td>
                                                                                 
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
@section('script')
    <script>

    </script>

@endsection
