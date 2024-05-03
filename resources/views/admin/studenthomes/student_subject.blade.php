@extends('admin.layouts.layout')
@section('title', 'Uploaded Content List')
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
                    <h1>Uploaded Content List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Uploaded Content List</li>
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
                                <a href="#"> <button type="button"
                                        class="btn btn-block bg-maroon color-palette btn-flat ">All Content Subject
                                        Wise</button></a>
                            </h3>
                        </div>
                    </div>



                    <div class="card">
                        <div class=" card-header ">


                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 ">

                            <div class="row">
                                @foreach ($getassignstdata as $getassignstdata)
                                    <div class="col-md-4">

                                        <div class="card card-widget widget-user">
                                            
                                            <a href="{{url('/')}}/student-subjectwise-unit/{{$getassignstdata['class_id']}}/{{$getassignstdata['subject_id']}}">
                                                <div class="widget-user-header bg-info">
                                                   <strong><h1 class="">{{ $getassignstdata['subject_name'] }}</h1></strong> 
                                                   
                                                </div>
                                            </a>
                                            <div class="widget-user-image">
                                                <img class="img-circle elevation-2"
                                                    src="{{ url('/') }}/admin_assets/online-education-concept_1284-44.png"
                                                    alt="User Avatar">
                                            </div>
                                           
                                        </div>
                                    </div>
                                   <br><br><br><br><br><br><br><br>
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
