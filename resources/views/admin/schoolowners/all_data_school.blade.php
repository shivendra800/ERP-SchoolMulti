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
                    <h3 class="card-title ">Student Wise All Data</h3>

                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning p-2">
                            <div class="inner">
                                <div class="text-center bg-danger p-2">
                                    <a href="#">
                                        <h4> Student List</h4>
                                    </a>
                                    {{-- <h4 class="btn btn-info text-center p-2">Student List</h4> --}}
                                </div>
                                <div class="text-center mt-2">
                                    <h5>Total Student-{{ $getschollid['total_no_of_student'] }}</h5>

                                </div>


                            </div>

                            <div class="text-center btn-btn-danger bg-info">
                                <a href="{{ url('/') }}/get-school-wise-student/{{ $getschollid['id'] }}">
                                    View All Student List <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- overall fee collection  --}}
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning p-2">
                            <div class="inner">
                                <div class="text-center bg-danger p-2">
                                    <a href="#">
                                        <h4>Rs.{{ $overallfeecollection }} </h4>
                                        <p>Overall Fee Collection Report</p>
                                    </a>

                                </div>



                            </div>

                            <div class="text-center btn-btn-danger bg-info">
                                <a href="{{ url('/') }}/get-overall-fee-report/{{ $getschollid['id'] }}">
                                    View All Fee Collection <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- end overall  fee collection --}}

                    {{-- start  month wise fee collection --}}
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning p-2">
                            <div class="inner">
                                <div class="text-center bg-danger p-2">
                                    <a href="#">
                                        <h4>Rs.{{ $thismonthfeecollection }}</h4>
                                        <p>This Month Fee Collection Report</p>
                                    </a>
                                </div>

                            </div>
                            <div class="text-center btn-btn-danger bg-info">
                                <a href="{{ url('/') }}/get-monthwise-fee-report/{{ $getschollid['id'] }}">
                                    View Month Wise Fee Collection <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- end month wise fee collection --}}

                    {{-- start  yearly wise fee collection --}}
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning p-2">
                            <div class="inner">
                                <div class="text-center bg-danger p-2">
                                    <a href="#">
                                        <h4>Rs.{{ $thisyearfeecollection }}</h4>
                                        <p>This Year Fee Collection Report</p>
                                    </a>
                                </div>

                            </div>
                            <div class="text-center btn-btn-danger bg-info">
                                <a href="{{ url('/') }}/get-yearwise-fee-report/{{ $getschollid['id'] }}">
                                    View Year Wise Fee Collection <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- end yearly wise fee collection --}}



                </div>



            </div>
            <!-- /.row -->
            <div class="card">
                <div class="card-header bg-navy disabled color-palette">
                    <h3 class="card-title ">Teacher Wise All Data</h3>

                </div>
                <div class="row">
                    <div class="col-lg-3 col-6 ">

                        <div class="small-box bg-warning p-2">
                            <div class="inner">
                                <div class="text-center bg-danger p-2">
                                    <a href="#">
                                        <h4> Teacher List</h4>
                                    </a>

                                </div>
                                <div class="text-center mt-2">
                                    <h5>Total Teacher-{{ $getteachercount }}</h5>

                                </div>


                            </div>

                            <div class="text-center btn-btn-danger bg-info">
                                <a href="{{ url('/') }}/get-school-wise-teacher/{{ $getschollid['id'] }}">
                                    View All Teacher List <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- small card -->

                    </div>

                     {{-- overall fee collection  --}}
                     <div class="col-lg-3 col-6">
                      <!-- small card -->
                      <div class="small-box bg-warning p-2">
                          <div class="inner">
                              <div class="text-center bg-danger p-2">
                                  <a href="#">
                                      <h4>Rs.{{ $overallsalarycollection }} </h4>
                                      <p>Overall Salary Collection Report</p>
                                  </a>

                              </div>



                          </div>

                          <div class="text-center btn-btn-danger bg-info">
                              <a href="{{ url('/') }}/get-overall-salary-report/{{ $getschollid['id'] }}">
                                  View All Salary Collection <i class="fas fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div>
                  </div>
                  {{-- end overall  fee collection --}}

                  {{-- start  month wise fee collection --}}
                  <div class="col-lg-3 col-6">
                      <!-- small card -->
                      <div class="small-box bg-warning p-2">
                          <div class="inner">
                              <div class="text-center bg-danger p-2">
                                  <a href="#">
                                      <h4>Rs.{{ $thismonthsalarycollection }}</h4>
                                      <p>This Month Salary Collection Report</p>
                                  </a>
                              </div>

                          </div>
                          <div class="text-center btn-btn-danger bg-info">
                              <a href="{{ url('/') }}/get-monthwise-salary-report/{{ $getschollid['id'] }}">
                                  View Month Wise Salary Collection <i class="fas fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div>
                  </div>
                  {{-- end month wise fee collection --}}

                  {{-- start  yearly wise fee collection --}}
                  <div class="col-lg-3 col-6">
                      <!-- small card -->
                      <div class="small-box bg-warning p-2">
                          <div class="inner">
                              <div class="text-center bg-danger p-2">
                                  <a href="#">
                                      <h4>Rs.{{ $thisyearsalarycollection }}</h4>
                                      <p>This Year Salary Collection Report</p>
                                  </a>
                              </div>

                          </div>
                          <div class="text-center btn-btn-danger bg-info">
                              <a href="{{ url('/') }}/get-yearwise-salary-report/{{ $getschollid['id'] }}">
                                  View Year Wise Salary Collection <i class="fas fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div>
                  </div>
                  {{-- end yearly wise fee collection --}}



                </div>



            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection
