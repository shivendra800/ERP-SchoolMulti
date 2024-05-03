@extends('admin.layouts.layout')
@section('title', 'Student TimeTable class wise List')

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

            {{-- error meg with close button---- --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- error meg --}}


            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student TimeTable ClassWise List</li>
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


                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title ">View Class Wise Your  Time Table</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="row">

                            @foreach ($getStudentassigndata as $alldata)
                                <div class="col-md-4">
                                    <!-- Widget: user widget style 2 -->
                                    <div class="card card-widget widget-user-2">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header " style="background-color: #24d8c97a;">
                                            <div class="widget-user-image">
                                                <img class="img-circle elevation-2" src="{{url('/')}}/admin_assets/dist/img/dummy-user.png"
                                                    alt="User Avatar">
                                            </div>
                                            <!-- /.widget-user-image -->
                                            <h3 class="widget-user-desc">Class Name:- {{$alldata['student_class']['class_name']}}</h3>
                                            <h5 class="widget-user-desc">Subject Name:- {{$alldata['school_subject']['subject_name']}}</h5>
                                            <h5 class="widget-user-desc">Section Name:- {{$alldata['getsection']['section_name']}}</h5>
                                            <h5 class="widget-user-desc">Stream Name:- {{$alldata['getstream']['stream_name']}}</h5>
                                            <h5 class="widget-user-desc">Teacher Name:- {{$alldata['getteacher']['name']}}</h5>
                                         
                                        </div>
                                        <div class="card-footer p-0">
                                            <ul class="nav flex-column" style="    background-color: black;">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Week Days <span class="float-right btn btn-danger bg-danger">{{$alldata['getweek']['week_name']}}</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Class Start Time <span class="float-right btn btn-danger bg-info">{{$alldata['class_start_time']}}</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Class End Time<span
                                                            class="float-right btn btn-danger bg-success">{{$alldata['class_end_time']}}</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Class Preriod <span class="float-right btn btn-danger bg-danger">{{$alldata['class_period']}}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>
                            @endforeach

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
