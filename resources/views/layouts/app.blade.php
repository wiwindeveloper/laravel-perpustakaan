<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Larapus') }}</title>

    <!-- Scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::check())
                            <!-- <li class="nav-link"><a href="{{ url('/home') }}">Dashboard</a></li> -->
                            {!! Html::smartNav(url('/home'), 'Dashboard') !!}
                        @endif
                        @role('admin')
                            <!-- <li class="nav-link"><a href="{{ route('authors.index') }}"> Penulis</a></li>
                            <li class="nav-link"><a href="{{ route('books.index') }}"> Buku</a></li>
                            <li class="nav-link"><a href="{{ route('members.index') }}"> Member</a></li>
                            <li class="nav-link"><a href="{{ route('statistics.index') }}"> Peminjaman</a></li> -->
                            {!! Html::smartNav(route('authors.index'), 'Penulis') !!}
                            {!! Html::smartNav(route('books.index'), 'Buku') !!}
                            {!! Html::smartNav(route('members.index'), 'Member') !!}
                            {!! Html::smartNav(route('statistics.index'), 'Peminjaman') !!}
                        @endrole
                        @if (auth()->check())
                            <!-- <li class="nav-link"><a href="{{ url('/settings/profile') }}"> Profil</a></li> -->
                            {!! Html::smartNav(url('/settings/profile'), 'Profil') !!}
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/settings/password') }}" >
                                        <i class="fa fa-btn fa-lock"></i>&nbsp;Ubah Password
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @include('layouts._flash')
            @yield('content')
        </main>
    </div>

    <!--Script-->
    <!-- <script src="/js/jquery-1.min.js"></script> -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/selectize.js"></script>
    <script src="/js/custom.js"></script>
    {!! NoCaptcha::renderJs() !!}
    @yield('scripts')
    
</body>
</html>
