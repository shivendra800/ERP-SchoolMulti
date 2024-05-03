@extends('admin.layouts.layout')
@section('title', 'Fix Payment Plan')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}

.content{
  max-width: 1090px;
  width: 100%;
  margin: auto;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
 .content .card{
  background: #fff;
  width: calc(33% - 20px);
  text-align: center;
  padding: 15px 30px  30px 30px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}
.content .card .top{
  height: 130px;
  color: #fff;
  padding: 12px 0 0 0 ;
  clip-path: polygon(0 0, 100% 0, 100% 53%, 49% 100%, 0 53%);
}
.content .card .top .title{
 font-size: 27px;
 font-weight: 600;
}
.content .card .top .price-sec{
  margin-top: -10px;
  font-weight: 600;
}
.content .card .top .price{
  font-size: 45px;
}
.content .card .info{
  font-size: 16px;
  margin-top: 20px;
}
.content .card .details .one{
  margin-top: 25px;
  font-size: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
}
.content .card .details .one::before{
  position: absolute;
  content: "";
  width: 100%;
  background: #ddd;
  height: 1px;
  left: 0;
  top: -12px;
  border-radius: 25px;
}
.content .card .details .one i{
  color: #2db94d;
}
.content .card .details i.fa-times{
  color: #cd3241;
}
.content .card button{
  outline: none;
  border: none;
  height: 42px;
  color: #fff;
  margin-top: 30px;
  border-radius: 3px;
  font-size: 18px;
  width: 100%;
  display: block;
  transition: all 0.3s ease;
  cursor: pointer;
  letter-spacing: 1px;
}
.content .one .top,
.content .one button{
  background: #14eb6e;
}
.content .two .top,
.content .two button{
  background: #e87130;
}
.content .three .top,
.content .three button{
  background: #11BCC3;
}
.content button:hover {
  filter: brightness(90%);
}
.content .one ::selection{
background: #8af5b6;
}
.content .two ::selection{
background:  #f2b08c;
}
.content .three ::selection{
background: #d0f9fb;
}
@media (max-width:1000px) {
   .content .card{
    background: #fff;
    width: calc(50% - 20px);
    margin-bottom: 30px;
}
}
@media (max-width:715px) {
 .content .card{
    width: 100%;
}
}
</style>

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
                        <li class="breadcrumb-item active">Fix Payment Plan List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-navy color-palette">
                            <h3 class="card-title">Fix Payment Plan List</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="content">
        <!-- start card here -->
       <!--for one month -->
     
            <div class="card one">
            <div class="top">
                <div class="title">3 Month Plan</div>
                <div class="price-sec">
                <span class="dollar">Rs.</span>
                <span class="price">{{$admindata['one_month_fix_price']}}</span>
                <span class="decimal">.00</span>
                </div>
            </div>
            
            <div class="details">
                <div class="one">
                    <span>No. Of School</span>
                    {{$getschool}}
                </div>
                <div class="one">
                <span>Per Student Cost</span>
                
                
                {{$admindata['per_std_price']}}
                </div>
            
                <div class="one">
                <span>No. Of Student </span>
                
                {{$getstudent}}
                </div>
                <form action="{{url('/')}}/save-fixsubs-one/{{$admindata['id']}}" method="post">
                    @csrf
                <div class="one">
                <span>Fix Amount </span>
                <span class="dollar">Rs.</span>
                <span class="price">{{$admindata['one_month_fix_price']}}</span>
                    <input type="hidden" name="total_price"  value="{{$admindata['one_month_fix_price']}}" readonly>
                    <input type="hidden" id="plan_id" value="3" name="plan">
                    <input type="hidden" id="per_std_price_id" value="{{$admindata['per_std_price']}}" name="per_std_price">
                    <input type="hidden" id="start_date_id"  name="plan_start_date">
                    <input type="hidden" id="end_date_id"  name="plan_end_date">
                    <input type="hidden" id="total_stud_id" value="{{$getstudent}}" name="total_stud">
                    
                </div>
                <button type="submit">Purchase</button>
                  </form>
            </div>
            </div>
     
        <!-- for three month -->
        {{-- /<form action=""> --}}
            <div class="card two">
            <div class="top">
                <div class="title">6 Month Plan</div>
                <div class="price-sec">
                <span class="dollar">Rs.</span>
                <span class="price">{{$admindata['six_month_fix_price']}}</span>
                <span class="decimal">.00</span>
                </div>
            </div>
            
            <div class="details">
                <div class="one">
                    <span>No. Of Student </span>
                    {{$getstudent}}
                </div>
                <div class="one">
                <span>Per Student Cost</span>
                
                {{$admindata['per_std_price']}}
                </div>
                <div class="one">
                <span>No. Of School</span>
                {{$getschool}}
                </div>
                <form action="{{url('/')}}/save-fixsubs-two/{{$admindata['id']}}" method="post">
                    @csrf
                    <div class="one">
                    <span>Fix Amount </span>
                    <span class="dollar">Rs.</span>
                    <span class="price">{{$admindata['six_month_fix_price']}}</span>
                    <input type="hidden" name="total_price" value="{{$admindata['six_month_fix_price']}}"readonly>
                    <input type="hidden" id="plan_id2" value="6" name="plan">
                    <input type="hidden" id="per_std_price_id" value="{{$admindata['per_std_price']}}" name="per_std_price">
                    <input type="hidden" id="start_date_id2"  name="plan_start_date">
                    <input type="hidden" id="end_date_id2"  name="plan_end_date">
                    <input type="hidden" id="total_stud_id" value="{{$getstudent}}" name="total_stud">
                    </div>
                    <button type="submit">Purchase</button>
                </form>
            </div>
            </div>
        {{-- </form> --}}
        <!-- for 12 month -->
        {{-- <form action=""> --}}
            <div class="card three">
            <div class="top">
                <div class="title">1 Year Plan</div>
                <div class="price-sec">
                <span class="dollar">Rs.</span>
                <span class="price">{{$admindata['yearly_fix_price']}}</span>
                <span class="decimal">.00</span>
                </div>
            </div>
       
            <div class="details">
                <div class="one">
                    <span>No. Of School</span>
                    {{$getschool}}
                </div>
                <div class="one">
                <span>Per Student Cost</span>
                
                {{$admindata['per_std_price']}}
                </div>
                <div class="one">
                <span>No. Of Student </span>
                {{$getstudent}}
                </div>
                <form action="{{url('/')}}/save-fixsubs-three/{{$admindata['id']}}" method="post">
                    @csrf
                    <div class="one">
                    <span>Fix Amount </span>
                    <span class="dollar">Rs.</span>
                    <span class="price">{{$admindata['yearly_fix_price']}}</span>
                    <input type="hidden" name="total_price" value="{{$admindata['yearly_fix_price']}}" readonly>
                    <input type="hidden" id="plan_id3" value="12" name="plan">
                    <input type="hidden" id="per_std_price_id" value="{{$admindata['per_std_price']}}" name="per_std_price">
                    <input type="hidden" id="start_date_id3"  name="plan_start_date">
                    <input type="hidden" id="end_date_id3"  name="plan_end_date">
                    <input type="hidden" id="total_stud_id" value="{{$getstudent}}" name="total_stud">
                    </div>
                <button type="submit">Purchase</button>
                </form>
            </div>
            </div>
        {{-- </form> --}}
        <!-- end card here -->
      </div>
 
    
@endsection
@section('script')


<script>

$( document ).ready(function() {
    reSum1();
});
      function reSum1() {
        var num1 = $("#per_std_price_id").val();
        // alert(num1);
        // console.log("per_std_price_id",num1);
        var num2 = $("#plan_id").val();
        var nump2 = $("#plan_id2").val();
        var nump3 = $("#plan_id3").val();
        // console.log("plan_id",num2);
        var num3 = $("#total_stud_id").val();
        // console.log("total_stud_id",num3);
        var total = $("#total_price_id").val();
       
        if (num1 == "")
            num1 = 0;
        if (num2 == "")
            num2 = 0;
        if (num3 == "")
        num2 = 0;
        if (nump2 == "")
        nump2 = 0;
        if (nump3 == "")
        nump3 = 0;
       
       
     
            var result = ((parseInt(num1) * parseInt(num2) * parseInt(num3) ));
            var result2 = ((parseInt(num1) * parseInt(nump2) * parseInt(num3) ));
            var result3 = ((parseInt(num1) * parseInt(nump3) * parseInt(num3) ));
            console.log("result",result)
             // start date calculation 
             var todayDate = new Date().toISOString().slice(0, 10);
            var d = new Date(todayDate);
            var d2 = new Date(todayDate);
            var d3 = new Date(todayDate);
            d.setMonth(d.getMonth() + parseInt(num2));
            d2.setMonth(d2.getMonth() + parseInt(nump2));
            d3.setMonth(d3.getMonth() + parseInt(nump3));
            // console.log(todayDate)
            // console.log(d.toISOString().slice(0, 10));
            // console.log(d2.toISOString().slice(0, 10));
            // console.log(d3.toISOString().slice(0, 10));
            var enddate = d.toISOString().slice(0, 10);
            var enddate2 = d2.toISOString().slice(0, 10);
            var enddate3 = d3.toISOString().slice(0, 10);
           
          
            $("#start_date_id").val(todayDate);
            $("#start_date_id2").val(todayDate);
            $("#start_date_id3").val(todayDate);
            $("#end_date_id").val(enddate);
            $("#end_date_id2").val(enddate2);
            $("#end_date_id3").val(enddate3);
            // end here date calculation
            
      
      
       // console.log(result, "result");
        // if (!isNaN(result)) {
            var totalamount = parseInt(result);
            $("#total_price_id").val(totalamount);
            var totalamount2 = parseInt(result2);
            $("#total_price_id2").val(totalamount2);
            var totalamount3 = parseInt(result3);
            $("#total_price_id3").val(totalamount3);

        // }
    }
</script>


@endsection
