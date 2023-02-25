@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')


    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">@lang('message.login.newp')</h1>
            </div>
            <form class="user" action="{{ route('password.update') }}" method="post">
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
                    <input name="email" class="form-control form-control-user" id="email"
                        value="{{ $request->email ?? old('email') }}" type="email" placeholder="Enter your email"
                        required>
                </div>

                <div class="form-group row">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input name="password" class="form-control form-control-user" id="password" value=""
                        type="password" placeholder="Password" required>
                </div>

                <div class="form-group row">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input name="password_confirmation" class="form-control form-control-user" id="password_confirmation"
                        value="" type="password" placeholder="Password" required>
                </div>

                <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">@lang('message.login.rstp')</button>
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
