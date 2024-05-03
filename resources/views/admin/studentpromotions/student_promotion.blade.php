@extends('admin.layouts.layout')
@section('title','Student Promotion')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Promotion</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Student Promotion</li>

                </ol>
            </div>



        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid bg-info ">
        <div class="row p-3">


            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header card-header bg-navy disabled color-palette">
                        <h3 class="card-title">Student <strong>Search</strong></h3>
                    </div>
                    <div class="card-body text-dark">
                        <div class="row">
                            <div class="col-12">
                                <div class="box bb-3 border-warning">
                                
        
                                    <div class="box-body">
                                        <form method="post" action="{{ url('student-promotion-store') }}">
                                            @csrf
                                            <div class="row">
        
        
        
                                                <div class="col-md-3">
        
                                                    <div class="form-group">
                                                        <h5>Year <span class="text-danger"> </span></h5>
                                                        <div class="controls">
                                                            <select name="year_id" id="year_id" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select Year
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                                @endforeach
        
                                                            </select>
                                                        </div>
                                                    </div>
        
                                                </div> <!-- End Col md 3 -->
        
                                                <div class="col-md-3">
        
                                                    <div class="form-group">
                                                        <h5>Class <span class="text-danger"> </span></h5>
                                                        <div class="controls">
                                                            <select name="class_id" id="class_id" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select Class
                                                                </option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id}}">{{ $class->class_name }}
                                                                    </option>
                                                                @endforeach
        
                                                            </select>
                                                        </div>
                                                    </div>
        
                                                </div> <!-- End Col md 3 -->
        
                                                <div class="col-md-3 mt-4">
        
                                                    <a id="search" class="btn btn-primary" name="search"> Search</a>
        
                                                </div> <!-- End Col md 3 -->
                                            </div><!--  end row -->
        
        
                                            <!--  ////////////////// Mark Entry table /////////////  -->
        
        
                                            <div class="row d-none" id="marks-entry">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped" style="width: 100%">
                                                        <thead>
                                                            <tr class="bg-warning text-center">
                                                                <th>ID No</th>
                                                                <th>Student Name </th>
                                                                <th>Current Class</th>
                                                                <th>Current Stream</th>
                                                                <th>Current Section</th>
                                                                <th>Addmission Date</th>
                                                                <th>Remark</th>
                                                                <th>Promoted Class</th>
                                                                <th>Promoted Stream</th>
                                                                <th>Promoted Section</th>
                                                                <th>Promoted Year</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class=" text-center" id="marks-entry-tr">
        
                                                        </tbody>
        
                                                    </table>
                                                    <input type="submit" class="btn btn-rounded btn-primary" value="Promote Student">
        
                                                </div>
        
                                            </div>
        
        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var assign_subject_id = $('#assign_subject_id').val();
        var exam_type_id = $('#exam_type_id').val();
        $.ajax({
            url: "{{ route('student.marks.getstudents') }}",
            type: "GET",
            data: {
                'year_id': year_id,
                'class_id': class_id
            },
            success: function(data) {
                $('#marks-entry').removeClass('d-none');
                console.log(data);
                var html = '';
                $.each(data, function(key, v) {
                    html +=
                        '<tr>' +
                        '<td>' + v.student.student_id +
                        '<input type="hidden" name="student_id[]" value="' + v.student_id +
                        '"> <input type="hidden" name="id_no[]" value="' + v.student
                        .student_id +
                        '"> </td>' +
                        '<td>' + v.student.s_name + '</td>' +
                       
                        '<td>' + v.student_class.class_name + '</td>' +
                        '<td>' + v.student_stream.stream_name + '</td>' +
                        '<td>' + v.student_section.section_name + '</td>' +
                        '<td>' + v.student.s_addmission_date + '</td>' +
                        '<td>' + v.remark + '</td>' +
                        '<td> <select name="class_id[]" id="class_id" required="" class="form-control"><option value="' + v.class_id +'" selected="">Select Class</option>@foreach ($classes as $class)<option value="{{ $class->id}}">{{ $class->class_name }}</option>@endforeach</select></td>' +
                        '<td> <select name="stream[]" id="stream_id" required="" class="form-control"><option value="' + v.stream +'" selected="">Select Stream</option>@foreach ($stream as $stream)<option value="{{ $stream->id}}">{{ $stream->stream_name }}</option>@endforeach</select></td>' +
                        '<td> <select name="section[]" id="section" required="" class="form-control"><option value="' + v.section +'" selected="">Select Section</option>@foreach ($section as $section)<option value="{{ $section->id}}">{{ $section->section_name }}</option>@endforeach</select></td>' +
                        '<td> <select name="year_id[]" id="year_id" required="" class="form-control"><option value="' + v.year_id +'" selected="">Select Year</option>@foreach ($years as $years)<option value="{{ $years->id}}">{{ $years->name }}</option>@endforeach</select></td>' +
                        '</tr>';
                });
                html = $('#marks-entry-tr').html(html);
            }
        });
    });
</script>



<!--   // for get Student Subject  -->


@endsection


