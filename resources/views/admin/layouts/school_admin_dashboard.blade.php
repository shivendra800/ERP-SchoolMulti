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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Students Registration</h3>
                                <a href="{{ url('/') }}/students/reg/view">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <canvas id="myChart" height="100px"></canvas>
                            </div>
                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This Year
                                </span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card -->

                    <!-- /.card -->


                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Students Fee</h3>
                                <a href="{{ url('/') }}/students/reg/view">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <canvas id="feeChart" height="100px"></canvas>
                            </div>
                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This Year


                                </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $staffcount }}</h3>

                            <p>Total No OF Staff</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="ion ion-bag"></i> --}}
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('/') }}/staff-list" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$staffpresttodaycount}}<sup style="font-size: 20px"></sup></h3>

                            <p>Today Total Present Staff</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{url('attendance/employee/view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$staffLeavetodaycount}}</h3>

                            <p>Today Total Leave Staff</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{url('attendance/employee/view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$staffAbsenttodaycount}}</h3>

                            <p>Today Total  Absent Staff</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{url('attendance/employee/view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title ">Staff Latest Month Wise Paid Salary History</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead class="text-center bg-primary">
                                    <tr>


                                        <th>ID</th>
                                        <th>Teacher Member ID</th>
                                        <th>Month</th>
                                        <th>Basic Salary</th>
                                        <th>Total Deduction</th>
                                        <th>Total Pay Salary</th>
                                        <th>Session Year</th>
                                        <th>Salary Paied Date</th>
                                        <th>Salary Slip</th>


                                    </tr>
                                </thead>
                                <tbody class="text-center bg-primary">
                                    @foreach ($getstaffsalary as $index => $months)
                                        <tr class="bg-info">
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong class="btn btn-warning">{{ $months['staff_member_id'] }}</strong>
                                            </td>
                                            <td><strong class="btn btn-warning">{{ $months['salary_month'] }}</strong></td>
                                            <td><strong class="btn btn-warning">Rs.{{ $months['salary'] }}</strong></td>
                                            <td><strong
                                                    class="btn btn-warning">Rs.{{ $months['total_dedunction'] }}</strong>
                                            </td>
                                            <td><strong class="btn btn-warning">Rs.{{ $months['total_paid'] }}</strong>
                                            </td>
                                            <td><strong
                                                    class="btn btn-warning">{{ \Carbon\Carbon::parse($months->fsd)->isoFormat('YYYY') }}</strong>
                                            </td>
                                            <td><strong
                                                    class="btn btn-warning">{{ \Carbon\Carbon::parse($months->created_at)->isoFormat('MMM Do YYYY') }}</strong>
                                            </td>
                                            <td>
                                                <a href="{{ url('/') }}/MWSSDownload/{{ $months['id'] }}"
                                                    target="_blank" class="btn btn-danger">View</a>
                                                <a href="{{ url('/') }}/MWSSDownload/{{ $months['id'] }}"
                                                    download=""><i class="fa fa-download text-danger"
                                                        aria-hidden="true"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <a href="{{ url('/') }}/Staff-Salary-Report" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- /.card-body -->

                    </div>


                </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header bg-navy disabled color-palette">
                      <h3 class="card-title ">Student Latest Month Wise Paid Fee history</h3>

                  </div>
                  <!-- /.card-header -->

                  <div class="card-body">
                      <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                          aria-describedby="example1_info">

                          <thead class="text-center bg-primary">
                              <tr>


                                  <th>ID</th>
                                  <th>Student ID</th>
                                  <th>Invoice No</th>
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
                              @foreach ($getstudentfee as $index => $fee)
                                  <tr >
                                          <td>{{ $index + 1 }}</td>
                                          <td><strong class="btn btn-warning">{{ $fee['student']['student_id'] }}</strong></td>
                                          <td><strong class="btn btn-warning">{{ $fee['inovice_no'] }}</strong></td>
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
                  <a href="{{ url('/') }}/students/student-fee-report-byID" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            </div>




        </div><!-- /.container-fluid -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var studentcount = {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'No Of Registration',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: studentcount,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );


        ///////////////

        var feelabels = {{ Js::from($feelabels) }};
        var feedata = {{ Js::from($feedata) }};

        const datafee = {
            labels: feelabels,
            datasets: [{
                label: 'Total Fee',
                backgroundColor: 'rgb(0, 191, 255)',
                borderColor: 'rgb(0, 191, 255)',
                data: feedata,
            }]
        };

        const configfee = {
            type: 'bar',
            data: datafee,
            options: {}
        };

        const feeChart = new Chart(
            document.getElementById('feeChart'),
            configfee
        );
    </script>

    <script type="text/javascript"></script>
@endsection
