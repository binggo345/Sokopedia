<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(auth()->check() && auth()->user()->is_admin == 1)
    <title>Admin</title>
    @else
    <title>{{ config('app.name', 'Sokopedia') }}</title>
    @endif
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        @if(auth()->check() && auth()->user()->is_admin == 1)
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm ">
        @else
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
        @endif
            <div class="container">
                    @if(auth()->check() && auth()->user()->is_admin == 1)
                    <a class="navbar-brand" href="{{ url('/home') }}" style="color: white;">
                        <div class="h5">Admin</div>
                    </a>
                    @else
                    <a class="navbar-brand text-success" href="{{ url('/home') }}">
                        {{ config('app.name', 'Sokopedia') }}
                    </a>
                    @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(auth()->check() && auth()->user()->is_admin == 1)
                        <li class="nav-item dropdown">
                            <div class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Product <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/addProduct') }}">
                                        add Product
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/listProduct') }}">
                                        list Product
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Category <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/addCategory') }}">
                                        add Category
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/listCategory') }}">
                                        list Category
                                    </a>
                                </div>
                            </div>
                        </li>
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
                            <div class="input-group md-form form-sm form-2 pl-0">
                                @if(Auth::user()->is_admin == 0)
                                    <form class="form-horizontal" action="{{ url('/search') }}" method="GET" enctype="multipart/form-data" style="display: flex;">
                                        @csrf
                                        <input class="form-control" type="text" name="search" placeholder="Search.." aria-label="Search">
                                        <div class="nav-item">
                                            <button class="btn btn btn-success mr-2" type="submit">Search</button>
                                        </div>
                                    </form>
           
                                    <div class="nav-item">
                                        <a href="{{ route('cart', Auth::user()-> id) }}" class="btn btn btn-success mr-2" type="button">Cart</a>
                                    </div>
                                    <div class="nav-item">
                                        <a href="{{ route('transaction', Auth::user()-> id) }}" class="btn btn btn-success mr-2" type="button">History</a>
                                    </div>
                                @endif
                            </div>
                            <li class="nav-item dropdown">
                                @if(auth()->check() && auth()->user()->is_admin == 1)
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Sokopedia <span class="caret"></span>
                                </a>
                                @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                @endif
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
