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
                                                        @if (old('year_id') == $year->id)
                                                            <option value={{ $year->id }} selected>{{ $year->name }}
                                                            </option>
                                                        @else
                                                            <option value={{ $year->id }}>{{ $year->name }}</option>
                                                        @endif

                                                        {{-- <option {{(old('year_id')==$year->id)? 'selected':''}} value="{{ $year->id }}" >{{ $year->name }}</option> --}}
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
                                                        @if (old('class_id') == $class->id)
                                                            <option value="{{ $class->id }}" selected>
                                                                {{ $class->class_name }}</option>
                                                        @else
                                                            <option value="{{ $class->id }}">{{ $class->class_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->



                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="text-white">Select stream <span
                                                    class="text-danger">*</span></label>

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
                                            <label for="" class="text-white">Select Section <span
                                                    class="text-danger">*</span></label>

                                            <div class="controls">
                                                <select name="Section_id" id="Section_id" required=""
                                                    class="form-control">
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
                <div class="col-md-12">

                    <div class="card " style="background-color: rgb(151, 178, 142);">
                        <div class="card-body">


                            <div class="row">



                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label class="text-white"> Search Year <span class="text-danger"> </span></label>
                                        <div class="controls">
                                            @if ($alldata->count() > 0)
                                                <button
                                                    class="btn btn-primary w-100">{{ $alldata[0]['getyears']['name'] }}</button>
                                            @else
                                                <button class="btn btn-danger w-100">That Year is Not Present In
                                                    TimeTable</button>
                                            @endif

                                        </div>

                                    </div>
                                </div> <!-- End Col md 3 -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-white">Search Class <span class="text-danger"> </span></label>
                                        <div class="controls">
                                            @if ($alldata->count() > 0)
                                                <button
                                                    class="btn btn-primary w-100">{{ $alldata[0]['student_class']['class_name'] }}</button>
                                            @else
                                                <button class="btn btn-danger w-100">That Year wise Class is Not Present In
                                                    TimeTable</button>
                                            @endif
                                        </div>
                                    </div>
                                </div> <!-- End Col md 3 -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-white">Search Stream <span class="text-danger"> </span></label>
                                        <div class="controls">
                                            @if ($alldata->count() > 0)
                                                <button
                                                    class="btn btn-primary w-100">{{ $alldata[0]['getstream']['stream_name'] }}</button>
                                            @else
                                                <button class="btn btn-danger w-100">That Year wise Class and Stream is Not
                                                    Present In TimeTable</button>
                                            @endif
                                        </div>
                                    </div>
                                </div> <!-- End Col md 3 -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-white">Search Section <span class="text-danger">
                                            </span></label>
                                        <div class="controls">
                                            @if ($alldata->count() > 0)
                                                <button
                                                    class="btn btn-primary w-100">{{ $alldata[0]['getsection']['section_name'] }}</button>
                                            @else
                                                <button class="btn btn-danger w-100">That Year wise Class , Stream and Section is
                                                    Not Present In TimeTable</button>
                                            @endif
                                        </div>
                                    </div>
                                </div> <!-- End Col md 3 -->




                            </div><!--  end row -->










                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- /.container-fluid -->
    </section>

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

                            <div class="table-responsive">
                                <div class="card-body p-4 " >


                                    <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                        aria-describedby="example1_info">

                                        <!--<thead>-->
                                        <!--    <tr class="text-center bg-primary">-->
                                        <!--        <th>ID</th>-->
                                        <!--        <th class="text">Period-1</th>-->
                                        <!--        <th class="text">Period-2</th>-->
                                        <!--        <th class="text">Period-3</th>-->
                                        <!--        <th class="text">Period-4</th>-->
                                        <!--        <th class="text">Period-6</th>-->
                                        <!--        <th class="text">Period-7</th>-->
                                        <!--        <th class="text">Period-8</th>-->
                                        <!--    </tr>-->
                                        <!--</thead>-->
                                        <tbody class="bg-secondary">

                                            <tr class="text-center bg-secondary">
                                                <td>Monday</td>

                                                @if ($alldata->count() > 0)
                                                    @foreach ($alldata as $index => $alldataweekaa)
                                                       
                                                        <td class="text-center ">
                                                              <strong class="btn btn-info">

                                                                <div class="relative attachment-left-space"><i
                                                                        class="fa fa-book"></i>
                                                                    Period:
                                                                    {{ $alldataweekaa['class_period'] }}
                                                                </div>
                                                            </strong>

                                                            <strong class="btn btn-warning">

                                                                <div class="relative attachment-left-space"><i
                                                                        class="fa fa-book"></i>
                                                                    Subject:
                                                                    {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                                </div>
                                                            </strong>
                                                            <strong class="btn btn-danger">
                                                                <div class="relative attachment-left-space"><i
                                                                        class="fa fa-book"></i>
                                                                    Assign Teacher:
                                                                    {{ $alldataweekaa['getteacher']['name'] }}
                                                                </div>
                                                            </strong>
                                                            <strong class="btn btn-success">
                                                                <div class="relative attachment-left-space"><i
                                                                        class="fa fa-book"></i>
                                                                    Class Room Number :
                                                                    {{ $alldataweekaa['room_no'] }}
                                                                </div>
                                                            </strong>
                                                            <strong class="btn btn-warning">

                                                                <div class="relative attachment-left-space"><i
                                                                        class="fa fa-book"></i>
                                                                    Start Time:
                                                                    {{ $alldataweekaa['class_start_time'] }}
                                                                </div>
                                                                <div class="relative attachment-left-space"><i
                                                                        class="fa fa-book"></i>
                                                                    End Time:
                                                                    {{ $alldataweekaa['class_end_time'] }}
                                                                </div>
                                                            </strong>

                                                        </td>
                                                     
                                                    @endforeach
                                                   
                                                @else
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                @endif


                                            </tr>
                                            {{-- @endforeach --}}

                                            <tr class="text-center bg-secondary">
                                                <td>Tuesday</td>
                                                @if ($alldataweek2->count() > 0)
                                                    @foreach ($alldataweek2 as $index => $alldataweekaa)
                                                    <td class="text-center ">
                                                          <strong class="btn btn-info">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Period:
                                                        {{ $alldataweekaa['class_period'] }}
                                                    </div>
                                                    </strong>

                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject:
                                                                {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-danger">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Assign Teacher:
                                                                {{ $alldataweekaa['getteacher']['name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-success">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Class Room Number :
                                                                {{ $alldataweekaa['room_no'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Start Time:
                                                                {{ $alldataweekaa['class_start_time'] }}
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                End Time:
                                                                {{ $alldataweekaa['class_end_time'] }}
                                                            </div>
                                                        </strong>

                                                    </td>
                                                    @endforeach
                                                @else
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="text-center bg-secondary">
                                                <td>Wednesday</td>
                                                @if ($alldataweek3->count() > 0)
                                                    @foreach ($alldataweek3 as $index => $alldataweekaa)
                                                    <td class="text-center ">
                                                          <strong class="btn btn-info">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Period:
                                                        {{ $alldataweekaa['class_period'] }}
                                                    </div>
                                                   </strong>

                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject:
                                                                {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-danger">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Assign Teacher:
                                                                {{ $alldataweekaa['getteacher']['name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-success">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Class Room Number :
                                                                {{ $alldataweekaa['room_no'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Start Time:
                                                                {{ $alldataweekaa['class_start_time'] }}
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                End Time:
                                                                {{ $alldataweekaa['class_end_time'] }}
                                                            </div>
                                                        </strong>

                                                    </td>
                                                    @endforeach
                                                @else
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="text-center bg-secondary">
                                                <td>Thursday</td>
                                                @if ($alldataweek4->count() > 0)
                                                    @foreach ($alldataweek4 as $index => $alldataweekaa)
                                                    <td class="text-center ">
                                                          <strong class="btn btn-info">

                                                    <div class="relative attachment-left-space"><i
                                                            class="fa fa-book"></i>
                                                        Period:
                                                        {{ $alldataweekaa['class_period'] }}
                                                    </div>
                                                   </strong>

                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject:
                                                                {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-danger">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Assign Teacher:
                                                                {{ $alldataweekaa['getteacher']['name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-success">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Class Room Number :
                                                                {{ $alldataweekaa['room_no'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Start Time:
                                                                {{ $alldataweekaa['class_start_time'] }}
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                End Time:
                                                                {{ $alldataweekaa['class_end_time'] }}
                                                            </div>
                                                        </strong>

                                                    </td>
                                                    @endforeach
                                                @else
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="text-center bg-secondary">
                                                <td>Friday</td>
                                                @if ($alldataweek5->count() > 0)
                                                    @foreach ($alldataweek5 as $index => $alldataweekaa)
                                                    <td class="text-center ">
                                                          <strong class="btn btn-info">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Period:
                                                                {{ $alldataweekaa['class_period'] }}
                                                            </div>
                                                        </strong>

                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject:
                                                                {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-danger">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Assign Teacher:
                                                                {{ $alldataweekaa['getteacher']['name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-success">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Class Room Number :
                                                                {{ $alldataweekaa['room_no'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Start Time:
                                                                {{ $alldataweekaa['class_start_time'] }}
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                End Time:
                                                                {{ $alldataweekaa['class_end_time'] }}
                                                            </div>
                                                        </strong>

                                                    </td>
                                                    @endforeach
                                                @else
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>

                                            <tr class="text-center bg-secondary">
                                                <td>Saturday</td>
                                                @if ($alldataweek6->count() > 0)
                                                    @foreach ($alldataweek6 as $index => $alldataweekaa)
                                                    <td class="text-center ">
                                                          <strong class="btn btn-info">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Period:
                                                                {{ $alldataweekaa['class_period'] }}
                                                            </div>
                                                        </strong>

                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject:
                                                                {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-danger">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Assign Teacher:
                                                                {{ $alldataweekaa['getteacher']['name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-success">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Class Room Number :
                                                                {{ $alldataweekaa['room_no'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Start Time:
                                                                {{ $alldataweekaa['class_start_time'] }}
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                End Time:
                                                                {{ $alldataweekaa['class_end_time'] }}
                                                            </div>
                                                        </strong>

                                                    </td>
                                                    @endforeach
                                                @else
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="text-center bg-secondary">
                                                <td>Sunday</td>

                                                @if ($alldataweek7->count() > 0)
                                                    @foreach ($alldataweek7 as $index => $alldataweekaa)
                                                    <td class="text-center ">
                                                          <strong class="btn btn-info">

                                                        <div class="relative attachment-left-space"><i
                                                                class="fa fa-book"></i>
                                                            Period:
                                                            {{ $alldataweekaa['class_period'] }}
                                                        </div>
                                                    </strong>

                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject:
                                                                {{ $alldataweekaa['school_subject']['subject_name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-danger">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Assign Teacher:
                                                                {{ $alldataweekaa['getteacher']['name'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-success">
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Class Room Number :
                                                                {{ $alldataweekaa['room_no'] }}
                                                            </div>
                                                        </strong>
                                                        <strong class="btn btn-warning">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Start Time:
                                                                {{ $alldataweekaa['class_start_time'] }}
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                End Time:
                                                                {{ $alldataweekaa['class_end_time'] }}
                                                            </div>
                                                        </strong>

                                                    </td>
                                                    @endforeach
                                                @else
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="attachment-block block-b-noraml clearfix">
                                                            <b class="text text-danger"><i
                                                                    class="fa fa-times-circle text-danger"></i> Not
                                                                Scheduled</b><br>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
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
    <!-- /.content -->

@endsection
@section('script')







@endsection
