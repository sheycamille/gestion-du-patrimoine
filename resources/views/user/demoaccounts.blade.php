@extends('layouts.app')

@section('title', 'My Demo Accounts')

@section('accounts-li', 'active')
@section('accounts-open', 'show')
@section('daccounts', 'active')

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
                <h1 class="h3 mb-0 text-gray-800">@lang('message.body.new_demo')</h1>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                        <table class="table table-bordered table-striped table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>@lang('message.account_name')</th>
                                    <th>@lang('message.body.balnce')</th>
                                    {{-- <th>@lang('message.body.bonus')</th> --}}
                                    <th>@lang('message.body.leverage')</th>
                                    <th>@lang('message.body.status')</th>
                                    <th>@lang('message.body.date_created') created</th>
                                    <th>@lang('message.body.act')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($accounts as $account)
                                    <tr>
                                        <th scope="row">{{ $account->number }}</th>
                                        <th scope="row">{{ $account->name }}</th>
                                        <td>{{ $account->balance }}{{ $account->currency }}</td>
                                        {{-- <td>{{ $account->bonus }}{{ $account->currency }}</td> --}}
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
                                        <td>
                                            <a href="{{ route('account.demotopup', $account->id) }}"
                                                class="m-2 btn btn-primary btn-xs">Topup</a>
                                            {{-- <a href="#" data-toggle="modal"
                                                        data-target="#newResetMT5PasswordModal{{ $account->id }}"
                                                        class="m-2 btn btn-danger btn-xs">Reset Password</a> --}}
                                        </td>
                                    </tr>

                                    <!-- Reset MT5 Account Password modal -->
                                    <div id="newResetMT5PasswordModal{{ $account->id }}" class="modal fade"
                                        role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-left text-white">Trader7
                                                        Reset
                                                        Password</h4>
                                                    <button type="button" class="close text-left text-white"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="post"
                                                        action="{{ route('account.resett7password', $account->id) }}">
                                                        @csrf
                                                        <h5 class="text-left text-white ">Trader7 Password*:
                                                        </h5>
                                                        <input style="padding:5px;"
                                                            class="form-control text-left text-white" type="text"
                                                            name="password" required><br />
                                                        <h5 class="text-left text-white ">Confirm Password*:
                                                        </h5>
                                                        <input style="padding:5px;"
                                                            class="form-control text-left text-white" type="text"
                                                            name="confirm_password" required><br />

                                                        <div
                                                            class="d-flex justify-content-start align-content-start input-wrapper">
                                                            <input class="form-control text-left checkbox" type="checkbox"
                                                                name="master_password">
                                                            <label>Reset Investor Password</label>
                                                        </div>

                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="8">@lang('message.body.no_data')</td>
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
    </div>

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
            $("#demoAccForm").submit(function(event) {
                var data = $("#demoAccForm").serialize();
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
