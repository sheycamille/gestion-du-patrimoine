@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <div class="col-lg-6">
        <div class="p-5">
            <div class="d-flex">
                <h1 class="h4 text-gray-900 mb-4">@lang('message.welcome_back')</h1>
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
            <form class="user" action="{{ route('login') }}" method="post">
                @csrf

                <div class="row">
                    @if (Session::has('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: auto;">
                            <p class="alert-message">{!! Session::get('message') !!}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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

                <div class="form-group">
                    <input type="email" class="form-control form-control-user" aria-describedby="emailHelp"
                        placeholder="Enter Email Address..." name="email" id="email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" id="password"
                        placeholder="Password">
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_me">
                        <label class="custom-control-label" for="customCheck">@lang('message.login.rmbr')</label>
                    </div>
                </div>

                <button class="btn btn-xs btn-primary btn-user btn-block">
                    @lang('message.login.sign_in')
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">@lang('message.login.frgt')</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ route('register') }}">@lang('message.login.newa')</a>
            </div>
        </div>
    </div>

@endsection
