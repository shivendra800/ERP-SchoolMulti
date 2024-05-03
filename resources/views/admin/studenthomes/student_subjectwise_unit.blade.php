@extends('admin.layouts.layout')
@section('title', 'Uploaded ContentUnit List')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Uploaded ContentUnit List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Uploaded ContentUnit List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header  ">
                            <h3 class="card-title text-center">
                                <a href="#"> <button type="button"
                                        class="btn btn-block bg-maroon color-palette btn-flat ">All Uploaded ContentUnit List</button></a>
                            </h3>
                        </div>
                    </div>



                    <div class="card" style="background-color: #e38200;">
                        <div class=" card-header ">


                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 ">

                            <div class="row">
                                @if(!empty($subjectwiseunitlist))
                                @foreach ($subjectwiseunitlist as $subjectwiseunitlist)
                               
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2">
                                      <img class="card-img-top" src="{{url('/')}}/admin_assets/education-day-arrangement-table-with-copy-space.jpg" alt="Dist Photo 2">
                                      <div class="card-img-overlay d-flex flex-column justify-content-center">
                                        <strong><h5 class="card-title text-white mt-5 pt-2">{{$subjectwiseunitlist['school_subject']['subject_name']}}</h5>
                                        <p class="card-text pb-2 pt-1 text-white">
                                         {{$subjectwiseunitlist['unit']}}
                                        </p>
                                        <a href="{{url('/')}}/student-subjectwise-unit-content/{{$subjectwiseunitlist['id']}}" class="text-white btn btn-danger">Click Here To View Content</a>
                                    </strong>
                                      </div>
                                    </div>
                                  </div>
                                 
                                     
                                @endforeach
                                @else
                                <div class="col-md-12 text-center" >
                                    <span class=" btn btn-danger p-3">Opps! There is no data uploaded Yet!</span>
                                </div>
                                
                                @endif

                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>



@endsection
