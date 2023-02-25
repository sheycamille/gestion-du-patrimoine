@section('sidebar')
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <img src="{{ asset('front/img/logo-white.png') }}" alt="homepage" class="logo light-logo" width="150px" />
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @yield('dashboard-li')">
            <a class="nav-link @yield('dashboard')" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                <i data-feather="home" class="fas fa-fw fa-tachometer-alt"></i>
                <span class="hide-menu">@lang('message.dashboard.dash')</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Our Clients
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item @yield('musers-li')">
            <a class="nav-link collapsed  @yield('musers-li')" href="#" data-toggle="collapse" data-target="#collapseTA"
                aria-expanded="true" aria-controls="collapseTA">
                <i class="fas fa-fw fa-users"></i>
                <span>Manage Users</span>
            </a>
            <div id="collapseTA" class="collapse @yield('musers-open')" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">@lang('message.dashboard.trade'):</h6>
                    @if (auth('admin')->user()->hasPermissionTo('muser-list', 'admin'))
                        <a class="collapse-item @yield('musers')" href="{{ route('manageusers') }}">All Users</a>
                    @endif
                    @if (
                        \App\Models\Setting::getValue('enable_kyc') == 'yes' &&
                            auth('admin')->user()->hasPermissionTo('mkyc-list', 'admin'))
                        <a class="collapse-item @yield('mkyc')" href="{{ route('kyc') }}">KYC</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Money
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item @yield('mdw-li')">
            <a class="nav-link collapsed  @yield('mdw-li')" href="#" data-toggle="collapse"
                data-target="#collapseDW" aria-expanded="true" aria-controls="collapseDW">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Manage D/W</span>
            </a>
            <div id="collapseDW" class="collapse @yield('mdw-open')" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">@lang('message.dashboard.deposits'):</h6>
                    @if (auth('admin')->user()->hasPermissionTo('mdeposit-list', 'admin'))
                        <a class="collapse-item @yield('mdeposits')" href="{{ route('mdeposits') }}">Manage Deposits</a>
                    @endif
                    @if (auth('admin')->user()->hasPermissionTo('mwithdrawal-list', 'admin'))
                        <a class="collapse-item @yield('mwithdrawals')" href="{{ route('mwithdrawals') }}">Manage
                            Withdrawals</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            FTDs
        </div>

        <li class="nav-item @yield('maccounts-li')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKYC"
                aria-expanded="true" aria-controls="collapseKYC">
                <i class="fas fa-fw fa-lock"></i>
                <span>FTDs</span>
            </a>
            <div id="collapseKYC" class="collapse @yield('maccounts-open')" aria-labelledby="headingKYC"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">First Time Deposits:</h6>
                    @if (auth('admin')->user()->hasPermissionTo('macctype-list', 'admin'))
                        <a class="collapse-item @yield('accounttypes')" href="{{ route('accounttypes') }}">Account Types</a>
                    @endif
                    @if (auth('admin')->user()->hasPermissionTo('macctype-create', 'admin'))
                        <a class="collapse-item @yield('addaccounttype')" href="{{ route('showaddaccounttype') }}">Add Account
                            Type</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manage Administrator(s)
        </div>

        <li class="nav-item @yield('madmins-li')">
            <a class="nav-link collapsed @yield('madmins')" href="#" data-toggle="collapse"
                data-target="#collapseAdmins" aria-expanded="true" aria-controls="collapseAdmins">
                <i class="fas fa-fw fa-users"></i>
                <span>Manage Administrators</span>
            </a>
            <div id="collapseAdmins" class="collapse @yield('madmins-open')" aria-labelledby="headingAccount"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if (auth('admin')->user()->hasPermissionTo('madmin-list', 'admin'))
                        <a class="collapse-item @yield('admins')" href="{{ route('madmins') }}">Manage
                            Administrator(s)</a>
                    @endif
                    @if (auth('admin')->user()->hasPermissionTo('mrole-list', 'admin'))
                        <a class="collapse-item @yield('roles')" href="{{ route('manageroles') }}">Manage Role(s)</a>
                    @endif
                    @if (auth('admin')->user()->hasPermissionTo('mperm-list', 'admin'))
                        <a class="collapse-item @yield('perms')" href="{{ route('manageperms') }}">Manage
                            Permission(s)</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Settings
        </div>

        @if (auth('admin')->user()->hasPermissionTo('msetting-list', 'admin'))
            <li class="nav-item @yield('msettings-li')">
                <a class="nav-link collapsed @yield('msettings')" href="#" data-toggle="collapse"
                    data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseSettings">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Settings</span>
                </a>
                <div id="collapseSettings" class="collapse @yield('msettings-open')" aria-labelledby="headingAccount"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @yield('siteinfo')" href="{{ route('settings') }}">Site Information</a>
                        <a class="collapse-item @yield('sitepref')" href="{{ route('preferencesettings') }}">Site
                            Preferences</a>
                        <a class="collapse-item @yield('payssettings')" href="{{ route('paymentsettings') }}">
                            Payment Settings</a>
                    </div>
                </div>
            </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            My Account
        </div>

        <li class="nav-item @yield('profile-li')">
            <a class="nav-link collapsed @yield('profile')" href="#" data-toggle="collapse"
                data-target="#collapseAccount" aria-expanded="true" aria-controls="collapseAccount">
                <i class="fas fa-fw fa-users"></i>
                <span>@lang('message.dashboard.my_pfl')</span>
            </a>
            <div id="collapseAccount" class="collapse @yield('profile-open')" aria-labelledby="headingAccount"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @yield('changepass')" href="{{ route('adminchangepass') }}">Change Password</a>
                    <a class="collapse-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('message.topmenu.log')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
@endsection
