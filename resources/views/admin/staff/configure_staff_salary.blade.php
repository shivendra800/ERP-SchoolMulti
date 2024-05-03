@extends('admin.layouts.layout')
@section('title', 'Configure-Staff-Salary')

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
                        <li class="breadcrumb-item active">Configure-Staff-Salary</li>
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
                        <div class=" card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Configure-Staff-Salary</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body " style="overflow: auto;">


                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">

                                <thead class="text-center bg-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Staff ID</th>
                                        <th>Staff Type</th>
                                        <th>Staff Name</th>
                                        <th>Configure Salary Status</th>
                                        <th>Pay Salary</th>
                                        <th>Previouse Month Salary Status</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center bg-secondary">
                                    @foreach ($confistaffsalary as $index => $getstaff)
                                        <tr >

                                            <td>{{ $index + 1 }}</td>
                                            <td class="text-bold "><a class="text-white" href="{{url('/')}}/Monthwise-Salary-Histroy/{{$getstaff['id']}}">{{ $getstaff['staff_member_id'] }}</a></td>
                                            <td>{{ $getstaff['staff_type'] }}</td>
                                            <td>{{ $getstaff['name'] }}</td>
                                            <td>
                                                @if ($getstaff['configure_salary_status'] == 1)
                                                    <button class="btn btn-warning"><a href="#" data-toggle="modal"
                                                        data-target="#bd-example-modal-lg{{ $getstaff['id'] }}">Salary Configured</a></button>
                                                @else
                                                    <button class="btn btn-danger "><a href="#" data-toggle="modal" class="text-white"
                                                            data-target="#bd-example-modal-lg{{ $getstaff['id'] }}">Salary
                                                            Not Configure</a></button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($getstaff['configure_salary_status'] == 1)
                                                <button class="btn btn-success"><a href="{{url('/')}}/pay-salary/{{ $getstaff['id'] }}" class="text-white">Pay Employee Salary</a></button>
                                                @else
                                                    
                                                @endif
                                            </td>
                                            <td>
                                                @if ($getstaff['salary_paid_status'] == 0)
                                                   <button class="btn btn-danger">Not Paid Previouse Month Salary</button>
                                                @else
                                                {{ $getstaff['salary_paid_status'] }}
                                                @endif
                                                
                                            </td>
                                        </tr>
                                        {{-- modal1 start here --}}
                                        <div class="modal fade product_data" id="bd-example-modal-lg{{ $getstaff['id'] }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg ">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title" id="exampleModalLabel">Salary Configuration
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body  bg-secondary p-4">
                                                        <form action="{{ url('/') }}/salary-configure-save/{{ $getstaff['id'] }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Basic Salary</label>
                                                                        <input type="text"
                                                                            class="form-control salary @error('salary') is-invalid @enderror"
                                                                             placeholder="Enter Salary" id="salary" onkeyup="CalculateTotal(this)"
                                                                            name="salary"
                                                                            @if (!empty($getstaff['salary'])) value="{{ $getstaff['salary'] }}"  @else value="{{ old('salary') }}" @endif>
                                                                        @error('salary')
                                                                            <div class="alert alert-danger">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Medical Allowance</label>
                                                                        <input type="text"
                                                                            class="form-control medical_allowance @error('medical_allowance') is-invalid @enderror"
                                                                            
                                                                            placeholder="Enter medical_allowance" onkeyup="CalculateTotal(this)"
                                                                            name="medical_allowance"
                                                                            @if (!empty($getstaff['medical_allowance'])) value="{{ $getstaff['medical_allowance'] }}"  @else value="{{ old('medical_allowance') }}" @endif>
                                                                        @error('medical_allowance')
                                                                            <div class="alert alert-danger">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Providant Fund</label>
                                                                        <input type="text"
                                                                            class="form-control providant_fund @error('providant_fund') is-invalid @enderror"
                                                                            
                                                                            placeholder="Enter providant_fund" onkeyup="CalculateTotal(this)"
                                                                            name="providant_fund"
                                                                            @if (!empty($getstaff['providant_fund'])) value="{{ $getstaff['providant_fund'] }}"  @else value="{{ old('providant_fund') }}" @endif>
                                                                        @error('providant_fund')
                                                                            <div class="alert alert-danger">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Employee Tax</label>
                                                                        <input type="text"
                                                                            class="form-control employee_tax @error('employee_tax') is-invalid @enderror"
                                                                            
                                                                            placeholder="Enter employee_tax" onkeyup="CalculateTotal(this)"
                                                                            name="employee_tax"
                                                                            @if (!empty($getstaff['employee_tax'])) value="{{ $getstaff['employee_tax'] }}"  @else value="{{ old('employee_tax') }}" @endif>
                                                                        @error('employee_tax')
                                                                            <div class="alert alert-danger">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Bonus</label>
                                                                        <input type="text"
                                                                            class="form-control bonus @error('bonus') is-invalid @enderror"
                                                                             placeholder="Enter bonus" onkeyup="CalculateTotal(this)"
                                                                            name="bonus"
                                                                            @if (!empty($getstaff['bonus'])) value="{{ $getstaff['bonus'] }}"  @else value="{{ old('bonus') }}" @endif>
                                                                        @error('bonus')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Tranportation Allowance</label>
                                                                        <input type="text"
                                                                            class="form-control transportation_allow @error('transportation_allow') is-invalid @enderror"
                                                                            
                                                                            placeholder="Enter transportation_allow" onkeyup="CalculateTotal(this)"
                                                                            name="transportation_allow"
                                                                            @if (!empty($getstaff['transportation_allow'])) value="{{ $getstaff['transportation_allow'] }}"  @else value="{{ old('transportation_allow') }}" @endif>
                                                                        @error('transportation_allow')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Total</label>
                                                                        <input type="text"
                                                                            class="form-control total @error('total') is-invalid @enderror"
                                                                             placeholder="Enter total" readonly
                                                                            name="total"
                                                                            @if (!empty($getstaff['total'])) value="{{ $getstaff['total'] }}"  @else value="{{ old('total') }}" @endif>
                                                                        @error('total')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Total Deduction</label>
                                                                        <input type="text"
                                                                            class="form-control total_deduction @error('total_dedunction') is-invalid @enderror"
                                                                            
                                                                            placeholder="Enter total_dedunction" readonly
                                                                            name="total_dedunction"
                                                                            @if (!empty($getstaff['total_dedunction'])) value="{{ $getstaff['total_dedunction'] }}"  @else value="{{ old('total_dedunction') }}" @endif>
                                                                        @error('total_dedunction')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label>Total Paid Salary</label>
                                                                        <input type="text"
                                                                            class="form-control total_paid @error('total_paid') is-invalid @enderror"
                                                                            
                                                                            placeholder="Enter total_paid" readonly
                                                                            name="total_paid"
                                                                            @if (!empty($getstaff['total_paid'])) value="{{ $getstaff['total_paid'] }}"  @else value="{{ old('total_paid') }}" @endif>
                                                                        @error('total_paid')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                            </div>



                                                                <input type="hidden" class="form-control"
                                                                    name="staff_member_id"
                                                                    value="{{ $getstaff['staff_member_id'] }}">
                                                                <input type="hidden" class="form-control"
                                                                    name="staff_id" value="{{ $getstaff['id'] }}">
                                                                <input type="hidden" class="form-control" name="name"
                                                                    value="{{ $getstaff['name'] }}">
                                                                <input type="hidden" class="form-control"
                                                                    name="staff_type"
                                                                    value="{{ $getstaff['staff_type'] }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger">Save
                                                                            changes</button>
                                                                    </div>
                                                        </form>
                                                    </div>

                                                   



                                                </div>
                                            </div>
                                        </div>


                                        {{-- modal end here --}}
                                       
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('script')
    <script>

function CalculateTotal(ele) {
        var salary = $(ele).closest('.product_data').find('.salary').val();
        var medical_allowance = $(ele).closest('.product_data').find('.medical_allowance').val();
        var providant_fund = $(ele).closest('.product_data').find('.providant_fund').val();
        var employee_tax = $(ele).closest('.product_data').find('.employee_tax').val();
        var bonus = $(ele).closest('.product_data').find('.bonus').val();
        var transportation_allow = $(ele).closest('.product_data').find('.transportation_allow').val();
        var total = $(ele).closest('.product_data').find('.total').val();
        
      
        salary = salary == '' ? 0 : salary;
        total = total == '' ? 0 : total;
        medical_allowance = medical_allowance == '' ? 0 : medical_allowance;
        providant_fund = providant_fund == '' ? 0 : providant_fund;
        employee_tax = employee_tax == '' ? 0 : employee_tax;
        bonus = bonus == '' ? 0 : bonus;
        transportation_allow = transportation_allow == '' ? 0 : transportation_allow;
    
        
        
        //     // calculate all three data 
            var total_salary = parseFloat(salary) + parseFloat(medical_allowance)+ parseFloat(bonus)+ parseFloat(transportation_allow)  ;
            var total_dedunction = parseFloat(providant_fund) + parseFloat(employee_tax);
        
        //     // set data in toatal price
           var subtotalsalary= $(ele).closest('.product_data').find('.total').val(total_salary.toFixed(2));
           var subtotaldeduction= $(ele).closest('.product_data').find('.total_deduction').val(total_dedunction.toFixed(2));
           var paid_salary= parseFloat(total_salary) - parseFloat(total_dedunction);
          
           var totalpaidsalary= $(ele).closest('.product_data').find('.total_paid').val(paid_salary.toFixed(2));

          
           
        
       
}

    </script>

@endsection
