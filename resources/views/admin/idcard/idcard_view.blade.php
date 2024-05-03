@extends('admin.layouts.layout')
@section('title', 'Admin')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            
            {{-- error meg with close button---- --}}
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            {{-- error meg --}}


            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">All ID Card By Year And Class</li>
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
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title">All ID Card By Year And Class</h3>
                        </div>
                        <form method="GET" action="{{ route('report.student.idcard.get') }}" target="_blank">
                            @csrf
                            <div class="card-body bg-warning text-dark">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="card p-2">
                                            <div class="row">



                                                <div class="col-md-4">
                
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
                
                                                </div> <!-- End Col md 4 -->
                
                
                
                
                                                <div class="col-md-4">
                
                                                    <div class="form-group">
                                                        <h5>Class <span class="text-danger"> </span></h5>
                                                        <div class="controls">
                                                            <select name="class_id" id="class_id" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select Class
                                                                </option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                                @endforeach
                
                                                            </select>
                                                        </div>
                                                    </div>
                
                                                </div> <!-- End Col md 4-->
                
                
                
                
                
                                                <div class="col-md-4" style="padding-top: 25px;">
                
                                                    <input type="submit" class="btn btn-rounded btn-primary" value="Search">
                
                
                                                </div> <!-- End Col md 4 -->
                                            </div><!--  end row -->
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                           


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


  
@endsection
