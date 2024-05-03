@extends('admin.layouts.layout')
@section('title', 'Class List')

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
                        <li class="breadcrumb-item active">Class List</li>
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
                            <h3 class="card-title">class List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 " style="background-color: white">

                            <form method="post" action="{{ url('/Store-Student-Attendance') }}">
                                @csrf

                                <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <div class="row bg-secondary p-2">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Attendance Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="date" required=""
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">      

                                            <h5>Class Start Time<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="time" name="class_start_time" required=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">


                                            <h5>Class End Time <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="time" name="class_end_time" required=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <h5>Subject <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subject_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Subject
                                                    </option>
                                                    @foreach ($subjectes as $subject)
                                                        <option value="{{ $subject->subject_id }}">
                                                            {{ $subject['school_subject']['subject_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Section <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="section_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Section
                                                    </option>
                                                    @foreach ($sectiones as $section)
                                                        <option value="{{ $section->id }}">{{ $section->section_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        </div> <!-- // End Col md 6 -->

                                    </div> <!-- // end Row  -->


                                    <thead class="bg-primary">
                                        <tr>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Student
                                                Name</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Student
                                                ID</th>
                                            <th colspan="3" class="text-center"
                                                style="vertical-align: middle; width: 30%">Attendance Status</th>
                                        </tr>

                                        <tr>
                                            <th class="text-center btn present_all"
                                                style="display: table-cell; background-color: green">Present</th>
                                            <th class="text-center btn leave_all"
                                                style="display: table-cell; background-color: red">Leave</th>
                                            <th class="text-center btn absent_all"
                                                style="display: table-cell; background-color: yellow">Absent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $key => $student)
                                            <tr id="div{{ $student->id }}" class="text-center">
                                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                                <input type="hidden" name="class_id" value="{{ $student->class }}">
                                                <td class="bg-primary">{{ $key + 1 }}</td>
                                                <td>{{ $student->s_name }}</td>
                                                <td>{{ $student->student_id }}</td>
                                                <td colspan="3">
                                                    <div class="switch-toggle switch-3 switch-candy">

                                                        <input name="attend_status{{ $key }}" type="radio"
                                                            value="Present" id="present{{ $key }}"
                                                            checked="checked">
                                                        <label for="present{{ $key }}">Present</label>

                                                        <input name="attend_status{{ $key }}" value="Leave"
                                                            type="radio" id="leave{{ $key }}">
                                                        <label for="leave{{ $key }}">Leave</label>

                                                        <input name="attend_status{{ $key }}" value="Absent"
                                                            type="radio" id="absent{{ $key }}">
                                                        <label for="absent{{ $key }}">Absent</label>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center bg-info p-2">
                                    <input type="submit" class="btn btn-rounded btn-warning mb-5" value="Update">
                                    <a href="{{ url('/Class-Wise-Student-Attendance') }}"
                                        class="btn btn-rounded btn-success mb-5">Back</a>
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
@section('script')


    <script>
        function ActiveRow(id) {
            console.log(id);
            swal({
                    title: "Are you sure?",
                    text: "You want to change status",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#active_form_" + id).submit();
                    } else {
                        //swal("Your data is safe!");
                    }
                });

        }

        function InActiveRow(id) {
            swal({
                    title: "Are you sure?",
                    text: "You want to change status",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#inactive_form_" + id).submit();
                    } else {
                        //swal("Your data is safe!");
                    }
                });

        }

        function deleteRow(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#delete_form_" + id).submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }
    </script>


@endsection
