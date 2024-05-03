@extends('admin.layouts.layout')
@section('title', 'TimeTable class wise List')

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
                        <li class="breadcrumb-item active">TimeTable ClassWise List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card " style="background-color: darkmagenta;">
                    <div class="card-body">
                        <form action="{{ url('/') }}/view-time-table-with-search" method="post">
                            @csrf

                            <div class="row">



                                <div class="col-md-2">

                                    <div class="form-group">
                                        <label class="text-white">Year <span class="text-danger"> </span></label>
                                        <div class="controls">
                                            <select name="year_id" id="year_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Year
                                                </option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div> <!-- End Col md 3 -->



                                <div class="col-md-2">

                                    <div class="form-group">
                                        <label class="text-white">Class <span class="text-danger"> </span></label>
                                        <div class="controls">
                                            <select name="class_id" id="class_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Class
                                                </option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->class_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div> <!-- End Col md 3 -->



                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" class="text-white">Select stream <span class="text-danger">*</span></label>

                                        <div class="controls">
                                            <select name="stream_id" id="stream_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select
                                                    stream</option>
                                                @foreach ($getstreamas as $stram)
                                                    <option value="{{ $stram->id }}">
                                                        {{ $stram->stream_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" class="text-white">Select Section <span class="text-danger">*</span></label>

                                        <div class="controls">
                                            <select name="Section_id" id="Section_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select
                                                    Section</option>
                                                @foreach ($getsection as $section)
                                                    <option value="{{ $section->id }}">
                                                        {{ $section->section_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" class="text-white">Select Week Days <span class="text-danger">*</span></label>

                                        <div class="controls">
                                            <select name="week_id" id="week_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select
                                                    Section</option>
                                                @foreach ($getweek as $weeks)
                                                    <option value="{{ $weeks->id }}">
                                                        {{ $weeks->week_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->
                                </div>







                                <div class="col-md-2 mt-4">
                                    <div class="form-group">

                                    <button type="submit" class="btn btn-primary">Search</button>
                                    </div>

                                </div> <!-- End Col md 3 -->

                            </div><!--  end row -->
                        </form>


                        <!--  ////////////////// Mark Entry table /////////////  -->






                    </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">


                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title ">View Time Table With Search</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="row">

                            @foreach ($alldata as $alldata)
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
                                            <h5 class="widget-user-desc">Stream Name:- {{$alldata['getstream']['stream']}}</h5>
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
