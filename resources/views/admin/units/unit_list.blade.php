@extends('admin.layouts.layout')
@section('title', 'Unit List')
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
                    <h1>Subject Unit </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Subject Unit</li>
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
                            <h3 class="card-title">Add Unit</h3>
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
                                                            <select name="assign_class_id"
                                                                class="form-control @error('assign_class_id') is-invalid @enderror"
                                                                id="class_id">
                                                                <option value="" selected="" disabled="">Select
                                                                    Class
                                                                </option>
                                                                @foreach ($getassigndata as $class)
                                                                @if ($class->class_id == old('assign_class_id'))
                                                                    <option selected value="{{ $class->class_id }}">{{ $class['student_class']['class_name'] }}</option>
                                                                @else
                                                                <option value="{{ $class->class_id }}">  {{ $class['student_class']['class_name'] }}</option>
                                                                           
                                                                 @endif
                                                                @endforeach
                                                            </select>
                                                            @error('assign_class_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror



                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Subject Name</label>

                                                            <select name="assign_subject_id" id="assign_subject_id"
                                                                class="form-control  @error('assign_subject_id') is-invalid @enderror">
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">




                    <div class="card">
                        <div class=" card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Subject Unit List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 " style="background-color: aqua">


                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead>
                                    <tr class="text-center bg-primary">
                                        <th>ID</th>
                                        <th>Class Name</th>
                                        <th>Subject Name</th>
                                        <th>Unit Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unitList as $index => $unitLists)
                                        <tr class="text-center bg-secondary">

                                            <td>{{ $index + 1 }}</td>
                                            <td class="text-center bg-info"><strong
                                                    class="btn btn-warning">{{ $unitLists['student_class']['class_name'] }}</strong>
                                            </td>
                                            <td class="text-center bg-info"><strong
                                                    class="btn btn-warning">{{ $unitLists['school_subject']['subject_name'] }}</strong>
                                            </td>
                                            <td class="text-center bg-info"><strong
                                                    class="btn btn-warning">{{ $unitLists['unit'] }}</strong></td>

                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a title="Edit type Details"
                                                        href="{{ url('add-edit-unit/' . $unitLists['id']) }}"><i
                                                            style="font-size:25px;" class="fa fa-edit"></i></a>

                                                    <form method="post" id="delete_form_{{ $unitLists['id'] }}"
                                                        action="{{ url('/') }}/Delete-unit/{{ $unitLists['id'] }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="deleted_id"
                                                            value="{{ $unitLists['id'] }}">
                                                        <span onclick="deleteRow('{{ $unitLists['id'] }}')" type="button"
                                                            class="badge badge-danger" title="Click to delete this row"><i
                                                                class="fa fa-trash"></i></span>
                                                    </form>

                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

@section('script')
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#class_id', function() {

                var class_id = $('#class_id').val();

                $.ajax({
                    url: "{{ route('marks.getsubject') }}",
                    type: "GET",
                    data: {
                        class_id: class_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Subject</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.school_subject.id + '">' + v
                                .school_subject
                                .subject_name + '</option>';
                        });
                        $('#assign_subject_id').html(html);
                    }
                });
            });
        });

        function deleteRow(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#delete_form_" + id).submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }
    </script>
@endsection
