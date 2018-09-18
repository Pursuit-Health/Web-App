@extends('templates.master-front')
<?php $app_name = config('app.name');?>
@section('title',"Register as Client | $app_name")

@section('content')
<div class="container">
  

  <div class="row full-height align-items-center justify-content-center register-form-container">
    <div class="col-md-5 text-white text-center">
      <p class="lead">Please enter the code that was provided to you by your trainer in order to create your client account.</p>
      {{ Form::text('trainer-code','',array('class'=>'form-control','placeholder'=>'Trainer Code')) }}
      {{ Form::submit('Validate Code',array('class'=>'btn btn-block btn-green mt-3'))}}
    </div>
  </div>
</div>
@endsection