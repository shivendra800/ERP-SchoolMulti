@extends('admin.layouts.layout')
@section('title', 'New Session FSD')

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
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">New Session FSD</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h3 class="card-title ">
                                <a href="{{ url('/') }}/add-edit-fsd"> <button type="button"
                                        class="btn btn-block bg-maroon color-palette btn-flat ">Create New Session Start & End FSD</button></a>
                            </h3>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title ">New Session FSD</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                               
                                <thead class="bg-primary">
                                    <tr>

                                       
                                        <th>ID</th>
                                        <th>New Session Start Date</th>
                                        <th>New Session Start End</th>
                                        <th>Apply</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fsdlist as $index => $updatedfsd)
                                        <tr>
                                            <td class="bg-primary">{{ $index + 1 }}</td>
                                            <td>{{ $updatedfsd['fsd_start'] }}</td>
                                            <td>{{ $updatedfsd['fsd_end'] }}</td>
                                            @if($updatedfsd['fsd_status'] == "0")
                                            <td>
                                                <form class="form-horizontal" action="{{ url('apply-fsd/'.$updatedfsd['id']) }}"
                                                method="post">
                                                @csrf
                                                    <input type="hidden" name="fsd_start"  value="{{ $updatedfsd['fsd_start'] }}">
                                                    <input type="hidden" name="fsd_end"  value="{{ $updatedfsd['fsd_end'] }}">
                                                   
                                                    <button type="submit" class="btn btn-success">Apply New FSD</button>
                                                </form>
                                            </td>
                                            @else
                                            <td>
                                               <span class="btn btn-danger"> Applied</span>
                                            </td>
                                            @endif
                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a title="Edit type Details"
                                                        href="{{ url('add-edit-fsd/' . $updatedfsd['id']) }}"><i
                                                            style="font-size:25px;" class="fa fa-edit"></i></a>
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
    <!-- /.content -->

@endsection
