@extends('layouts.login')

@section('title','Login')


@section('content')


<div class="login-box">
    <div class="login-logo">
      <a href="{{asset('assets/admin/index2.html')}}"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Sign in to start your session</p>

        {{-- @if(Session::has('error'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            {{Session::get('error')}}
          </div>
        @endif --}}
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')

        <form action="{{route('admin.postlogin')}}" method="post"novalidate>
            @csrf

            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
                @error('email')
                <span class="fas fa-envelope">{{$message}}</span>
                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">


                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                @error('password')
                <span class="fas fa-lock">{{$message}}</span>
                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">


                  </div>
                </div>
              </div>
            {{-- <fieldset class="form-group position-relative has-icon-left mb-0">
                <input type="text" name="email" class="form-control form-control-lg input-lg"
                       value="{{old('email')}}" id="email" placeholder="أدخل البريد الالكتروني ">
                <div class="form-control-position">
                    <i class="ft-user"></i>
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </fieldset>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="password" name="password" class="form-control form-control-lg input-lg"
                       id="user-password"
                       placeholder="أدخل كلمة المرور">
                <div class="form-control-position">
                    <i class="la la-key"></i>
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </fieldset> --}}

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  @endsection
