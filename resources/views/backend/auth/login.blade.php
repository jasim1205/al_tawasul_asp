@extends('backend.layouts.appAuth')
@section('title','Login')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Al Tawasul</b> ASP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Admin Login</p>

      <form action="{{route('login.check')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input class="form-control" type="text" required="" id="username"  name="username" value="{{old('username')}}"
              placeholder="Phone Number/hello@example.com"> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required="" id="password" name="password" placeholder="...........">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
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
      <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection