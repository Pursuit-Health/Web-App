@extends('templates.master-front')
@section('title','Login | Pursuit Heath')

@section('content')
<div class="container login">
  <div class="row mt-5 align-items-center justify-content-center justify-content-md-end">
    <div class="col-5 col-md-3 text-light-gray text-right">Not a Member Yet?</div>
    <div class="col-5 col-md-2">
      <div class="dropdown show">
        <a class="btn btn-trans dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sign Up</a>
      
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{route('register-client')}}">Register as Client</a>
        <a class="dropdown-item" href="{{route('register-trainer')}}">Register as Trainer</a>
      </div>
      </div>
    </div>
  </div>
    <div class="row full-height align-items-center justify-content-center">
      <div class="col-10 col-md-4">
        <img src="/images/logo@3x.png" alt="pursuit logo" class="img-fluid d-block mx-auto mb-5" id="login-logo">
      @if(isset($message))
        <div class="alert alert-danger">
          <p>{{ $message }}</p>
        </div>
      @endif
        {{ Form::open(array('url' => 'do-login')) }}
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text oi oi-person text-white"></span>
            </div>
            <input type="email" name="email" placeholder="Email" class="form-control" value="{{$email or "" }}"required>
          </div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text oi oi-lock-locked text-white"></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password" value="" required>
          </div>
          <div class="form-group mt-3 text-center">
            <div class="row align-items-center">
              <div class="col-6"><input type="checkbox">&nbsp;<span class="text-light-gray">Remember Me</span></div>
              <div class="col-6"><input type="submit" value="Sign In" class="btn btn-green btn-block mb-3"></div>
            </div>
          </div>
        {{ Form::close() }}
        <div class="row text-center mt-5">
          <div class="col"><a href="{{route('forgot-password')}}" class="text-light-gray">Forgot Your Password?</a></div>
        </div>
      </div>
    </div>
</div>
@endsection
