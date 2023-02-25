@extends('layouts.app')

@section('title', 'My Live Accounts')

@section('accounts-li', 'active')
@section('accounts-open', 'show')
@section('laccounts', 'active')

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

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">@lang('message.body.live_acnt')</h1>
            </div>

            <div class="row py-3 mb-4">
                <div class="col">
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#newLiveAccountModal"><i
                            class="fa fa-plus"></i>
                        @lang('message.body.new_live')</a>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>@lang('message.account_name')</th>
                                    <th>@lang('message.body.balnce')</th>
                                    <th>@lang('message.body.bonus')</th>
                                    <th>@lang('message.body.credit')</th>
                                    <th>@lang('message.body.leverage') </th>
                                    <th>@lang('message.body.status')</th>
                                    <th>@lang('message.body.date_created')</th>
                                    <th>@lang('message.body.act')</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <th>ID</th>
                                <th>@lang('message.account_name')</th>
                                <th>@lang('message.body.balnce')</th>
                                <th>@lang('message.body.bonus')</th>
                                <th>@lang('message.body.credit')</th>
                                <th>@lang('message.body.leverage') </th>
                                <th>@lang('message.body.status')</th>
                                <th>@lang('message.body.date_created')</th>
                                <th>@lang('message.body.act')</th>
                            </tfoot>
                            <tbody>
                                @forelse ($accounts as $account)
                                    <tr>
                                        <th scope="row">{{ $account->number }}</th>
                                        <th scope="row">{{ $account->name }}</th>
                                        <td>{{ $account->balance }}{{ $account->currency }}</td>
                                        <td>{{ $account->bonus }}{{ $account->currency }}</td>
                                        <td>{{ $account->credit }}{{ $account->currency }}</td>
                                        <td>1:{{ $account->leverage }}</td>
                                        <td>
                                            @if ($account->status)
                                                Active
                                            @else
                                                Deactivated
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($account->created_at)->toDayDateTimeString() }}
                                        </td>
                                        <td style="position: unset!important;">
                                            <a class="btn btn-primary btn-xs" href="#" data-toggle="modal"
                                                data-target="#accountDepositModal{{ $account->id }}">Deposit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="load-container" id="loader">
                <div class="loader"></div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    @foreach ($accounts as $account)
        <div style="position: absolute!important;z-index:999999!important;">
            <div id="accountDepositModal{{ $account->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Make new
                                deposit</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form style="padding:3px;" role="form" method="get"
                                action="{{ route('selectpaymentmethod') }}">
                                <input style="padding:5px;" class="form-control" placeholder="Enter amount here"
                                    type="number" name="amount" min="{{ \App\Models\Setting::getValue('min_dw') }}"
                                    required>
                                <br />
                                <input type="hidden" name="account_id" value="{{ $account->id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-primary" value="Continue">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @include('user.modals')
@endsection

@section('javascript')
    <!-- Page level plugins -->
    <script type="text/javascript" src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}" defer>
    </script>

    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
            var loader = $('#loader');
            $("#liveAccform").submit(function(event) {
                var data = $("#liveAccform").serialize();
                var url = this.action;
                event.preventDefault();
                loader.toggle();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(res) {
                        alert(res.message);
                        location.reload();
                        loader.toggle();
                    },
                    error: function() {
                        location.reload();
                        loader.toggle();
                    },
                    dataType: 'json'
                });
            });

            // Call the dataTables jQuery plugin
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        });
    </script>
@endsection
