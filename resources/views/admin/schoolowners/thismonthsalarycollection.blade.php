@extends('admin.layouts.layout')
@section('title', 'Month Wise Paid salary history')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                   

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title "> Month Wise Paid salary history</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead class="text-center bg-primary">
                                    <tr>


                                        <th>ID</th>
                                        <th>Invoice No</th>
                                        <th>Teacher Name</th>
                                        <th>Month</th>
                                        <th>Total salary Paid</th>
                                        <th>salary Paid Date</th>
                                        

                                    </tr>
                                </thead>
                                <tbody class="text-center ">
                                    @foreach ($thismonthsalarycollection as $index => $salary)
                                        <tr >
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong class="btn btn-warning">{{ $salary['salaray_slip_no'] }}</strong></td>
                                            <td>{{ $salary['staffdetails']['name'] }}<br><strong class="btn btn-warning">{{ $salary['staffdetails']['staff_member_id'] }}</strong></td>
                                           
                                            <td><strong class="btn btn-warning">{{ $salary['salary_month'] }}</strong></td>
                                            <td><strong class="btn btn-warning">Rs.{{ $salary['total_paid'] }}</strong></td>
                                            <td><strong >{{ \Carbon\Carbon::parse($salary['created_at'])->isoFormat('MMM Do YYYY')}}</strong></td>
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
