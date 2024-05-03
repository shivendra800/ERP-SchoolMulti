@extends('admin.layouts.layout')
@section('title', 'This Year  Fee Collection')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ Session::get('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
    

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title "> This Year  Fee Collection</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead class="text-center bg-primary">
                                    <tr>


                                        <th>ID</th>
                                        <th>Invoice No</th>
                                        <th>Student Name</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Month</th>
                                        <th>Total Fee Paid</th>
                                        <th>Fee Paid Date</th>
                                        <th>Payment Mode</th>
                                         @if(Auth::guard('admin')->user()->type=="School-Admin")
                                        <th>Fee Recipt </th>
                                        @endif
                                        

                                    </tr>
                                </thead>
                                <tbody class="text-center ">
                                    @foreach ($thisyearfeecollection as $index => $fee)
                                        <tr >
                                                <td>{{ $index + 1 }}</td>
                                                <td><strong class="btn btn-warning">{{ $fee['inovice_no'] }}</strong></td>
                                                <td>{{ $fee['student']['s_name'] }}<br><strong class="btn btn-warning">{{ $fee['student']['student_id'] }}</strong></td>
                                                <td><strong >{{ $fee['getyear']['name'] }}</strong></td>
                                                <td><strong >{{ $fee['getclass']['class_name'] }}</strong></td>
                                                <td><strong class="btn btn-warning">{{ $fee['getmonth']['month'] }}</strong></td>
                                                <td><strong class="btn btn-warning">Rs.{{ $fee['total_fee_amount'] }}</strong></td>
                                                <td><strong >{{ \Carbon\Carbon::parse($fee['created_at'])->isoFormat('MMM Do YYYY')}}</strong></td>
                                                <td><strong >{{ $fee['payment_mode'] }}</strong></td>
                                                @if(Auth::guard('admin')->user()->type=="School-Admin")
                                                <td>
                                                    <a href="{{url('/')}}/students/fee-paid-receipt/{{ $fee['id'] }}" target="_blank" class="btn btn-danger">View</a>
                                                    <a href="{{url('/')}}/students/fee-paid-receipt/{{ $fee['id'] }}" download=""><i class="fa fa-download text-danger" aria-hidden="true"></i></a>
                                                </td>
                                                @endif
                                                
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
            @endsection