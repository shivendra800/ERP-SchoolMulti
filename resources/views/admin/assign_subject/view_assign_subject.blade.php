@extends('admin.layouts.layout')

@section('title', 'View Assign Subject')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Assign Subject </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">View Assign Subject</li>

                    </ol>
                </div>


            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title"> 
								<a href="{{ url('/') }}/assign/subject/add">
									 <button type="button" class="btn btn-block bg-maroon  color-palette btn-flat ">Add Assign Subject</button>
								</a>
							</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">



                                <div class="col-12">

                                    <div class="box">
                                       
                                        <!-- /.box-header -->
                                        <div class="box-body ">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="bg-primary text-center">
                                                        <tr>
                                                            <th width="5%">SL</th>
                                                            <th>Class Name</th>
                                                            <th width="25%">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($allData as $key => $assign)
                                                            <tr class="text-center">
                                                                <td class="bg-primary">{{ $key + 1 }}</td>
                                                                <td> {{ $assign['student_class']['class_name'] }}</td>
                                                                <td>
                                                                    <a href="{{ route('assign.subject.edit', $assign->class_id) }}"
                                                                        class="btn btn-info">Edit</a>
                                                                    <a href="{{ route('assign.subject.details', $assign->class_id) }}"
                                                                        class="btn btn-primary">Details</a>

                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot>

                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->


                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
