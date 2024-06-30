@extends('layouts.auth.app')

@section('content')
@extends('layouts.auth.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ url('/') }}" class="text-decoration-none">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>First Resume</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-capitalize text-center bg-light">
                    <p>Don't have an Account? <a href="{{ url('register') }}">Sign Up</a></p>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@endsection
