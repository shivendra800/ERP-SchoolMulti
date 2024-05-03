@extends('admin.layouts.layout')
@section('title', 'Class Wise Attendance List Edit')

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
                    <li class="breadcrumb-item active">Class Wise Attendance List Edit</li>
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
                        <h3 class="card-title">Class Wise Attendance List Edit</h3>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body p-4 " style="background-color: white">

                        <form method="post" action="{{url('/')}}/Edit-Store-Student-Attendance/{{$editData['0']['id']}}">
                            @csrf

                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example1_info">
                                <div class="row bg-danger p-2">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Attendance Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="date"  class="form-control" value="{{ $editData['0']['date'] }}">
                                    </div>
                                </div>
                            </div> <!-- // End Col md 6 -->
                            <div class="col-md-4"></div>
                        </div> <!-- // end Row  -->

                                <thead class="bg-primary">
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Student List</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Student ID</th>
                                        <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>
                                    </tr>

                                    <tr>
                                        <th class="text-center btn present_all" style="display: table-cell; background-color: green">Present</th>
                                        <th class="text-center btn leave_all" style="display: table-cell; background-color: red">Leave</th>
                                        <th class="text-center btn absent_all" style="display: table-cell; background-color: yellow">Absent</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach($editData as $key => $data)

                                    <tr id="div{{$data->id}}" class="text-center">
                                        <input type="hidden" name="student_id[]" value="{{ $data->student_id }}">
                                        <input type="hidden" name="class_id" value="{{ $data->class_id }}">
                                        <input type="hidden" name="subject_id" value="{{ $data->subject_id }}">
                                        <input type="hidden" name="section_id" value="{{ $data->section_id }}">
                                        <input type="hidden" name="class_start_time" value="{{ $data->class_start_time }}">
                                        <input type="hidden" name="class_end_time" value="{{ $data->class_end_time }}">
                                        <td class="bg-primary">{{ $key+1  }}</td>
                                        <td>{{ $data['getstudent']['s_name'] }}</td>
                                        <td>{{ $data['getstudent']['student_id'] }}</td>



                                        <td colspan="3">
                                            <div class="switch-toggle switch-3 switch-candy">

                                                <input name="attend_status{{$key}}" type="radio" value="Present" id="present{{$key}}" checked="checked" {{ ($data->attend_status == 'Present')?'checked':'' }}>
                                                <label for="present{{$key}}">Present</label>

                                                <input name="attend_status{{$key}}" value="Leave" type="radio" id="leave{{$key}}" {{ ($data->attend_status == 'Leave')?'checked':'' }}>
                                                <label for="leave{{$key}}">Leave</label>

                                                <input name="attend_status{{$key}}" value="Absent" type="radio" id="absent{{$key}}" {{ ($data->attend_status == 'Absent')?'checked':'' }}>
                                                <label for="absent{{$key}}">Absent</label>

                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center bg-info p-2">
                                <input type="submit" class="btn btn-rounded btn-warning mb-5"
                                value="Update">
                                <a href="{{ url('/Class-Wise-Student-Attendance') }}" class="btn btn-rounded btn-success mb-5">Back</a>
                            </div>
                        </form>
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
