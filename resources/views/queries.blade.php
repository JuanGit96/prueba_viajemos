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

                .content-table {
                    padding-left: 30%;
                    padding-right: 30%;
                    padding-top: 2%
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

                    <div class="content-table table-responsive">
                            <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>#</th>
                                        <th>Ciudad</th>
                                        <th>Humedad (%)</th>
                                        <th>Fecha de consulta</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($queries as $query)
                                            <tr>
                                                <th scope="row">{{$query->id}}</th>
                                                <td>{{$query->city->name}}</td>
                                                <td>{{$query->humidity}}</td>
                                                <td>{{$query->created_at}}</td>
                                              </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                  {{$queries->links()}}


                    </div>

                <a href="{{url('/')}}"><button type="button" class="btn btn-primary">Volver</button></a>

            </div>
        </div>
    </body>
    <script src="{{asset('js/map.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA70fslcm8mwK6ZSGPOc_S0SNaAn74G_6Y&callback=initMap&libraries=places">
    </script>
</html>


