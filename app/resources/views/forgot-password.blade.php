@extends('templates.master-front')
@yield('title','Forgot Password')

@section('content')
<div class="container">
  <div class="row full-height align-items-center justify-content-center">
    <div class="col-md-4">
  @if(isset($message))
    <div class="alert alert-danger">
      <p>{{ $message }}</p>
    </div>
  @endif
    {{ Form::open(array('url' => 'do-forgot-password')) }}
      <div class="form-group">
        <input type="email" name="email" placeholder="email" value="{{$email or "" }}" required class="form-control">
      </div>
      <input type="submit" value="Recover Password" class="btn btn-green btn-block">
    {{ Form::close() }}
  </div>
  </div>
</div>
@endsection