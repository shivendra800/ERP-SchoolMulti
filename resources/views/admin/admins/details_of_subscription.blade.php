@extends('admin.layouts.layout')
@section('title', 'Subscription Buy Plan History List')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
           

            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Subscription Buy Plan History List</li>
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
                        <div class="card-header bg-navy color-palette">
                            <h3 class="card-title">Subscription Buy Plan History List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">


                           <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                         <th>Total Student </th>
                                        <th>Per Std Price</th>
                                        <th>Subs Plan</th>
                                        <th>Total Price</th>
                                        <th>Plan Start Date</th>
                                        <th>Plan End Date</th>
                                        <th>Subs Status</th>
                                        
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataalllist as $index => $admindata)
                                        <tr id="tr_{{ $admindata['id'] }}">
                                           
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $admindata['total_stud'] }}</td>
                                            <td>Rs.{{ $admindata['per_std_price'] }}</td>
                                            <td class="text-info">{{ $admindata['plan'] }} Month</td>
                                            <td>Rs.{{ $admindata['total_price'] }}</td>
                                            <td class="text-primary">{{ $admindata['plan_start_date'] }}</td>
                                            <td class="text-danger">    {{ \Carbon\Carbon::parse($admindata['plan_end_date'])->isoFormat('MMM Do YYYY')}}</td>
                                            <td class="text-warning">{{ $admindata['payment_type'] }}</td>
                                        

                                           


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
