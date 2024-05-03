@extends('admin.layouts.layout')
@section('title', $title)
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Addmission</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success:</strong> {{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <form class="forms-sample"
                @if (empty($addstudent['id'])) action="{{ url('/add-edit-student-reg') }}"
                @else action="{{ url('add-edit-student-reg/' . $addstudent['id']) }}" @endif
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-lightblue disabled color-palette">
                            <div class="card-header">
                                <h3 class="card-title">Student Inoformation</h3>
                            </div>

                            <div class="card-body  text-secondary">
                               <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Student Name</label>
                                            <input type="text" class="form-control @error('s_name') is-invalid @enderror"
                                                id="" placeholder="Enter school Name" name="s_name"
                                                @if (!empty($addstudent['s_name'])) value="{{ $addstudent['s_name'] }}"  @else value="{{ old('s_name') }}" @endif>
                                            @error('s_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id=""
                                                placeholder="Enter email" name="email" @if($addstudent['id']!="") disabled="" @else required="" @endif
                                                @if (!empty($addstudent['email'])) value="{{ $addstudent['email'] }}"  @else value="{{ old('email') }}" @endif>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4">


                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id=""
                                                placeholder="Enter Password" name="password" @if($addstudent['id']!="") disabled="" @else required="" @endif
                                                @if (!empty($addstudent['password'])) value="{{ $addstudent['password'] }}"  @else value="{{ old('password') }}" @endif >
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                       

                                    </div>
                                  




                                </div>
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password"
                                                class="form-control @error('confirm_password') is-invalid @enderror"
                                                id="" placeholder="Enter Confirm Password" name="confirm_password" @if($addstudent['id']!="") disabled="" @else required="" @endif
                                                @if (!empty($addstudent['confirm_password'])) value="{{ $addstudent['confirm_password'] }}"  @else value="{{ old('confirm_password') }}" @endif>
                                            @error('confirm_password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Student DOB</label>
                                            <input type="date" class="form-control @error('s_dob') is-invalid @enderror"
                                                id="student_dob" placeholder="Enter Mobile No" name="s_dob"
                                                
                                                @if (!empty($addstudent['s_dob'])) value="{{ $addstudent['s_dob'] }}"  @else value="{{ old('s_dob') }}" @endif>
                                            @error('s_dob')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Student Blood Group</label>
                                            <input type="text"
                                                class="form-control @error('blood_group') is-invalid @enderror"
                                                id="" placeholder="Enter Mobile No" name="blood_group"
                                                @if (!empty($addstudent['blood_group'])) value="{{ $addstudent['blood_group'] }}"  @else value="{{ old('blood_group') }}" @endif>
                                            @error('blood_group')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control @error('s_gender') is-invalid @enderror"
                                            id="s_gender" name="s_gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male" @if (isset($addstudent['s_gender']) && $addstudent['s_gender'] == 'Male') selected @endif>
                                                Male</option>
                                            <option value="Female"
                                                @if (isset($addstudent['s_gender']) && $addstudent['s_gender'] == 'Female') selected @endif>Female
                                            </option>
                                          

                                        </select>
                                           

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Relision</label>
                                            <select class="form-control @error('s_relision') is-invalid @enderror"
                                                id="s_relision" name="s_relision">
                                                <option value="">Select Religion</option>
                                                <option value="Hinduism" @if (isset($addstudent['s_relision']) && $addstudent['s_relision'] == 'Hinduism') selected @endif>
                                                    Hinduism</option>
                                                <option value="Islam" @if (isset($addstudent['s_relision']) && $addstudent['s_relision'] == 'Islam') selected @endif>
                                                    Islam
                                                </option>
                                                <option value="Sikhism"
                                                    @if (isset($addstudent['s_relision']) && $addstudent['s_relision'] == 'Sikhism') selected @endif>
                                                    Sikhism
                                                </option>
                                                <option value="Christianity"
                                                    @if (isset($addstudent['s_relision']) && $addstudent['s_relision'] == 'Christianity') selected @endif>
                                                    Christianity</option>

                                            </select>
                                            @error('s_relision')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control @error('s_category') is-invalid @enderror"
                                                id="s_category" name="s_category">
                                                <option value="">Select Category</option>
                                                <option value="OBC" @if (isset($addstudent['s_category']) && $addstudent['s_category'] == 'OBC') selected @endif>
                                                    OBC</option>
                                                <option value="General"
                                                    @if (isset($addstudent['s_category']) && $addstudent['s_category'] == 'General') selected @endif>General
                                                </option>
                                                <option value="SC" @if (isset($addstudent['s_category']) && $addstudent['s_category'] == 'SC') selected @endif>
                                                    SC
                                                </option>
                                                <option value="ST" @if (isset($addstudent['s_category']) && $addstudent['s_category'] == 'ST') selected @endif>
                                                    ST</option>

                                            </select>
                                            @error('s_category')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text"
                                                class="form-control @error('s_state') is-invalid @enderror"
                                                id="" placeholder="Enter school Name" name="s_state"
                                                @if (!empty($addstudent['s_state'])) value="{{ $addstudent['s_state'] }}"  @else value="{{ old('s_state') }}" @endif>
                                            @error('s_state')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text"
                                                class="form-control @error('s_city') is-invalid @enderror" id=""
                                                placeholder="Enter school Name" name="s_city"
                                                @if (!empty($addstudent['s_city'])) value="{{ $addstudent['s_city'] }}"  @else value="{{ old('s_city') }}" @endif>
                                            @error('s_city')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Area</label>
                                            <input type="text"
                                                class="form-control @error('s_area') is-invalid @enderror" id=""
                                                placeholder="Enter school Name" name="s_area"
                                                @if (!empty($addstudent['s_area'])) value="{{ $addstudent['s_area'] }}"  @else value="{{ old('s_area') }}" @endif>
                                            @error('s_area')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pincode</label>
                                            <input type="text"
                                                class="form-control @error('s_pincode') is-invalid @enderror"
                                                id="" placeholder="Enter school Name" name="s_pincode"
                                                @if (!empty($addstudent['s_pincode'])) value="{{ $addstudent['s_pincode'] }}"  @else value="{{ old('s_pincode') }}" @endif>
                                            @error('s_pincode')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Addmission Date</label>
                                            <input type="date"
                                                class="form-control @error('s_addmission_date') is-invalid @enderror"
                                                id="addmission_date" placeholder="Enter school Name" name="s_addmission_date"
                                                @if (!empty($addstudent['s_addmission_date'])) value="{{ $addstudent['s_addmission_date'] }}"  @else value="{{ old('s_addmission_date') }}" @endif>
                                            @error('s_addmission_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>FSD Start</label>
                                            <input type="date"
                                                class="form-control @error('current_fsd') is-invalid @enderror"
                                                id="" placeholder="Enter FSD Start" name="current_fsd"
                                                @if (!empty($addstudent['current_fsd'])) value="{{ $addstudent['current_fsd'] }}"  @else value="{{ old('current_fsd') }}" @endif>
                                            @error('current_fsd')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <div class="row">


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>student Address</label>
                                            <textarea class="form-control @error('p_address') is-invalid @enderror" id=""
                                                placeholder="Enter student Address" name="s_address">
                                            @if (!empty($addstudent['s_address']))
                                                {{ $addstudent['s_address'] }}
                                                @else
                                                {{ old('s_address') }}
                                                @endif
                                        </textarea>
                                            @error('s_address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="logo_image">Student Image </label>
                                            <input type="file"
                                                class="form-control @error('stu_image') is-invalid @enderror"
                                                id="stu_image" name="stu_image" accept="application/image">
                                            @error('stu_image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @if (!empty($addstudent->stu_image))
                                                <a target="_blank"
                                                    href="{{ url('admin_assets/student_img/' . $addstudent->stu_image) }}">View
                                                    Image</a>&nbsp;&nbsp;
                                                <div><img style="width: 60px; height:60px;"s
                                                        src="{{ url('admin_assets/student_img/' . $addstudent->stu_image) }}"
                                                        alt=""></div>

                                                <input type="hidden" name="current_stu_image"
                                                    value="{{ $addstudent->stu_image }}">
                                            @endif
                                        </div>
                                    </div>


                                </div>
                               </div>

                            </div>

                        </div>

                    </div>
                </div>
                {{-- parent information --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-olive disabled color-palette">
                            <div class="card-header">
                                <h3 class="card-title">Parent Information</h3>
                            </div>
                            <div class="card-body text-secondary">
                                <div class="card p-2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Father Name</label>
                                                <input type="text"
                                                    class="form-control @error('father_name') is-invalid @enderror"
                                                    id="" placeholder="Enter Father Name" name="father_name"
                                                    @if (!empty($addstudent['father_name'])) value="{{ $addstudent['father_name'] }}"  @else value="{{ old('father_name') }}" @endif>
                                                @error('father_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mother Name</label>
                                                <input type="text"
                                                    class="form-control @error('mother_name') is-invalid @enderror"
                                                    id="" placeholder="Enter Mother Name" name="mother_name"
                                                    @if (!empty($addstudent['mother_name'])) value="{{ $addstudent['mother_name'] }}"  @else value="{{ old('mother_name') }}" @endif>
                                                @error('mother_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
    
    
                                            <div class="form-group">
                                                <label>Father Occupation</label>
                                                <input type="text"
                                                    class="form-control @error('father_occu') is-invalid @enderror"
                                                    id="" placeholder="Enter Father Occupation" name="father_occu"
                                                    @if (!empty($addstudent['father_occu'])) value="{{ $addstudent['father_occu'] }}"  @else value="{{ old('father_occu') }}" @endif>
                                                @error('father_occu')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
    
                                        </div>
    
    
    
    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
    
                                            <div class="form-group">
                                                <label>Mother Occupation</label>
                                                <input type="text"
                                                    class="form-control @error('mother_occu') is-invalid @enderror"
                                                    id="" placeholder="Enter Mother Occupation " name="mother_occu"
                                                    @if (!empty($addstudent['mother_occu'])) value="{{ $addstudent['mother_occu'] }}"  @else value="{{ old('mother_occu') }}" @endif>
                                                @error('mother_occu')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Complete Address</label>
                                                <textarea class="form-control @error('p_address') is-invalid @enderror" id=""
                                                    placeholder="Enter Complete Address" name="p_address">
                                                @if (!empty($addstudent['p_address']))
                                                    {{ $addstudent['p_address'] }}
                                                    @else
                                                    {{ old('p_address') }}
                                                    @endif
                                            </textarea>
                                                @error('p_address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Father Mobile No</label>
                                                <input type="number"
                                                    class="form-control @error('f_mobile_no') is-invalid @enderror"
                                                    id="" placeholder="Enter Father Mobile No" name="f_mobile_no"
                                                    @if (!empty($addstudent['f_mobile_no'])) value="{{ $addstudent['f_mobile_no'] }}"  @else value="{{ old('f_mobile_no') }}" @endif>
                                                @error('f_mobile_no')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
    
    
    
                                    </div>
                                    <div class="row">
    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mother Mobile No</label>
                                                <input type="number"
                                                    class="form-control @error('m_mobile_no') is-invalid @enderror"
                                                    id="" placeholder="Enter Mother Mobile No" name="m_mobile_no"
                                                    @if (!empty($addstudent['m_mobile_no'])) value="{{ $addstudent['m_mobile_no'] }}"  @else value="{{ old('m_mobile_no') }}" @endif>
                                                @error('m_mobile_no')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- school information --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-purple disabled color-palette">
                            <div class="card-header">
                                <h3 class="card-title">School Inoformation</h3>
                            </div>

                            <div class="card-body text-secondary">
                              <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Stream Name</label>
                                            <select class="form-control @error('stream') is-invalid @enderror"
                                                name="stream">
                                                <option value="">Select Stream</option>
                                                @foreach ($streamdata as $currentstream)
                                                    <option value="{{ $currentstream['id'] }}"
                                                        @selected($currentstream['id'] == $addstudent['stream'])
                                                        {{ old('stream') == $currentstream['id'] ? 'selected' : '' }}>
                                                        {{ $currentstream['stream_name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('stream')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Class</label>
                                            <select class="form-control @error('class') is-invalid @enderror"
                                                name="class">
                                                <option value="">Select Class</option>
                                                @foreach ($classdata as $currentclass)
                                                    <option value="{{ $currentclass['id'] }}" @selected($currentclass['id'] == $addstudent['class'])
                                                        {{ old('class') == $currentclass['id'] ? 'selected' : '' }}>
                                                        {{ $currentclass['class_name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('class')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">


                                        <div class="form-group">
                                            <label>Section</label>
                                            <select class="form-control @error('section') is-invalid @enderror"
                                                name="section">
                                                <option value="">Select Section</option>
                                                @foreach ($sectiondata as $currentsection)
                                                    <option value="{{ $currentsection['id'] }}"
                                                        @selected($currentsection['id'] == $addstudent['section'])
                                                        {{ old('section') == $currentsection['id'] ? 'selected' : '' }}>
                                                        {{ $currentsection['section_name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('section')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>




                                </div>
                              </div>

                            </div>

                        </div>

                    </div>
                </div>
                {{-- previous school information --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Previous School Inoformation</h3>
                            </div>

                            <div class="card-body text-secondary">
                               <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Class</label>
                                            <select class="form-control @error('passsed_class') is-invalid @enderror"
                                                name="passsed_class">
                                                <option value="">Select Previous School Class</option>
                                                @foreach ($classdata as $previousclass)
                                                    <option value="{{ $previousclass['id'] }}"
                                                        @selected($previousclass['id'] == $addstudent['passsed_class'])
                                                        {{ old('passsed_class') == $previousclass['id'] ? 'selected' : '' }}>
                                                        {{ $previousclass['class_name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('passsed_class')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>School Name</label>
                                            <input type="text"
                                                class="form-control @error('passsed_school_name') is-invalid @enderror"
                                                id="" placeholder="Enter Passsed School Name"
                                                name="passsed_school_name"
                                                @if (!empty($addstudent['passsed_school_name'])) value="{{ $addstudent['passsed_school_name'] }}"  @else value="{{ old('passsed_school_name') }}" @endif>
                                            @error('passsed_school_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">


                                        <div class="form-group">
                                            <label>Passing Year</label>
                                            <input type="text"
                                                class="form-control @error('passsed_year') is-invalid @enderror"
                                                id="" placeholder="Enter Passsed Year" name="passsed_year"
                                                @if (!empty($addstudent['passsed_year'])) value="{{ $addstudent['passsed_year'] }}"  @else value="{{ old('passsed_year') }}" @endif>
                                            @error('passsed_year')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>




                                </div>
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Marks</label>
                                            <input type="text"
                                                class="form-control @error('passsed_marks') is-invalid @enderror"
                                                id="" placeholder="Enter Passed Marks" name="passsed_marks"
                                                @if (!empty($addstudent['passsed_marks'])) value="{{ $addstudent['passsed_marks'] }}"  @else value="{{ old('passsed_marks') }}" @endif>
                                            @error('passsed_marks')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Percentage</label>
                                            <input type="text"
                                                class="form-control @error('passsed_percentage') is-invalid @enderror"
                                                id="" placeholder="Enter Percentage" name="passsed_percentage"
                                                @if (!empty($addstudent['passsed_percentage'])) value="{{ $addstudent['passsed_percentage'] }}"  @else value="{{ old('passsed_percentage') }}" @endif>
                                            @error('passsed_percentage')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                               </div>

                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="card-footer">
                    <button type="submit" class="btn bg-maroon disabled color-palette">Submit</button>
                    <a href="{{ url('/') }}/School-List" class="btn btn-secondary">Back</a>
                </div>
           </form>
        </div>
    </section>
@endsection
@section('script')

    <script></script>

@endsection
