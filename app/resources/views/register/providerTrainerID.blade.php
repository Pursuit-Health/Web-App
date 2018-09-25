@extends('templates.master-front')
<?php $app_name = config('app.name');?>
@section('title',"Register as Client | $app_name")

@section('content')
<div class="container">
  

  <div class="row full-height align-items-center justify-content-center register-form-container">
    <div class="col-md-5 text-white text-center">
      
      @if(isset($success))
      <div class="alert alert-success">
        <h1>Trainer found!</h1>
        @if(!empty($success[0]->avatar_url))
          <p><img src="{{$success[0]->avatar_url}}" class="img-fluid mx-auto d-block"></p>
        @endif
        <p>if <b><u>{{ $success[0]->name }}</u></b> is your trainer, you may continue.</p>
        <div class="row">
          <div class="col-6">
            <a href="{{route('register-client')}}" class="btn btn-danger">cancel</a>
          </div>
          <div class="col-6">
            <a href="" class="btn btn-green">Continue</a>
          </div>
        </div>
      </div>
      @else
        <p class="lead">Please enter the code that was provided to you by your trainer in order to create your account.</p>
        @if(isset($error))
        <div class="alert alert-danger">
          {{$error}}
        </div>
        @endif
        
        {{ Form::open(array('url'=>route('register-client')))}}
        {{ Form::text('trainerCode','',array('class'=>'form-control','placeholder'=>'My Trainer\'s Code Is...')) }}
        {{ Form::submit('Validate Code',array('class'=>'btn btn-block btn-green mt-3'))}}
        {{ Form::close() }}
      @endif
      
      
      
    </div>
  </div>
</div>
@endsection