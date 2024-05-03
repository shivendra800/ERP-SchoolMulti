@extends('admin.layouts.layout')

@section('title', 'Details Assign Techersubject')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Details Assign Techersubject </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Details Assign Techersubject</li>

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
                            <h3 class="card-title">
								<a href="{{ url('/') }}/TeacherAssign-subject-add">
									<button type="button" class="btn btn-block bg-maroon  color-palette btn-flat ">Add Assign Techersubject</button>
							   </a>
								</h3>
                        </div>
                        <div class="card-body">
							<div class="row">



								<div class="col-12">
			
									<div class="box">
										
										<!-- /.box-header -->
										<div class="box-body">
			
			
											<div class="table-responsive">
												<table class="table table-bordered table-striped">
													<thead class=" bg-primary text-center">
														<tr>
															<th width="5%">SL</th>
															<th width="20%">Class Name</th>
															<th width="20%">Subject Name</th>
															<th >Action</th>
			
			
														</tr>
													</thead>
													<tbody>
														@foreach ($detailsData as $key => $detail)
															<tr class="text-center">
																<td class="bg-primary">{{ $key + 1 }}</td>
																<td class="text-dark"> {{ $detail['student_class']['class_name'] }}</td>
																<td class="text-dark"> {{ $detail['school_subject']['subject_name'] }}</td>
																<td>
																	<a href="{{url('/')}}/delete-assign-techsub/{{ $detail['id'] }}"
                                                                        class="btn btn-primary">Delete</a>
																</td>
			
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
