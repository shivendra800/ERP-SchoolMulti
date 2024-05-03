@extends('admin.layouts.layout')
@section('title', 'Student Registration')
@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Registration</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Student Registration</li>

                </ol>
            </div>



        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid bg-info ">
        <div class="row p-3">


            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header card-header bg-navy disabled color-palette">
                        <h3 class="card-title">Student <strong>Search</strong></h3>
                    </div>
                    <div class="card-body text-dark">
                        <div class="row">


                            <div class="col-12">
                                <div class="box bb-3 border-warning">
                                
        
                                    <div class="box-body">
        
                                        <form method="post" action="{{ url('/') }}/students/Searchstudent-byclassyearSID">
                                           @csrf
                                            <div class="row">

                                               
                                            
                                               
                                                {{-- <div class="col-md-4"> --}}
        
                                                    <div class="form-group">
                                                        <h5>Student <span class="text-danger"> ID</span></h5>
                                                        {{-- <div class="controls"> --}}
                                                            <select  id='selUser' style='width: 200px;' name="student_id" required="" class="form-control ">
                                                                <option value="" selected="" disabled="">Select Student ID
                                                                </option>
                                                                @foreach ($student as $student)
                                                                    <option value="{{ $student->student_id }}">
                                                                        {{ $student['student']->s_name }}-{{ $student['student']->student_id }}</option>
                                                                @endforeach
        
                                                            </select>
                                                        {{-- </div> --}}
                                                    </div>
        
                                                {{-- </div> <!-- End Col md 4 --> --}}
        
        
                                                <div class="col-md-4" style="padding-top: 25px;">
        
                                                    <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search"
                                                        value="Search">
        
                                                </div> <!-- End Col md 4 -->
        
        
        
        
                                            </div><!--  end row -->
        
                                        </form>
        
        
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
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
                                        <th>Class</th>
                                        <th>Image</th>
                                        @if (Auth::guard('admin')->user()->type == 'Admin')
                                            <th>Code</th>
                                        @endif
                                       
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
                                                        <td> {{ $value['student_class']['class_name'] }}</td>
                                                        <td>
                                                            <img src="{{ !empty($value['student']['stu_image']) ? url('upload/student_images/' . $value['student']['stu_image']) : url('upload/no_image.jpg') }}"
                                                                style="width: 60px; width: 60px;">
                                                        </td>
                                                         
                                                        
                                                        <td>
                                                           
                                                          
                                                           
                                                        
                                                            <a href="{{url('/')}}/students/Fee-Submission/{{$value->student_id}}" class="btn btn-info btn-icon-only btn-circle btn-sm btn-air">
                                                                Pay Fee
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
