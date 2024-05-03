@extends('admin.layouts.layout')
@section('title', 'Month Wise Pay Fee')

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
                            <h3 class="card-title "> Month Wise Pay Fee</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead class="bg-primary text-center">
                                    <tr>


                                        <th>ID</th>
                                        <th>Month</th>
                                        <th>Stream</th>
                                        <th>Section</th>
                                        <th>Year</th>
                                        <th>Amount</th>
                                       
                                        <th>Pay Fee</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center bg-secondary">
                                    @foreach ($getmonthfee as $index => $months)
                                        <tr>
                                                <td class="bg-primary">{{ $index + 1 }}</td>
                                                <td class="text-center bg-info"><strong class="btn btn-warning">{{ $months['getmonth']['month'] }}</strong></td>
                                               <td>{{$months['getstream']['stream_name']}}</td>
                                               <td>{{$months['getsection']['section_name']}}</td>
                                                <td>{{$getstaffsalarydata['student_year']['name']}}</td>
                                             
                                                <form action="{{url('/')}}/monthwise-pay-fee" method="post">
                                                    @csrf
                                                <td>{{ $months['class_fee'] }}</td>
                                               
                                            
                                                
                                                   
                                                   
                                                   
                                                    <td>
                                                        
                                                        <a href="{{url('/')}}/students/Payfeebymonth/{{$getstaffsalarydata['student_id']}}/{{ $months['id'] }}" class="btn btn-danger">Pay</a></td>
                                                       
                                                      
                                                      
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
