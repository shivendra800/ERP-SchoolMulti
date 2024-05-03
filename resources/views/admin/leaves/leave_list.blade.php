@extends('admin.layouts.layout')
@section('title', 'Leave Request List')

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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leave Request List</li>
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

                    <div class="card card-primary card-outline">
                        <div class="card-header  ">
                            <h3 class="card-title text-center">
                                <a href="{{ url('/') }}/add-edit-leave-request"> <button type="button"
                                        class="btn btn-block bg-maroon color-palette btn-flat ">Add Request Level</button></a>
                            </h3>
                        </div>
                    </div>
 

                    <div class="card">
                        <div class=" card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Leave Request List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-4 " style="background-color: aqua">


                           <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead>
                                    <tr class="text-center bg-primary">
                                        <th>ID</th>
                                        <th>Leave Start From</th>
                                        <th>Leave End Date</th>
                                        <th>Leave Region</th>
                                        <th>Leave Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getleavedata as $index => $leavedata)
                                        <tr class="text-center bg-secondary">
                                           
                                            <td>{{ $index + 1 }}</td>
                                            <td class="text-center bg-info"><strong class="btn btn-warning">{{ $leavedata['leave_start_date'] }}</strong></td>
                                            <td class="text-center bg-info"><strong class="btn btn-warning">{{ $leavedata['leave_end_date'] }}</strong></td>
                                            <td class="text-center bg-info"><strong class="btn btn-warning">{{ $leavedata['leave_region'] }}</strong></td>
                                            <td class="text-center bg-info"><strong class="btn btn-warning">{{ $leavedata['leave_status'] }}</strong></td>
                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a title="Edit type Details" href="{{ url('add-edit-leave-request/' . $leavedata['id']) }}"><i style="font-size:25px;" class="fa fa-edit"></i></a>

                                                    <form method="post" id="delete_form_{{ $leavedata['id'] }}" action="{{ url('/') }}/Delete-LeaveRequest/{{ $leavedata['id'] }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="deleted_id" value="{{ $leavedata['id'] }}">
                                                        <span onclick="deleteRow('{{ $leavedata['id']  }}')" type="button" class="badge badge-danger" title="Click to delete this row"><i class="fa fa-trash"></i></span>
                                                    </form>
                                                   
                                                </div>
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

