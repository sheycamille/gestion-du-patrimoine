@extends('layouts.auth')

@section('title', 'Admin Login')

@section('content')

    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">@lang('message.2fa.tfa')</h1>
                <p class="text-muted">
                    @lang('message.2fa.email') <a href="{{ route('admin.verify.resend') }}">@lang('message.2fa.here')</a>.
                </p>
            </div>

            <div class="uk-grid uk-flex">
                @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: auto;">
                        <p class="alert-message">{!! Session::get('message') !!}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

            <form class="user" action="{{ route('admin.verify.check') }}" method="post">
                @csrf
                <div class="mb-4 text-center">
                    @if (Session::has('status'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: auto;">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group row">
                    @if ($errors->has('two_factor_code'))
                        <span class="help-block">
                            <strong>{{ $errors->first('two_factor_code') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input name="two_factor_code"
                        class="form-control form-control-user {{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}"
                        required autofocus placeholder="@lang('message.2fa.code')" required value="{{ old('two_factor_code') }}"
                        id="two_factor_code">
                </div>

                <button class="btn btn-primary btn-user btn-block">
                    @lang('message.login.sign_in')
                </button>
            </form>
        </div>
    </div>

@endsection
