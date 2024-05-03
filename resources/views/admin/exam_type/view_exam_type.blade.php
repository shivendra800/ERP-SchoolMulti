@extends('admin.layouts.layout')
@section('title', 'Exam Type')

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
                        <li class="breadcrumb-item active">Exam Type List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header  ">
                            <h3 class="card-title text-center">
                                <a href="{{ route('exam.type.add') }}"> <button type="button"
                                        class="btn btn-block bg-maroon color-palette btn-flat ">Add Exam Type</button></a>
                            </h3>
                        </div>
                    </div>


                    <div class="card">
                        <div class=" card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Exam Type List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 ">

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Name</th>
                                            <th>Exam Passing Percentage</th>
                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $exam)
                                            <tr>
                                                <td class="bg-primary">{{ $key + 1 }}</td>
                                                <td> {{ $exam->name }}</td>
                                                <td> {{ $exam->passing_percantage_st }}%</td>
                                                <td>
                                                    <a href="{{ route('exam.type.edit', $exam->id) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <a href="{{ route('exam.type.delete', $exam->id) }}"
                                                        class="btn btn-danger" id="delete">Delete</a>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
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



   




@endsection
