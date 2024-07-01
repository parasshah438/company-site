 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('public/admin_assets/admin_profile/'.Auth::guard('admin')->user()->image) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Hello {{ ucfirst(Auth::guard('admin')->user()->name) }}</p>
          <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="javascript:void(0);" title="Manage Profile">
            <i class="fa fa-user"></i><span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.profile')}}" title="Profile"><i class="fa fa-users"></i>Profile</a></li>
            <li><a href="{{route('admin.change-password')}}" title="Change Password"><i class="fa fa-key"></i>Change Password</a></li>
            <li><a href="{{route('admin.logout')}}" title="Logout"><i class="fa fa-sign-out"></i>Logout</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i><span>Manage Job Requirement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}/admin/requirement"><i class="fa fa-users"></i>Users</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-phone"></i><span>Manage Inquiry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}/admin/inquiry"><i class="fa fa-phone"></i>Inquiry</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i><span>Manage portfolio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}/admin/portfolio-category"><i class="fa fa-users"></i>Portfolio Category</a></li>
            <li><a href="{{url('/')}}/admin/portfolio"><i class="fa fa-user"></i>Portfolio</a></li>
          </ul>
        </li>
        


        <li><a href="{{url('/')}}/admin/testimonial"><i class="fa fa-users"></i><span>Manage Testimonial</span></a></li>

        <li><a href="{{url('/')}}/admin/job-openings"><i class="fa fa-graduation-cap"></i><span>Manage Job openings</span></a></li>

        <li><a href="{{url('/')}}/admin/services"><i class="fa fa-users"></i><span>Manage Services</span></a></li>

        <li><a href="{{url('/')}}/admin/service-category"><i class="fa fa-users"></i><span>Manage Service Category</span></a></li>

        <li><a href="{{url('/')}}/admin/pages"><i class="fa fa-users"></i><span>Manage CMS Pages</span></a></li>

        <li><a href="{{url('/')}}/admin/technologies"><i class="fa fa-leanpub"></i><span>Manage Technology</span></a></li>

        <li><a href="{{url('/')}}/admin/values"><i class="fa fa-users"></i><span>Manage Our Values</span></a></li>

        <li><a href="{{url('/')}}/admin/care-of-employees"><i class="fa fa-users"></i><span>Care Of Employees</span></a></li>

        <li><a href="{{url('/')}}/admin/industries"><i class="fa fa-industry"></i><span>Manage Industries</span></a></li>

        <li class="treeview">
        <li><a href="cache_clear"><i class="fa fa-refresh"></i><span>Clear Cache</span></a></li>
        
        <li><a href="{{url('/')}}/admin/manage-logo"><i class="fa fa-picture-o"></i><span>Logo Settings</span></a></li>
        <li><a href="{{url('/')}}/admin/works"><i class="fa fa-picture-o"></i><span>Manage Works</span></a></li>
        <li><a href="{{url('/')}}/admin/recognitions"><i class="fa fa-picture-o"></i><span>Manage Recognitions</span></a></li>
        <li><a href="{{url('/')}}/admin/generalsettings"><i class="fa fa-cogs"></i><span>General Settings</span></a></li>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>