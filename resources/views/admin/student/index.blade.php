@extends('admin.layouts.layout')
@section('title', 'Student List')

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
                        <li class="breadcrumb-item active">Student List</li>
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
                            <h3 class="card-title">Student List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">


                           <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example1_info">

                                <thead class="bg-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Class</th>
                                        <th>Phone No</th>
                                        <th>Addmission Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentlist as $index => $studentlists)
                                        <tr id="tr_{{ $studentlists['id'] }}">
                                           
                                            <td class="bg-primary">{{ $index + 1 }}</td>
                                            <td class="text-danger text-bold">{{ $studentlists['student_id'] }}</td>
                                            <td>{{ $studentlists['s_name'] }}</td>
                                            <td>{{ $studentlists['email'] }}</td>
                                            <td class="text-success">{{ $studentlists['classdata']['class_name'] }}</td>
                                            <td>{{ $studentlists['f_mobile_no'] }}</td>
                                            <td class="text-danger">{{ $studentlists['s_addmission_date'] }}</td>

                                            <td>

                                                <div style="display:inline-flex;">                         
                      
                                                  @if ($studentlists['status'] == '1')
                                                       <form method="post" id="inactive_form_{{ $studentlists['id'] }}"
                                                           action="{{ url('/') }}/Change-student-reg-status">
                                                           {{ csrf_field() }}
                                                           <input type="hidden" name="status_id"
                                                               value="{{ $studentlists['id'] }}">
                                                           <input type="hidden" name="status" value="0">
                                                           <span onclick="InActiveRow('{{ $studentlists['id'] }}')" class="badge badge-success" type="button" title="Click to In-Active this row"><i class="fa fa-eye"></i></span>
                                                       </form>
                                                  @else
                                                       <form method="post" id="active_form_{{ $studentlists['id'] }}"
                                                           action="{{ url('/') }}/Change-student-reg-status">
                                                           {{ csrf_field() }}
                                                           <input type="hidden" name="status_id"
                                                               value="{{ $studentlists['id'] }}">
                                                           <input type="hidden" name="status" value="1">
                                                           <span onclick="ActiveRow('{{ $studentlists['id'] }}')" type="button" class="badge badge-warning"><i class="fa fa-eye-slash"></i></span>
                                                       </form>
                                                  @endif
                                                </div>
                                              </td>

                                            <td>
                                                <div style="display:inline-flex;">
                                                    <a title="Edit type Details" href="{{ url('add-edit-student-reg/' . $studentlists['id']) }}"><i style="font-size:25px;" class="fa fa-edit"></i></a>

                                                    <form method="post" id="delete_form_{{ $studentlists['id'] }}" action="{{ url('/') }}/Delete-student-reg/{{ $studentlists['id'] }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="deleted_id" value="{{ $studentlists['id'] }}">
                                                        <span onclick="deleteRow('{{ $studentlists['id']  }}')" type="button" class="badge badge-danger" title="Click to delete this row"><i class="fa fa-trash"></i></span>
                                                    </form>
                                                   
                                                </div>
                                                <a target="_blank" title="Details in pdf" href="{{ url('reg/details',$studentlists['id']) }}"   ><i class="fa fa-eye bg-danger"></i></a>

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

