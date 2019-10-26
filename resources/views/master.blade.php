<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>@yield('title', 'MAD Club')</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"><a class="navbar-brand" href="/">MAD Club</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ url('events') }}">Events</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('blogs') }}">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('showcases') }}">Showcase</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('executives') }}">Executives</a></li>
        </ul>

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

    </nav>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-10 text-left">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        @yield('footer')
    </footer>
    </body>

</html>
