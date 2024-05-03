@extends('admin.layouts.layout')
@section('title', 'Registered Student')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Registered Student</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Registered Student</li>

                </ol>
            </div>



        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

               


                <div class="card">
                
                    <div class=" card-header bg-navy disabled color-palette">
                        @if($allData->count() > 0)
                        <a href="{{url('/')}}/All-Data-School/{{$allData[0]['school_id']}}" class="btn btn-danger float-right">Back</a>
                    
                        @endif
                      
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body p-4 ">

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th>Name</th>
                                        <th>ID No</th>
                                        <th>Roll</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Image</th>
                                        <th>Fee Details</th>
                                        <th>Leave Details</th>
                                        <th>Attendance Details</th>
                                       
                                      
                                      
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $value)
                                        <tr>
                                            <td class="bg-primary">{{ $key + 1 }}</td>
                                            <td> {{ $value['student']['s_name'] }}</td>
                                            <td> {{ $value['student']['student_id'] }}</td>
                                            <td> {{ $value['student']['reg_no']  }} </td>
                                            <td> {{ $value['student_year']['name'] }}</td>
                                            <td> {{ $value['student_class']['class_name'] }}</td>
                                            <td>
                                                <img src="{{ !empty($value['student']['stu_image']) ? url('upload/student_images/' . $value['student']['stu_image']) : url('upload/no_image.jpg') }}"
                                                    style="width: 60px; width: 60px;">
                                            </td>
                                            <td>
                                                <a href="{{url('/')}}/get-fee-paid-list/{{$value->school_id}}/{{$value->student_id}}" class="btn btn-info btn-icon-only btn-circle btn-sm btn-air">
                                                    <i class="fa fa-list"> Fee Paid </i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{url('/')}}/get-studentleave-list/{{$value->school_id}}/{{$value->student_id}}" class="btn btn-info btn-icon-only btn-circle btn-sm btn-air">
                                                    <i class="fa fa-list">Leave </i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{url('/')}}/get-studentattendance-list/{{$value->school_id}}/{{$value->student_id}}" target="_blank" class="btn btn-info btn-icon-only btn-circle btn-sm btn-air">
                                                    <i class="fa fa-list">Attendance </i>
                                                </a>
                                            </td>
                                                      


                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>



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
