<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MAD Club</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- favicon -->
        <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background: url({{ asset('images/code.jpg') }}) no-repeat fixed;
                background-size: cover;
            }

        </style>
    </head>
    <body>
        @if (Route::has('login'))
            <div class="float-right p-1">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-secondary">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="container pt-md-5">
            <img src="{{ asset('images/mad-logo.png') }}" class="img-fluid p-5 mx-auto d-block" width="512">

            <ul class="nav nav-justified flex-md-row flex-column mx-md-auto">
                <li class="nav-item p-md-1">
                    <a class="btn btn-primary nav-link" href="{{ url('events') }}">Events</a>
                </li>
                <li class="nav-item p-md-1">
                    <a class="btn btn-secondary nav-link" href="{{ url('blogs') }}">Blog</a>
                </li>
                <li class="nav-item p-md-1">
                    <a class="btn btn-primary nav-link" href="{{ url('showcases') }}">Showcase</a>
                </li>
                <li class="nav-item p-md-1">
                    <a class="btn btn-secondary nav-link" href="{{ url('executives') }}">Executives</a>
                </li>
                <li class="nav-item p-md-1">
                    <a class="btn btn-primary nav-link"  href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>

        </div>
    </body>
</html>
