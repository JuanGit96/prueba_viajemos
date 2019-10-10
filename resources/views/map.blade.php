<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
                html, body {
                    background-color: #fff;
                    color: #636b6f;
                    font-family: 'Nunito', sans-serif;
                    font-weight: 200;
                    height: 100vh;
                    margin: 0;
                }

                .content {
                    text-align: center;
                }

                .location {
                    display: none;
                }


            </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                    <div class="title m-b-md">
                        <a href={{url('/')}}>
                            <img src="{{asset('img/logoviajemos.png')}}" alt="">
                        </a>
                    </div>

                    <div class="col-md-2">
                            <hr>
                            <h2>Ciudad:</h2><span>{{$city->name}}</span>
                            <h2>Humedad:</h2><span>{{$humidity}}%</span>
                            <div class="location">
                                <h2>Latitud:</h2><span id="latitude">{{$city->latitude}}</span>
                                <h2>Longitud:</h2><span id="longitude">{{$city->longitude}}</span>
                            </div>


                            <hr>

                            <div>
                                <a href={{url('/')}}>
                                    <button class="btn btn-primary">Volver</button>
                                </a>
                            </div>

                            <hr>
                            <a href={{route('queries')}}>
                                <button class="btn btn-success">Consultas anteriores</button>
                            </a>
                            <hr>
                            <a target="_blank" href="https://github.com/JuanGit96">
                                <button class="btn btn-dark">Github</button>
                            </a>
                            <hr>
                            <a target="_blank" href="https://www.linkedin.com/in/juan-daniel-cardenas-davila/">
                                <button class="btn btn-danger">Linkedin</button>
                            </a>
                            <hr>
                    </div>
                    <div class="col-md-10">
                            <div id="map"
                            style="width:100%;
                            height: 500px;"></div>
                    </div>



            </div>
        </div>
    </body>
    <script src="{{asset('js/map.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA70fslcm8mwK6ZSGPOc_S0SNaAn74G_6Y&callback=initMap&libraries=places">
    </script>
</html>


