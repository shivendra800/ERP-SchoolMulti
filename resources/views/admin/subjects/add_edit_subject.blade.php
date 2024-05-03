@extends('admin.layouts.layout')

@section('title', $title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subject List</h1>
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
                                @if (empty($addsubject['id'])) action="{{ url('/add-edit-Subject') }}"
                            @else action="{{ url('add-edit-Subject/' . $addsubject['id']) }}" @endif
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
                                                                <label for="exampleInputEmail1">Subject Name</label>
                                                                <input type="text"
                                                                    class="form-control @error('subject_name') is-invalid @enderror"
                                                                    id="" placeholder="Enter Subject Name"
                                                                    name="subject_name"
                                                                    @if (!empty($addsubject['subject_name'])) value="{{ $addsubject['subject_name'] }}"  @else value="{{ old('subject_name') }}" @endif>
                                                                @error('subject_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>






                                                <div class="card-footer text-center">

                                                    <button type="submit"
                                                        class="btn bg-maroon color-palette">Submit</button>
                                                    <a href="{{ url('/') }}/Subject-List"
                                                        class="btn btn-secondary">Back</a>
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
