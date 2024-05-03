@extends('admin.layouts.layout')
@section('title', 'Student Fee Report View')
@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Fee Report View</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Student Fee Report View</li>

                </ol>
            </div>



        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

               


                <div class="card">
                 

                    <div class="card-body p-4 ">

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th>Name</th>
                                        <th>ID No</th>
                                        <th>Roll</th>
                                        <th>Year</th>
                                       
                                        <th width="25%">Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $value)
                                        <tr>
                                            <td class="bg-primary">{{ $key + 1 }}</td>
                                            <td> {{ $value['student']['s_name'] }}</td>
                                                        <td> {{ $value['student']['student_id'] }}</td>
                                                        <td> {{ $value['student']['reg_no']  }} </td>
                                                        <td> {{ $value['student_year']['name'] }}</td>
                                                     
                                                        <td>
                                                                                                                                                                              
                                                        
                                                            <a href="{{url('/')}}/students/fee-paid-list/{{$value->student_id}}" class="btn btn-info btn-icon-only btn-circle btn-sm btn-air">
                                                                <i class="fa fa-list"> Fee Paid List</i>
                                                            </a>
                                                            
                                                        </td>

                                                       


                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>



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




@endsection

@section('script')

<script>
    $(document).ready(function(){
 
 // Initialize select2
 $("#selUser").select2();

 // Read selected option
 
});
</script>

@endsection
