<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title') </title>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="{{ url('/logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            {{-- Add Dropdowns Here --}}
        </ul>
        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo"> {{ config('app.name', 'Laravel') }}</a>
                <ul class="right hide-on-med-and-down">
                    @if(Auth::guest())
                        <li><a href="{{url('login')}}">Login</a></li>
                        <li><a href="{{url('register')}}">Register</a></li>
                    @endif
                <!-- Dropdown Trigger -->
                    @if(Auth::check())

                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown1">
                                {{ Auth::user()->name }}
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="{{asset('/js/materialize.min.js')}}"></script>
</body>
</html>
