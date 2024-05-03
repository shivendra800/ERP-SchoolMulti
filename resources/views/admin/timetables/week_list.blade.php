
@extends('admin.layouts.layout')
@section('title', 'Week List')

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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Week List</li>
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

                   
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title ">WeekList</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                               
                                <thead class="bg-primary">
                                    <tr class="text-center">

                                       
                                        <th>ID</th>
                                        <th>Week Name</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getweeklist as $index => $getweeklist)
                                        <tr class="text-center">
                                            
                                            <td class="bg-primary">{{ $index + 1 }}</td>
                                            <td  class="text-center  bg-info"><span class="btn btn-warning">{{$getweeklist['week_name'] }}</span></td>
                                           
                                                                                   

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
