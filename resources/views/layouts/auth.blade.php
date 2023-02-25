<!DOCTYPE html>
<html lang="{{ config('locale') }}" dir="ltr">

<head>
    <!-- Standard Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | {{ \App\Models\Setting::getValue('site_name') }}</title>

    <meta name="description" content="{{ \App\Models\Setting::getValue('site_description') }}">
    <meta name="keywords" content="{{ \App\Models\Setting::getValue('keywords') }}">
    <meta name="author" content="gestiondupatrimoine.net">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f2f3f5" />

    <link rel="icon" href="{{ asset('front/favicon.png') }}" type="image/png" />

    <!-- Libraries CSS Files -->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    @yield('stylesheets')

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('admin/vendor/jquery/jquery.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('admin/js/sb-admin-2.min.js') }}" defer></script>
    @yield('scripts')
</body>

</html>
