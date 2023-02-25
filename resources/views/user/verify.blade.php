@extends('layouts.app')

@section('title', 'Account Verification(KYC)')

@section('kyc-li', 'active')
@section('kyc-open', 'show')
@section('kyc', 'active')

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

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h3 class="h3 mb-0 text-gray-800">@lang('message.verify.veri')</h3>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            @lang('message.verify.veri')
                        </div>
                        <div class="card-body">

                            @if (Session::has('message'))
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-info alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            <i class="fa fa-info-circle"></i>
                                            <p class="alert-message">{!! Session::get('message') !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-9">
                                    @if (count($errors) > 0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="alert alert-danger alert-dismissable" role="alert">
                                                    <button type="button" clsass="close" data-dismiss="alert"
                                                        aria-hidden="true">&times;</button>
                                                    @foreach ($errors->all() as $error)
                                                        <i class="fa fa-warning"></i> {{ $error }}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (\App\Models\Setting::getValue('enable_kyc') == 'yes' && Auth::user()->account_verify != 'Verified')
                                        <div class="mb-5 row">

                                            <div class="col-lg-8 offset-lg-2 p-4">
                                                <div class="py-3">
                                                    <h4 class="">@lang('message.verify.upload').
                                                    </h4>
                                                </div>
                                                <form role="form" method="post" action="{{ route('kycsubmit') }}"
                                                    enctype="multipart/form-data">
                                                    <h5 class="">@lang('message.verify.identity').</h5>
                                                    <input type="file" class="" name="idcard"
                                                        @if (!Auth::user()->id_card) required @endif
                                                        value="{{ asset('storage/photos/' . Auth::user()->id_card) }}">
                                                    @if (Auth::user()->id_card)
                                                        <img src="{{ asset('storage/photos/' . Auth::user()->id_card) }}"
                                                            width="100">
                                                    @endif
                                                    <br><br>

                                                    <h5 class="">@lang('message.verify.bak')</h5>
                                                    <input type="file" class="" name="idcard_back"
                                                        @if (!Auth::user()->id_card_back) required @endif
                                                        value="{{ asset('storage/photos/' . Auth::user()->id_card_back) }}">
                                                    @if (Auth::user()->id_card_back)
                                                        <img src="{{ asset('storage/photos/' . Auth::user()->id_card_back) }}"
                                                            width="100">
                                                    @endif
                                                    <br><br>

                                                    <h5 class="">@lang('message.verify.doc')</h5>
                                                    <input type="file" class="" name="address_document"
                                                        @if (!Auth::user()->address_document) required @endif
                                                        value="{{ asset('storage/photos/' . Auth::user()->address_document) }}">
                                                    @if (Auth::user()->address_document)
                                                        <img src="{{ asset('storage/photos/' . Auth::user()->address_document) }}"
                                                            width="100">
                                                    @endif
                                                    <br><br>

                                                    <h5 class="">@lang('message.verify.selfie')</h5>
                                                    <input type="file" class="" name="passport"
                                                        @if (!Auth::user()->passport) required @endif
                                                        value="{{ asset('storage/photos/' . Auth::user()->passport) }}">
                                                    @if (Auth::user()->passport)
                                                        <img src="{{ asset('storage/photos/' . Auth::user()->passport) }}"
                                                            width="100">
                                                    @endif
                                                    <br><br>

                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-primary" value="Submit documents">
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-3">
                                    @if (\App\Models\Setting::getValue('enable_kyc') == 'yes')
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-5 row">
                                                    <div class="col-lg-8 offset-lg-2 p-4">
                                                        <h3 class="nav-link" data-toggle="dropdown" href="#"
                                                            aria-expanded="false">
                                                            KYC
                                                        </h3>
                                                        <div class="quick-actions-header">
                                                            @if (Auth::user()->account_verify == '')
                                                                <h5 class="ml-3">
                                                                    <a href="#" class="p-0 col-12">
                                                                        <i class="glyphicon glyphicon-ok"></i>
                                                                        @lang('message.verify.status')
                                                                    </a>
                                                                </h5>
                                                            @else
                                                                <h5 class="ml-3">
                                                                    <a> KYC Status: {{ Auth::user()->account_verify }}</a>
                                                                </h5>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-12">
                                            <h3 class="text-left">
                                                @lang('message.verify.kyc_veri')
                                            </h3>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
