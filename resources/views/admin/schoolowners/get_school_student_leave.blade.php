@extends('admin.layouts.layout')
@section('title', 'Student Leave List')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student Leave List</li>
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
 

                    <div class="card">
                        @if($stdleavelist->count() > 0)
                        <div class=" card-header bg-navy disabled color-palette">
                            <h3 class="card-title float-center">Student List</h3>
                            <a href="{{url('/')}}/get-school-wise-student/{{$stdleavelist[0]['school_id']}}" class="btn btn-danger float-right">Back</a>
                          
                        </div>
                        @endif
                        <!-- /.card-header -->

                        <div class="card-body " style="overflow: auto;">

                            <div class="table-responsive">
                           <table id="example1" class="w-100 table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead class="bg-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Student ID</th>
                                        
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Stream/Section</th>
                                        <th>Leave Date</th>
                                        <th>Leave Reason</th>
                                       
                                        <th>Status</th>
                                       
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stdleavelist as $index => $getstuddent)
                                        <tr>
                                           
                                            <td class="bg-primary">{{ $index + 1 }}</td>
                                            <td class="text-danger text-bold">{{ $getstuddent['student_data']['student_id'] }}</td>
                                            <td>{{ $getstuddent['student_data']['s_name'] }}</td>
                                            <td>{{ $getstuddent['class_data']['class_name'] }}</td>
                                            <td>{{ $getstuddent['stream_data']['stream_name'] }}/{{ $getstuddent['section_data']['section_name'] }}</td>
                                            
                                            <td> <span class="text-primary text-bold">{{ \Carbon\Carbon::parse($getstuddent['leave_start_date'])->isoFormat('MMM Do YYYY')}}</span> - <span class="text-danger text-bold">{{ \Carbon\Carbon::parse($getstuddent['leave_end_date'])->isoFormat('MMM Do YYYY')}}</span></td>
                                            <td>{{ $getstuddent['leave_region'] }}</td>
                                           
                                            <td> <span class="btn btn-danger">{{ $getstuddent['leave_status'] }}</span> </td>
                                          
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
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
    <!-- /.content -->

@endsection
@section('script')
    

<script>
  function ActiveRow(id)
{
  console.log(id);
  swal({
    title: "Are you sure?",
    text: "You want to change status",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $("#active_form_"+id).submit();
    } else {
      //swal("Your data is safe!");
    }
  });

}

function InActiveRow(id)
{
  swal({
    title: "Are you sure?",
    text: "You want to change status",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $("#inactive_form_"+id).submit();
    } else {
      //swal("Your data is safe!");
    }
  });

}

function deleteRow(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#delete_form_" + id).submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }
</script>


@endsection

