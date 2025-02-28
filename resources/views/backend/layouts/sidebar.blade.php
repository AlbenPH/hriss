<!-- Sidebar  -->
<nav class="sidebar sidebar-bunker">
    <div class="sidebar-header">
        <a href="{{ route('home') }}" class="sidebar-brand w-100">
            <img class="sidebar-logo sidebar_brand_icon w-100"
                src="{{ app_setting()->sidebar_logo ?? asset('pic/logonam.jpg') }}" alt="{{ localize('logo') }}">
            <img class="collapsed-logo" src="{{ app_setting()->sidebar_collapsed_logo ?? asset('pic/logonam.jpg') }}"
                alt="{{ localize('logo') }}">
        </a>
    </div>
    <!--/.sidebar header-->
    <div class="sidebar-body">
        <div class="search sidebar-form">
            <div class="search__inner sidebar-search">
                <input id="search" type="text" class="form-control search__text" placeholder="Menu Search..."
                    autocomplete="off">
                {{-- <i class="typcn typcn-zoom-outline search__helper" data-sa-action="search-close"></i> --}}
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul class="metismenu">
                @can('read_dashboard')
                    <li class="{{ request()->is('dashboard') ? 'mm-active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home"></i>
                            <span>{{ localize('dashboard') }}</span>
                        </a>
                    </li>
                @endcan

                @can('read_attendance')
                    <li class="{{ request()->routeIs('attendances.*') ? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fa fa-user"></i>
                            <span> {{ localize('attendance') }}</span>
                        </a>
                        <ul class="nav-second-level {{ request()->routeIs('attendances.*') ? 'mm-show' : '' }}">
                            @can('read_attendance')
                                @can('create_attendance')
                                    <li class="{{ request()->routeIs('attendances.create') ? 'mm-active' : '' }}">
                                        <a class="dropdown-item"
                                            href="{{ route('attendances.create') }}">{{ localize('attendance_form') }}</a>
                                    </li>
                                @endcan
                                @can('create_monthly_attendance')
                                    <!--<li class="{{ request()->routeIs('attendances.monthlyCreate') ? 'mm-active' : '' }}">-->
                                    <!--    <a class="dropdown-item"-->
                                    <!--        href="{{ route('attendances.monthlyCreate') }}">{{ localize('monthly_attendance') }}</a>-->
                                    <!--</li>-->
                                @endcan
                                @can('read_missing_attendance')
                                    <li class="{{ request()->routeIs('attendances.missingAttendance') ? 'mm-active' : '' }}">
                                        <a class="dropdown-item"
                                            href="{{ route('attendances.missingAttendance') }}">{{ localize('missing_attendance') }}</a>
                                    </li>
                                @endcan
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('read_department')
                    <li class="{{ request()->routeIs('departments.*') ? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fa fa-bank"></i>
                            <span> {{ localize('department') }}</span>
                        </a>
                        <ul class="nav-second-level {{ request()->routeIs('departments.*') ? 'mm-show' : '' }}">
                            @can('read_department')
                                <li class="{{ request()->routeIs('departments.*') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('departments.index') }}">{{ localize('department') }}</a>
                                </li>
                            @endcan
                            @can('read_sub_departments')
                                <li class="{{ request()->routeIs('divisions.*') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('divisions.index') }}">{{ localize('sub_department ') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('read_employee')
                    <li class="{{ request()->routeIs('employees*') ? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fa fa-users"></i>
                            <span> {{ localize('employee') }}</span>
                        </a>
                        <ul
                            class="nav-second-level {{ request()->routeIs('employees*') || request()->routeIs('positions*') ? 'mm-show' : '' }}">
                            @can('read_positions')
                                <li class="{{ request()->routeIs('positions.*') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('positions.index') }}">{{ localize('position') }}</a>
                                </li>
                            @endcan
                            @can('read_employee')
                                <li class="{{ request()->routeIs('employees.*') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('employees.index') }}">{{ localize('employee') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('read_leave')
                    <li class="{{ request()->routeIs('leave.*') ? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fa fa-plane"></i>
                            <span> {{ localize('leave') }}</span>
                        </a>
                        <ul class="nav-second-level {{ request()->routeIs('leave.*') ? 'mm-show' : '' }}">
                            @can('read_leave')
                                <li class="{{ request()->routeIs('leave.weekleave') ? 'mm-active' : '' }}">
                                <!--    <a class="dropdown-item"-->
                                <!--        href="{{ route('leave.weekleave') }}">{{ localize('weekly_holiday') }}</a>-->
                                <!--</li>-->
                                <li class="{{ request()->routeIs('holiday.index') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item" href="{{ route('holiday.index') }}">{{ localize('holiday') }}</a>
                                </li>
                            @endcan
                            @can('read_leave_application')
                                <li class="{{ request()->routeIs('leave.index') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('leave.index') }}">{{ localize('leave_application  ') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('read_notice')
                    <li class="{{ request()->routeIs('notice.*') ? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fa fa-bell"></i>
                            <span> {{ localize('notice_board') }}</span>
                        </a>
                        <ul class="nav-second-level {{ request()->routeIs('notice.*') ? 'mm-show' : '' }}">
                            @can('read_notice')
                                <li class="{{ request()->routeIs('notice.*') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item" href="{{ route('notice.index') }}">{{ localize('notice') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('read_payroll')
                    <li class="{{ request()->is('payroll/*') ? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fa fa-credit-card"></i>
                            <span> {{ localize('payroll') }}</span>
                        </a>
                        <ul class="nav-second-level {{ request()->is('payroll/*') ? 'mm-show' : '' }}">
                            @can('read_salary_advance')
                                <li class="{{ request()->is('payroll/salary-advance') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('salary-advance.index') }}">{{ localize('salary_advance') }}</a>
                                </li>
                            @endcan
                            @can('read_salary_generate')
                                <li
                                    class="{{ request()->routeIs('salary.generate-form') || request()->routeIs('salary.approval-form') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('salary.generate-form') }}">{{ localize('salary_generate') }}</a>
                                </li>
                            @endcan
                            @can('read_manage_employee_salary')
                                <li
                                    class="{{ request()->routeIs('employee.salary') || request()->routeIs('employee.payslip') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('employee.salary') }}">{{ localize('manage_employee_salary') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

            

                @can('read_reports')
                    <li class="{{ request()->is('reports*') ? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fa fa-industry"></i>
                            <span> {{ localize('reports') }}</span>
                        </a>
                        <ul class="nav-second-level {{ request()->routeIs('reports.*') ? 'mm-show' : '' }}">
                            @can('read_reports')
                                @can('read_attendance_report')
                                    <li
                                        class="{{ request()->routeIs('reports.daily-present') ||
                                        request()->routeIs('reports.lateness-closing-attendance') ||
                                        request()->routeIs('reports.attendance-log') ||
                                        request()->routeIs('reports.attendance-log-details') ||
                                        request()->routeIs('reports.monthly') ||
                                        request()->routeIs('reports.staff-attendance')
                                            ? 'mm-active'
                                            : '' }}">
                                        <!--<a class="dropdown-item"-->
                                        <!--    href="{{ route('reports.daily-present') }}">{{ localize('attendance_report') }}</a>-->
                                    </li>
                                @endcan
                                @can('read_leave_report')
                                    <li class="{{ request()->routeIs('reports.leave') ? 'mm-active' : '' }}">
                                        <a class="dropdown-item"
                                            href="{{ route('reports.leave') }}">{{ localize('leave_report') }}</a>
                                    </li>
                                @endcan
                                @can('read_employee_report')
                                    <li class="{{ request()->routeIs('reports.employee') ? 'mm-active' : '' }}">
                                        <a class="dropdown-item"
                                            href="{{ route('reports.employee') }}">{{ localize('employee_reports') }}</a>
                                    </li>
                                @endcan
                                @can('read_payroll_report')
                                    <li
                                        class="{{ request()->routeIs('reports.npf3-soc-sec-tax-report') ||
                                        request()->routeIs('reports.iicf3-contribution') ||
                                        request()->routeIs('reports.social-security-npf-icf') ||
                                        request()->routeIs('reports.gra-ret-5-report') ||
                                        request()->routeIs('reports.sate-income-tax') ||
                                        request()->routeIs('reports.salary-confirmation-form')
                                            ? 'mm-active'
                                            : '' }}">
                                        <a class="dropdown-item"
                                            href="{{ route('reports.npf3-soc-sec-tax-report') }}">{{ localize('payroll') }}</a>
                                    </li>
                                @endcan
                                @can('read_adhoc_report')
                                    <!-- <li class="{{ request()->routeIs('reports.adhoc-advance') ? 'mm-active' : '' }}">
                                        <a class="dropdown-item"
                                            href="{{ route('reports.adhoc-advance') }}">{{ localize('adhoc_report') }}</a>
                                    </li> -->
                                @endcan
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('read_setup_rules')
                    <li class="{{ request()->routeIs('setup_rules.*') ? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fa fa-message"></i>
                            <span> {{ localize('setup_rules') }}</span>
                        </a>
                        <ul class="nav-second-level {{ request()->routeIs('setup_rules.*') ? 'mm-show' : '' }}">
                            @can('read_setup_rules')
                                <li class="{{ request()->routeIs('setup_rules.*') ? 'mm-active' : '' }}">
                                    <a class="dropdown-item"
                                        href="{{ route('setup_rules.index') }}">{{ localize('rules') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('read_setting')
                    <li
                        class="{{ request()->is('setting*') || request()->is('role*') || request()->is('applications*') || request()->is('currencies*') || request()->is('mails*') || request()->is('sms*') || request()->is('password*') || request()->is('user*') || request()->is('localize*') || request()->is('database-backup-reset*') ? 'mm-active' : '' }}">
                        @can('read_application')
                            <a href="{{ route('applications.application') }}">
                                <i class="fa fa-gear"></i>
                                <span>{{ localize('settings') }}</span>
                            </a>
                        @endcan
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
    <!-- sidebar-body -->
</nav>
