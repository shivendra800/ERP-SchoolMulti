@extends('admin.layouts.layout')

@section('title', 'Pay Student Fee')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pay Student Fee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Pay Student Fee</li>

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
                            <h3 class="card-title">Pay Student Fee</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form class="forms-sample"
                            action="{{ url('students/Payfeebymonth/' . $getstaffsalarydata['student_id'] . '/' . $getmonthfee['id']) }}"
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
                                                            <label for="exampleInputEmail1">Fee Amount</label>
                                                            <input type="text"
                                                                class="form-control "
                                                                id="fee_amount" name="fee_amount" readonly
                                                                value="{{ $getmonthfee['class_fee'] }}">
                                                          
                                                        </div>


                                                        @if ($getmonthfee['getmonth']['id'] == Carbon\Carbon::now()->month)
                                                            @if (\Carbon\Carbon::parse($getmonthfee['fee_date'])->isoFormat('Do') <= Carbon\Carbon::now()->day)
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Late Fee Fine</label>
                                                                    <input type="text" required
                                                                        class="form-control "
                                                                        id="late_fee_charges"   @if (!empty($getmonthfeedata['late_fee_charges'])) value="{{ $getmonthfeedata['late_fee_charges'] }}" @endif
                                                                        placeholder="Enter Fine Charge"
                                                                        name="late_fee_charges" onkeyup="gettotalvalue()">
                                                                 
                                                                </div>
                                                            @else
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Late Fee Fine</label>
                                                                    <input type="text"
                                                                        class="form-control "
                                                                       
                                                                        placeholder="Enter Fine Charge"
                                                                        name="late_fee_charges" value="0" readonly
                                                                       >
                                                                   
                                                                </div>
                                                            @endif
                                                            @else

                                                            <input type="hidden"  name="late_fee_charges" value="0" readonly >
                                                        @endif

                                                   









                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Total Fee</label>
                                                            <input type="text"
                                                                class="form-control "
                                                                id="total_fee_amount" placeholder="Enter Total Fee"
                                                                name="total_fee_amount" value="{{ old('fine_charge') }}" readonly>
                                                          
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Payment Mode</label>
                                                            <input type="text"
                                                                class="form-control "
                                                                id="payment_mode"   @if (!empty($getmonthfeedata['payment_mode'])) value="{{ $getmonthfeedata['payment_mode'] }}" @endif
                                                                placeholder="Enter Payment Mode" required
                                                                name="payment_mode" onkeyup="gettotalvalue()">
                                                                
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>






                                            <div class="card-footer text-center">
                                                @if(!empty($getmonthfeedata) )

                                                <span>Student Fee of <strong style="color: blue;">{{$getmonthfeedata['getmonth']['month']}}</strong> Month 
                                                    alreay Paid! at <strong style="color:rgb(255, 0, 162);">{{ \Carbon\Carbon::parse($getmonthfeedata->created_at)->isoFormat('MMM Do YYYY')}}</strong></span>

                                                @else

                                                <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                                <a href="{{ url('/') }}/students/Fee-Submission/{{$getstaffsalarydata['student_id']}}"
                                                    class="btn btn-secondary">Back</a>

                                                @endif
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

    <script>
        $(document).ready(function() {
            gettotalvalue();    
            
        });

        function gettotalvalue() {
            var fee_amount =    $("#fee_amount").val();
            var late_fee_charges =  $("#late_fee_charges").val();
           

           
            
            
            fee_amount = fee_amount == '' ? 0 : fee_amount;
            late_fee_charges = late_fee_charges == '' ? 0 : late_fee_charges;
         

            
            
            if (!isNaN(fee_amount) && !isNaN(late_fee_charges)) {
                
                var total = parseFloat(fee_amount) + parseFloat(late_fee_charges);
                 
                $('#total_fee_amount').val(total);
            }
            if(isNaN(late_fee_charges))
            {
                var total = parseFloat(fee_amount) + 0;
                 
                 $('#total_fee_amount').val(total);
            }

            
            
            }
    </script>

@endsection
