@extends('admin.layouts.layout')
@section('title', 'Attendance SubjectWise')
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
                    <h1>Attendance SubjectWise </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance SubjectWise</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                  



                    <div class="card">
                        <div class=" card-header ">


                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 ">

                            <div class="row">
                                
                                @foreach ($getassignstdata as $getassignstdata)
                                    <div class="col-md-4">

                                        <div class="card card-widget widget-user">
                                            <!-- Add the bg color to the header using any of the bg-* classes -->
                                            <a href="{{url('/')}}/student-subjectwise-attendance/{{$getassignstdata['class_id']}}/{{$getassignstdata['subject_id']}}">
                                                <div class="widget-user-header "  style="background-color: #c6256f;">
                                                   <strong><h1 class="btn btn-warning text-bold w-100">{{ $getassignstdata['subject_name'] }}</h1></strong> 
                                                   
                                                </div>
                                            </a>
                                            <div class="widget-user-image">
                                                <img class="img-circle elevation-2"
                                                    src="{{ url('/') }}/admin_assets/online-education-concept_1284-44.png"
                                                    alt="User Avatar">
                                            </div>
                                           
                                        </div>
                                    </div>
                                @endforeach

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