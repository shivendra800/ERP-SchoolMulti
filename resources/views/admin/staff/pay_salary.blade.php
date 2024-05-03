@extends('admin.layouts.layout')
@section('title', 'Month Wise Pay Salary')

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
                            <h3 class="card-title "> Month Wise Pay Salary</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead class="bg-primary text-center">
                                    <tr>


                                        <th>ID</th>
                                        <th>Month</th>
                                        <th>Total Salary</th>
                                        <th>Total Deduction</th>
                                        <th>Total Pay Salary</th>
                                        <th>Pay Salary</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center bg-secondary">
                                    @foreach ($getmonth as $index => $months)
                                        <tr>
                                                <td class="bg-primary">{{ $index + 1 }}</td>
                                                <td class="text-center bg-info"><strong class="btn btn-warning">{{ $months['month'] }}</strong></td>
                                               
                                                <td>Rs.{{$getstaffsalarydata->total}}</td>
                                                <td>Rs.{{$getstaffsalarydata->total_dedunction}}</td>
                                                <td>Rs.{{$getstaffsalarydata->total_paid}}</td>
                                                <form action="{{url('/')}}/monthwise-pay-salary/{{$getstaffsalarydata->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="salary_month" value="{{ $months['month'] }}">
                                                    <td><button type="submit" class="btn btn-danger">Pay</button></td>

                                                </form>
                                                
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
