@extends('templates.master-front')
@section('title','Login | Pursuit Heath')

@section('content')
<div class="container">
    <div class="row full-height align-items-center justify-content-center">
      <div class="col-md-4">
        <img src="https://pursuithealth.io/wp-content/themes/understrap-child/images/ph-logo.png" alt="pursuit logo" class="img-fluid d-block mx-auto pb-5">
      @if(isset($message))
        <div class="alert alert-danger">
          <p>{{ $message }}</p>
        </div>
      @endif
        {{ Form::open(array('url' => 'do-login')) }}
          <div class="form-group">
            <input type="email" name="email" placeholder="email" class="form-control" value="{{$email or "" }}"required>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password" value="" required>
            <a href="{{route('forgot-password')}}" class="small float-right">forgot password?</a>
          </div>
          <div class="form-group mt-5 text-center">
            <input type="submit" value="Login" class="btn btn-green btn-block mb-3">
            <div class="dropdown show">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Need an account?
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('register-client')}}">Register as Client</a>
                <a class="dropdown-item" href="{{route('register-trainer')}}">Register as Trainer</a>
              </div>
            </div>
          </div>
        {{ Form::close() }}
      </div>
    </div>
</div>
@endsection
