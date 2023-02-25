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
            <a class="nav-link @yield('dashboard')" href="{{ route('dashboard') }}" aria-expanded="false">
                <i data-feather="home" class="fas fa-fw fa-tachometer-alt"></i>
                <span class="hide-menu">@lang('message.dashboard.dash')</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Trading Accounts
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item @yield('accounts-li')">
            <a class="nav-link collapsed  @yield('accounts-li')" href="#" data-toggle="collapse" data-target="#collapseTA"
                aria-expanded="true" aria-controls="collapseTA">
                <i class="fas fa-fw fa-wallet"></i>
                <span>@lang('message.dashboard.trade')</span>
            </a>
            <div id="collapseTA" class="collapse @yield('accounts-open')" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">@lang('message.dashboard.trade'):</h6>
                    <a class="collapse-item @yield('laccounts')"
                        href="{{ route('account.liveaccounts') }}">@lang('message.dashboard.live')</a>
                    <a class="collapse-item @yield('daccounts')"
                        href="{{ route('account.demoaccounts') }}">@lang('message.dashboard.demo')</a>
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
        <li class="nav-item @yield('dw-li')">
            <a class="nav-link collapsed  @yield('dw-li')" href="#" data-toggle="collapse"
                data-target="#collapseDW" aria-expanded="true" aria-controls="collapseDW">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>@lang('message.dashboard.deposits')</span>
            </a>
            <div id="collapseDW" class="collapse @yield('dw-open')" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">@lang('message.dashboard.deposits'):</h6>
                    <a class="collapse-item @yield('deposits')"
                        href="{{ route('account.deposits') }}">@lang('message.dashboard.depo')</a>
                    <a class="collapse-item @yield('withdrawals')"
                        href="{{ route('account.withdrawals') }}">@lang('message.dashboard.with')</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            KYC
        </div>

        <li class="nav-item @yield('kyc-li')">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKYC"
                aria-expanded="true" aria-controls="collapseKYC">
                <i class="fas fa-fw fa-lock"></i>
                <span>KYC</span>
            </a>
            <div id="collapseKYC" class="collapse @yield('kyc-open')" aria-labelledby="headingKYC"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#" onclick="event.preventDefault();">KYC Status:
                        {{ Auth::user()->account_verify ? Auth::user()->account_verify : 'Not Verified' }}</a>
                    <a class="collapse-item @yield('kyc')" href="{{ route('account.verify') }}">Verify Account</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Account
        </div>

        <li class="nav-item @yield('profile-li')">
            <a class="nav-link collapsed @yield('profile') @yield('changepassword') @yield('security') @yield('support') @yield('winfo') @yield('notifications')"
                href="#" data-toggle="collapse" data-target="#collapseAccount" aria-expanded="true"
                aria-controls="collapseAccount">
                <i class="fas fa-fw fa-user"></i>
                <span>@lang('message.dashboard.my_pfl')</span>
            </a>
            <div id="collapseAccount" class="collapse @yield('profile-open')" aria-labelledby="headingAccount"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">My Account:</h6>
                    <a class="collapse-item @yield('profile')" href="{{ route('account.profile') }}">@lang('message.dashboard.update_pfl')</a>
                    <a class="collapse-item @yield('cpassword')" href="{{ route('changepassword') }}">@lang('message.topmenu.chg_pss')</a>
                    {{-- <a class="collapse-item @yield('security')" href="{{ route('account.security') }}">@lang('message.dashboard.sec')</a> --}}
                    <a class="collapse-item @yield('winfo')"
                        href="{{ route('withdrawaldetails') }}">@lang('message.dashboard.with_info')</a>
                    <a class="collapse-item @yield('notifications')" href="{{ route('notifications') }}">@lang('message.dashboard.notif')</a>
                    <a class="collapse-item @yield('referrals')" href="{{ route('referrals') }}">@lang('message.dashboard.my_referrals')</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Tools
        </div>

        <li class="nav-item @yield('downloads-li')">
            <a class="nav-link @yield('downloads')" href="{{ route('account.downloads') }}" aria-expanded="false">
                <i class="fas fa-fw fa-download"></i>
                <span>@lang('message.dashboard.down')</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Help
        </div>

        <li class="nav-item @yield('support-li')">
            <a class="nav-link @yield('support')" href="{{ route('account.support') }}" aria-expanded="false">
                <i class="fas fa-fw fa-question"></i>
                <span>@lang('message.dashboard.sup')</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Logout
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>@lang('message.topmenu.log')</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
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
