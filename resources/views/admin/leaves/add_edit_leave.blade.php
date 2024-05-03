@extends('admin.layouts.layout')

@section('title', $title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Leave Request</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>

                    </ol>
                </div>



            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid bg-info">
            <div class="row p-3">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary ">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form class="forms-sample"
                            @if (empty($addleave['id'])) action="{{ url('/add-edit-leave-request') }}"
                            @else action="{{ url('add-edit-leave-request/' . $addleave['id']) }}" @endif
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body text-dark">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="card p-2">

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Leave Start Date</label>
                                                            <input type="date"
                                                                class="form-control @error('leave_start_date') is-invalid @enderror"
                                                                id="" placeholder="Enter Subject Name" required
                                                                name="leave_start_date"
                                                                @if (!empty($addleave['leave_start_date'])) value="{{ $addleave['leave_start_date'] }}"  @else value="{{ old('leave_start_date') }}" @endif>
                                                            @error('leave_start_date')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Leave End Date</label>
                                                            <input type="date"
                                                                class="form-control @error('leave_end_date') is-invalid @enderror"
                                                                id="" placeholder="Enter Subject Name" required
                                                                name="leave_end_date"
                                                                @if (!empty($addleave['leave_end_date'])) value="{{ $addleave['leave_end_date'] }}"  @else value="{{ old('leave_end_date') }}" @endif>
                                                            @error('leave_end_date')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Leave Region</label>
                                                            <textarea class="form-control @error('leave_region') is-invalid @enderror" id="" rows="10"
                                                                placeholder="Enter Leave Region" name="leave_region" required>
                                                                @if (!empty($addleave['leave_region']))
                                                                {{ $addleave['leave_region'] }}
                                                                @else
                                                                {{ old('leave_region') }}
                                                                @endif
                                                            </textarea>
                                                            @error('leave_region')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>






                                            <div class="card-footer text-center">

                                                <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                                
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
