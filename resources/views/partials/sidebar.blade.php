<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-avatar">
                <div class="dropdown">
                    <div>
                        <img alt="image" class="img-circle avatar" width="100" src="{{ Auth::user()->present()->avatar }}">
                    </div>
                    <div class="name"><strong>{{ Auth::user()->present()->nameOrEmail }}</strong></div>
                </div>
            </li>
            <li class="{{ Request::is('/') ? 'active open' : ''  }}">
                <a href="{{ route('dashboard') }}" class="{{ Request::is('/') ? 'active' : ''  }}">
                    <i class="fa fa-dashboard fa-fw"></i> @lang('app.dashboard')
                </a>
            </li>
            @permission('users.manage')
                <li class="{{ Request::is('user*') ? 'active open' : ''  }}">
                    <a href="{{ route('user.list') }}" class="{{ Request::is('user*') ? 'active' : ''  }}">
                        <i class="fa fa-users fa-fw"></i> @lang('app.users')
                    </a>
                </li>
            @endpermission

            @permission('manage_students')
            <li class="{{ Request::is('student*') ? 'active open' : ''  }}">
                <a href="{{ route('student.index') }}" class="{{ Request::is('student*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i> Students
                </a>
            </li>
            @endpermission

            @permission('level')
            <li class="{{ Request::is('level*') ? 'active open' : ''  }}">
                <a href="{{ route('level.index') }}" class="{{ Request::is('level*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i> Levels
                </a>
            </li>
            @endpermission

            @permission('departments')
            <li class="{{ Request::is('department*') ? 'active open' : ''  }}">
                <a href="{{ route('department.index') }}" class="{{ Request::is('department*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i> Departments
                </a>
            </li>
            @endpermission

            @permission('course')
            <li class="{{ Request::is('course*') ? 'active open' : ''  }}">
                <a href="{{ route('course.index') }}" class="{{ Request::is('course*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i> Course
                </a>
            </li>
            @endpermission

            @permission('assign_course')
            <li class="{{ Request::is('assign-course*') ? 'active open' : ''  }}">
                <a href="{{ route('assign_course.index') }}" class="{{ Request::is('assign-course*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i> Assign Course
                </a>
            </li>
            @endpermission

            @permission('view_assign_course')
            <li class="{{ Request::is('view-assign-course*') ? 'active open' : ''  }}">
                <a href="{{ route('assign_course_view.index') }}" class="{{ Request::is('view-assign-course*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i>View Assigned Course
                </a>
            </li>
            @endpermission

            @permission('users.activity')
                <li class="{{ Request::is('activity*') ? 'active open' : ''  }}">
                    <a href="{{ route('activity.index') }}" class="{{ Request::is('activity*') ? 'active' : ''  }}">
                        <i class="fa fa-list-alt fa-fw"></i> @lang('app.activity_log')
                    </a>
                </li>
            @endpermission

            @permission(['roles.manage', 'permissions.manage'])
                <li class="{{ Request::is('role*') || Request::is('permission*') ? 'active open' : ''  }}">
                    <a href="#">
                        <i class="fa fa-user fa-fw"></i>
                        @lang('app.roles_and_permissions')
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        @permission('roles.manage')
                            <li>
                                <a href="{{ route('role.index') }}" class="{{ Request::is('role*') ? 'active' : ''  }}">
                                    @lang('app.roles')
                                </a>
                            </li>
                        @endpermission
                        @permission('permissions.manage')
                            <li>
                                <a href="{{ route('permission.index') }}"
                                   class="{{ Request::is('permission*') ? 'active' : ''  }}">@lang('app.permissions')</a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission

            @permission(['settings.general', 'settings.auth', 'settings.notifications'])
            <li class="{{ Request::is('settings*') ? 'active open' : ''  }}">
                <a href="#">
                    <i class="fa fa-gear fa-fw"></i> @lang('app.settings')
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    @permission('settings.general')
                        <li>
                            <a href="{{ route('settings.general') }}"
                               class="{{ Request::is('settings') ? 'active' : ''  }}">
                                @lang('app.general')
                            </a>
                        </li>
                    @endpermission
                    @permission('settings.auth')
                        <li>
                            <a href="{{ route('settings.auth') }}"
                               class="{{ Request::is('settings/auth*') ? 'active' : ''  }}">
                                @lang('app.auth_and_registration')
                            </a>
                        </li>
                    @endpermission
                    @permission('settings.notifications')
                        <li>
                            <a href="{{ route('settings.notifications') }}"
                               class="{{ Request::is('settings/notifications*') ? 'active' : ''  }}">
                                @lang('app.notifications')
                            </a>
                        </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>