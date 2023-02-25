@extends('layouts.app')

@section('title', 'Change Password')

@section('profile-li', 'active')
@section('profile-open', 'show')
@section('cpassword', 'active')

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
                <h1 class="h3 mb-0 text-gray-800">@lang('message.chgepass.change')</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header fw-bolder">
                            @lang('message.chgepass.change')
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

                            <div class="mb-5 row d-flex justify-content-center">
                                <div class="col-lg-4 card p-4 shadow-lg">
                                    <form method="post" action="{{ route('updatepass') }}">
                                        <div class="col mb-2">
                                            <h5 class="h5">@lang('message.chgepass.old')</h5>
                                            <input type="password" name="old_password" class="form-control" required>
                                        </div>
                                        <div class="col mb-2">
                                            <h5 class="h5"> @lang('message.chgepass.new')* :</h5>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="col mb-2">
                                            <h5 class=""> @lang('message.chgepass.knfrm')*:</h5>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                required>
                                        </div> <br>
                                        <input type="submit" class="btn btn-primary" value=" @lang('message.chgepass.sub')">

                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="current_password" value="{{ Auth::user()->password }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"><br />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
