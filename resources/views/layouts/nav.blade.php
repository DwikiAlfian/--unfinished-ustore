<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css')}}" />
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset ('js/uikit-icons.min.js') }}"></script>
    @yield('style')
</head>
<body>

<!-- NAVBAR -->
<div class="uk-background-cover" style="background-image: url(/storage/file/forest.jpg);">
    
    <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left uk-margin-medium-left">

            <ul class="uk-navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/user">User Page</a></li>
                <li><a href="{{ route('user.create') }}">Upload Photo</a></li>
            </ul>

        </div>
        <div class="uk-navbar-right uk-margin-medium-right">

            @guest
            <div>
                <a class="uk-button uk-button-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>
                
                @if (Route::has('register'))
                <div>
                    <a class="uk-button uk-button-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
                    
                @endif
                @else
                    <div>
                        <a class="uk-button uk-button-primary">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="uk-button uk-button-secondary" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                            </form>
                        </div>
                    </div>
            @endguest
        </div>
    </nav>
</div>

    @yield('content')
</body>
</html>