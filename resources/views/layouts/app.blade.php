<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pmanager') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Pmanager') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                      <?php if(isset($_GET['companyId'])){
                          $companyId = $_GET['companyId'];
                      }else{
                        $companyId = '';
                      } ?>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                        @elseif(Auth::user()->role_id==1)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-user" aria-hidden="true"></i> SUPER ADMIN {{ Auth::user()->name }} <span class="fa fa-caret-down"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                            <li><a href="/companies"> <span class="fa fa-building" aria-hidden="true">  All Companies</a></span></li>
                                    <li><a href="/projects?companyId={{$companyId}}">  <span class="fa fa-briefcase"   aria-hidden="true">  All Projects</a></span></li>
                                            <li><a href="/tasks">  <span class="fa fa-tasks"  aria-hidden="true"> Tasks</a></span></li>
                                            <li><a href="/users">  <span class="fa fa-users"  aria-hidden="true"> All Users</a></span></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <span class="fa  fa-power-off" aria-hidden="true"> Logout  </span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                        @else
                                <li><a href="/companies"> <span class="fa fa-building" aria-hidden="true">  All Companies</a></span></li>
                                <li><a href="/projects">  <span class="fa fa-briefcase"   aria-hidden="true">  All Projects</a></span></li>
                                <li><a href="/tasks">  <span class="fa fa-tasks"  aria-hidden="true"> Tasks</a></span></li>
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <i class="fa fa-user" aria-hidden="true"></i>USER {{ Auth::user()->name }} <span class="fa fa-caret-down"></span>
                                        </a>
    
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    <span class="fa  fa-power-off" aria-hidden="true"> Logout  </span>
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
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
