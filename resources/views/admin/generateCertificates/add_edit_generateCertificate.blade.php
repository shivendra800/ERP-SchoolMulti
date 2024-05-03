@extends('admin.layouts.layout')

@section('title', $title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Generate New Certificate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>

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
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                            <form class="forms-sample"
                                @if (empty($addcertificate['id'])) action="{{ url('/add-edit-leave-gen_certificate') }}"
                            @else action="{{ url('add-edit-leave-gen_certificate/' . $addcertificate['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
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
                                                                <label for="exampleInputEmail1">Certificat Name</label>
                                                                <input type="text"
                                                                    class="form-control @error('certificate_name') is-invalid @enderror"
                                                                    id="" placeholder="Enter Subject Name"
                                                                    name="certificate_name"
                                                                    @if (!empty($addcertificate['certificate_name'])) value="{{ $addcertificate['certificate_name'] }}"  @else value="{{ old('certificate_name') }}" @endif>
                                                                @error('certificate_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Partic Name</label>
                                                                <input type="text"
                                                                    class="form-control @error('part_name') is-invalid @enderror"
                                                                    id="" placeholder="Enter Subject Name"
                                                                    name="part_name"
                                                                    @if (!empty($addcertificate['part_name'])) value="{{ $addcertificate['part_name'] }}"  @else value="{{ old('part_name') }}" @endif>
                                                                @error('part_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Certificate Content</label>
                                                                <textarea class="form-control @error('content') is-invalid @enderror" id="" rows="10"
                                                                    placeholder="Enter Certificate Content" name="content" required>
                                                                    @if (!empty($addcertificate['content']))
                                                                    {{ $addcertificate['content'] }}
                                                                    @else
                                                                    {{ old('content') }}
                                                                    @endif
                                                                </textarea>
                                                                @error('content')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Year <span class="text-danger">*</span></label>
                                                                <div class="controls">
                                                                    <select class="form-control @error('year_id') is-invalid @enderror"
                                                                    name="year_id">
                                                                    <option value="">Select Year</option>
                                                                    @foreach ($years as $year)
                                                                        <option value="{{ $year['id'] }}"
                                                                            @selected($year['id'] == $addcertificate['year_id'])
                                                                            {{ old('year_id') == $year['id'] ? 'selected' : '' }}>
                                                                            {{ $year['name'] }}</option>
                                                                    @endforeach
                                                                </select>


                                                                  
                                                                    @if ($errors->has('year_id'))
                                                                    <span class="text-danger">{{ $errors->first('year_id') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>






                                                <div class="card-footer text-center">

                                                    <button type="submit"
                                                        class="btn bg-maroon color-palette">Submit</button>
                                                    <a href="{{ url('/') }}/Generate-Certificate-List"
                                                        class="btn btn-secondary">Back</a>
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
@section('script')

    <script></script>

@endsection
