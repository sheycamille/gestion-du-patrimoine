@extends('layouts.auth')

@section('title', 'Register')

@section('stylesheets')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <style>
        span.select2.select2-container.select2-container--default {
            max-width: 100%;
            width: 100% !important;
            border: 0 none;
            border-radius: 5px;
            padding: 7px 0;
            background: #f7f6fc;
            color: #666;
            font-size: .941rem;
            border: 1px solid #d0d0d0;
            transition: .2s ease-in-out;
            transition-property: color, background-color, border;
        }

        .select2-selection {
            border: 0 none !important;
            border-radius: none !important;
            background-color: #f7f6fc !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered,
        .uk-input,
        .uk-select,
        .uk-textarea {
            color: #8d8686 !important;
        }

        .select2-results__option {
            display: block;
        }

        [class*=uk-inline] {
            display: flex;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-6">
        <div class="p-5">
            <div class="d-flex">
                <h1 class="h4 text-gray-900 mb-4">@lang('message.register.crt')</h1>
                <ul class="navbar-nav ml-auto d-flex flex-row align-items-start">
                    <!-- Nav Item - Lang -->
                    @if (App::getLocale() == 'en')
                        <li class="">
                            <a class="btn btn-sm btn-warning text-white" href="{{ route('switchlang', 'fr') }}">FR</a>
                        </li>
                        <li class="">
                            <a class="btn btn-sm btn-danger text-white" href="{{ route('switchlang', 'es') }}">ES</a>
                        </li>
                    @elseif (App::getLocale() == 'fr')
                        <li class="">
                            <a class="btn btn-sm btn-success text-white" href="{{ route('switchlang', 'en') }}">EN</a>
                        </li>
                        <li class="">
                            <a class="btn btn-sm btn-danger text-white" href="{{ route('switchlang', 'es') }}">ES</a>
                        </li>
                    @else
                        <li class="">
                            <a class="btn btn-sm btn-success text-white" href="{{ route('switchlang', 'en') }}">EN</a>
                        </li>
                        <li class="">
                            <a class="btn btn-sm btn-primary text-white" href="{{ route('switchlang', 'FR') }}">FR</a>
                        </li>
                    @endif

                </ul>
            </div>

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

            <form class="user" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="first_name"
                            value="{{ old('first_name') }}" id="first_name" placeholder="@lang('message.first_name')*" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="last_name"
                            value="{{ old('last_name') }}" id="last_name" placeholder="@lang('message.last_name')*" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="email" class="form-control form-control-user" name="email"
                            value="{{ old('email', request()->email) }}" id="email" placeholder="@lang('message.register.email')*"
                            required>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="mumber" class="form-control form-control-user" name="phone"
                            value="{{ old('phone', request()->phone) }}" id="phone" placeholder="@lang('message.register.enter_num')*"
                            required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('account_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('account_type') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" name="account_type" id="account_type" required>
                            <option disabled>Choose account type*</option>
                            @foreach ($account_types as $accType)
                                <option selected>
                                    {{ $accType->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="address"
                            value="{{ old('address') }}" id="address" placeholder="@lang('message.register.addrs')*" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('town'))
                            <span class="help-block">
                                <strong>{{ $errors->first('town') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('zip_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('zip_code') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="town"
                            value="{{ old('town') }}" id="town" placeholder="@lang('message.register.town')*" required>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="zip_code"
                            value="{{ old('zip_code') }}" id="zip_code" placeholder="@lang('message.register.enter_zip')*" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="state"
                            value="{{ old('state') }}" id="state" placeholder="@lang('message.register.enter_stt')*" required>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="country" id="country" class="uk-input uk-border-rounded country-select" required>
                            <option>@lang('message.register.chs')*</option>
                            @foreach ($countries as $country)
                                <option @if ($country->id == old('country')) selected @endif value="{{ $country->id }}">
                                    {{ ucfirst($country->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" name="password" id="password"
                            placeholder="@lang('message.register.enter_pass')*" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" id="confirm-password"
                            placeholder="@lang('message.register.confirm')*" required>
                    </div>
                </div>

                <div class="uk-margin-small uk-width uk-inline">
                    <div class="uk-width-1-2 uk-inline">
                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </div>

                </div>

                <input type="hidden" class="form-control form-control-user" name="ref_by"
                    value="{{ session()->pull('ref_by') }}">
                <button class="btn btn-primary btn-user btn-block" type="submit"
                    name="submit">@lang('message.register.reg')</button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">@lang('message.login.frgt')</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ route('login') }}">@lang('message.register.already') @lang('message.login.sign_in')</a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        $(function() {
            $('.country-select').select2({
                placeholder: 'Select a country',
                allowClear: true
            })
        })
    </script>
@endsection
