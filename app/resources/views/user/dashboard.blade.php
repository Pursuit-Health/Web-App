<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard (home)</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
      <?php $nav_template = 'templates.nav-'.session('user')->user_type;?>
      @include($nav_template)
      
      <h1 class="text-white">not sure what to show here when they first login...</h1>
      <script src="/js/app.js"></script>
    </body>
</html>
