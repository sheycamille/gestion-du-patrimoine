@extends('layouts.app')

@section('title', 'Contact Us')

@section('support-li', 'active')
@section('support', 'active')

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
                <h1 class="h3 mb-0 text-gray-800">{{ \App\Models\Setting::getValue('site_name') }} Support</h1>
                <p class="text-center">@lang('message.body.contact_us')</p>
            </div>

            <div class="row d-flex justify-content-center mb-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            @lang('message.send_message')
                        </div>
                        <div class="card-body">
                            <div class="col-md-8 offset-md-2">
                                <form method="post" action="{{ route('enquiry') }}">
                                    <input type="hidden" name="name" value="{{ Auth::user()->name }}" />
                                    <div class="form-group">
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group">
                                        <h5 for="" class="">@lang('message.body.subj')</h5>
                                        <input type="text" name="subject" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <h5 for="" class="">@lang('message.body.mes')</h5>
                                        <textarea name="message" class="form-control" rows="5"></textarea>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="">
                                        <input type="submit" class="py-2 btn btn-primary btn-block"
                                            value="@lang('message.body.send')">
                                    </div>
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
@endsection
