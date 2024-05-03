










@extends('admin.layouts.layout')

@section('title', 'Update Student Mark')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Student Mark</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Update Student Mark</li>

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
                                            <form method="post" action="{{ route('marks.entry.update') }}">
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
            
            
            
                                                    @if(Auth::guard('admin')->user()->type == "Teacher")
                        
                                                    <div class="col-md-3">
            
                                                        <div class="form-group">
                                                            <h5>Class <span class="text-danger"> </span></h5>
                                                            <div class="controls">
                                                                <select name="class_id" id="class_id" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">Select Class
                                                                    </option>
                                                                    @foreach ($classes as $class)
                                                                    <option value="{{ $class['student_class']['id'] }}">{{ $class['student_class']['class_name'] }}
                                                                        </option>
                                                                    @endforeach
            
                                                                </select>
                                                            </div>
                                                        </div>
            
                                                    </div> <!-- End Col md 3 -->
                                                    @else
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
                                                    @endif
            
            
            
                                                    <div class="col-md-3">
            
                                                        <div class="form-group">
                                                            <h5>Subject <span class="text-danger"> </span></h5>
                                                            <div class="controls">
                                                                <select name="assign_subject_id" id="assign_subject_id" required=""
                                                                    class="form-control">
                                                                    <option selected="">Select Subject</option>
            
            
                                                                </select>
                                                            </div>
                                                        </div>
            
                                                    </div> <!-- End Col md 3 -->
            

                                                    <div class="col-md-3">
														<div class="form-group">
															<label for="">Select Section <span class="text-danger">*</span></label>
															 
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

													<div class="col-md-3">
														<div class="form-group">
															<label for="">Select stream <span class="text-danger">*</span></label>
															 
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

                                              

            
                                                    <div class="col-md-3">
            
                                                        <div class="form-group">
                                                            <h5>Exam Type <span class="text-danger"> </span></h5>
                                                            <div class="controls">
                                                                <select name="exam_type_id" id="exam_type_id" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">Select Class
                                                                    </option>
                                                                    @foreach ($exam_types as $exam)
                                                                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                                    @endforeach
            
                                                                </select>
                                                            </div>
                                                        </div>
            
                                                    </div> <!-- End Col md 3 -->
            
            
            
            
            
                                                    <div class="col-md-3">
            
                                                        <a id="search" class="btn btn-primary" name="search"> Search</a>
            
                                                    </div> <!-- End Col md 3 -->
                                                </div><!--  end row -->
            
            
                                                <!--  ////////////////// Mark Entry table /////////////  -->
            
            
                                                <div class="row d-none" id="marks-entry">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-striped" style="width: 100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID No</th>
                                                                    <th>Student Name </th>
                                                                    <th>Father Name </th>
                                                                    <th>Gender</th>
                                                                    <th>Total Subject Mark</th>
                                                                    <th>Passing Mark</th>
                                                                    <th>Marks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="marks-entry-tr">
            
                                                            </tbody>
            
                                                        </table>
                                                        <input type="submit" class="btn btn-rounded btn-primary" value="Update">
            
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
            var totalsub_marks = $('#totalsub_marks').val();
            var passing_marks = $('#passing_marks').val();
            var stream_id = $('#stream_id').val();
            var Section_id = $('#Section_id').val();
            $.ajax({
                url: "{{ route('student.edit.getstudents') }}",
                type: "GET",
                data: {
                    'year_id': year_id,
                    'class_id': class_id,
                    'Section_id': Section_id,
                    'stream_id': stream_id,
                    'exam_type_id': exam_type_id,
                    'assign_subject_id': assign_subject_id,
                },
                success: function(data) {
                    $('#marks-entry').removeClass('d-none');
                    var html = '';
                    $.each(data, function(key, v) {
                        html +=
                            '<tr>' +
                            '<td>' + v.student.student_id +
                            '<input type="hidden" name="student_id[]" value="' + v.student_id +
                            '"> <input type="hidden" name="id_no[]" value="' + v.student.student_id +
                            '"> </td>' +
                            '<td>' + v.student.s_name + '</td>' +
                            '<td>' + v.student.father_name + '</td>' +
                            '<td>' + v.student.s_gender + '</td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="totalsub_marks[]" value=" ' +
                            v.totalsub_marks + ' " ></td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="passing_marks[]" value=" ' +
                            v.passing_marks + ' " ></td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="marks[]" value=" ' +
                            v.marks + ' " ></td>' +
                            '</tr>';
                    });
                    html = $('#marks-entry-tr').html(html);
                }
            });
        });
    </script>


    <!--   // for get Student Subject  -->

    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#class_id', function() {
                var class_id = $('#class_id').val();
                $.ajax({
                    url: "{{ route('marks.getsubject') }}",
                    type: "GET",
                    data: {
                        class_id: class_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Subject</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.school_subject.id + '">' + v.school_subject
                                .subject_name + '</option>';
                        });
                        $('#assign_subject_id').html(html);
                    }
                });
            });
        });
    </script>



@endsection
