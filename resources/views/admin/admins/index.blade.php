@extends('admin.layouts.layout')
@section('title', 'Admin')

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
                        <li class="breadcrumb-item active">Admin List</li>
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
                        <div class="card-header">
                            <h3 class="card-title ">
                                <a href="{{ url('/') }}/add-edit-admin"> <button type="button"
                                        class="btn btn-block bg-maroon disabled color-palette btn-flat ">Create New Admin</button></a>
                            </h3>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy color-palette">
                            <h3 class="card-title">Admin List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">


                           <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Admin Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Per Std Price</th>
                                        <th>Subs Plan</th>
                                        <th>Total Price</th>
                                        <th>Expiry Date</th>
                                        <th>Subs Status</th>
                                        
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admindata as $index => $admindata)
                                        <tr id="tr_{{ $admindata['id'] }}">
                                           
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $admindata['name'] }}</td>
                                            <td>{{ $admindata['email'] }}</td>
                                            <td>{{ $admindata['mobile'] }}</td>
                                            <td>Rs.{{ $admindata['per_std_price'] }}</td>
                                            <td>{{ $admindata['plan'] }} Month</td>
                                            <td>Rs.{{ $admindata['total_price'] }}</td>
                                            <td class="text-primary">{{ $admindata['plan_end_date'] }}</td>
                                            <td>
                                                @if($admindata['plan_status'] == 1)
                                                <span class="text-success">Active Subscription Plan </span>
                                                @else
                                                <span class="text-danger">InActive Subscription Plan</span>
                                                @endif
                                            </td>

                                            <td>

                                                <div style="display:inline-flex;">                         
                      
                                                  @if ($admindata['status'] == '1')
                                                       <form method="post" id="inactive_form_{{ $admindata['id'] }}"
                                                           action="{{ url('/') }}/Change-admin-status">
                                                           {{ csrf_field() }}
                                                           <input type="hidden" name="status_id"
                                                               value="{{ $admindata['id'] }}">
                                                           <input type="hidden" name="status" value="0">
                                                           <span onclick="InActiveRow('{{ $admindata['id'] }}')" class="badge badge-success" type="button" title="Click to In-Active this row"><i class="fa fa-eye"></i></span>
                                                       </form>
                                                  @else
                                                       <form method="post" id="active_form_{{ $admindata['id'] }}"
                                                           action="{{ url('/') }}/Change-admin-status">
                                                           {{ csrf_field() }}
                                                           <input type="hidden" name="status_id"
                                                               value="{{ $admindata['id'] }}">
                                                           <input type="hidden" name="status" value="1">
                                                           <span onclick="ActiveRow('{{ $admindata['id'] }}')" type="button" class="badge badge-warning"><i class="fa fa-eye-slash"></i></span>
                                                       </form>
                                                  @endif
                                                </div>
                                              </td>

                                            <td>
                                                <div style="display:inline-flex;">
                                                    <li>
                                                    <a title="Edit type Details" href="{{ url('add-edit-admin/' . $admindata['id']) }}"><i style="font-size:25px;" class="fa fa-edit"></i></a>
                                                    <a title="Details Of Subscription" href="{{ url('details-of-subscription/' . $admindata['id']) }}"><i style="font-size:25px;" class="fa fa-list"></i></a>

                                                    <form method="post" id="delete_form_{{ $admindata['id'] }}" action="{{ url('/') }}/Delete-admin/{{ $admindata['id'] }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="deleted_id" value="{{ $admindata['id'] }}">
                                                        <span onclick="deleteRow('{{ $admindata['id']  }}')" type="button" class="badge badge-danger" title="Click to delete this row"><i class="fa fa-trash"></i></span>
                                                    </form>
                                                </li>
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

