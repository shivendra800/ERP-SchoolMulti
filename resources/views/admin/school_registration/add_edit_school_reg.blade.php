@extends('admin.layouts.layout')

@section('title', $title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New School</h1>
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


    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-lightblue color-palette">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="forms-sample"
                            @if (empty($school_reg['id'])) action="{{ url('/add-edit-school-reg') }}"
                            @else action="{{ url('add-edit-school-reg/' . $school_reg['id']) }}" @endif
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="card p-2">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">School Name</label>
                                                <input type="text"
                                                    class="form-control @error('school_name') is-invalid @enderror"
                                                    id="" placeholder="Enter school Name" name="school_name"
                                                    @if (!empty($school_reg['school_name'])) value="{{ $school_reg['school_name'] }}"  @else value="{{ old('school_name') }}" @endif>
                                                @error('school_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">FSD Start</label>
                                                        <input type="date"
                                                            class="form-control @error('fsd_start') is-invalid @enderror"
                                                            id="" placeholder="Enter FSD Start" name="fsd_start"
                                                            @if (!empty($school_reg['fsd_start'])) value="{{ $school_reg['fsd_start'] }}"  @else value="{{ old('fsd_start') }}" @endif>
                                                        @error('fsd_start')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">FSD End</label>
                                                        <input type="date"
                                                            class="form-control @error('fsd_end') is-invalid @enderror"
                                                            id="" placeholder="Enter FSD END " name="fsd_end"
                                                            @if (!empty($school_reg['fsd_end'])) value="{{ $school_reg['fsd_end'] }}"  @else value="{{ old('fsd_end') }}" @endif>
                                                        @error('fsd_end')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="">Principal Name</label>
                                                <input type="text"
                                                    class="form-control @error('principal_name') is-invalid @enderror"
                                                    id="" placeholder="Enter Principal Name" name="principal_name"
                                                    @if (!empty($school_reg['principal_name'])) value="{{ $school_reg['principal_name'] }}"  @else value="{{ old('principal_name') }}" @endif>
                                                @error('principal_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Mobile No</label>
                                                <input type="number"
                                                    class="form-control @error('mobile_no') is-invalid @enderror"
                                                    id="" placeholder="Enter Mobile No" name="mobile_no"
                                                    @if (!empty($school_reg['mobile_no'])) value="{{ $school_reg['mobile_no'] }}"  @else value="{{ old('mobile_no') }}" @endif>
                                                @error('mobile_no')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id=""
                                                    placeholder="Enter Email" name="email"
                                                    @if (!empty($school_reg['email'])) value="{{ $school_reg['email'] }}"  @else value="{{ old('email') }}" @endif>
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            id="" placeholder="Enter Password" name="password"
                                                            @if (!empty($school_reg['password'])) value="{{ $school_reg['password'] }}"  @else value="{{ old('password') }}" @endif>
                                                        @error('password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password"
                                                            class="form-control @error('confirm_password') is-invalid @enderror"
                                                            id="" placeholder="Enter Confirm Password"
                                                            name="confirm_password"
                                                            @if (!empty($school_reg['confirm_password'])) value="{{ $school_reg['confirm_password'] }}"  @else value="{{ old('confirm_password') }}" @endif>
                                                        @error('confirm_password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="logo_image">School Logo </label>
                                                <input type="file"
                                                    class="form-control @error('logo_image') is-invalid @enderror"
                                                    id="logo_image" name="logo_image" accept="application/image">
                                                @error('logo_image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                @if (!empty($school_reg->logo_image))
                                                    <a target="_blank"
                                                        href="{{ url('admin_assets/school_logo/' . $school_reg->logo_image) }}">View
                                                        Image</a>&nbsp;&nbsp;
                                                    <div><img style="width: 60px; height:60px;"s
                                                            src="{{ url('admin_assets/school_logo/' . $school_reg->logo_image) }}"
                                                            alt=""></div>

                                                    <input type="hidden" name="current_logo_image"
                                                        value="{{ $school_reg->logo_image }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">School Address</label>
                                                <input type="text"
                                                    class="form-control @error('school_address') is-invalid @enderror"
                                                    id="" placeholder="Enter school Address" name="school_address"
                                                    @if (!empty($school_reg['school_address'])) value="{{ $school_reg['school_address'] }}"  @else value="{{ old('school_address') }}" @endif>
                                                @error('school_address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="card-footer">

                                            <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                            <a href="{{ url('/') }}/School-List" class="btn btn-secondary">Back</a>
                                        </div>

                                        </div>



                                    </div>
                                    <div class="col-md-3"></div>





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




@endsection
@section('script')

    <script></script>

@endsection
