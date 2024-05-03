@extends('admin.layouts.layout')

@section('title', 'Add-TeacherAssign-Subject')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content-header">
        <div class="container-fluid">
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
                    <h1>Staff Attendance Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Staff Attendance Report</li>

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
                            <h3 class="card-title">Staff Attendance Report</h3>
                        </div>
                        <div class="card-body text-dark">
							<div class="row">


								<div class="col-12">
									<div class="box bb-3 border-warning">
									
			
										<div class="box-body">
			
											<form method="GET" action="{{ route('report.attendance.get') }}" target="_blank">
												@csrf
												<div class="row">
			
			
			
													<div class="col-md-4">
			
														<div class="form-group">
															<h5>Employee Name <span class="text-danger">*</span></h5>
															<div class="controls">
																<select name="staff_id" id="staff_id" required=""
																	class="form-control">
																	<option value="" selected="" disabled="">Select Employee
																	</option>
																	@foreach ($employees as $employee)
																		<option value="{{ $employee->id }}">{{ $employee->name }}
																		</option>
																	@endforeach
			
																</select>
															</div>
														</div>
			
													</div> <!-- End Col md 4 -->
			
			
			
			
													<div class="col-md-4">
			
														<div class="form-group">
															<h5>Date<span class="text-danger">*</span></h5>
															<div class="controls">
																<input type="date" name="date" class="form-control"
																	required="">
															</div>
														</div>
			
													</div> <!-- End Col md 4 -->
			
			
			
			
			
													<div class="col-md-4" style="padding-top: 25px;">
			
														<input type="submit" class="btn btn-rounded btn-primary" value="Search">
			
			
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

 
@endsection
