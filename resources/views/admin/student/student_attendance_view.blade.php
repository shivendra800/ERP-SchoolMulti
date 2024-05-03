@extends('admin.layouts.layout')
@section('title', 'View Date Wise Attendance')

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
                    <li class="breadcrumb-item active">View Date Wise Attendance</li>
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
                        <h3 class="card-title">View Date Wise Attendance</h3>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body p-4 " style="background-color: white">



                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example1_info">
                            <thead class="bg-primary">
                                <th width="5%">SL</th>
                                <th>Date </th>
                                <th>Class Name </th>
                                <th>Subject Name </th>
                                <th>Section Name </th>
                                <th width="20%">Action</th>
                            </thead>
                            <tbody>
                                @foreach($allData as $key => $value )
                                <tr>
                                    <td class="bg-primary">{{ $key+1 }}</td>
                                    <td> {{ date('d-m-Y', strtotime($value->date)) }}</td>
                                    <td> {{ $value['getclass']['class_name'] }}</td>
                                    <td> {{ $value['getsubject']['subject_name']  }}</td>
                                    <td> {{ $value['getsection']['section_name']  }}</td>

                                    <td>
                                        <a href="{{ url('Edit-Student-Attendance',$value->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('Details-Student-Attendance',$value->id) }}" class="btn btn-danger">Details</a>

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
