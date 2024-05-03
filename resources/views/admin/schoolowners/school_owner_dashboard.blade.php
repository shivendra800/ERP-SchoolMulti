@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Welcome <span class="text-primary"> {{ Auth::guard('admin')->user()->type }}</span>
                        Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header bg-navy disabled color-palette">
                    <h3 class="card-title ">School List</h3>

                </div>
                <div class="row">
                    @foreach ($getschoollist as $schoolList)
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                    src="{{ url('admin_assets/school_logo/' . $schoolList['getschooldat']['logo_image']) }}"
                                    alt="Dist Photo 2">
                                <div class="d-flex flex-column justify-content-center ">
                                    <h4 class="pt-2 mt-0 btn btn-warning">{{ $schoolList['name'] }} <a
                                            href="{{ url('/') }}/All-Data-School/{{ $schoolList['id'] }}"
                                            class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </h4>

                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
                <div class="d-felx justify-content-center">

                   {{ $getschoollist->links() }}

                </div>

            </div>
            <!-- /.row -->

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

        </div><!-- /.container-fluid -->
    </section>
@endsection
