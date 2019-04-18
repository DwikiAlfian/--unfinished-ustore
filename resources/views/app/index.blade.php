@extends('layouts.uikit')
@section('title')
uStore - User Index Page
@endsection

@section('style')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

<style>

.button-container {
  text-align: center;
}

.button {
  display: inline-block;
  padding: 12px 24px;
  border: 1px solid #4f4f4f;
  border-radius: 4px;
  transition: all 0.2s ease-in;
  position: relative;
  overflow: hidden;
}
.button:before {
  content: "";
  position: absolute;
  left: 50%;
  transform: translateX(-50%) scaleY(1) scaleX(1.25);
  top: 100%;
  width: 140%;
  height: 180%;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 50%;
  display: block;
  transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -1;
}
.button:after {
  content: "";
  position: absolute;
  left: 55%;
  transform: translateX(-50%) scaleY(1) scaleX(1.45);
  top: 180%;
  color: white;
  width: 160%;
  height: 190%;
  background-color: #006eff;
  border-radius: 50%;
  display: block;
  transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -1;
}
.button:hover {
  color: #ffffff;
  border: 1px solid #006eff;
}
.button:hover:before {
  top: -35%;
  background-color: #006eff;
  transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
}
.button:hover:after {
  top: -45%;
  color: white;
  background-color: #006eff;
  transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
}

</style>

@endsection

@section('content')

<div class="uk-preserve-color" style="background-color: black;">
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li>
                <a class="uk-button" type="button" uk-tooltip="title: Open Navigation Bar; pos: right" uk-toggle="target: #offcanvas-nav"><span uk-icon="icon: menu; ratio: 1.5;"></span><span class="uk-margin-left">uStore - Photography Site</span></a>
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
</div>

<!-- NAVIGATION BAR -->
<div id="offcanvas-nav" uk-offcanvas>
    <div class="uk-offcanvas-bar">

        <ul class="uk-list uk-list-divider">
            <li><a href="/" class="uk-link-reset"><span uk-tooltip="title: Go Back to Home; pos: right"><span class="uk-margin-right" uk-icon="icon: home"></span>Home</span></a></li>
            <li><a href="/user" class="uk-link-reset"><span uk-tooltip="title: Open User Page; pos: right"><span class="uk-margin-right" uk-icon="icon: user"></span>Admin Page</span></a></li>
            <li><a href="/category" class="uk-link-reset"><span uk-tooltip="title: See Category; pos: right"><span class="uk-margin-right" uk-icon="icon: list"></span>Category</span></a></li>
            <li><a href="/browse" class="uk-link-reset"><span uk-tooltip="title: Browse the latest Post; pos: right"><span class="uk-margin-right" uk-icon="icon: thumbnails"></span>Browse</span></a></li>
        </ul>

    </div>
</div>

<!-- FIRST LANDING IMAGE lANE -->
<div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="/storage/file/landing1.jpg" uk-img>
  <h1 style="font-family: 'Josefin Sans', sans-serif;">Great Experience, <br>Crafted Well.</h1>
</div>

<!-- FIRST PHOTO LINE -->
<div class="uk-card uk-card-body uk-margin-xlarge-left uk-margin-xlarge-right">
<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-1-2@m">
        <p>
            <h1 style="font-family: Helvetica;"><b>Discover the photos</b></h1>
            <p>Find your favorite photos in discover page</p>
            <div class="uk-margin-medium-right">
            <div class="uk-margin-xlarge-right">
            <div class="uk-margin-xlarge-right button-container">
                <a class="button uk-link-reset" href="">Visit Discover</a>
            </div>
            </div>
            </div>
        </p>
    </div>
    <div class="uk-width-1-2@m uk-flex-first">
        <img src="/storage/file/landing_2.png" alt="Image">
    </div>
</div>
</div>

@endsection