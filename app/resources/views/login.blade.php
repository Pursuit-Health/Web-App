<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

    </head>
    <body>
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
                  <div class="form-group mt-5">
                    <input type="submit" value="Login" class="btn btn-green btn-block">
                  </div>
                {{ Form::close() }}
              </div>
            </div>
        </div>
    </body>
</html>
