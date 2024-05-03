@extends('admin.layouts.layout')

@section('title',$title)

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{$title}} Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}/Dashboard">Home</a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
            
          </ol>
        </div>
         
      

      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <section class="content">
    <div class="container-fluid">
      <div class="row">
       
        <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header bg-lightblue disabled color-palette">
                    <h3 class="card-title">{{$title}}</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="forms-sample" @if(empty($addadmin['id'])) action="{{ url('/add-edit-admin') }}"
                            @else action="{{ url('add-edit-admin/'.$addadmin['id']) }}"   @endif
                         method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                              <div class="card p-2">

                                <div class="col-md-12">
                                  <div class="form-group">
                                      <label >Admin Name</label>
                                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Enter Admin  Name" name="name" 
                                      @if(!empty($addadmin['name'])) value="{{ $addadmin['name'] }}"  @else value="{{ old('name') }}" @endif>
                                      @error('name')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label >One  Student Price</label>
                                    <input type="text" class="form-control @error('per_std_price') is-invalid @enderror" id="" placeholder="Enter One Student Price" name="per_std_price" 
                                    @if(!empty($addadmin['per_std_price'])) value="{{ $addadmin['per_std_price'] }}"  @else value="{{ old('per_std_price') }}" @endif>
                                    @error('per_std_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label >3 Month School Payment Fix</label>
                                  <input type="text" class="form-control @error('one_month_fix_price') is-invalid @enderror" id="" placeholder="Enter Three Student Price" name="one_month_fix_price" 
                                  @if(!empty($addadmin['one_month_fix_price'])) value="{{ $addadmin['one_month_fix_price'] }}"  @else value="{{ old('one_month_fix_price') }}" @endif>
                                  @error('one_month_fix_price')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                                <label >6 Month School Payment Fix</label>
                                <input type="text" class="form-control @error('six_month_fix_price') is-invalid @enderror" id="" placeholder="Enter One Student Price" name="six_month_fix_price" 
                                @if(!empty($addadmin['six_month_fix_price'])) value="{{ $addadmin['six_month_fix_price'] }}"  @else value="{{ old('six_month_fix_price') }}" @endif>
                                @error('six_month_fix_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                              <label >12 Month School Payment Fix</label>
                              <input type="text" class="form-control @error('yearly_fix_price') is-invalid @enderror" id="" placeholder="Enter One Student Price" name="yearly_fix_price" 
                              @if(!empty($addadmin['yearly_fix_price'])) value="{{ $addadmin['yearly_fix_price'] }}"  @else value="{{ old('yearly_fix_price') }}" @endif>
                              @error('per_std_price')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                            
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label >Mobile No</label>
                                      <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="" placeholder="Enter Mobile No" name="mobile" 
                                      @if(!empty($addadmin['mobile'])) value="{{ $addadmin['mobile'] }}"  @else value="{{ old('mobile') }}" @endif>
                                      @error('mobile')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label >Email</label>
                                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="" placeholder="Enter Email" name="email" @if($addadmin['id']!="") disabled="" @else required="" @endif 
                                      @if(!empty($addadmin['email'])) value="{{ $addadmin['email'] }}"  @else value="{{ old('email') }}" @endif>
                                      @error('email')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-md-12">

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label >Password</label>
                                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="" placeholder="Enter Password" name="password" 
                                              @if($addadmin['id']!="") disabled="" @else required="" @endif >
                                              @error('password')
                                                  <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                          </div>
                                          
                                      </div>
                                      <div class="col-md-6">

                                          <div class="form-group">
                                              <label >Confirm Password</label>
                                              <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="" placeholder="Enter Confirm Password" name="confirm_password" 
                                              @if($addadmin['id']!="") disabled="" @else required="" @endif >
                                              @error('confirm_password')
                                                  <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                          </div>

                                      </div>
                                  </div>
                                
                              </div>

                              <div class="card-footer">
                    
                                  <button type="submit" class="btn bg-maroon color-palette">Submit</button>
                                  <a href="{{url('/')}}/admin" class="btn btn-secondary">Back</a>
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
</script>
    
@endsection
    
