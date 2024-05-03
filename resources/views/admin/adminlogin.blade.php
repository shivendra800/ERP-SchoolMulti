<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#424242" />
    <title>Login :Uifs School ERP</title>
    <link href="#" rel="shortcut icon" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="{{ url('/') }}/admin_assets/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin_assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/admin_assets/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin_assets/form-elements.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin_assets/toastr.min.css">
    
	

</head>

<body>
   

    
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container-fluid">
                <div class="row">
                  

                    <div class="bgoffsetbg">
                        <div class="col-lg-4 col-md-4 col-sm-12 nopadding  ">

                            @if (Session::has('error_message'))

                            <div class="alert alert-danger" role="alert">
                                <strong>Error:{{ Session::get('error_message') }}</strong>  
                              </div>
                         
                           @endif
                   

                            <div class="loginbg">
                                <div class="form-top">
                                    <div class="form-top-left logowidth">
                                        <img class="btn btn-primary"
                                            src="{{asset('admin_assets/logo.webp')}}" 
                                            />
                                    </div>
                                </div>
                               
                               
                                <div class="form-bottom">
                                    <h3 class="font-white bolds">Admin Login</h3>
                                    
                                    <form action="{{ url('/') }}/" method="post">
                                        @csrf
                                        
                                        <div class="form-group has-feedback">
                                            <input type="text" name="email" placeholder="Enter Your Email" value=""
                                                class="form-email form-control @error('email') is-invalid @enderror" id="form-email">
                                            <span class="fa fa-envelope form-control-feedback"></span>
                                            <span class="text-danger"></span>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input type="password" value="" name="password" placeholder="Password"
                                                class="form-password form-control @error('password') is-invalid @enderror" id="form-password">
                                            <span class="fa fa-lock form-control-feedback"></span>
                                            <span class="text-danger"></span>

                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            
                                        </div>
                                        <button type="submit" class="btn">Sign In</button>
                                    </form>

                                    <div class="btn-group btn-group-justified" style="margin-top:10px;">
                                        <a href="#" class="btn btn-primary width100"
                                            onclick="copy('schoolowner@gmail.com', '123456')" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="copy"
                                            style="background:#0084B4;"><i class="fa fa-user-secret ispace"></i> Sch
                                            Owner</a>
                                        <a href="#" class="btn btn-primary width50"
                                            onclick="copy('schooladmin@gmail.com', '123456')" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="copy"
                                            style="background:#1bbed3;"><i class="fa fa-user-secret ispace"></i>Sch
                                            Admin</a>
                                        <a href="#" class="btn btn-primary width100"
                                            onclick="copy('schoolteacher@gmail.com', '123456')" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="copy"
                                            style="background:#999999;"><i class="fa fa-user-secret ispace"></i>
                                            Teacher</a>
                                    </div>
                                    <div class="btn-group btn-group-justified" style="margin-top:10px;">
                                        {{-- <a href="#" class="btn btn-primary width50"
                                            onclick="copy('schoolaccount@gmail.com', '123456')" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="copy"
                                            style="background:#999;"><i class="fa fa-user-secret ispace"></i>
                                            Accountant</a> --}}
                                        {{-- <a href="#" class="btn btn-primary width50"
                                            onclick="copy('superadmin@gmail.com', '123456')" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="copy"
                                            style="background:#e91e63;"><i class="fa fa fa-user-secret ispace"></i>
                                            Receptionist</a> --}}
                                        <a href="#" class="btn btn-primary width50"
                                            onclick="copy('student@gmail.com', '123456')" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="copy"
                                            style="background:#4aa64e;"><i class="fa fa-user-secret ispace"></i>
                                            Student</a>
                                    </div>
                                    <span
                                        style="text-align:center;font-weight:normal; font-size: 14px; display: block;padding-top: 5px">*Note:
                                        Click the above button for demo.</span>
                                    {{-- <p><a href="#" class="forgot"><i
                                                class="fa fa-key"></i> Forgot Password?</a></p> --}}

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-12 nopadding-2">
                            <div class="d-flex align-items-center text-wrap flex-column justify-content-center bg-position-sm-left bg-position-lg-center"
                                style="background: url('https://demo.smart-school.in/uploads/school_content/login_image/1663064530-1070210809632059d2b8b0b!1662796232-1721792380631c41c80d038!login_bg3.jpg') no-repeat; background-size:cover">
                                <div class=" bg-shadow-remove ">

                                    @if (Session::has('success_message'))


                                    <button type="button" class="btn btn-warning toastsDefaultWarning">
                                      {{ Session::get('success_message') }}
                                    </button>
                                    @endif

                                    <h3 class="h3">What's New In Uifs ERP System </h3>
                                    <div class="loginright mCustomScrollbar">
                                        <div class="messages">

                                            <h4>Simple Way To Understand</h4>

                                            <p>Every Module&nbsp;is neat and clean.</p>
                                            <div class="logdivider"></div>
                                            <h4>We provides free demo !</h4>

                                            <p>There are 6 module: </p>
                                            <div class="logdivider"></div>
                                            <h4>School Owner Can create multiple school.</h4>

                                            <p>The Particular school have there own data! </p>
                                            <div class="logdivider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--./col-lg-6-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <script src="{{ url('/') }}/admin_assets/jquery-1.11.1.min.js"></script>
    <script src="{{ url('/') }}/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/admin_assets/toastr_jquery.min.js"></script>
	<script src="{{ url('/') }}/admin_assets/toastr.min.js"></script>


</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on(
            'focus',
            function() {
                $(this).removeClass('input-error');
            });
        $('.login-form').on('submit', function(e) {
            $(this).find('input[type="text"], input[type="password"], textarea').each(function() {
                if ($(this).val() == "") {
                    e.preventDefault();
                    $(this).addClass('input-error');
                } else {
                    $(this).removeClass('input-error');
                }
            });
        });
    });
</script>

<script>
    function copy(email, password) {
        document.getElementById("form-email").value = email;
        document.getElementById("form-password").value = password;
    }
</script>
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
