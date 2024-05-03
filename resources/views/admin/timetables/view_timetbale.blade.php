
@extends('admin.layouts.layout')
@section('title', 'View Time Table')

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
                        <li class="breadcrumb-item active">View Time Table</li>
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
                            <h3 class="card-title ">View Time Table</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table border="5" cellspacing="0" align="center">
                                <!--<caption>Timetable</caption>-->
                                <tr>
                                    <td align="center" height="50"
                                        width="100"><br>
                                        <b>Day/Period</b></br>
                                    </td>
                                    @foreach ($getalldata as $index => $periods)
                                        <td align="center" height="50"
                                            width="100">
                                            <b>{{ $index + 1 }}<br>{{ $periods->class_start_time}}--{{$periods->class_end_time}}</b>
                                        </td>
                                    @endforeach
                                   
                                 
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Monday</b></td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">Che</td>
                                    
                                    
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Tuesday</b>
                                    </td>
                                   
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td align="center" height="50">Mat</td>
                                  
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Wednesday</b>
                                    </td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">phy</td>
                                    <td align="center" height="50">Eng</td>
                                     
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Thursday</b>
                                    </td>
                                    <td align="center" height="50">Phy</td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Friday</b>
                                    </td>
                                    <td colspan="3" align="center"
                                        height="50">LAB
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Saturday</b>
                                    </td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td align="center" height="50">Mat</td>
                                    
                                </tr>
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
