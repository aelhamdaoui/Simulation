<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Simulation') }}</title>
    <!-- Scripts -->
    
    <script src="{{asset('js/bootstrap.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('jquery.min.js')}}"></script>

    
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.css')}}">

    <style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;

  background-color: rgb(39,128,228);
  color: white;
  text-align: center;


    }
    </style>
    
    <scipt src = "main.js"></scipt>

</head>
<body>
    <div id="app">
        
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/home') }}">
                        SimulationFMPA
                        <!--{{ config('app.name', 'Simulation') }}-->
                    </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        @yield('menu')
    </div>
   </div>
   </nav>
   
        @yield('message')
        @yield('content')


    </div>

</div>


    
</body>
<br><br><br>
<div class="footer">
  <p> Agadir Simulation © 2020</p>
</div>

</html>
