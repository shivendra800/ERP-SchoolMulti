@extends('admin.layouts.layout')
@section('title', 'Class Wise Attendance  List')

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
                    <li class="breadcrumb-item active">Class Wise Attendance  List</li>
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
                        <h3 class="card-title">Class Wise Attendance  List</h3>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body p-4 " style="background-color: white">



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
                                @foreach($details as $key => $value )
                                <tr>
                                    <td class="bg-primary">{{ $key+1 }}</td>
                                    <td> {{ $value['getstudent']['s_name'] }}</td>
                                    <td> {{ $value['getstudent']['student_id'] }}</td>
                                    <td> {{ $value['getclass']['class_name'] }}</td>
                                    <td> {{ $value['getsubject']['subject_name'] }}</td>
                                    <td> {{ $value['getsection']['section_name'] }}</td>
                                    
                                    <td> {{ date('d-m-Y', strtotime($value->date)) }}</td>
                                    <td> {{ $value->attend_status }}</td>


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
