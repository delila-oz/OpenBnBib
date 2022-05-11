<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OpenBnBib') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    @else
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            @endguest
                            <span class="obb-open">Open</span>
                            <span class="obb-bn">B'n</span>
                            <span class="obb-bib">Bib</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            @guest
                            @else
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto align-content-center">
                                <li><span class="m-5"><i class="fas fa-search-location"></i><a href="/search"> Suche</a></span></li>
                                <li><i class="far fa-envelope"></i><a href="/messages"> Nachrichten</a></li>
                                @if (auth()->user()->is_admin)
                                <li><span class="m-5"><i class="far fa-lock"></i><a href="{{ route('admin.pages.index') }}"> Administration</a></span></li>
                                @endif
                            </ul>
                            @endguest
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                    <form class="form-inline" method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <span class="mr-2">
                                    <input id="email" type="email" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
</span>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    <input id="password" type="password" placeholder="Passwort" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                </form>
                                {{--                                    <li class="nav-item">--}}
                                {{--                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                                {{--                                    </li>--}}
                                {{--                                    @if (Route::has('register'))--}}
                                {{--                                        <li class="nav-item">--}}
                                {{--                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                {{--                                        </li>--}}
                                {{--                                    @endif--}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/search">
                                            {{ __('Suche') }}
                                        </a>

                                        <a class="dropdown-item" href="/messages">
                                            {{ __('Nachrichten') }}
                                        </a>

                                        <a class="dropdown-item" href="/user/{{ Auth::user()->username }}/edit">
                                            {{ __('Einstellungen') }}
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
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="col-sm-12">
                    @yield('content')
                </div>
            </div>

        </div>
    </main>
    <div class="footer">
            <a href="/about">About</a> | <a href="/faq">FAQ</a> | <a href="/nettiquette">Netiquette</a>
    </div>
</div>
<!-- Scripts -->
<script src="https://kit.fontawesome.com/0346d41b1c.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
