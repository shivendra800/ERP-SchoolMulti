@extends('admin.layouts.layout')
@section('title', 'Student Mark List')

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
                        <li class="breadcrumb-item active">Student Mark List</li>
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
                            <h3 class="card-title">Student Mark List</h3>
                           

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">


                           <table id="example1" class=" text-center table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead class="bg-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Year</th>
                                        <th>Subject</th>
                                        <th>Mark</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getmarkexamtype as $index => $getmarkexamtypes)
                                        <tr class="bg-warning ">
                                           
                                            <td class="">{{ $index + 1 }}</td>
                                            <td class="text-danger text-bold">{{ $getmarkexamtypes['student_year']['name'] }}</td>
                                            <td class="text-danger text-bold">{{ $getmarkexamtypes['subject']['subject_name'] }}</td>
                                            <td class="text-center text-bold ">{{ $getmarkexamtypes['marks'] }}</td>
                                           
                                            

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
