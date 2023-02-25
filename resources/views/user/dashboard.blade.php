@extends('layouts.app')

@section('title', 'Dashboard')

@section('dashboard', 'active')
@section('dashboard-li', 'active')

@section('content')

    @include('user.sidebar')

    <!-- Main Content -->
    <div id="content">
        @include('user.topmenu')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            @if (Session::has('getAnouc') && Session::get('getAnouc') == 'true')
                @if (\App\Models\Setting::getValue('enable_annoc') == 'on')
                    <h5 id="ann" class="op-7 mb-4">
                        {{ \App\Models\Setting::getValue('newupdate') }}</h5>
                    <script type="text/javascript">
                        var announment = $("#ann").html();
                        console.log(announment);
                        swal({
                            title: "Annoucement!",
                            text: announment,
                            icon: "info",
                            buttons: {
                                confirm: {
                                    text: "Okay",
                                    value: true,
                                    visible: true,
                                    className: "btn btn-info",
                                    closeModal: true
                                }
                            }
                        });
                    </script>
                @endif
                {{ session()->forget('getAnouc') }}
            @endif

            @if (Session::has('message'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>
                            <p class="alert-message">{!! Session::get('message') !!}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @foreach ($errors->all() as $error)
                                <i class="fa fa-warning"></i> {{ $error }}
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">@lang('message.dashboard.dash')</h1>
                <div class="float-right">
                    <a href="{{ route('refreshaccounts') }}"
                        class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-primary">
                        @lang('message.dashboard.update_balances')
                    </a>
                    <a class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-success"
                        href="{{ route('account.deposits') }}">
                        @lang('message.body.depo')
                    </a>
                    <a class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-info"
                        href="{{ route('account.withdrawals') }}">
                        @lang('message.body.withdraw_funds')
                    </a>
                    <a class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-warning"
                        href="{{ route('account.liveaccounts') }}">
                        @lang('message.body.open')
                    </a>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Total Deposit Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        @lang('message.body.deposited')
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @if (!empty($deposited))
                                            {{ \App\Models\Setting::getValue('currency') }}{{ $deposited }}
                                        @else
                                            {{ \App\Models\Setting::getValue('currency') }}0.00
                                        @endif
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Balance Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        @lang('message.body.balance')
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ \App\Models\Setting::getValue('currency') }}{{ number_format($total_balance, 2, '.', ',') }}
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bonus Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        @lang('message.body.bonus')
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ \App\Models\Setting::getValue('currency') }}
                                                {{ number_format($total_bonus, 2, '.', ',') }}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-gift fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Credit Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        @lang('message.body.credit')
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ \App\Models\Setting::getValue('currency') }}
                                        {{ number_format($total_credit, 2, '.', ',') }}
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-gift fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                @include('includes.chart')

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
