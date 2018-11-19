<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" v-cloak>
        <navtop-component titulo="{{ config('app.name', 'Laravel') }}" url="{{ url('/') }}">
            <form slot="search" class="form-inline mr-5 ml-auto my-lg-0" action="{{route('welcome')}}" method="get">
                <input class="form-control mr-sm-2" type="search" name="search"
                    placeholder="Search" aria-label="Search" value="{{isset($search) ? $search : ""}}">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form>
            <!-- Authentication Links -->
            <div slot="menu-nav-content">
                @guest
                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o fa-2x mr-2" aria-hidden="true"></i></a>
                        <div class="dropdown-menu mr-5" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{ __('Login') }}</a>
                            @if (Route::has('register'))
                            <a class="dropdown-item" href="{{ route('register') }}"><i class="fa fa-lock" aria-hidden="true"></i> {{ __('Register') }}</a>
                            @endif
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown mr-5">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <i class="fa fa-user-circle-o fa-2x ml-2 mr-2{{ Auth::user()->id ? ' text-success' : '' }}" aria-hidden="true"></i><span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @can('isAuthor')
                                <a class="dropdown-item" href="{{ route('admin') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i> Admin
                                </a>
                            @endcan
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </navtop-component>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
</body>
</html>

