@extends('admin.layouts.layout')

@section('title', 'View Assign Teacher Subject')

@section('content')
    <section class="content-header">
        <div class="container-fluid">

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
                    <h1>View Assign Teacher Subject </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">View Assign Teacher Subject</li>

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
								<a href="{{ url('/') }}/TeacherAssign-subject-add">
									 <button type="button" class="btn btn-block bg-maroon  color-palette btn-flat ">Add Assign Teacher Subject</button>
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
                                                            <th>Teacher ID</th>
                                                            <th>Teacher Name</th>
                                                            <th >Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($allData as $key => $assign)
                                                            <tr class="text-center">
                                                                <td class="bg-primary">{{ $key + 1 }}</td>
                                                                <td > {{ $assign['staff_member_id'] }}</td>
                                                                <td> {{ $assign['name'] }}</td>
                                                                <td>
                                                                    {{-- <a href="{{ route('assign.teachersubject.edit', $assign['id']) }}"
                                                                        class="btn btn-info">Edit</a> --}}
                                                                    <a href="{{url('/')}}/view-details-assign-techsub/{{ $assign['id'] }}"
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
