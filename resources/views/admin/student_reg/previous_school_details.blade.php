@extends('admin.layouts.layout')

@section('title', "Student More Details ")

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subject List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Student More Details</li>

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
                            <h3 class="card-title">Student More Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                            <form class="forms-sample"
                                action="{{ url('students/previous-school-details/'.$getstudentaddmin['id']) }}"
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

                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="previous_school_name">Previous School Name</label>
                                                                    <input type="text" class="form-control" name="previous_school_name" id="previous_school_name"@if(!empty($getStmordata['previous_school_name']))
                                                                    value="{{ $getStmordata['previous_school_name'] }}"  @else value="{{ old('previous_school_name') }}" @endif
                                                                    placeholder="Enter previous_school_name" required>
                                                                    </div>
                                                                   
                                  
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="previous_school_class">Previous School Class</label>
                                                                    <input type="text" class="form-control" name="previous_school_class" id="previous_school_class"@if(!empty($getStmordata['previous_school_class']))
                                                                    value="{{ $getStmordata['previous_school_class'] }}"  @else value="{{ old('previous_school_class') }}" @endif
                                                                    placeholder="Enter previous_school_class" required>
                                                                    </div>
                                  
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="previous_school_character_cerificate">Previous School Character Cerificate</label>
                                                                    <input type="file" class="form-control" name="previous_school_character_cerificate" id="previous_school_character_cerificate"@if(!empty($getStmordata['previous_school_character_cerificate']))
                                                                    value="{{ $getStmordata['previous_school_character_cerificate'] }}"  @else value="{{ old('previous_school_character_cerificate') }}" @endif
                                                                    placeholder="Enter previous_school_character_cerificate" >
                                                                    @if (!empty($getStmordata->previous_school_character_cerificate))
                                                                    <a target="_blank"
                                                                href="{{ url('/') }}/document/previous_school_character_cerificate/{{ $getStmordata['previous_school_character_cerificate']}}">View
                                                                Image</a>&nbsp;&nbsp;
                                                                    <input type="hidden" name="current_previous_school_character_cerificate"
                                                                    value="{{ $getStmordata['previous_school_character_cerificate'] }}">
                                                                    @endif
                                                                    </div>

                                                                    <div class="col-md-12">

                                                                        <div class="form-group">
                                                                            <div class="controls">
                                                                                <img id="showImage"
                                                                                    src="{{ !empty($getStmordata['previous_school_character_cerificate']) ? url('document/previous_school_character_cerificate/'.$getStmordata['previous_school_character_cerificate']) : url('upload/no_image.jpg') }}"
                                                                                    style="width: 100px; width: 100px; border: 1px solid #000000;">
                    
                                                                            </div>
                                                                        </div>
                    
                                                                    </div> <!-- End Col md 4 -->
                                  
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="previous_school_transfer_cerificate">Previous School Transfer Cerificate</label>
                                                                    <input type="file" class="form-control" name="previous_school_transfer_cerificate" id="previous_school_transfer_cerificate"@if(!empty($getStmordata['previous_school_transfer_cerificate']))
                                                                    value="{{ $getStmordata['previous_school_transfer_cerificate'] }}"  @else value="{{ old('previous_school_transfer_cerificate') }}" @endif
                                                                    placeholder="Enter previous_school_transfer_cerificate" >
                                                                    @if (!empty($getStmordata->previous_school_transfer_cerificate))
                                                                    <a target="_blank"
                                                                href="{{ url('/') }}/document/previous_school_transfer_cerificate/{{ $getStmordata['previous_school_transfer_cerificate']}}">View
                                                                Image</a>&nbsp;&nbsp;
                                                                    <input type="hidden" name="current_previous_school_transfer_cerificate"
                                                                    value="{{ $getStmordata['previous_school_transfer_cerificate'] }}">
                                                                    @endif
                                                                    </div>

                                                                    <div class="col-md-12">

                                                                        <div class="form-group">
                                                                            <div class="controls">
                                                                                <img id="showImage"
                                                                                    src="{{ !empty($getStmordata['previous_school_transfer_cerificate']) ? url('document/previous_school_transfer_cerificate/'.$getStmordata['previous_school_transfer_cerificate']) : url('upload/no_image.jpg') }}"
                                                                                    style="width: 100px; width: 100px; border: 1px solid #000000;">
                    
                                                                            </div>
                                                                        </div>
                    
                                                                    </div> <!-- End Col md 4 -->
                                  
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>






                                                <div class="card-footer text-center">

                                                    <button type="submit"
                                                        class="btn bg-maroon color-palette">Submit</button>
                                                    <a href="{{ url('/') }}/students/reg/view"
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
