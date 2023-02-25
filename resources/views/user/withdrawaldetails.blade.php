@extends('layouts.app')

@section('title', 'My Withdrawal Info')

@section('profile-li', 'active')
@section('profile-open', 'show')
@section('winfo', 'active')

@section('css')
    <link href="{{ asset('admin/css/loader.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    @include('user.sidebar')
    @include('user.topmenu')

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

            <div class="col-lg-12">
                <form class="col-lg-12" method="post" action="{{ route('updatewithdrawaldetails') }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header"><strong>@lang('message.withdrawal_details.bank')</strong>
                                    <small>@lang('message.withdrawal_details.transfer')</small>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bank_name">@lang('message.withdrawal_details.name')</label>
                                        <input name="bank_name" class="form-control" id="bank_name" type="text"
                                            placeholder="" value="{{ Auth::user()->bank_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_address">@lang('message.withdrawal_details.bank_addres')</label>
                                        <input name="bank_address" class="form-control" id="bank_address" type="text"
                                            placeholder="" value="{{ Auth::user()->bank_address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="swift_code">@lang('message.withdrawal_details.swift')</label>
                                        <input name="swift_code" class="form-control" id="swift_code" type="text"
                                            placeholder="" value="{{ Auth::user()->swift_code }}">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-8">
                                            <label for="account_name">@lang('message.withdrawal_details.acnt_name')</label>
                                            <input name="account_name" class="form-control" id="account_name" type="text"
                                                placeholder="" value="{{ Auth::user()->account_name }}">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="account_number">@lang('message.withdrawal_details.acnt_num')</label>
                                            <input name="account_number" class="form-control" id="account_number"
                                                type="text" placeholder="" value="{{ Auth::user()->account_number }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>@lang('message.withdrawal_details.cash')</strong>
                                    <small></small>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bch">@lang('message.withdrawal_details.cash_addres')</label>
                                        <input name="bch_address" class="form-control" id="bch" type="text"
                                            value="{{ Auth::user()->bch_address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>@lang('message.withdrawal_details.interac')</strong>
                                    <small></small>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="interac">@lang('message.withdrawal_details.int_email') </label>
                                        <input name="interac" class="form-control" id="interac" type="text"
                                            value="{{ Auth::user()->interac }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>Paypal</strong> <small></small></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="paypal">@lang('message.withdrawal_details.paypa')</label>
                                        <input class="form-control" id="paypal" type="text" name="paypal_email"
                                            value="{{ Auth::user()->paypal_email }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>BNB</strong> <small></small></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bnb">@lang('message.withdrawal_details.bn_addres') </label>
                                        <input name="bnb_address" class="form-control" id="bnb" type="text"
                                            value="{{ Auth::user()->bnb_address }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header"><strong>@lang('message.withdrawal_details.bitcoin')</strong>
                                    <small></small>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="btc">@lang('message.withdrawal_details.btc_addres')</label>
                                        <input name="btc_address" class="form-control" id="btc" type="text"
                                            value="{{ Auth::user()->btc_address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>@lang('message.withdrawal_details.ethereum')</strong>
                                    <small></small>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="eth">@lang('message.withdrawal_details.ethe_addres') </label>
                                        <input name="eth_address" class="form-control" id="eth" type="text"
                                            value="{{ Auth::user()->eth_address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>Litcoin</strong> <small></small></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ltc">@lang('message.withdrawal_details.ltc_addres')</label>
                                        <input name="ltc_address" class="form-control" id="ltc" type="text"
                                            value="{{ Auth::user()->ltc_address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>USDT</strong> <small></small></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="usdt">@lang('message.withdrawal_details.us_addres') </label>
                                        <input name="usdt_address" class="form-control" id="usdt" type="text"
                                            value="{{ Auth::user()->usdt_address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>USDC</strong> <small></small></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="usdc">@lang('message.withdrawal_details.usdc_addres')</label>
                                        <input name="usdc_address" class="form-control" id="usdc" type="text"
                                            value="{{ Auth::user()->usdc_address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>XRP</strong> <small></small></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="xrp">@lang('message.withdrawal_details.xr_addres')</label>
                                        <input name="xrp_address" class="form-control" id="xrp" type="text"
                                            value="{{ Auth::user()->xrp_address }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="d-grid gap-2">
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-primary" type="submit"> @lang('message.body.submit')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
