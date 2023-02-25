<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.analytics')

    @yield('loadPaypal')

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | {{ \App\Models\Setting::getValue('site_name') }}</title>

    <meta name="description"
        content="{{ \App\Models\Setting::getValue('site_description') }} Gestion du Patrimoine offers CFDs on currency pairs and five other asset classes. Start trading forex online with the world's best forex broker.">
    <meta name="keywords"
        content="forex, exchange, broker, crypto, trading, indices, shares, stocks, bonds, cryptocurrencies, futures, energies">
    <meta name="author" content="gestiondupatrimoine.net">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f2f3f5" />

    <link rel="icon" href="{{ asset('front/favicon.png') }}" type="image/png" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    @yield('css')
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @yield('sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            @yield('topbar')
            @yield('content')

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Gestion du Patrimoine</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('admin/vendor/jquery/jquery.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('admin/js/sb-admin-2.min.js') }}" defer></script>
    @yield('javascript')

</body>

</html>
