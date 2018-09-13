<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'ESCORTMODEL.XXX') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" href="{{asset('/image/title-icon.ico')}}">
</head>
<body>
  <img src="{{asset('/image/nav-brand-logo.png')}}" class="img-fluid p-3">
  <div class="container mt-5">
    <div class="card text-center">
      <div class="card-header"><h1>Do you have 18 years old or more?</h1></div>
      <div class="card-body">
        <ul>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
          <li>terms</li>
        </ul>
      </div>
      <div class="card-footer">
        <a href="https://google.com" class="btn btn-outline-primary">NO, I NOT HAVE</a>
        <a href="{{route('escort.index')}}" class="btn btn-outline-primary">YES, I HAVE</a>
      </div>
    </div>
  </div>
</body>
</html>
