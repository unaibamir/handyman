<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="account-container">
        <div class="account-avatar">
            <img src="{{ asset($provider->user_image) }}" alt="" class="thumbnail" />
        </div> <!-- /account-avatar -->
        <div class="account-details">
            <span class="account-name">{{ $provider->full_name }}</span>
            <span class="account-actions">
                <a href="javascript:;">Profile</a> |
                <a href="javascript:;">Edit Settings</a>
            </span>
        </div> <!-- /account-details -->
    </div> <!-- /account-container -->
    <hr />
    <ul id="main-nav" class="nav nav-tabs nav-stacked side-menu">
        <li class="{{ (\Request::route()->getName() == 'provider.dashboard' ) ? 'active' : '' }}">
            <a href="{{ route('provider.dashboard') }}">
                <i class="fa fa-home"></i>
                Dashboard
            </a>
        </li>

        <li class="{{ (\Request::route()->getName() == 'provider.completed-jobs' ) ? 'active' : '' }}">
            <a href="{{ route('provider.completed-jobs') }}">
                <i class="fa fa-folder-open"></i>
                Completed Jobs
            </a>
        </li>

        <li class="{{ (\Request::route()->getName() == 'provider.qued-jobs' ) ? 'active' : '' }}">
            <a href="{{ route('provider.qued-jobs') }}">
                <i class="fa fa-folder-open-o"></i>
                Qued Jobs
            </a>
        </li>

        <li>
            <a href="#"> {{-- TODO -- Profile --}}
                <i class="fa fa-user"></i>
                Profile
            </a>
        </li>
        <li>
            <a href="{{ route('provider.logout') }}">
                <i class="fa fa-sign-out"></i>
                Logout
            </a>
        </li>
    </ul>
    <hr />
    <div class="sidebar-extra">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
    </div> <!-- .sidebar-extra -->
    <br />
</div> <!-- /span3 -->