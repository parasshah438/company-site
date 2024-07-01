 <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ad</b>min</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a class="btn btn-danger btn-flat" href="{{url('/')}}" target="_blank" style="margin-top:8px;"><span class="glyphicon glyphicon-log-in"></span>  Go to Front-End</a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
              @if(Auth::guard('admin')->user()->image == "")
              <img src="{{ asset('public/front_assets/img/no-image.png') }}"  class="user-image" alt="User Image">
              @else 
              <img src="{{ asset('public/admin_assets/admin_profile/'.Auth::guard('admin')->user()->image) }}"  class="user-image" alt="User Image">
              @endif 
              <span class="hidden-xs">Hello {{ucfirst(Auth::guard('admin')->user()->name)}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

              @if(Auth::guard('admin')->user()->image == "")
              <img src="{{ asset('public/front_assets/img/no-image.png') }}" class="img-circle" alt="User Image">
              @else 
              <img src="{{ asset('public/admin_assets/admin_profile/'.Auth::guard('admin')->user()->image) }}" class="img-circle" alt="User Image">
              @endif
                <p>
                  {{ucfirst(Auth::guard('admin')->user()->name)}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('admin.profile')}}" class="btn btn-primary btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('admin.logout')}}" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>