@extends('admin.layouts.layout')
@section('title', 'Class List')

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
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add/Edit/View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content" >
        <div class="container-fluid bg-info">
            <div class="row p-3" >
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills bg-secondary text-white" >
                                <li class="nav-item"><a class="nav-link actives text-white" href="#activity"
                                        data-toggle="tab">Class</a></li>
                                <li class="nav-item"><a class="nav-link text-white" href="#timeline" data-toggle="tab">Stream</a>
                                </li>
                                <li class="nav-item"><a class="nav-link text-white" href="#settings" data-toggle="tab">Section</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center bg-info">
                                                    <form class="form-horizontal" action="{{ url('add-edit-class/') }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row text-secondary">
                                                            <label for="inputName" class="col-sm-3 col-form-label text-white">Class
                                                                Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text"
                                                                    class="form-control @error('class_name') is-invalid @enderror"
                                                                    id="" placeholder="Enter Class  Name"
                                                                    name="class_name"
                                                                    @if (!empty($addclass['class_name'])) value="{{ $addclass['class_name'] }}"  @else value="{{ old('class_name') }}" @endif>
                                                                @error('class_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                                                                     
                                                    <table id=""
                                                        class="table table-bordered table-hover dataTable dtr-inline text-secondary" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr class="text-center bg-primary">
                                                                <th>ID</th>
                                                                <th>Class Name</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($classdata as $index => $classlist)
                                                           
                                                                <tr class="text-center bg-secondary">
                                                                    <td>{{ $index + 1 }}</td>

                                                                    <td>
                                                                        <form class="form-horizontal" action="{{ url('add-edit-class/'.$classlist['id']) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        
                                                                        <input type="hidden" name="id" value="{{ $classlist['id'] }}">
                                                                        <input type="text"  class="text-center" name="class_name" value="{{ $classlist['class_name'] }}">
                                                                        <button type="submit" class="btn btn-warning">Update</button>
                                                                        </form>
                                                                    </td>
                                                                    <td>
                                                                        <div style="display:inline-flex;">
                                                                            @if ($classlist['status'] == '1')
                                                                                <form method="post"
                                                                                    id="inactive_form_{{ $classlist['id'] }}"
                                                                                    action="{{ url('/') }}/Change-class-status">
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="status_id"
                                                                                        value="{{ $classlist['id'] }}">
                                                                                    <input type="hidden" name="status"
                                                                                        value="0">
                                                                                    <span
                                                                                        onclick="InActiveRow('{{ $classlist['id'] }}')"
                                                                                        class="badge badge-success"
                                                                                        type="button"
                                                                                        title="Click to In-Active this row"><i
                                                                                            class="fa fa-eye"></i></span>
                                                                                </form>
                                                                            @else
                                                                                <form method="post"
                                                                                    id="active_form_{{ $classlist['id'] }}"
                                                                                    action="{{ url('/') }}/Change-class-status">
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="status_id"
                                                                                        value="{{ $classlist['id'] }}">
                                                                                    <input type="hidden" name="status"
                                                                                        value="1">
                                                                                    <span
                                                                                        onclick="ActiveRow('{{ $classlist['id'] }}')"
                                                                                        type="button"
                                                                                        class="badge badge-warning"><i
                                                                                            class="fa fa-eye-slash"></i></span>
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div style="display:inline-flex;">
                                                                            {{-- <a title="Edit type Details"
                                                                                href="{{ url('add-edit-class/' . $classlist['id']) }}"><i
                                                                                    style="font-size:25px;"
                                                                                    class="fa fa-edit"></i></a> --}}
                                                                                   
                                                                                  

                                                                            <form method="post"
                                                                                id="delete_form_{{ $classlist['id'] }}"
                                                                                action="{{ url('/') }}/Delete-class/{{ $classlist['id'] }}">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="deleted_id"
                                                                                    value="{{ $classlist['id'] }}">
                                                                                <span
                                                                                    onclick="deleteRow('{{ $classlist['id'] }}')"
                                                                                    type="button"
                                                                                    class="badge badge-danger"
                                                                                    title="Click to delete this row"><i
                                                                                        class="fa fa-trash"></i></span>
                                                                            </form>

                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <div class="row text-secondary">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="form-horizontal" action="{{ url('add-edit-stream/') }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="inputName" class="col-sm-3 col-form-label">Stream
                                                                Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text"
                                                                    class="form-control @error('stream_name') is-invalid @enderror"
                                                                    id="" placeholder="Enter Class  Name"
                                                                    name="stream_name"
                                                                    @if (!empty($addstream['stream_name'])) value="{{ $addstream['stream_name'] }}"  @else value="{{ old('stream_name') }}" @endif>
                                                                @error('stream_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                                                                     
                                                    <table id=""
                                                        class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Stream Name</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($streamdata as $index => $streamdata)
                                                           
                                                                <tr>
                                                                    <td>{{ $index + 1 }}</td>

                                                                    <td>
                                                                        <form class="form-horizontal" action="{{ url('add-edit-stream/'.$streamdata['id']) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        
                                                                        <input type="hidden" name="id" value="{{ $streamdata['id'] }}">
                                                                        <input type="text" name="stream_name" value="{{ $streamdata['stream_name'] }}">
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                        </form>
                                                                    </td>
                                                                    <td>
                                                                        <div style="display:inline-flex;">
                                                                            @if ($streamdata['status'] == '1')
                                                                                <form method="post"
                                                                                    id="inactive_form_{{ $streamdata['id'] }}"
                                                                                    action="{{ url('/') }}/Change-stream-status">
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="status_id"
                                                                                        value="{{ $streamdata['id'] }}">
                                                                                    <input type="hidden" name="status"
                                                                                        value="0">
                                                                                    <span
                                                                                        onclick="InActiveRow('{{ $streamdata['id'] }}')"
                                                                                        class="badge badge-success"
                                                                                        type="button"
                                                                                        title="Click to In-Active this row"><i
                                                                                            class="fa fa-eye"></i></span>
                                                                                </form>
                                                                            @else
                                                                                <form method="post"
                                                                                    id="active_form_{{ $streamdata['id'] }}"
                                                                                    action="{{ url('/') }}/Change-stream-status">
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="status_id"
                                                                                        value="{{ $streamdata['id'] }}">
                                                                                    <input type="hidden" name="status"
                                                                                        value="1">
                                                                                    <span
                                                                                        onclick="ActiveRow('{{ $streamdata['id'] }}')"
                                                                                        type="button"
                                                                                        class="badge badge-warning"><i
                                                                                            class="fa fa-eye-slash"></i></span>
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div style="display:inline-flex;">
                                                                         
                                                                            <form method="post"
                                                                                id="delete_stream_{{ $streamdata['id'] }}"
                                                                                action="{{ url('/') }}/Delete-stream/{{ $streamdata['id'] }}">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="deleted_id"
                                                                                    value="{{ $streamdata['id'] }}">
                                                                                <span
                                                                                    onclick="deleteRowstream('{{ $streamdata['id'] }}')"
                                                                                    type="button"
                                                                                    class="badge badge-danger"
                                                                                    title="Click to delete this row"><i
                                                                                        class="fa fa-trash"></i></span>
                                                                            </form>

                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <div class="row text-secondary">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="form-horizontal" action="{{ url('add-edit-section/') }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                      
                                                     
                                                        <div class="form-group row">
                                                            <label for="inputName" class="col-sm-3 col-form-label">Section
                                                                Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text"
                                                                    class="form-control @error('section_name') is-invalid @enderror"
                                                                    id="" placeholder="Enter Class  Name"
                                                                    name="section_name"
                                                                    @if (!empty($addclass['section_name'])) value="{{ $addclass['section_name'] }}"  @else value="{{ old('section_name') }}" @endif>
                                                                @error('section_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                      

                                                       
                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                                                                     
                                                    <table id=""
                                                        class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                             
                                                                <th>Section Name</th>
                                                                
                                                                {{-- <th>Action</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($sectiondata as $index => $sectiondata)
                                                           
                                                                <tr>
                                                                    <td>{{ $index + 1 }}</td>
                                                                    
                                                                  
                                                                    <td>
                                                                        {{ $sectiondata['section_name'] }}
                                                                    </td>
                                                                  
                                                                   {{-- 
                                                                    <td>
                                                                        <div style="display:inline-flex;">
                                                                          
                                                                            <form method="post"
                                                                                id="delete_section_{{ $sectiondata['id'] }}"
                                                                                action="{{ url('/') }}/Delete-class/{{ $sectiondata['id'] }}">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="deleted_id"
                                                                                    value="{{ $sectiondata['id'] }}">
                                                                                <span
                                                                                    onclick="deleteRowsection('{{ $sectiondata['id'] }}')"
                                                                                    type="button"
                                                                                    class="badge badge-danger"
                                                                                    title="Click to delete this row"><i
                                                                                        class="fa fa-trash"></i></span>
                                                                            </form>

                                                                        </div>
                                                                    </td> --}}


                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
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
@section('script')


    <script>
        function ActiveRow(id) {
            console.log(id);
            swal({
                    title: "Are you sure?",
                    text: "You want to change status",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#active_form_" + id).submit();
                    } else {
                        //swal("Your data is safe!");
                    }
                });

        }

        function InActiveRow(id) {
            swal({
                    title: "Are you sure?",
                    text: "You want to change status",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#inactive_form_" + id).submit();
                    } else {
                        //swal("Your data is safe!");
                    }
                });

        }

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
        function deleteRowstream(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#delete_stream_" + id).submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }
        function deleteRowsection(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#delete_section_" + id).submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }
    </script>


@endsection
