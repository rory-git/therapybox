<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/img/TB logo.webp">


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm bg-yellow-400 py-4 ">
                <div class="container">

                    <div class="flex justify-between items-center">


                        @if (Auth::check())
                        <a href="{{url('')}}"><img src="{{Auth::user()->avatar}}" alt=""
                                class="h-16 rounded-full w-16"></a>
                        @endif


                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto flex ">
                            @if (Auth::check())
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="{{ url('') }}">{{ __('Home') }}</a>
                            </li>
                            @endif

                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown mr-3">
                                <div class="flex">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <script>
            window.user = @json(Auth::user());
        </script>
    </body>

</html>