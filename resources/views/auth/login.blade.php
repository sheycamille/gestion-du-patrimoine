@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">@lang('message.welcome_back')</h1>
            </div>
            <form class="user" action="{{ route('login') }}" method="post">
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

                <div class="form-group">
                    <input type="email" class="form-control form-control-user"
                        aria-describedby="emailHelp" placeholder="Enter Email Address..."  name="email" id="email">
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
                <button class="btn btn-primary btn-user btn-block">
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
