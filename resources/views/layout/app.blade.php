<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Laravel+Vue</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    </style>
  </head>
  <body>
    <div id="app">
      <div class="container mb-5">
          <nav class="d-flex align-items-center">
            <a href="/" class="btn btn-success btn-sm">HOME</a>
            <a href="/start" class="btn btn-success btn-sm">START</a>
            <h1>:</h1>
            @if(Request::url() === 'http://test.test/start')
              <router-link class="btn btn-success btn-sm ml-2" to='/prop'>Prop</router-link>
              <router-link class="btn btn-success btn-sm" to="/ajax">Ajax</router-link>
              <router-link class="btn btn-success btn-sm" to="/line">LineChart</router-link>
              <router-link class="btn btn-success btn-sm" to="/pie">PieChart</router-link>
              <router-link class="btn btn-success btn-sm" to="/random">RandomChart</router-link>
              <router-link class="btn btn-success btn-sm" to="/socket">SocketChart</router-link>
            @endif
          </nav>

        @yield('content')
      </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>