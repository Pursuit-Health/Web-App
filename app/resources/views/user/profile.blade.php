@extends('templates.master')
@section('title','Dashboard (profile)')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col">
    <div class="card">
      <img class="card-img-top" src="..." alt="">
      <div class="card-body">
        <h5 class="card-title">{{$settings->data->name}}<br>{{$settings->data->email}}</h5>
        <h6 class="lead float-right text-right clearfix">Trainer Code: {{$settings->meta->invitation_code}}</h6>
        <p>Client Requests: <span class="badge badge-secondary">{{$settings->meta->pending_client_count}}</span></p>
        <a href="#" class="btn btn-primary float-right">View Templates</a>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection