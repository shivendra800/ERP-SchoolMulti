@extends('admin.layouts.layout')
@section('title', 'Registeration OF Student')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create New Addmission</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                    <li class="breadcrumb-item active">New Addmission</li>
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
                        <h3 class="card-title">New Addmission</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('store.student.registration') }}"
                                    enctype="multipart/form-data">
                                    @csrf
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
                                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" >
                                                            @if ($errors->has('name'))
                                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Father's Name <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="fname" value="{{ old('fname') }}" class="form-control">
                                                            @if ($errors->has('fname'))
                                                            <span class="text-danger">{{ $errors->first('fname') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Mother's Name <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="mname" value="{{ old('mname') }}" class="form-control">
                                                            @if ($errors->has('mname'))
                                                            <span class="text-danger">{{ $errors->first('mname') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Mobile Number <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control">
                                                            @if ($errors->has('mobile'))
                                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Address <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                                            @if ($errors->has('address'))
                                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Pincode <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="s_pincode" value="{{ old('s_pincode') }}" class="form-control">
                                                            @if ($errors->has('s_pincode'))
                                                            <span class="text-danger">{{ $errors->first('s_pincode') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Religion <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" 
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Religion</option>
                                                                <option @if (old('religion') == 'Islam') selected @endif  value="Islam">Islam</option>
                                                                <option @if (old('religion') == 'Hindu') selected @endif value="Hindu">Hindu</option>
                                                                <option @if (old('religion') == 'Christan') selected @endif value="Christan">Christan</option>

                                                            </select>
                                                            @if ($errors->has('religion'))
                                                            <span class="text-danger">{{ $errors->first('religion') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="date" name="dob" value="{{ old('dob') }}" class="form-control">
                                                            @if ($errors->has('dob'))
                                                            <span class="text-danger">{{ $errors->first('dob') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                                            @if ($errors->has('email'))
                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Password <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="password" name="password" class="form-control">
                                                            @if ($errors->has('password'))
                                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Year <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="year_id"  class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Year</option>
                                                                @foreach ($years as $year)
                                                                    <option {{ old('year_id') == $year['id'] ? 'selected' : '' }} value="{{ $year->id }}">{{ $year->name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                            @if ($errors->has('year_id'))
                                                            <span class="text-danger">{{ $errors->first('year_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->




                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Category <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="s_category" id="s_category" 
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                Category</option>
                                                                <option @if (old('s_category') == 'OBC') selected @endif value="OBC">OBC</option>
                                                                <option @if (old('s_category') == 'General') selected @endif value="General">General</option>
                                                                <option @if (old('s_category') == 'SC') selected @endif value="SC">SC</option>
                                                                <option @if (old('s_category') == 'ST') selected @endif value="ST">ST</option>

                                                            </select>
                                                            @if ($errors->has('s_category'))
                                                            <span class="text-danger">{{ $errors->first('s_category') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Class <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="class_id"  class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Class</option>
                                                                @foreach ($classes as $class)
                                                                    <option {{ old('class_id') == $class['id'] ? 'selected' : '' }} value="{{ $class->id }}">
                                                                        {{ $class->class_name }}</option>
                                                                @endforeach

                                                            </select>
                                                            @if ($errors->has('class_id'))
                                                            <span class="text-danger">{{ $errors->first('class_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Stream <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="stream"  class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Stream</option>
                                                                @foreach ($stream as $streams)
                                                                    <option {{ old('stream') == $streams['id'] ? 'selected' : '' }} value="{{ $streams->id }}">
                                                                        {{ $streams->stream_name }}</option>
                                                                @endforeach

                                                            </select>
                                                            @if ($errors->has('stream'))
                                                            <span class="text-danger">{{ $errors->first('stream') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                               

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Section <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="section"  class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Section</option>
                                                                @foreach ($section as $sections)
                                                                    <option {{ old('section') == $sections['id'] ? 'selected' : '' }} value="{{ $sections->id }}">
                                                                        {{ $sections->section_name }}</option>
                                                                @endforeach

                                                            </select>
                                                            @if ($errors->has('section'))
                                                            <span class="text-danger">{{ $errors->first('section') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Addmission Date <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="date" value="{{ old('s_addmission_date') }}"   name="s_addmission_date" class="form-control">
                                                            @if ($errors->has('s_addmission_date'))
                                                            <span class="text-danger">{{ $errors->first('s_addmission_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gender <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" 
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Gender</option>
                                                                <option @if (old('gender') == 'Male') selected @endif value="Male">Male</option>
                                                                <option @if (old('gender') == 'Female') selected @endif value="Female">Female</option>

                                                            </select>
                                                            @if ($errors->has('gender'))
                                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Profile Image <span class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control" id="image">
                                                            @if ($errors->has('image'))
                                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                                            @endif
                                                        </div>

                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
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
