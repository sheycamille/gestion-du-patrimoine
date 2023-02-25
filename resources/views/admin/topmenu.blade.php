@section('topbar')
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item">
                <div class="col-5 d-flex align-self-center">
                    <ul class="d-flex flex-row align-self-center text-dark">
                        <span class="breadcrumb-item text-dark"><a class="text-dark" href="/dashboard">Home</a></span>
                        <?php $segments = ''; ?>
                        @for ($i = 1; $i <= count(Request::segments()); $i++)
                            <?php $segments .= '/' . Request::segment($i); ?>
                            @if ($i < count(Request::segments()))
                                <span class="breadcrumb-item text-dark">{{ ucfirst(Request::segment($i)) }}
                                </span>
                            @else
                                <span class="breadcrumb-item text-dark active">{{ ucfirst(Request::segment($i)) }}
                                </span>
                            @endif
                        @endfor
                    </ul>
                </div>
            </li>

            <li class="nav-item ml-auto">
                <div class="col-5 d-flex align-self-center">
                    <ul class="d-flex flex-row align-self-center">
                    </ul>
                </div>
            </li>

            <!-- Nav Item - Lang -->
            @if (App::getLocale() == 'en')
                <li class="nav-item no-arrow mx-1">
                    <a class="btn btn-warning text-white" href="{{ route('switchlang', 'fr') }}">FR</a>
                </li>
                <li class="nav-item no-arrow mx-1">
                    <a class="btn btn-danger text-white" href="{{ route('switchlang', 'es') }}">ES</a>
                </li>
            @elseif (App::getLocale() == 'fr')
                <li class="nav-item no-arrow mx-1">
                    <a class="btn btn-success text-white" href="{{ route('switchlang', 'en') }}">EN</a>
                </li>
                <li class="nav-item no-arrow mx-1">
                    <a class="btn btn-danger text-white" href="{{ route('switchlang', 'es') }}">ES</a>
                </li>
            @else
                <li class="nav-item no-arrow mx-1">
                    <a class="btn btn-success text-white" href="{{ route('switchlang', 'en') }}">EN</a>
                </li>
                <li class="nav-item no-arrow mx-1">
                    <a class="btn btn-primary text-white" href="{{ route('switchlang', 'FR') }}">FR</a>
                </li>
            @endif

        </ul>
    </nav>

    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
@endsection
