@extends('admin.layouts.layout')
@section('title', 'k')
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
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
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
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header bg-navy disabled color-palette">
                        <h3 class="card-title">Student Promotion</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('promotion.student.registration', $editData->student_id) }}" enctype="multipart/form-data">
                     @csrf
                    <input type="hidden" name="id" value="{{ $editData->id }}">
                  
                        <div class="card-body text-dark">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="card p-2">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Student Name <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                required="" value="{{ $editData['student']['s_name'] }}">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Father's Name <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="fname" class="form-control"
                                                                required="" value="{{ $editData['student']['father_name'] }}">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Mother's Name <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="mname" class="form-control"
                                                                required="" value="{{ $editData['student']['mother_name'] }}">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Mobile Number <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" class="form-control"
                                                                required="" value="{{ $editData['student']['f_mobile_no'] }}">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Address <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control"
                                                                required="" value="{{ $editData['student']['s_address'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Pincode <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="s_pincode" class="form-control"
                                                                required="" value="{{ $editData['student']['s_pincode'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Religion <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Religion</option>
                                                                <option
                                                                    value="Islam"{{ $editData['student']['s_relision'] == 'Islam' ? 'selected' : '' }}>
                                                                    Islam</option>
                                                                <option
                                                                    value="Hindu"{{ $editData['student']['s_relision'] == 'Hindu' ? 'selected' : '' }}>
                                                                    Hindu</option>
                                                                <option
                                                                    value="Christan"{{ $editData['student']['s_relision'] == 'Christan' ? 'selected' : '' }}>
                                                                    Christan</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="date" name="dob" class="form-control"
                                                                required="" value="{{ $editData['student']['s_dob'] }}">
                                                        </div>
                                                    </div>

                                                </div>


                                               
                                                

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
    
                                                    <div class="form-group">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                required="" value="{{ $editData['student']['email'] }}">
                                                        </div>
                                                    </div>
    
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-6">
    
                                                    <div class="form-group">
                                                        <label>Password <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="password" name="password" class="form-control"
                                                                required="" value="{{ $editData['student']['password'] }}">
                                                        </div>
                                                    </div>
    
                                                </div> <!-- End Col md 4 -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Year <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="year_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Year</option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year->id }}"
                                                                        {{ $editData->year_id == $year->id ? 'selected' : '' }}>
                                                                        {{ $year->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Category <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="s_category" id="s_category" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Category</option>
                                                                <option
                                                                    value="OBC"{{ $editData['student']['s_category'] == 'OBC' ? 'selected' : '' }}>
                                                                    OBC</option>
                                                                <option
                                                                    value="General"{{ $editData['student']['s_category'] == 'General' ? 'selected' : '' }}>
                                                                    General</option>
                                                                <option
                                                                    value="SC"{{ $editData['student']['s_category'] == 'SC' ? 'selected' : '' }}>
                                                                    SC</option>

                                                                <option
                                                                    value="ST"{{ $editData['student']['s_category'] == 'ST' ? 'selected' : '' }}>
                                                                    ST</option>

                                                            </select>
                                                        </div>
                                                        
                                                    </div>

                                                </div> <!-- End Col md 4 -->

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Class <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="class_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Class</option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}"
                                                                        {{ $editData->class_id == $class->id ? 'selected' : '' }}>
                                                                        {{ $class->class_name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Stream <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="stream" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Stream</option>
                                                                @foreach ($stream as $streams)
                                                                    <option value="{{ $streams->id }}"
                                                                        {{ $editData->stream == $streams->id ? 'selected' : '' }}>
                                                                        {{ $streams->stream_name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                                

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Addmission Date <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="date" name="s_addmission_date" class="form-control"
                                                                required="" value="{{ $editData['student']['s_addmission_date'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   
                                                    <div class="form-group">
                                                        <label>Gender <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Gender</option>
                                                                <option value="Male"
                                                                    {{ $editData['student']['s_gender'] == 'Male' ? 'selected' : '' }}>
                                                                    Male</option>
                                                                <option value="Female"
                                                                    {{ $editData['student']['s_gender'] == 'Female' ? 'selected' : '' }}>
                                                                    Female</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label>Profile Image <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control"
                                                                id="image">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage"
                                                                src="{{ !empty($editData['student']['stu_image']) ? url('upload/student_images/' . $editData['student']['stu_image']) : url('upload/no_image.jpg') }}"
                                                                style="width: 100px; width: 100px; border: 1px solid #000000;">

                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                            </div>
                                        </div>
                                     
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                            <a href="{{ url('/') }}/students/reg/view" class="btn btn-secondary">Back</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>



  
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>



@endsection
