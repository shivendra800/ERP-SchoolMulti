@extends('admin.layouts.layout')
@section('title', 'Staff List')

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
                        <li class="breadcrumb-item active">Staff List</li>
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
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Joining Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stafflist as $index => $getstaff)
                                        <tr>
                                           
                                            <td class="bg-primary">{{ $index + 1 }}</td>
                                            <td class="text-danger text-bold">{{ $getstaff['staff_member_id'] }}</td>
                                            <td>{{ $getstaff['staff_type'] }}</td>
                                            <td>{{ $getstaff['name'] }}</td>
                                            <td>{{ $getstaff['email'] }}</td>
                                            <td>{{ $getstaff['mobile'] }}</td>
                                            <td class="text-danger">{{ $getstaff['e_joining_date'] }}</td>

                                            <td>

                                                <div style="display:inline-flex;">                         
                      
                                                  @if ($getstaff['status'] == '1')
                                                       <form method="post" id="inactive_form_{{ $getstaff['id'] }}"
                                                           action="{{ url('/') }}/Change-staff-status">
                                                           {{ csrf_field() }}
                                                           <input type="hidden" name="status_id"
                                                               value="{{ $getstaff['id'] }}">
                                                           <input type="hidden" name="status" value="0">
                                                           <span onclick="InActiveRow('{{ $getstaff['id'] }}')" class="badge badge-success" type="button" title="Click to In-Active this row"><i class="fa fa-eye"></i></span>
                                                       </form>
                                                  @else
                                                       <form method="post" id="active_form_{{ $getstaff['id'] }}"
                                                           action="{{ url('/') }}/Change-staff-status">
                                                           {{ csrf_field() }}
                                                           <input type="hidden" name="status_id"
                                                               value="{{ $getstaff['id'] }}">
                                                           <input type="hidden" name="status" value="1">
                                                           <span onclick="ActiveRow('{{ $getstaff['id'] }}')" type="button" class="badge badge-warning"><i class="fa fa-eye-slash"></i></span>
                                                       </form>
                                                  @endif
                                                </div>
                                              </td>

                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a title="Edit type Details" href="{{ url('add-edit-staff-reg/' . $getstaff['id']) }}"><i style="font-size:25px;" class="fa fa-edit"></i></a>

                                                    <form method="post" id="delete_form_{{ $getstaff['id'] }}" action="{{ url('/') }}/Delete-staff/{{ $getstaff['id'] }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="deleted_id" value="{{ $getstaff['id'] }}">
                                                        <span onclick="deleteRow('{{ $getstaff['id']  }}')" type="button" class="badge badge-danger" title="Click to delete this row"><i class="fa fa-trash"></i></span>
                                                    </form>
                                                    <a target="_blank" title="Details in pdf" href="{{ url('staff-reg/details',$getstaff['id']) }}"   class=""><i class="fa fa-eye text-warning"></i></a>
                                                  

                                                    <a target="_blank" href="{{url('/')}}/Staff-Id-card/{{$getstaff['id']}}"  title="Staff ID Card"  class="btn btn-danger">ID Card</a>
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

