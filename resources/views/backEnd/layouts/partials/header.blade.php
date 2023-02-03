<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                    <i data-feather="align-justify"></i>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <div class="dropdown-title" style="margin-top: 5px; color: black;">{{ Auth::user()->name }}</div>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ Auth::user()->getFirstMediaUrl('avatar') != null ? Auth::user()->getFirstMediaUrl('avatar') : config('app.placeholder').'160.png' }}" class="user-img-radious-style">
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                {{-- <a href="profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i>
                    Profile
                </a>
                <a href="timeline.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i>
                    Activities
                </a> --}}
                <a href="{{ route('profile') }}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile</a>
                <a href="{{ route('password') }}" class="dropdown-item has-icon"> <i class="fas fa-key"></i> Update Password</a>
                {{-- <a href="#" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i>
                    Settings
                </a> --}}
                <div class="dropdown-divider"></div>

                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
