@extends('admin.layouts.layout')
@section('title', 'Staff Leave List')

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
                        <li class="breadcrumb-item active">Staff Leave List</li>
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
                        <div class=" card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Staff List</h3>
                            <a href="{{url('/')}}/approvel-list" class="btn btn-danger float-right">Approve list</a>
                            <a href="{{url('/')}}/cancel-list" class="btn btn-danger float-right mr-3 ">Cancel list</a>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body" style="overflow: auto;">


                           <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead class="bg-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Staff ID</th>
                                        <th>Staff Type</th>
                                        <th>Staff Name</th>
                                        <th>Phone No</th>
                                        <th>Leave Date</th>
                                        <th>Leave Reason</th>
                                       
                                        <th>Status</th>
                                        <th>Select Status</th>
                                        <th>Action</th>
                                       
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staffleavelist as $index => $getstaff)
                                        <tr>
                                           
                                            <td class="bg-primary">{{ $index + 1 }}</td>
                                            <td class="text-danger text-bold">{{ $getstaff['staff_data']['staff_member_id'] }}</td>
                                            <td>{{ $getstaff['staff_data']['staff_type'] }}</td>
                                            <td>{{ $getstaff['staff_data']['name'] }}</td>
                                            <td>{{ $getstaff['staff_data']['mobile'] }}</td>
                                            
                                            <td> <span class="text-primary text-bold">{{ \Carbon\Carbon::parse($getstaff['leave_start_date'])->isoFormat('MMM Do YYYY')}}</span> - <span class="text-danger text-bold">{{ \Carbon\Carbon::parse($getstaff['leave_end_date'])->isoFormat('MMM Do YYYY')}}</span></td>
                                            <td>{{ $getstaff['leave_region'] }}</td>
                                           
                                            <td>{{ $getstaff['leave_status'] }}</td>
                                            <form action="{{url('/')}}/admin-change-leavestatus/{{ $getstaff['id'] }}" method="post">
                                                @csrf
                                                <td>
                                                    <select name="leave_status" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Approved">Approved</option>
                                                        <option value="Cancel">Cancel</option>
                                                       
                                                    </select>
                                                </td>
                                                <td><button type="submit" class="btn btn-danger">Update</button></td>
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

