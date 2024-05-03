@extends('admin.layouts.layout')
@section('title', 'School List')

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
                        <li class="breadcrumb-item active">School List</li>
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
                                <a href="{{ url('/') }}/add-edit-school-reg"> <button type="button"
                                        class="btn btn-block bg-maroon color-palette btn-flat ">Create New School</button></a>
                            </h3>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title ">School List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                               
                                <thead>
                                    <tr>

                                       
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>School Name</th>
                                        <th>Principal Name</th>
                                        <th>Fsd Start /Fsd End</th>
                                        <th>Eamil</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($RegSchoolList as $index => $schoolList)
                                        <tr id="tr_{{ $schoolList['id'] }}">

                                           
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if(!empty($schoolList['logo_image']))
                                                <img style="width: 60px; height:60px;" src=" {{ asset('admin_assets/school_logo/'.$schoolList['logo_image']) }}">
                                                @else
                                                <img style="width: 60px; height:60px;" src=" {{ asset('admin_assets/school_logo/no-image.png') }}">
                                               @endif
                                             </td>
                                           
                                            <td>{{ $schoolList['school_name'] }}</td>
                                            <td>{{ $schoolList['principal_name'] }}</td>
                                            <td>{{ $schoolList['fsd_start'] }}/{{ $schoolList['fsd_end'] }}</td>
                                            <td>{{ $schoolList['email'] }}</td>

                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a title="Edit type Details"
                                                        href="{{ url('add-edit-school-reg/' . $schoolList['id']) }}"><i
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
