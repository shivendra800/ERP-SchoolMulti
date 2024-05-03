@extends('admin.layouts.layout')
@section('title', $title)
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
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
                            @if (empty($addcontent['id'])) action="{{ url('/add-edit-uploadcontent') }}"  @else action="{{ url('add-edit-uploadcontent/' . $addcontent['id']) }}" @endif
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
                                                            <label for="">Class Name</label>



                                                            <select name="class_id" id="class_id"
                                                                class="form-control  @error('class_id') is-invalid @enderror"
                                                                value="{{ old('class_id') }}" id="class_id"
                                                                onchange="getsubject();">
                                                                <option value="">Select Class</option>
                                                                @foreach ($getassigndata as $value)
                                                                    @if ($addcontent != null)
                                                                        @if ($value->assign_class_id == $addcontent['class_id'])
                                                                            <option selected
                                                                                value="{{ $value->assign_class_id }}">
                                                                                {{ $value['student_class']['class_name'] }}
                                                                            </option>
                                                                        @else
                                                                            <option value="{{ $value->assign_class_id }}">
                                                                                {{ $value['student_class']['class_name'] }}
                                                                            </option>
                                                                        @endif
                                                                    @else
                                                                        @if ($value->assign_class_id == old('class_id'))
                                                                            <option selected
                                                                                value="{{ $value->assign_class_id }}">
                                                                                {{ $value['student_class']['class_name'] }}
                                                                            </option>
                                                                        @else
                                                                            <option value="{{ $value->assign_class_id }}">
                                                                                {{ $value['student_class']['class_name'] }}
                                                                        @endif
                                                                    @endif
                                                                @endforeach

                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Subject Name</label>

                                                            <select name="subject_id" id="subject_id" required=""
                                                                class="form-control @error('subject_id') is-invalid @enderror" onchange="getunit();">
                                                                <option selected="">Select Subject</option>


                                                            </select>
                                                            @error('subject_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror

                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Unit Name</label>

                                                            <select name="unit_id" id="unit_id" required=""
                                                                class="form-control @error('unit_id') is-invalid @enderror">
                                                                <option selected="">Select Unit</option>


                                                            </select>
                                                            @error('unit_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror

                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Topic Name</label>
                                                            <input type="text"
                                                                class="form-control @error('topic_name') is-invalid @enderror"
                                                                id="" placeholder="Enter topic_name " name="topic_name"
                                                                @if (!empty($addcontent['topic_name'])) value="{{ $addcontent['topic_name'] }}"  @else value="{{ old('topic_name') }}" @endif>
                                                            @error('topic_name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror


                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Content Upload</label>
                                                            <input type="file"
                                                                class="form-control @error('upload_note') is-invalid @enderror"
                                                                id="" placeholder="Enter upload_note " name="upload_note"
                                                                @if (!empty($addcontent['upload_note'])) value="{{ $addcontent['upload_note'] }}"  @else value="{{ old('upload_note') }}" @endif>
                                                            @error('upload_note')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            @if (!empty($addcontent->upload_note))
                                                            <a target="_blank"
                                                                href="{{ url('/') }}/document/upload_note/{{ $addcontent['upload_note']}}">View
                                                                Image</a>&nbsp;&nbsp;
                                                            
            
                                                            <input type="hidden" name="current_upload_note"
                                                                value="{{ $addcontent['upload_note'] }}">
                                                        @endif


                                                        </div>

                                                    </div>
                                                </div>

                                            </div>






                                            <div class="card-footer text-center">

                                                <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                                @if( $addcontent['class_id'] != null)
                                                <a href="{{ url('/') }}/Upload-Content-List/{{ $addcontent['class_id']}}"
                                                    class="btn btn-secondary">Back</a>
                                                    @else
                                                    <a href="{{ url('/') }}/ContentList-Classwise"
                                                    class="btn btn-secondary">Back</a>
                                                @endif
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
            getunit();

        });

        function getsubject() {

            var class_id = $("#class_id").val();
            @if ($addcontent != null)
                var subject_id = "{{ $addcontent['subject_id'] }}";
            @else
                var subject_id = "{{ old('subject_id') }}";
            @endif

            $.ajax({
                url: "{{ url('/') }}/getassignsubject/" + class_id,
                dataType: "json",
                success: function(data) {
                    console.log("subject", data.data.assign_subject_id );
                    var option = '<option value="">Select Subject</option>';
                    for (var i = 0; i < data.data.length; i++) {
                        if (subject_id == data.data[i].assign_subject_id) {
                            option += "<option selected value=" + data.data[i].assign_subject_id + ">" + data
                                .data[i]
                                .school_subject.subject_name + "</option>";
                        } else {
                            option += "<option value=" + data.data[i].assign_subject_id + ">" + data.data[i]
                                .school_subject.subject_name + "</option>";
                        }
                    }
                    $("#subject_id").html(option);
                    getunit();
                }
            });

        }

        function getunit() {

            var class_id = $("#class_id").val();
            var subject_id = $("#subject_id").val();
            // alert(subject_id);
            @if ($addcontent != null)
                var unit_id = "{{ $addcontent['unit_id'] }}";
            @else
                var unit_id = "{{ old('unit_id') }}";
            @endif

            $.ajax({
                url: "{{ url('/') }}/getunit/" + class_id+"/"+subject_id,
                dataType: "json",
                success: function(data) {
                    // console.log("unit", data);
                    var option = '<option value="">Select Unit</option>';
                    for (var i = 0; i < data.data.length; i++) {
                        if (unit_id == data.data[i].id) {
                            option += "<option selected value=" + data.data[i].id + ">" + data
                                .data[i]
                                .unit + "</option>";
                        } else {
                            option += "<option value=" + data.data[i].id + ">" + data.data[i]
                                .unit + "</option>";
                        }
                    }
                    $("#unit_id").html(option);
                }
            });

        }
    </script>

@endsection
