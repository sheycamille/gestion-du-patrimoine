@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <div class="col-lg-6">
        <div class="p-5">
            <div class="d-flex">
                <h1 class="h4 text-gray-900 mb-4">@lang('message.forgot_pass.pasreset')</h1>
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
            <form class="user" action="{{ route('password.email') }}" method="post">
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
                    @if ($errors->has('email'))
                        <div class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                    <br>
                    <input type="email" class="form-control form-control-user" aria-describedby="emailHelp"
                        placeholder="Enter Email Address..." name="email" id="email">
                </div>
                <button class="btn btn-primary btn-user btn-block">
                    @lang('message.forgot_pass.link')
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('login') }}">@lang('message.forgot_pass.ha') @lang('message.login.sign_in')</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ route('register') }}">@lang('message.login.newa')</a>
            </div>
        </div>
    </div>
@endsection
