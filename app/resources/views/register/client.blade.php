@extends('templates.master-front')
<?php $app_name = config('app.name');?>
@section('title',"Register as Client | $app_name")

@section('content')
<div class="container">
  

  <div class="row full-height align-items-center justify-content-center register-form-container">
    @if (!empty($success))
    <div class="col-12">
      <div class="row">
        <div class="col">
          <div class="alert alert-success">
            {{ $success }}
          </div>
        </div>
      </div>
    </div>
    @endif
    @if (!empty($error))
    <div class="col-12">
      <div class="row">
        <div class="col">
          <div class="alert alert-danger">
            {{ $error }}
          </div>
        </div>
      </div>
    </div>
    @endif
    <div class="col-lg-6 mb-4">
      <div class="row"><div class="col"><h1 class="text-white">Register as new Client</h1></div></div>
      <img src="/images/register-trainer-bg@2x.jpg" class="img-fluid d-block mx-auto" alt="">
    </div>
    <div class="col-lg-6">
      {{ Form::open(array('url' => '/register/client')) }}
      <div class="form-group">
        <label class="text-secondary">Full Name</label>
        {{ Form::text('fullname',$name,array('class'=>'form-control','required')) }}   
      </div>
      <div class="form-group">
        <label class="text-secondary">Email</label>
        {{ Form::email('email',$email,array('class'=>'form-control','required')) }}   
      </div>
      <div class="form-group">
        <label class="text-secondary">Password</label>
        {{ Form::password('password',array('class'=>'form-control','required')) }}   
      </div>
      <div class="form-group">
        <label class="text-secondary">Trainer Code</label>
        {{ Form::text('trainer-code',$trainerCode,array('class'=>'form-control','required')) }}   
      </div>
      <div class="form-group">
        <label class="text-secondary">Birthday</label>
        {{ Form::date('birthdate',$birthday,array('class'=>'form-control','required')) }}   
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-green btn-lg float-right" value="Register">  
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@endsection