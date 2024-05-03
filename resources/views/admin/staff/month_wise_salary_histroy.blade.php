@extends('admin.layouts.layout')
@section('title', 'Month Wise Paid Salary history')

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
                            <h3 class="card-title "> Month Wise Paid Salary history</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead class="text-center bg-primary">
                                    <tr>


                                        <th>ID</th>
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
                                    @foreach ($mwshistory as $index => $months)
                                        <tr class="bg-info">
                                                <td>{{ $index + 1 }}</td>
                                                <td><strong class="btn btn-warning">{{ $months['salary_month'] }}</strong></td>
                                                <td><strong class="btn btn-warning">Rs.{{ $months['salary'] }}</strong></td>
                                                <td><strong class="btn btn-warning">Rs.{{ $months['total_dedunction'] }}</strong></td>
                                                <td><strong class="btn btn-warning">Rs.{{ $months['total_paid'] }}</strong></td>
                                                <td><strong class="btn btn-warning">{{ \Carbon\Carbon::parse($months->fsd)->isoFormat('YYYY')}}</strong></td>
                                                <td><strong class="btn btn-warning">{{ \Carbon\Carbon::parse($months->created_at)->isoFormat('MMM Do YYYY')}}</strong></td>
                                                <td>
                                                    <a href="{{url('/')}}/MWSSDownload/{{ $months['id'] }}" target="_blank" class="btn btn-danger">View</a>
                                                    <a href="{{url('/')}}/MWSSDownload/{{ $months['id'] }}" download=""><i class="fa fa-download text-danger" aria-hidden="true"></i></a>
                                                </td>
                                                
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
        </div>
    </section>

@endsection
