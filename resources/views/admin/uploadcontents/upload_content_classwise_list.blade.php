@extends('admin.layouts.layout')
@section('title', 'Uploaded Content List')
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
                    <h1>Uploaded Content List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Uploaded Content List</li>
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
                                <a href="{{ url('/') }}/add-edit-uploadcontent"> <button type="button"
                                        class="btn btn-block bg-maroon color-palette btn-flat ">Upload Content</button></a>
                            </h3>
                        </div>
                    </div>
 


                    <div class="card">
                        <div class=" card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Uploaded Content List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 " style="background-color: aqua">


                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead>
                                    <tr class="text-center bg-primary">
                                        <th>ID</th>
                                        <th>Class Name</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($uploadcontentList as $index => $uploadcontent)
                                        <tr class="text-center bg-secondary">

                                            <td>{{ $index + 1 }}</td>
                                            <td class="text-center bg-info"><strong
                                                    class="btn btn-warning">{{ $uploadcontent['student_class']['class_name'] }}</strong>
                                            </td>
                                          
                                                  
                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a title="Details"
                                                        href="{{ url('Upload-Content-List/' . $uploadcontent['class_id']) }}"><i
                                                            style="font-size:25px;" class="fa fa-list text-danger"></i></a>

                                                   

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
