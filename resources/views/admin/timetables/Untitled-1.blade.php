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
                <div class="col-12">


                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title ">View Time Table With Search</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="row">

                            <div class="table-responsive">
                                <table   id="example1" class=" table table-stripped  table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th class="text">Monday</th>
                                            <th class="text">Tuesday</th>
                                            <th class="text">Wednesday</th>
                                            <th class="text">Thursday</th>
                                            <th class="text">Friday</th>
                                            <th class="text">Saturday</th>
                                            <th class="text">Sunday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                            {{-- monday --}}
                                            <td class="text" width="14%">
                                                @if ($alldata->count() > 0)
                                                    @foreach ($alldata as $alldata)
                                                        <div class="attachment-block attachment-block-normal clearfix">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject: {{ $alldata['school_subject']['subject_name'] }}
                                                            </div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-clock-o"></i>
                                                                {{ $alldata['class_start_time'] }} <b
                                                                    class="text text-center">-</b>
                                                                <strong
                                                                    class="">{{ $alldata['class_end_time'] }}</strong>
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Period:
                                                                {{ $alldata['class_period'] }}</div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Room No.:
                                                                {{ $alldata['room_no'] }}</div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Teacher Name:
                                                                {{ $alldata['getteacher']['name'] }}</div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="attachment-block block-b-noraml clearfix">
                                                        <b class="text text-danger"><i
                                                                class="fa fa-times-circle text-danger"></i> Not
                                                            Scheduled</b><br>
                                                    </div>
                                                @endif
                                            </td>
                                            {{-- end monday --}}

                                            {{-- Tuesday --}}
                                            <td class="text" width="14%">

                                                @if ($alldataweek2->count() > 0)
                                                    @foreach ($alldataweek2 as $alldata)
                                                        <div class="attachment-block attachment-block-normal clearfix">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject: {{ $alldata['school_subject']['subject_name'] }}
                                                            </div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-clock-o"></i>
                                                                {{ $alldata['class_start_time'] }} <b
                                                                    class="text text-center">-</b>
                                                                <strong
                                                                    class="">{{ $alldata['class_end_time'] }}</strong>
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Period:
                                                                {{ $alldata['class_period'] }}</div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Room No.:
                                                                {{ $alldata['room_no'] }}</div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Teacher Name:
                                                                {{ $alldata['getteacher']['name'] }}</div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="attachment-block block-b-noraml clearfix">
                                                        <b class="text text-danger"><i
                                                                class="fa fa-times-circle text-danger"></i> Not
                                                            Scheduled</b><br>
                                                    </div>
                                                @endif
                                            </td>{{-- End Tuesday --}}
                                            {{-- wednesday --}}
                                            <td class="text" width="14%">
                                                @if ($alldataweek3->count() > 0)
                                                    @foreach ($alldataweek3 as $alldata)
                                                        <div class="attachment-block attachment-block-normal clearfix">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject: {{ $alldata['school_subject']['subject_name'] }}
                                                            </div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-clock-o"></i>
                                                                {{ $alldata['class_start_time'] }} <b
                                                                    class="text text-center">-</b>
                                                                <strong
                                                                    class="">{{ $alldata['class_end_time'] }}</strong>
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Period:
                                                                {{ $alldata['class_period'] }}</div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Room No.:
                                                                {{ $alldata['room_no'] }}</div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Teacher Name:
                                                                {{ $alldata['getteacher']['name'] }}</div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="attachment-block block-b-noraml clearfix">
                                                        <b class="text text-danger"><i
                                                                class="fa fa-times-circle text-danger"></i> Not
                                                            Scheduled</b><br>
                                                    </div>
                                                @endif
                                            </td>{{-- end  wednesday --}}
                                            {{-- thursday --}}
                                            <td class="text" width="14%">

                                                @if ($alldataweek4->count() > 0)
                                                    @foreach ($alldataweek4 as $alldata)
                                                        <div class="attachment-block attachment-block-normal clearfix">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject: {{ $alldata['school_subject']['subject_name'] }}
                                                            </div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-clock-o"></i>
                                                                {{ $alldata['class_start_time'] }} <b
                                                                    class="text text-center">-</b>
                                                                <strong
                                                                    class="">{{ $alldata['class_end_time'] }}</strong>
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Period:
                                                                {{ $alldata['class_period'] }}</div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Room No.:
                                                                {{ $alldata['room_no'] }}</div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Teacher Name:
                                                                {{ $alldata['getteacher']['name'] }}</div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="attachment-block block-b-noraml clearfix">
                                                        <b class="text text-danger"><i
                                                                class="fa fa-times-circle text-danger"></i> Not
                                                            Scheduled</b><br>
                                                    </div>
                                                @endif
                                            </td> {{-- end thursday --}}
                                            {{-- Friday --}}
                                            <td class="text" width="14%">

                                                @if ($alldataweek5->count() > 0)
                                                    @foreach ($alldataweek5 as $alldata)
                                                        <div class="attachment-block attachment-block-normal clearfix">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject: {{ $alldata['school_subject']['subject_name'] }}
                                                            </div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-clock-o"></i>
                                                                {{ $alldata['class_start_time'] }} <b
                                                                    class="text text-center">-</b>
                                                                <strong
                                                                    class="">{{ $alldata['class_end_time'] }}</strong>
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Period:
                                                                {{ $alldata['class_period'] }}</div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Room No.:
                                                                {{ $alldata['room_no'] }}</div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Teacher Name:
                                                                {{ $alldata['getteacher']['name'] }}</div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="attachment-block block-b-noraml clearfix">
                                                        <b class="text text-danger"><i
                                                                class="fa fa-times-circle text-danger"></i> Not
                                                            Scheduled</b><br>
                                                    </div>
                                                @endif
                                            </td>{{-- end Friday --}}
                                            {{-- Saturday --}}
                                            <td class="text" width="14%">

                                                @if ($alldataweek6->count() > 0)
                                                    @foreach ($alldataweek6 as $alldata)
                                                        <div class="attachment-block attachment-block-normal clearfix">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject: {{ $alldata['school_subject']['subject_name'] }}
                                                            </div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-clock-o"></i>
                                                                {{ $alldata['class_start_time'] }} <b
                                                                    class="text text-center">-</b>
                                                                <strong
                                                                    class="">{{ $alldata['class_end_time'] }}</strong>
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Period:
                                                                {{ $alldata['class_period'] }}</div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Room No.:
                                                                {{ $alldata['room_no'] }}</div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Teacher Name:
                                                                {{ $alldata['getteacher']['name'] }}</div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="attachment-block block-b-noraml clearfix">
                                                        <b class="text text-danger"><i
                                                                class="fa fa-times-circle text-danger"></i> Not
                                                            Scheduled</b><br>
                                                    </div>
                                                @endif
                                            </td> {{-- Saturday --}}
                                            {{-- Sunday --}}
                                            <td class="text" width="14%">

                                                @if ($alldataweek7->count() > 0)
                                                    @foreach ($alldataweek7 as $alldata)
                                                        <div class="attachment-block attachment-block-normal clearfix">

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-book"></i>
                                                                Subject: {{ $alldata['school_subject']['subject_name'] }}
                                                            </div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-clock-o"></i>
                                                                {{ $alldata['class_start_time'] }} <b
                                                                    class="text text-center">-</b>
                                                                <strong
                                                                    class="">{{ $alldata['class_end_time'] }}</strong>
                                                            </div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Period:
                                                                {{ $alldata['class_period'] }}</div>
                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Room No.:
                                                                {{ $alldata['room_no'] }}</div>

                                                            <div class="relative attachment-left-space"><i
                                                                    class="fa fa-building"></i> Teacher Name:
                                                                {{ $alldata['getteacher']['name'] }}</div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="attachment-block block-b-noraml clearfix">
                                                        <b class="text text-danger"><i
                                                                class="fa fa-times-circle text-danger"></i> Not
                                                            Scheduled</b><br>
                                                    </div>
                                                @endif
                                            </td>
                                            {{-- end Sunday --}}
                                        </tr>
                                        
                                    </tbody>
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
    <!-- /.content -->

@endsection
@section('script')







@endsection
