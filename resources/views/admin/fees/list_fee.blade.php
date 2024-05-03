
@extends('admin.layouts.layout')
@section('title', 'Fee List')

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
                        <li class="breadcrumb-item active">Fee List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Add Fee</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="forms-sample" action="{{ url('/add-edit-fee') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body bg-warning text-dark">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="card p-2">
                                            <div class="col-md-12">
                                                <div class="row bg-info">
                                                    {{-- <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Month</label>
                                                            <select class="form-control text-dark" id="month" name="month" >
                                                                <option>Select Month</option>
                                                                @foreach ($monthdata as $getmonth )
                                                                <option  value="{{ $getmonth['month']}}">{{ $getmonth['month'] }}</option>
                            
                                                                @endforeach
                            
                                                            </select>
                                                                                                                     
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Class</label>
                                                            <select class="form-control text-dark" id="class_id" name="class_id" >
                                                                <option>Select Class</option>
                                                                @foreach ($classdata as $getclass )
                                                                <option  value="{{ $getclass['id']}}">{{ $getclass['class_name'] }}</option>
                            
                                                                @endforeach
                            
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Stream</label>
                                                            <select class="form-control text-dark" id="stream_id" name="stream_id">
                                                                <option value="0">Select Stream</option>
                                                                @foreach ($streamdata as $gettream )
                                                                <option  value="{{ $gettream['id']}}" >{{ $gettream['stream_name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Section</label>
                                                            <select class="form-control text-dark" id="section" name="section">
                                                                <option value="0">Select Section</option>
                                                                @foreach ($section as $section )
                                                                <option  value="{{ $section['id']}}" >{{ $section['section_name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Fee Start Date/Month</label>
                                                            <input type="date" class="form-control " placeholder="Enter Fee Date " name="fee_date"  value="{{ old('fee_date') }}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> Class Fee</label>
                                                            <input type="text" class="form-control " id="" placeholder="Enter Fee Date " name="class_fee"  value="{{ old('class_fee') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="text-center p-4">
                                                            <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title">View Fee Details By Search</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="forms-sample" action="{{ url('/fee-search') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body bg-warning text-dark">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="card p-2">
                                            <div class="col-md-12">
                                                <div class="row bg-info">
                                                    {{-- <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Month</label>
                                                            <select class="form-control text-dark" id="month" name="month" >
                                                                <option>Select Month</option>
                                                                @foreach ($monthdata as $getmonth )
                                                                <option  value="{{ $getmonth['month']}}">{{ $getmonth['month'] }}</option>
                            
                                                                @endforeach
                            
                                                            </select>
                                                                                                                     
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Class</label>
                                                            <select class="form-control text-dark" id="class_id" name="class_id" >
                                                                <option>Select Class</option>
                                                                @foreach ($classdata as $getclass )
                                                                <option  value="{{ $getclass['id']}}">{{ $getclass['class_name'] }}</option>
                            
                                                                @endforeach
                            
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Stream</label>
                                                            <select class="form-control text-dark" id="stream_id" name="stream_id">
                                                                <option value="0">Select Stream</option>
                                                                @foreach ($streamdata as $gettream )
                                                                <option  value="{{ $gettream['id']}}" >{{ $gettream['stream_name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Select Section</label>
                                                            <select class="form-control text-dark" id="section" name="section">
                                                                <option value="0">Select Section</option>
                                                                @foreach ($sectiondata as $sectiondata )
                                                                <option  value="{{ $sectiondata['id']}}" >{{ $sectiondata['section_name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="text-center p-4">
                                                            <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                   
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title ">Fee List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="card-body">
                                <table id=" " class="  table table-bordered table-hover dataTable dtr-inline"
                                    aria-describedby="example1_info">
    
                                    <thead>
                                        <tr>
    
    
                                            <th>ID</th>
                                            <th>Month</th>
                                            <th>Fee Date</th>
                                            <th>Class</th>
                                            <th>Stream</th>
                                            <th>Section</th>
                                            <th>Class Fee</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getclasswisefee as $index => $fee)
                                            <tr>
                                                <form class="form-horizontal" action="{{ url('add-edit-fee/' . $fee['id']) }}"
                                                    method="post">
                                                    @csrf
                                                    <td>{{ $index + 1 }}</td>
                                                    <td class="text-center bg-info"><strong class="btn btn-warning">{{ $fee['getmonth']['month'] }}</strong></td>
    
                                                    <td>
                                                        <input type="date" name="fee_date" value="{{ $fee->fee_date }}"
                                                            class="form-control btn btn-secondary">
                                                    </td>
                                                    <td class="text-white text-center " style="background-color: rgb(238, 127, 127)">{{ $fee['getclass']['class_name'] }}</td>
                                                    <td class="text-white text-center " style="background-color: rgb(238, 127, 127)">{{ $fee['getstream']['stream_name'] }}</td>
                                                    <td class="text-white text-center " style="background-color: rgb(238, 127, 127)">{{ $fee['getsection']['section_name'] }}</td>
                                                    
                                                    <td class=" bg-primary">
                                                        <input type="text" name="class_fee" value="{{ $fee->class_fee }}"
                                                            class="form-control text-center" placeholder="Enter class Wise Fee">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger">Update Fee</button>
                                                    </td>
    
                                                </form>
    
    
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            
                            </div>
                            <!-- /.card-body -->
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
    <!-- /.content -->

@endsection
