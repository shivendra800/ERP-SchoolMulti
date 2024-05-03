@extends('admin.layouts.layout')
@section('title', 'Edit Unit')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subject Unit </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Subject Unit</li>
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
                            <h3 class="card-title">Edit Unit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="forms-sample"
                            @if (empty($addunit['id'])) action="{{ url('/add-edit-unit') }}"  @else action="{{ url('add-edit-unit/' . $addunit['id']) }}" @endif
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
                                                            <label for="exampleInputEmail1">Class Name</label>

                                                            <select name="assign_class_id" id="class_id" required=""
                                                                class="form-control" onchange="getsubject();">
                                                                <option value="" selected="" disabled="">Select
                                                                    Class</option>
                                                                @foreach ($getassigndata as $class)
                                                                    <option value="{{ $class->class_id }}"
                                                                        {{ $addunit->assign_class_id == $class->class_id ? 'selected' : '' }}>
                                                                        {{ $class['student_class']['class_name'] }}</option>
                                                                @endforeach

                                                            </select>


                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Subject Name</label>

                                                            <select name="assign_subject_id" id="assign_subject_id"
                                                                required="" class="form-control @error('assign_subject_id') is-invalid @enderror">
                                                                <option selected="">Select Subject</option>


                                                            </select>
                                                            @error('assign_subject_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror

                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Unit Name</label>
                                                            <input type="text"
                                                                class="form-control @error('unit') is-invalid @enderror"
                                                                id="" placeholder="Enter Unit " name="unit"
                                                                @if (!empty($addunit['unit'])) value="{{ $addunit['unit'] }}"  @else value="{{ old('unit') }}" @endif>
                                                            @error('unit')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror


                                                        </div>

                                                    </div>
                                                </div>

                                            </div>






                                            <div class="card-footer text-center">

                                                <button type="submit" class="btn bg-maroon color-palette">Submit</button>
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
    <script>
           $(document).ready(function() {
            getsubject();
          
        });
        function getsubject() {

            var class_id = $("#class_id").val();
            @if ($addunit != null)
                var assign_subject_id = "{{ $addunit['assign_subject_id'] }}";
            @else
                var assign_subject_id = "{{ old('assign_subject_id') }}";
            @endif

            $.ajax({
                url: "{{ url('/') }}/getsubject/" + class_id,
                dataType: "json",
                success: function(data) {
                    console.log("subject", data);
                    var option = "";
                    for (var i = 0; i < data.data.length; i++) {
                        if (assign_subject_id == data.data[i].id) {
                            option += "<option selected value=" + data.data[i].subject_id + ">" + data.data[i]
                                .school_subject.subject_name + "</option>";
                        } else {
                            option += "<option value=" + data.data[i].subject_id + ">" + data.data[i]
                                .school_subject.subject_name + "</option>";
                        }
                    }
                    $("#assign_subject_id").html(option);
                }
            });

        }
    </script>

@endsection
