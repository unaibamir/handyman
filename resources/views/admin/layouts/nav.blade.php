<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->name }}</strong>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    HM
                </div>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>

            <li>
                <a href="{{ route('admin.client.index')  }}"><i class="fa fa-users"></i> <span class="nav-label">Clients</span></a>
            </li>

        </ul>

    </div>
</nav>