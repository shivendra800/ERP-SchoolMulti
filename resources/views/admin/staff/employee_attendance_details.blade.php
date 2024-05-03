@extends('admin.layouts.layout')
@section('title', 'Details Staff Attendance')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Details Staff Attendance </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Details Staff Attendance</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-navy disabled color-palette">

                            {{-- <h3 class="card-title">
                                <a href="{{ url('/attendance/employee/add') }}">
                                    <button type="button" class="btn btn-block bg-maroon  color-palette btn-flat ">Add
                                        Add Attendance</button>
                                </a>
                            </h3> --}}
                        </div>
                        <div class="card-body">

							<div class="row">



								<div class="col-12">
			
									<div class="box">
										
										<!-- /.box-header -->
										<div class="box-body">
											<div class="table-responsive">
												<table id="example1" class="table table-bordered table-striped text-center">
													<thead class="bg-primary">
														<tr>
															<th width="5%">SL</th>  
															<th>Name</th>
															<th>ID No </th>
															<th>Date </th>
															<th>Attend Status</th>		
			
														</tr>
													</thead>
													<tbody>
														@foreach($details as $key => $value )
														<tr>
															<td>{{ $key+1 }}</td>
															<td> {{ $value['getstaff']['name'] }}</td>
															<td> {{ $value['getstaff']['staff_member_id'] }}</td>
															<td> {{ date('d-m-Y', strtotime($value->date)) }}</td>
															<td> {{ $value->attend_status }}</td>
															
															
														</tr>
														@endforeach
			
													</tbody>
													<tfoot>
			
													</tfoot>
												</table>
											</div>
										</div>
										<!-- /.box-body -->
									</div>
									<!-- /.box -->
			
			
								</div>
								<!-- /.col -->
							</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

@endsection




























































