@extends('admin.layouts.layout')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Welcome <span class="text-primary"> {{Auth::guard('admin')->user()->type}}</span> Dashboard</h1>
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

  {{-- <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-
      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content --> --}}

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Rs.{{$totalprice}}</h3>

              <p>Total Collected Amount</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('admin')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Rs.{{$totalpricetoday}}</h3>

              <p>Today Collection</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('admin')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Rs.{{$totalpricemonth}}</h3>

              <p>This Month Collection</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('admin')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>Rs.{{$totalpriceyear}}</h3>

              <p>This Year Collection</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-navy color-palette">
                        <h3 class="card-title">School Admin List</h3>
                    </div>
                </div>

                <div class="row">
                    @foreach ($admindata as $admindatas)
                        <div class="col-md-4">
                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                @if ($admindatas['plan_status'] == 1)
                                <div class="widget-user-header bg-info">
                                @else
                                <div class="widget-user-header bg-warning">
                                @endif

                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2"
                                            src="{{ url('/') }}/admin_assets/dist/img/dummy-user.png"
                                            alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">
                                        <h2>{{ $admindatas['name'] }}
                                            
                                        </h2>
                                    </h3>
                                    <h5 class="widget-user-desc">{{ $admindatas['type'] }}</h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-dark">
                                                No Of Schools <span
                                                    class="float-right badge bg-primary">{{ $admindatas['total_no_of_school'] }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-dark">
                                                Total No Of Students <span
                                                    class="float-right badge bg-info">{{ $admindatas['total_no_of_student'] }}</span>
                                            </a>
                                        </li>
                                        @if ($admindatas['plan_status'] == 1)
                                            <li class="nav-item">
                                                <a href="#" class="nav-link text-dark">
                                                    Plan Type <span class="float-right badge bg-success">{{ $admindatas['payment_type'] }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link text-dark">
                                                    Plan <span class="float-right badge bg-success">{{ $admindatas['plan'] }}Month</span>
                                                </a>
                                            </li>
                                            @if (!empty($admindatas['plan_start_date']))
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-dark">
                                                        Plan Start Date <span
                                                            class="float-right badge bg-danger">{{ $admindatas['plan_start_date'] }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (!empty($admindatas['plan_end_date']))
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-dark">
                                                        Plan Expiry Date <span
                                                            class="float-right badge bg-danger">{{ $admindatas['plan_end_date'] }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                        @if ($admindatas['plan_status'] == 1)
                                            <li class="nav-item">
                                                <a href="#" class="nav-link text-dark">
                                                    Current Status <span
                                                        class="float-right badge bg-warning">Active</span>
                                                </a>
                                            </li>
                                        @else
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="text-center p-2">

                                                        <a href="{{url('/')}}/subcription/{{ $admindatas['id'] }}" class="btn btn-danger" >Subscribe Now</a>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    <div class="text-center p-2">

                                                        <a href="{{url('/')}}/fix-payment-subcription/{{ $admindatas['id'] }}" class="btn btn-danger" >Fix Price Subscribe</a>
                                                    </div>

                                                </div>
                                            </div>

                                           
                                           
                                          
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endforeach

                </div>

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    </div><!-- /.container-fluid -->
  </section>
    
@endsection
