@extends('admin.layouts.layout')

@section('title', 'hj')

@section('content')

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Student Year</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
					<li class="breadcrumb-item active">Add Year</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

    <section class="content">
        <div class="container-fluid bg-info">
            <div class="row p-3">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary ">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Edit Year</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="post" action="{{ route('update.student.year', $editData->id) }}">
                            @csrf
                            <div class="card-body text-dark">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="card p-2">

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <h5>Student Year <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name" class="form-control"
                                                                    value="{{ $editData->name }}">
                                                                @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>






                                            <div class="card-footer text-center">

                                                <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                                <a href="{{ url('student/year/view') }}" class="btn btn-secondary">Back</a>
                                            </div>

                                        </div>



                                    </div>
                                    <div class="col-md-3"></div>





                                </div>


                            </div>
                            <!-- /.card-body -->


                        </form>



                    </div>
                    <!-- /.card -->


                </div>

            </div>
        </div>
    </section>


   




@endsection
