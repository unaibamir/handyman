<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="account-container">
        <div class="account-avatar">
            <img src="{{ asset($client->user_image) }}" alt="" class="thumbnail" />
        </div> <!-- /account-avatar -->
        <div class="account-details">
            <span class="account-name">{{ $client->full_name }}</span>
            <span class="account-actions">
                <a href="javascript:;">Profile</a> |
                <a href="javascript:;">Edit Settings</a>
            </span>
        </div> <!-- /account-details -->
    </div> <!-- /account-container -->
    <hr />
    <ul id="main-nav" class="nav nav-tabs nav-stacked side-menu">
        <li class="{{ (\Request::route()->getName() == 'client.dashboard' ) ? 'active' : '' }}">
            <a href="{{ route('client.dashboard') }}">
                <i class="fa fa-home"></i>
                Dashboard
            </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'client.job-post' ) ? 'active' : '' }}">
            <a href="{{ route('client.job-post') }}">
                <i class="fa fa-clipboard"></i>
                Post a Job
            </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'client.open-jobs' ) ? 'active' : '' }}">
            <a href="{{ route('client.open-jobs') }}">
                <i class="fa fa-folder-open-o"></i>
                Open Jobs
            </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'client.closed-jobs' ) ? 'active' : '' }}">
            <a href="{{ route('client.closed-jobs') }}">
                <i class="fa fa-folder-open"></i>
                Completed Jobs
                {{--<span class="label label-warning pull-right">5</span>--}}
            </a>
        </li>
        <li>
            <a href="#"> {{-- TODO -- Profile --}}
                <i class="fa fa-user"></i>
                Profile
            </a>
        </li>
        <li>
            <a href="{{ route('client.logout') }}">
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