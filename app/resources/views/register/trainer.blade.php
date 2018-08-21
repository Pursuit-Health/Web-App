<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #1D1D26;
                color: #fafafa;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .register-form-container{
              height:100vh;
            }
            
            .btn-primary{
              background-color:#50d2c2;
              border-color:#50d2c2;
            }
            .btn-primary:hover{
              background-color:#10d2c2;
              border-color:#50d2c2;
            }
            .light-gray-bg{
              background-color: #777;
            }
        </style>
        
        

    </head>
    <body>
        <div class="container">
          @if (!empty($error))
          <div class="row">
            <div class="col">
              <div class="alert alert-danger">
                {{ $error }}
              </div>
            </div>
          </div>
          @endif
          @if (!empty($success))
          <div class="row">
            <div class="col">
              <div class="alert alert-success">
                {{ $success }}
              </div>
            </div>
          </div>
          @endif
          <div class="row align-items-center register-form-container">
            <div class="col-lg-6 mb-4">
              <img src="/images/register-trainer-bg@2x.jpg" class="img-fluid d-block mx-auto" alt="">
            </div>
            <div class="col-lg-6">
              {{ Form::open(array('url' => '/register/trainer')) }}
              <div class="form-group">
                <label>Full Name</label>
                {{ Form::text('fullname',$name,array('class'=>'form-control','required')) }}   
              </div>
              <div class="form-group">
                <label>Email</label>
                {{ Form::email('email',$email,array('class'=>'form-control','required')) }}   
              </div>
              <div class="form-group">
                <label>Password</label>
                {{ Form::password('password',array('class'=>'form-control','required')) }}   
              </div>
              <div class="form-group">
                <label>Birthday</label>
                {{ Form::date('birthdate',$birthday,array('class'=>'form-control','required')) }}   
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg float-right" value="Register">  
              </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
    </body>
</html>
