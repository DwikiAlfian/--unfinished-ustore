@extends('layouts.uikit')
@section('title')
uStore - User Index Page
@endsection

@section('style')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
@endsection

@section('content')

<!-- NAVBAR -->
<div class="uk-background-cover" style="background-image: url(/storage/file/forest.jpg);">
    
    <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left uk-margin-medium-left">

            <ul class="uk-navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/user">User Page</a></li>
                <li><a href="{{ route('user.create') }}">Upload Photo</a></li>
                <li><a href="/browse">Browse Photo</a></li>
                <li><a href="/category">Category</a></li>
            </ul>

        </div>
        <div class="uk-navbar-right uk-margin-medium-right">

            @guest
            <div>
                <a class="uk-button uk-button-primary" href="/login">{{ __('Login') }}</a>
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
                            <a class="uk-button uk-button-secondary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                            </form>
                        
                    </div>
            @endguest
        </div>
    </nav>

    <div class="uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle uk-light">
        <h1 class="uk-h1" style="font-family: 'Josefin Sans', sans-serif;">uStore - Photography Site</h1>
    </div>

</div>

<div class="uk-background-secondary uk-light uk-padding uk-text-center uk-panel">
    <p class="uk-h2">Welcome to this Site!</p>
    <p class="uk-h5">Get suppose like home</p>
</div>

<div style="background: url(/storage/file/first_line.jpg); background-repeat: no-repeat; background-size: auto;">

</div>

<hr>
<div class="uk-card uk-card-body">
    <div class="uk-grid-divider uk-child-width-expand@s" uk-grid>
        <div>
            <p>
                <h3>About this web</h3>
                This web is created by <a href="#">me</a>
            </p>
        </div>
        <div>
            <p>
                <h3>Social Media</h3>
                <a href="https://facebook.com"><span class="uk-margin-small-right" uk-icon="facebook"></span>Facebook</a><br>
                <a href="https://twitter.com"><span class="uk-margin-small-right" uk-icon="twitter"></span>Twitter</a><br>
                <a href="https://github.com"><span class="uk-margin-small-right" uk-icon="github"></span>GitHub</a><br>
            </p>
        </div>
    </div>
</div>



<div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="/storage/file/fox.jpg" uk-img></div>
@endsection