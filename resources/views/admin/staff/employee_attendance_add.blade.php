@extends('admin.layouts.layout')
@section('title', 'Add Attendance')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Attendance </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Add Attendance</li>

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
                       
                        <div class="card-body">
							<div class="row">
								<div class="col">
	
									<form method="post" action="{{ url('/attendance/employee/store') }}">
										@csrf
										<div class="row">
											<div class="col-12">
	
	
	
												<div class="row bg-secondary p-2">
													<div class="col-md-4"></div>
													<div class="col-md-4">
	
														<div class="form-group">
															<h5>Attendance Date <span class="text-danger">*</span></h5>
															<div class="controls">
																<input type="date" name="date" class="form-control" required>
															</div>
														</div>
	
													</div> <!-- // End Col md 6 -->
													<div class="col-md-4"></div>
												</div> <!-- // end Row  -->
	
	
												<div class="row">
													<div class="col-md-12">
	
														<table id="example1" class="table table-bordered table-striped">
															<thead class="bg-primary">
																<tr>
																	<th rowspan="2" class="text-center"
																		style="vertical-align: middle;">Sl</th>
																	<th rowspan="2" class="text-center"
																		style="vertical-align: middle;">Employee Name</th>
																	<th rowspan="2" class="text-center"
																		style="vertical-align: middle;">Employee ID</th>
																	<th colspan="3" class="text-center"
																		style="vertical-align: middle; width: 30%">Attendance
																		Status</th>
																</tr>
	
																<tr>
																	<th class="text-center btn present_all bg-warning"
																		style="display: table-cell;">
																		Present</th>
																	<th class="text-center btn leave_all bg-warning"
																		style="display: table-cell;">
																		Leave</th>
																	<th class="text-center btn absent_all bg-warning"
																		style="display: table-cell;">
																		Absent</th>
																</tr>
															</thead>
															<tbody>
																@foreach ($employees as $key => $employee)
																	<tr id="div{{ $employee->id }}" class="text-center">
																		<input type="hidden" name="employee_id[]"
																			value="{{ $employee->id }}">
																		<td class="bg-primary">{{ $key + 1 }}</td>
																		<td>{{ $employee->name }}</td>
																		<td class="text-bold">{{ $employee->staff_member_id }}</td>
	
																		<td colspan="3">
																			<div class="switch-toggle switch-3 switch-candy">
	
																				<input name="attend_status{{ $key }}"
																					type="radio" value="Present"
																					id="present{{ $key }}"
																					checked="checked">
																				<label
																					for="present{{ $key }}">Present</label>
	
																				<input name="attend_status{{ $key }}"
																					value="Leave" type="radio"
																					id="leave{{ $key }}">
																				<label
																					for="leave{{ $key }}">Leave</label>
	
																				<input name="attend_status{{ $key }}"
																					value="Absent" type="radio"
																					id="absent{{ $key }}">
																				<label
																					for="absent{{ $key }}">Absent</label>
	
																			</div>
																		</td>
																	</tr>
																@endforeach
															</tbody>
														</table>
	
	
	
	
	
													</div> <!-- // End Col md 12 -->
												</div> <!-- // end Row  -->
	
	
	
												<div class="text-center bg-secondary p-2">
													<input type="submit" class="btn btn-rounded btn-warning mb-5" value="Submit">
												</div>
									</form>
	
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