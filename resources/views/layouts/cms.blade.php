<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding-top: 70px; }
    </style>
    <!-- Scripts -->
    <script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/cms') }}">
                        Dashboard
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    @if (!Auth::guest() && Auth::user()->user_role > 0)
                    <ul class="nav navbar-nav">
                        @if (Auth::user()->user_role == 3)
                        <li>
                            <a href="{{ url('cms/homepage') }}" id="homepage">Homepage</a>
                        </li>
                        <li>
                            <a href="{{ url('cms/stad') }}" id="stad">Stad</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Studeren<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('cms/studeren/scholen') }}" id="articles">Scholen</a></li>
                                <li><a href="{{ url('cms/studeren/faculties') }}" id="articles">Faculteiten</a></li>
                                <li><a href="{{ url('cms/studeren/opleidingen') }}" id="articles">Opleidingen</a></li>
                            </ul>
                        </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Artikelen<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if (Auth::user()->user_role >= 1)
                                <li><a href="{{ url('cms/articles') }}" id="articles">Artikelen</a></li>
                                @endif
                                @if (Auth::user()->user_role >= 2)
                                <li><a href="{{ url('cms/articles/gate15') }}" id="articles">Gate15 Artikelen</a></li>
                                @endif
                            </ul>
                        </li>
                        @if (Auth::user()->user_role == 3)
                        <li>
                            <a href="{{ url('cms/gebruikers') }}" id="gebruikers">Gebruikers</a>
                        </li>
                        @endif
                    </ul>
                    @endif

                    <script>
                        //future: add active classes on current url --> check what current URL is and set that id from top nav to active?

                    </script>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
