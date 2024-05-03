  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style=" background-color: #2d1741fc;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if(Auth::guard('admin')->user()->type=="School-Admin")
      <li class="nav-item d-none d-sm-inline-block mt-2">
        <strong class="text-danger">{{Str::title(Auth::guard('admin')->user()->name)}}-{{Auth::guard('admin')->user()->school_id}}</strong>
      </li>
      @endif
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto ">
      
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown mb-1">
       
       
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="btn btn-info">FSD</i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <span class="btn btn-danger">{{ \Carbon\Carbon::parse(Auth::guard('admin')->user()->fsd_start)->isoFormat('MMM Do YYYY')}}</span>
                
                  -<span class="btn btn-warning">{{ \Carbon\Carbon::parse(Auth::guard('admin')->user()->fsd_end)->isoFormat('MMM Do YYYY')}}</span>
                </h3>
               
              </div>
            </div>
            <!-- Message End -->
          </a>
         
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link text-white" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white"  href="{{url('/')}}/logout" role="button">
          <i class="fas fa-sign-out-alt">Logout</i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->