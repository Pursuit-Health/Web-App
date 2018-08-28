<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forgot Password</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/theme.css" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
              @if(isset($message))
                <div class="alert alert-danger">
                  <p>{{ $message }}</p>
                </div>
              @endif
                {{ Form::open(array('url' => 'do-forgot-password')) }}
                  <input type="email" name="email" placeholder="email" value="{{$email or "" }}"required><br>
                  <input type="submit">
                {{ Form::close() }}
            </div>
        </div>
    </body>
</html>
