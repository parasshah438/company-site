<div class="col-lg-3">
    <div class="user-profile-sidebar">
        <div class="user-profile-sidebar-top">
           
            <h5>Hello {{Auth::user()->name}}</h5>
            
        </div>
        <ul class="user-profile-sidebar-list">
            <li><a class="{{ Request::is('home') ? 'active' : '' }}" href="{{route('home')}}"><i class="far fa-gauge-high"></i> Dashboard</a></li>
            <li><a class="{{ Request::is('user/profile') ? 'active' : '' }}" href="{{route('user.profile')}}"><i class="far fa-user"></i>Profile</a>
            <li><a class="{{ Request::is('user/change-password') ? 'active' : '' }}" href="{{route('user.password')}}"><i class="far fa-user"></i>Change Password</a>
            </li>
            <!-- <li><a href="profile-listing.html"><i class="far fa-layer-group"></i> My Listing</a>
            </li>
            <li><a href="add-listing.html"><i class="far fa-plus-circle"></i> Add Listing</a></li>
            <li><a href="profile-favorite.html"><i class="far fa-heart"></i> My Favorites</a></li>
            <li><a href="profile-message.html"><i class="far fa-envelope"></i> Messages <span class="badge badge-danger">02</span></a></li>
            <li><a href="profile-setting.html"><i class="far fa-gear"></i> Settings</a></li> -->
            <li><a href="{{route('user.logout')}}"><i class="far fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
</div>