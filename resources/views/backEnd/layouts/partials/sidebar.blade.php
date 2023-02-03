<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('backEnd/assets/img/aub.png') }}"
                    class="header-logo" /> <span class="logo-name">AUB</span>
            </a>
        </div>
        <ul class="sidebar-menu">

            @if (Auth::user()->hasPermission('dashboard'))
                <li class="menu-header">Main</li>
                <li class="dropdown active">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i data-feather="monitor"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('roles.index') || Auth::user()->hasPermission('users.index'))
                <li class="menu-header">Authorization</li>
            @endif
            @if (Auth::user()->hasPermission('roles.index'))
                <li class="dropdown">
                    <a href="{{ route('roles.index') }}" class="menu-toggle nav-link">
                        <i data-feather="sliders"></i><span>Roles and Permission</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('users.index'))
                <li class="dropdown">
                    <a href="{{ route('users.index') }}" class="menu-toggle nav-link">
                        <i data-feather="users"></i><span>Users</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('courses.index') ||
                Auth::user()->hasPermission('mycourse') ||
                Auth::user()->hasPermission('advised.create'))
                <li class="menu-header">Academic</li>
            @endif
            {{-- <li class="menu-header">Academic</li> --}}

            @if (Auth::user()->hasPermission('courses.index'))
                <li class="dropdown">
                    <a href="{{ route('courses.index') }}" class="menu-toggle nav-link">
                        <i data-feather="life-buoy"></i><span>Courses</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('mycourse'))
                <li class="dropdown">
                    <a href="{{ route('mycourse') }}" class="menu-toggle nav-link">
                        <i data-feather="heart"></i><span>My Courses</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('result.index') || Auth::user()->hasPermission('result.store'))
                <li class="dropdown">
                    <a href="{{ route('result.index') }}" class="menu-toggle nav-link">
                        <i data-feather="briefcase"></i><span>Result Entry</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('my-result'))
                <li class="dropdown">
                    <a href="{{ route('my-result') }}" class="menu-toggle nav-link">
                        <i data-feather="briefcase"></i><span>My Result</span>
                    </a>
                </li>
            @endif


            @if (Auth::user()->hasPermission('advised.create'))
                <li class="dropdown">
                    <a href="{{ route('advised.create') }}" class="menu-toggle nav-link">
                        <i data-feather="heart"></i><span>Advising</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('previousCourses.index'))
                <li class="dropdown">
                    <a href="{{ route('previousCourses.index') }}" class="menu-toggle nav-link">
                        <i data-feather="life-buoy"></i><span>Previous Record</span>
                    </a>
                </li>
            @endif

            {{-- @if (Auth::user()->hasPermission('student-list')) --}}
            <li class="dropdown">
                <a href="{{ route('student-list') }}" class="menu-toggle nav-link">
                    <i data-feather="heart"></i><span>Drop Course</span>
                </a>
            </li>
            {{-- @endif --}}

            @if (Auth::user()->hasPermission('routines.index'))
                <li class="dropdown">
                    <a href="{{ route('routines.index') }}" class="menu-toggle nav-link">
                        <i data-feather="file"></i><span>Routine</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('departments.index') ||
                Auth::user()->hasPermission('batchs.index') ||
                Auth::user()->hasPermission('semesters.index'))
                <li class="menu-header">LookUp</li>
            @endif

            @if (Auth::user()->hasPermission('departments.index'))
                <li class="dropdown">
                    <a href="{{ route('departments.index') }}" class="menu-toggle nav-link">
                        <i data-feather="briefcase"></i><span>Department</span>
                    </a>
                </li>
            @endif

            <li class="dropdown">
                <a href="{{ route('coursedata.index') }}" class="menu-toggle nav-link">
                    <i data-feather="briefcase"></i><span>Prequisite Course</span>
                </a>
            </li>


            @if (Auth::user()->hasPermission('batchs.index'))
                <li class="dropdown">
                    <a href="{{ route('batchs.index') }}" class="menu-toggle nav-link">
                        <i data-feather="package"></i><span>Batch</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->hasPermission('semesters.index'))
                <li class="dropdown">
                    <a href="{{ route('semesters.index') }}" class="menu-toggle nav-link">
                        <i data-feather="package"></i><span>Semester setup</span></a>
                    <ul class="dropdown-menu">
                    </ul>
                </li>
            @endif

        </ul>
    </aside>
</div>
