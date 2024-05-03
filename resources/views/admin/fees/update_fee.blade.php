@extends('admin.layouts.layout')
@section('title', 'Class Wise Fee List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header bg-navy disabled color-palette">
                            <h3 class="card-title "> Class Wise Fee List</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="  table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead>
                                    <tr>


                                        <th>ID</th>
                                        <th>Month</th>
                                        <th>Fee Date</th>
                                        <th>Class</th>
                                        <th>Class Fee</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getclasswisefee as $index => $fee)
                                        <tr>
                                            <form class="form-horizontal" action="{{ url('add-edit-fee/' . $fee['id']) }}"
                                                method="post">
                                                @csrf
                                                <td>{{ $index + 1 }}</td>
                                                <td class="text-center bg-info"><strong class="btn btn-warning">{{ $fee['getmonth']['month'] }}</strong></td>

                                                <td>
                                                    <input type="date" name="fee_date" value="{{ $fee->fee_date }}"
                                                        class="form-control btn btn-secondary">
                                                </td>
                                                <td class="text-white text-center " style="background-color: rgb(238, 127, 127)">{{ $fee['getclass']['class_name'] }}</td>
                                                
                                                <td class=" bg-primary">
                                                    <input type="text" name="class_fee" value="{{ $fee->class_fee }}"
                                                        class="form-control text-center" placeholder="Enter class Wise Fee">
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger">Update Fee</button>
                                                </td>

                                            </form>


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
        </div>
    </section>

@endsection
