@extends('admin.layouts.layout')

@section('title', 'Edit-Assign-TeacherSubject')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Assign TeacherSubject </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Edit Assign TeacherSubject</li>

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
                            <h3 class="card-title">Edit Assign TeacherSubject</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">

                                    <form method="post"
                                        action="{{ route('update.assign.teachersubject', $editData[0]->teacher_id) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3"></div>

                                            <div class="col-md-6 card p-2 text-dark">
                                                <div class="add_item">



                                                    <div class="form-group">
                                                        <label>Teacher Name <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="teacher_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Teacher ID</option>
                                                                @foreach ($teachers as $teacher)
                                                                    <option value="{{ $teacher->id }}"
                                                                        {{ $editData['0']->teacher_id == $teacher->id ? 'selected' : '' }}>
                                                                        {{ $teacher->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> <!-- // end form group -->


                                                    @foreach ($editData as $edit)
                                                        <div class="delete_whole_extra_item_add"
                                                            id="delete_whole_extra_item_add">
                                                            <div class="row">
                                                                <div class="col-md-10">

                                                                    <div class="form-group">
                                                                        <label>Student Class <span
                                                                                class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <select name="class_id[]" required=""
                                                                                class="form-control class_id" onchange="getItemprice(this);">
                                                                                <option value="" selected=""
                                                                                    disabled="">Select Subject</option>
                                                                                @foreach ($classes as $class)
                                                                                    <option value="{{ $class->id }}"
                                                                                        {{ $edit->class_id == $class->id ? 'selected' : '' }}>
                                                                                        {{ $class->class_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div> <!-- // end form group -->
                                                                    <div class="form-group">
                                                                        <label>Student Subject <span
                                                                                class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="controls">
                                                                            <select name="subject_id[]" required=""
                                                                                class="form-control  subject_id">
                                                                                <option value="" selected=""
                                                                                    disabled="">Select Subject</option>
                                                                              
                                                                            </select>
                                                                        </div>
                                                                    </div> <!-- // end form group -->
                                                                </div> <!-- End col-md-5 -->
																

                                                                <div class="col-md-2" style="padding-top: 25px; display:inline">
                                                                    <span class="btn btn-success addeventmore"><i
                                                                            class="fa fa-plus-circle"></i> </span> 
																			<span
                                                                        class="btn btn-danger removeeventmore"><i
                                                                            class="fa fa-minus-circle"></i> </span>
                                                                </div><!-- End col-md-5 -->

                                                            </div> <!-- end Row -->
                                                        </div><!-- // End Remove Delete  -->
                                                    @endforeach




                                                </div> <!-- // End add_item -->

                                                <div class="text-center">
                                                    <input type="submit" class="btn btn-rounded  bg-maroon  color-palette btn-flat mb-5"
                                                        value="Update">
                                                </div>
											</div>
											<div class="col-md-3"></div>

                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">

                    <div class="col-md-10">

                        <div class="form-group">
                            <h5>Student Class <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id[]" required="" class="form-control class_id" onchange="getItemprice(this);">
                                    <option value="" selected="" disabled="">Select Class</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <!-- // end form group -->
                        <div class="form-group">
                            <h5>Student Subject <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subject_id[]" required="" class="form-control subject_id">
                                    <option value="" selected="" disabled="">Select Subject</option>
                                   
                                </select>
                            </div>
                        </div> <!-- // end form group -->
                    </div> <!-- End col-md-5 -->






                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                    </div><!-- End col-md-2 -->




                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", '.removeeventmore', function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });

        });

        function getItemprice(ele) {
            
            var class_id = $(ele).closest('.add_item').find('.class_id').val();
            var subject_id = "{{ old('subject_id') }}";
            

            $.ajax({
                url: "{{ url('/') }}/getclasswisesubject/" + class_id,
                dataType: "json",
                success: function(data) {
                    
                    var option = "<option value=''>Select Subject</option>";
                    for (var i = 0; i < data.data.length; i++) {
                        if (subject_id == data.data[i].id) {
                            option += "<option selected value=" + data.data[i].subject_id + ">" + data.data[
                                    i]
                                .subject_name + "</option>";
                        } else {
                            option += "<option value=" + data.data[i].subject_id + ">" + data.data[i]
                                .subject_name + "</option>";
                        }
                    }
                     
                    $(ele).closest('.add_item').find('.subject_id').html(option);


                }
            });
        }
    </script>


@endsection
