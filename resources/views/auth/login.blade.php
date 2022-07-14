@extends('layouts.app')

@section('content')
<div class="container-fluid login-container">
    <div class="row justify-content-center">
        <div class="col-md-8 login-form">
            <div class="card">
                <div class="card-header card-header-text">{{ __('Sign in to HapoLearn') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="username" class="col-md-4 col-form-label">{{ __('Username') }}</label><br>

                            <div class="col-md-6 input-container">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label><br>

                            <div class="col-md-6 input-container">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-20">
                            <div class="col-md-8 login-btn-container">
                                <button type="submit" class="btn">
                                    {{ __('Sign in') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mt-40">
                            <div class="form-heading">
                                <hr>
                                <span>Sign in with</span>
                            </div>

                            <button type="submit" class="btn btn-google">
                                <i class="fa-brands fa-google-plus-g"></i>
                                <span>{{ __('Google') }}</span>
                            </button>
                        </div>

                        <div class="form-group mt-40">
                            <div class="form-heading">
                                <hr>
                                <span>or New to HapoLearn</span>
                            </div>

                            <a href="{{ route('register') }}" class="btn btn-register">
                                <span>{{ __('Create New Account') }}</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
