@extends('admin.layouts.layout')
@section('title', 'Subscription')

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
                        <li class="breadcrumb-item active">School Admin List</li>
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
                        <div class="card-header bg-navy color-palette">
                            <h3 class="card-title">School Admin List</h3>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($admindata as $admindatas)
                            <div class="col-md-4">
                                <!-- Widget: user widget style 2 -->
                                <div class="card card-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    @if ($admindatas['plan_status'] == 1)
                                    <div class="widget-user-header bg-info">
                                    @else
                                    <div class="widget-user-header bg-warning">
                                    @endif

                                        <div class="widget-user-image">
                                            <img class="img-circle elevation-2"
                                                src="{{ url('/') }}/admin_assets/dist/img/dummy-user.png"
                                                alt="User Avatar">
                                        </div>
                                        <!-- /.widget-user-image -->
                                        <h3 class="widget-user-username">
                                            <h2>{{ $admindatas['name'] }}
                                                
                                            </h2>
                                        </h3>
                                        <h5 class="widget-user-desc">{{ $admindatas['type'] }}</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link text-dark">
                                                    No Of Schools <span
                                                        class="float-right badge bg-primary">{{ $admindatas['total_no_of_school'] }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link text-dark">
                                                    Total No Of Students <span
                                                        class="float-right badge bg-info">{{ $admindatas['total_no_of_student'] }}</span>
                                                </a>
                                            </li>
                                            @if ($admindatas['plan_status'] == 1)
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-dark">
                                                        Plan Type <span class="float-right badge bg-success">{{ $admindatas['payment_type'] }}</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-dark">
                                                        Plan <span class="float-right badge bg-success">{{ $admindatas['plan'] }}Month</span>
                                                    </a>
                                                </li>
                                                @if (!empty($admindatas['plan_start_date']))
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link text-dark">
                                                            Plan Start Date <span
                                                                class="float-right badge bg-danger">{{ $admindatas['plan_start_date'] }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (!empty($admindatas['plan_end_date']))
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link text-dark">
                                                            Plan Expiry Date <span
                                                                class="float-right badge bg-danger">{{ $admindatas['plan_end_date'] }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endif
                                            @if ($admindatas['plan_status'] == 1)
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-dark">
                                                        Current Status <span
                                                            class="float-right badge bg-warning">Active</span>
                                                    </a>
                                                </li>
                                            @else
                                                <hr>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="text-center p-2">

                                                            <a href="{{url('/')}}/subcription/{{ $admindatas['id'] }}" class="btn btn-danger" >Subscribe Now</a>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="text-center p-2">

                                                            <a href="{{url('/')}}/fix-payment-subcription/{{ $admindatas['id'] }}" class="btn btn-danger" >Fix Price Subscribe</a>
                                                        </div>

                                                    </div>
                                                </div>

                                               
                                               
                                              
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                        @endforeach

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

{{-- <script>
    $('#exampleModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('productid')
        var total_no_std = button.data('totalstdno')
        //  alert(total_no_std)

         $(".total_stud_class_id").val(total_no_std); 
        
        // var modal = $(this)
        // modal.find('#total_stud_id').html(total_no_std)
    })

    function reSum() {
        var num1 = $("#per_std_price_id").val();
        // alert(num1);
        console.log(num1);
        var num2 = $("#plan_id").val();
        var num3 = $("#total_stud_id").val();
        console.log(num2);
        var total = $("#total_price_id").val();
       
        if (num1 == "")
            num1 = 0;
        if (num2 == "")
            num2 = 0;
        if (num3 == "")
        num2 = 0;
        if(num2 == "3")
        {
            var result = ((parseInt(num1) * 3 * parseInt(num3) ));
            // start date calculation 
            var todayDate = new Date().toISOString().slice(0, 10);
            var d = new Date(todayDate);
            d.setMonth(d.getMonth() +3);
            // console.log(todayDate)
            // console.log(d.toISOString().slice(0, 10));
            var enddate = d.toISOString().slice(0, 10);
           
          
            $("#start_date_id").val(todayDate);
            $("#end_date_id").val(enddate);
            // end here date calculation
        }
        if(num2 == "6")
        {
            var result = ((parseInt(num1) * 6 * parseInt(num3) ));
             // start date calculation 
             var todayDate = new Date().toISOString().slice(0, 10);
            var d = new Date(todayDate);
            d.setMonth(d.getMonth() +6);
            // console.log(todayDate)
            // console.log(d.toISOString().slice(0, 10));
            var enddate = d.toISOString().slice(0, 10);
           
          
            $("#start_date_id").val(todayDate);
            $("#end_date_id").val(enddate);
            // end here date calculation
           
        }
        if(num2 == "1")
        {
            var result = ((parseInt(num1) * 1 * parseInt(num3) ));
             // start date calculation 
             var todayDate = new Date().toISOString().slice(0, 10);
            var d = new Date(todayDate);
            d.setMonth(d.getMonth() +1);
            // console.log(todayDate)
            // console.log(d.toISOString().slice(0, 10));
            var enddate = d.toISOString().slice(0, 10);
           
          
            $("#start_date_id").val(todayDate);
            $("#end_date_id").val(enddate);
            // end here date calculation
            
        }
        if(num2 == "12")
        {
            var result = ((parseInt(num1) * 12* parseInt(num3) ));
             // start date calculation 
             var todayDate = new Date().toISOString().slice(0, 10);
            var d = new Date(todayDate);
            d.setMonth(d.getMonth() +12);
            // console.log(todayDate)
            // console.log(d.toISOString().slice(0, 10));
            var enddate = d.toISOString().slice(0, 10);
           
          
            $("#start_date_id").val(todayDate);
            $("#end_date_id").val(enddate);
            // end here date calculation
            
        }
       // console.log(result, "result");
        if (!isNaN(result)) {
            var totalamount = parseInt(result);
            $("#total_price_id").val(totalamount);

        }
    }
</script> --}}
@endsection
