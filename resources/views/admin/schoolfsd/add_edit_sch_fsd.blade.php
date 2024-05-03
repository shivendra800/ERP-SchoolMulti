@extends('admin.layouts.layout')

@section('title', $title)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New School</h1>
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
        <div class="container-fluid bg-info ">
            <div class="row p-3">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="forms-sample"
                            @if (empty($addfsd['id'])) action="{{ url('/add-edit-fsd') }}"
                            @else action="{{ url('add-edit-fsd/' . $addfsd['id']) }}" @endif
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body text-dark">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="card p-2">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">FSD Start</label>
                                                            <input type="date"
                                                                class="form-control @error('fsd_start') is-invalid @enderror"
                                                                id="" placeholder="Enter FSD Start"
                                                                name="fsd_start"
                                                                @if (!empty($addfsd['fsd_start'])) value="{{ $addfsd['fsd_start'] }}"  @else value="{{ old('fsd_start') }}" @endif>
                                                            @error('fsd_start')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">FSD End</label>
                                                            <input type="date"
                                                                class="form-control @error('fsd_end') is-invalid @enderror"
                                                                id="" placeholder="Enter FSD END " name="fsd_end"
                                                                @if (!empty($addfsd['fsd_end'])) value="{{ $addfsd['fsd_end'] }}"  @else value="{{ old('fsd_end') }}" @endif>
                                                            @error('fsd_end')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                                <a href="{{ url('/') }}/FSD-List" class="btn btn-secondary">Back</a>
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
