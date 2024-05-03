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
                @if (empty($addstaff['id'])) action="{{ url('/add-edit-staff-reg') }}"
                @else action="{{ url('add-edit-staff-reg/' . $addstaff['id']) }}" @endif
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-lightblue disabled color-palette">
                            <div class="card-header">
                                <h3 class="card-title">Staff Inoformation</h3>
                            </div>

                            <div class="card-body  text-secondary">
                               <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Staff Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="" placeholder="Enter Staff Name" name="name"
                                                @if (!empty($addstaff['name'])) value="{{ $addstaff['name'] }}"  @else value="{{ old('name') }}" @endif>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id=""
                                                placeholder="Enter email" name="email" @if($addstaff['id']!="") disabled="" @else required="" @endif
                                                @if (!empty($addstaff['email'])) value="{{ $addstaff['email'] }}"  @else value="{{ old('email') }}" @endif>
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
                                                placeholder="Enter Password" name="password" @if($addstaff['id']!="") disabled="" @else required="" @endif
                                                @if (!empty($addstaff['password'])) value="{{ $addstaff['password'] }}"  @else value="{{ old('password') }}" @endif >
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
                                                id="" placeholder="Enter Confirm Password" name="confirm_password" @if($addstaff['id']!="") disabled="" @else required="" @endif
                                                @if (!empty($addstaff['confirm_password'])) value="{{ $addstaff['confirm_password'] }}"  @else value="{{ old('confirm_password') }}" @endif>
                                            @error('confirm_password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Staff DOB</label>
                                            <input type="date" class="form-control @error('e_dob') is-invalid @enderror"
                                                placeholder="Enter Mobile No" name="e_dob" id="student_dob"
                                                
                                                @if (!empty($addstaff['e_dob'])) value="{{ $addstaff['e_dob'] }}"  @else value="{{ old('e_dob') }}" @endif>
                                            @error('e_dob')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control @error('e_gender') is-invalid @enderror"
                                            id="e_gender" name="e_gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male" @if (isset($addstaff['e_gender']) && $addstaff['e_gender'] == 'Male') selected @endif>
                                                Male</option>
                                            <option value="Female"
                                                @if (isset($addstaff['e_gender']) && $addstaff['e_gender'] == 'Female') selected @endif>Female
                                            </option>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Complete Address</label>
                                            <textarea class="form-control @error('complete_address') is-invalid @enderror" id=""
                                                placeholder="Enter Complete Address" name="complete_address">
                                            @if (!empty($addstaff['complete_address']))
                                                {{ $addstaff['complete_address'] }}
                                                @else
                                                {{ old('complete_address') }}
                                                @endif
                                        </textarea>
                                            @error('complete_address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pincode</label>
                                            <input type="text"
                                                class="form-control @error('e_pincode') is-invalid @enderror"
                                                id="" placeholder="Enter Pincode" name="e_pincode"
                                                @if (!empty($addstaff['e_pincode'])) value="{{ $addstaff['e_pincode'] }}"  @else value="{{ old('e_pincode') }}" @endif>
                                            @error('e_pincode')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile No.</label>
                                            <input type="text"
                                                class="form-control @error('mobile') is-invalid @enderror"
                                                id="" placeholder="Enter Mobile" name="mobile"
                                                @if (!empty($addstaff['mobile'])) value="{{ $addstaff['mobile'] }}"  @else value="{{ old('mobile') }}" @endif>
                                            @error('mobile')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Experience</label>
                                            <input type="text"
                                                class="form-control @error('experience') is-invalid @enderror"
                                                id="" placeholder="Enter Experience " name="experience"
                                                @if (!empty($addstaff['experience'])) value="{{ $addstaff['experience'] }}"  @else value="{{ old('experience') }}" @endif>
                                            @error('experience')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Joining Date</label>
                                            <input type="date"
                                                class="form-control @error('e_joining_date') is-invalid @enderror"
                                                placeholder="Enter Joining Date" name="e_joining_date"
                                                @if (!empty($addstaff['e_joining_date'])) value="{{ $addstaff['e_joining_date'] }}"  @else value="{{ old('e_joining_date') }}" @endif>
                                            @error('e_joining_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                


                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Straff Type</label>
                                            <select class="form-control @error('staff_type') is-invalid @enderror"
                                            id="staff_type" name="staff_type">
                                            <option value="">Select Type</option>
                                            <option value="Teacher" @if (isset($addstaff['staff_type']) && $addstaff['staff_type'] == 'Teacher') selected @endif @if (old('staff_type') == 'Teacher') selected @endif>
                                                Teacher</option>
                                            <!--<option value="Accountant"-->
                                            <!--    @if (isset($addstaff['staff_type']) && $addstaff['staff_type'] == 'Accountant') selected @endif>Accountant-->
                                            <!--</option>-->
                                            
                                           </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="logo_image">Staff Image </label>
                                            <input type="file"
                                                class="form-control @error('e_image') is-invalid @enderror"
                                                id="e_image" name="e_image" accept="application/image">
                                            @error('e_image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @if (!empty($addstaff->e_image))
                                                <a target="_blank"
                                                    href="{{ url('admin_assets/staff_img/' . $addstaff->e_image) }}">View
                                                    Image</a>&nbsp;&nbsp;
                                                <div><img style="width: 60px; height:60px;"s
                                                        src="{{ url('admin_assets/staff_img/' . $addstaff->e_image) }}"
                                                        alt=""></div>

                                                <input type="hidden" name="current_e_image"
                                                    value="{{ $addstaff->e_image }}">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="aadhar">Aaddhar Card Docoument</label>
                                        <input type="file" accept="application/pdf" class="form-control" name="aadhar" id="aadhar" @if(!empty($addstaff['aadhar'])) value="{{ $addstaff['aadhar'] }}" @else value="{{ old('aadhar') }}" @endif @if($addstaff['id']!="") disabled="" @else required="" @endif>
                                        @if (!empty($addstaff->aadhar))
                                        <a target="_blank" href="{{ url('admin_assets/staff_documnet/'.$addstaff['aadhar']) }}">View Aaddhar Docoument</a>&nbsp;&nbsp;
                                        <a target="_blank" download="" href="{{ url('admin_assets/staff_documnet/'.$addstaff['aadhar']) }}">Download Aaddhar Docoument</a>&nbsp;&nbsp;
                                        <input type="hidden" name="current_aadhar_pdf" value="{{ $addstaff->aadhar }}">
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
                                <h3 class="card-title">Bank Information</h3>
                            </div>
                            <div class="card-body text-secondary">
                                <div class="card p-2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Account No.</label>
                                                <input type="text"
                                                    class="form-control @error('account_no') is-invalid @enderror"
                                                    id="" placeholder="Enter Account Number" name="account_no"
                                                    @if (!empty($addstaff['account_no'])) value="{{ $addstaff['account_no'] }}"  @else value="{{ old('account_no') }}" @endif>
                                                @error('account_no')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Account Holder Name</label>
                                                <input type="text"
                                                    class="form-control @error('acc_hold_name') is-invalid @enderror"
                                                    id="" placeholder="Enter Account Holder Name" name="acc_hold_name"
                                                    @if (!empty($addstaff['acc_hold_name'])) value="{{ $addstaff['acc_hold_name'] }}"  @else value="{{ old('acc_hold_name') }}" @endif>
                                                @error('acc_hold_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
    
    
                                            <div class="form-group">
                                                <label>Bank IFSC Code</label>
                                                <input type="text"
                                                    class="form-control @error('ifsc_code') is-invalid @enderror"
                                                    id="" placeholder="Enter Bank IFSC CODE" name="ifsc_code"
                                                    @if (!empty($addstaff['ifsc_code'])) value="{{ $addstaff['ifsc_code'] }}"  @else value="{{ old('ifsc_code') }}" @endif>
                                                @error('ifsc_code')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
    
                                        </div>
    
    
    
    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
    
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <input type="text"
                                                    class="form-control @error('bank_name') is-invalid @enderror"
                                                    id="" placeholder="Enter Bank Name " name="bank_name"
                                                    @if (!empty($addstaff['bank_name'])) value="{{ $addstaff['bank_name'] }}"  @else value="{{ old('bank_name') }}" @endif>
                                                @error('bank_name')
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
                    <button type="submit" class="btn bg-maroon  color-palette">Submit</button>
                    <a href="{{ url('/') }}/staff-list" class="btn btn-secondary">Back</a>
                </div>
           </form>
        </div>
    </section>
@endsection
@section('script')

    <script></script>

@endsection
