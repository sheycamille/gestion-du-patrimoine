@extends('layouts.auth')

@section('title', 'Admin Login')

@section('content')

    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">@lang('message.welcome_back')</h1>
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

            <form class="user" action="{{ route('adminlogin') }}" method="post">
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
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input name="email" class="form-control form-control-user" value="{{ old('email') }}" id="email"
                        placeholder="name@example.com" required>
                </div>

                <div class="form-group row">
                    <input name="password" class="form-control form-control-user" id="password" value=""
                        type="password" placeholder="Password">
                </div>

                <div class="form-group row">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <br>
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_me">
                    </div>
                </div>
                <button class="btn btn-primary btn-user btn-block">
                    @lang('message.login.sign_in')
                </button>
            </form>
        </div>
    </div>

@endsection
