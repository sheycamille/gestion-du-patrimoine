@extends('layouts.app')

@section('title', 'My Withdrawals')

@section('dw-li', 'active')
@section('dw-open', 'show')
@section('withdrawals', 'active')

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
                <h1 class="h3 mb-0 text-gray-800">@lang('message.body.my_with')</h1>
            </div>

            <div class="row py-3 mb-4">
                <div class="col">
                    {{-- <a class="btn btn-primary" href="{{ route('account.t7deposit') }}"><i
                                        class="fa fa-plus"></i> @lang('message.body.new_depo')</a> --}}
                    <a class="btn btn-primary" href="{{ route('mwithdrawal') }}">
                        <i class="fa fa-plus"></i>
                        @lang('message.body.new_with')
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>@lang('message.body.account')</th>
                        <th>@lang('message.body.amount')</th>
                        <th>@lang('message.body.pay_method')</th>
                        <th>@lang('message.body.status')</th>
                        <th>@lang('message.body.date_created')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($withdrawals as $withdrawal)
                        <tr>
                            <th scope="row">{{ $withdrawal->id }}</th>
                            <td>{{ $withdrawal->t7->number }}</td>
                            <td>
                                {{ \App\Models\Setting::getValue('currency') }}{{ $withdrawal->amount }}
                            </td>
                            <td>{{ $withdrawal->payment_mode }}</td>
                            <td>{{ $withdrawal->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->toDayDateTimeString() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">@lang('message.body.no_data')</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
            // Call the dataTables jQuery plugin
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        });
    </script>
@endsection
