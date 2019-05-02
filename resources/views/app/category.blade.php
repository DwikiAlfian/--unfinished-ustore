@extends('layouts.uikit')
@section('title')
uStore - Category
@endsection
@section('style')
<link rel="stylesheet" href="css/link/link.css" />
<style>

.link_a{
  display: block;
  color: white;
  text-decoration: none;
  position: relative;
}

.link_a::after{
  content: "";
  background: white;
	mix-blend-mode: exclusion;
  width: calc(100% + 20px);
  height: 0;
  position: absolute;
  bottom: -4px;
  left: -10px;
	transition: all .3s cubic-bezier(0.445, 0.05, 0.55, 0.95);
}

.link_a:hover::after{
	height: calc(100% + 8px)
}

p{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%);
}

</style>
@endsection

@section('content')
<div class="uk-preserve-color" style="background-color: black;">
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li>
                <a class="uk-button" type="button" uk-tooltip="title: Open Navigation Bar; pos: right" uk-toggle="target: #offcanvas-nav"><span uk-icon="icon: menu; ratio: 1.5;"></span><span class="uk-margin-left" style="color: white;">Category</span></a>
            </li>
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
                <div class="uk-button-group">
                    <button class="uk-button uk-button-primary">{{ Auth::user()->name }}</button>
                    <div class="uk-inline">
                        <button class="uk-button uk-button-secondary" type="button"><span uk-icon="icon:  triangle-down"></span></button>
                        <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;" style="background-color: #1c1c1c;">
                            <ul class="uk-nav uk-dropdown-nav" >
                                <li>
                                    <a href="/user"><span uk-icon="user"></span> Admin Page</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.create') }}"><span uk-icon="plus"></span> Upload Photo</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><span uk-icon="sign-out"></span>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
        </div>
</nav>


<!-- NAVIGATION BAR -->
<div id="offcanvas-nav" uk-offcanvas>
    <div class="uk-offcanvas-bar">

        <ul class="uk-list uk-list-divider" style="color: white;">
            <li><a href="/" class="uk-link-reset"><span uk-tooltip="title: Go Back to Home; pos: right"><span class="uk-margin-right" uk-icon="icon: home"></span>Home</span></a></li>
            <li><a href="/discover" class="uk-link-reset"><span uk-tooltip="title: Discover Photos; pos: right"><span class="uk-margin-right" uk-icon="icon: thumbnails"></span>Discover</span></a></li>
            <li><a href="/user" class="uk-link-reset"><span uk-tooltip="title: Open User Page; pos: right"><span class="uk-margin-right" uk-icon="icon: user"></span>Admin Page</span></a></li>
            <li><a href="/category" class="uk-link-reset"><span uk-tooltip="title: See Category; pos: right"><span class="uk-margin-right" uk-icon="icon: list"></span>Category</span></a></li>
        </ul>

    </div>
</div>

<!-- FIRST IMAGE LINE -->
<a href="/category/animals">
    <div class="uk-inline uk-margin-left uk-inline-clip uk-transition-toggle uk-light">
        <img class="uk-transition-scale-up uk-transition-opaque" src="/storage/file/animal.png" alt="">
        <div class="uk-position-large uk-position-center-left"><h2 class="uk-margin-xlarge-left">Animals</h2></div>
    </div>
</a>

<a href="/category/animals">
    <div class="uk-inline uk-margin-right uk-inline-clip uk-transition-toggle uk-light">
        <img class="uk-transition-scale-up uk-transition-opaque" src="/storage/file/nature.png" alt="">
        <div class="uk-position-large uk-position-center-right"><h2 class="uk-margin-xlarge-right">Panorama</h2></div>
    </div>
</a>

<a href="/category/animals">
    <div class="uk-inline uk-margin uk-margin-left uk-inline-clip uk-transition-toggle uk-light">
        <img class="uk-transition-scale-up uk-transition-opaque" src="/storage/file/animals.png" alt="">
        <div class="uk-position-large uk-position-center-left"><h2 class="uk-margin uk-margin-left">Portrait</h2></div>
    </div>
</a>

<a href="/category/animals">
    <div class="uk-inline uk-margin uk-margin-left uk-inline-clip uk-transition-toggle uk-light">
        <img class="uk-transition-scale-up uk-transition-opaque" src="/storage/file/animals.png" alt="">
        <div class="uk-position-medium uk-position-center-left"><h2 class="uk-margin uk-margin-left">Other</h2></div>
    </div>
</a>



@endsection