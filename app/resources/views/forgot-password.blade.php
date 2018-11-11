@extends('templates.master-front')
@section('title','Forgot Password | Pursuit Heath')

@section('content')
<div class="container login">
  <div class="row full-height align-items-center justify-content-center">
    <div class="col-md-7">
  @if(isset($message))
    <div class="alert alert-danger">
      <p>{{ $message }}</p>
    </div>
  @endif
    {{ Form::open(array('url' => 'do-forgot-password')) }}
    <div class="row align-items-center mb-5">
      <div class="col-2">
        <a href="/" title="Back to Login"><span class="oi lead oi-arrow-thick-left text-white"></span></a>
      </div>
      <div class="col-8">
        <h1 class="text-white">Recover Your Password</h1>
      </div>
    </div>
      <div class="input-group mb-4">
        <div class="input-group-prepend">
          <span class="input-group-text oi oi-person text-white"></span>
        </div>
        <input type="email" name="email" placeholder="Email" class="form-control" value="{{$email or "" }}"required>
      </div>
      <input type="submit" value="Request Reset Link" class="btn btn-green btn-block">
    {{ Form::close() }}
  </div>
  </div>
</div>
@endsection