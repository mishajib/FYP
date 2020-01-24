@extends('layouts.auth.app')

@section("title", "Login")

@section('content')

<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
      <a href="{{ route('home') }}"><b>{{ config("app.name") }}</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
    
          <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          @if (Route::has('password.request'))
          <p class="mb-1">
            <a href="{{ route('password.request') }}">I forgot my password</a>
          </p>
          @endif
          <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

@stop
