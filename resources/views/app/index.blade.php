@extends('layouts.uikit')
@section('title')
uStore - User Index Page
@endsection

@section('style')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fugaz+One" rel="stylesheet">

<style>
@import url(https://fonts.googleapis.com/css?family=Ubuntu:700&subset=latin,latin-ext);


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
  width: 160%;
  height: 190%;
  background-color: #045eef;
  border-radius: 50%;
  display: block;
  transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -1;
}
.button:hover {
  color: #ffffff;
  border: 1px solid #045eef;
}
.button:hover:before {
  top: -35%;
  background-color: #045eef;
  transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
}
.button:hover:after {
  top: -45%;
  background-color: #045eef;
  transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
}
.link {
   /* RESET */
   text-decoration: none;
   line-height: 1;
   
   position: relative;
   z-index: 0;
   display: inline-block;
   padding: 5px 5px;
   overflow: hidden;
   color: #333;
   vertical-align: bottom;
   transition: color .3s ease-out;
}

.link::before {
   content: "";
   position: absolute;
   z-index: -1;
   top: 0;
   left: 0;
   transform: translateY(calc(100% - 2px));
   width: 100%;
   height: 100%;
   background-image: linear-gradient(60deg, #a73737 0%, #7a2828 100%);
   transition: transform .25s ease-out;
}

.link:hover { 
   color: #fff; 
}
.link:hover::before {
   transform: translateY(0);
   transition: transform .25s ease-out;
}

</style>

@endsection

@section('content')

<div class="uk-preserve-color" style="background-image: url('/storage/file/landing_rdr.jpg'); background-repeat: no-repeat; background-size: cover;">
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li>
                <a class="uk-button" type="button" uk-tooltip="title: Open Navigation Bar; pos: right" uk-toggle="target: #offcanvas-nav" uk-icon="icon: menu; ratio: 1.5;"></a>
            </li>
            <li>
                <a href=""><img src="/storage/file/ustore.png" style="max-width: 75px; height: auto;"></a>
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

<!-- FIRST LANDING IMAGE lANE -->
<div>
    <div class="uk-card uk-card-body uk-card-large">
        
    </div>
    <div class="uk-card uk-card-body uk-card-medium uk-margin-large-right">
        <div class="uk-card uk-card-body">
            <p><h1 class="uk-position uk-position-center-right" style="font-family: 'Lobster Two', cursive; text-align: right;">Be happy for this moment<br>This moment is your life</h1></p>
        </div>
        <div class="uk-card uk-card-body uk-card-small">
            <p><h3 class="uk-position uk-position-center-right" style="font-family: 'Lobster Two', cursive; text-align: right;">- Omar Khayyam -</h3></p>
        </div>
    </div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-medium"></div>
    <div class="uk-card uk-card-body uk-card-small">
        <h6 class="uk-position-bottom-right" style="color: white;">
            Photo by : Rockstar Games - Red Dead Redemption 2
        </h6>
    </div>
</div>



</div>

<!-- NAVIGATION BAR -->
<div id="offcanvas-nav" uk-offcanvas>
    <div class="uk-offcanvas-bar">
            
        @guest
        <div class="uk-card uk-card-body" style="background-color: black;">
            <h3>Not a member yet?</h3>
            <h6>Sign Up for free!</h6>
        </div>
        @else
        <div class="uk-card uk-card-body" style="background-color: black;">
            <img src="/storage/file/{{ Auth::user()->gender }}.png" alt="{{ Auth::user()->gender }}" style="border-radius: 50%;">
            <h3>Hey! {{ Auth::user()->name }}</h3>
        </div>
        @endguest



        <ul class="uk-list uk-list-divider" style="color: white;">
            <li><a href="/" class="uk-link-reset"><span uk-tooltip="title: Go Back to Home; pos: right"><span class="uk-margin-right" uk-icon="icon: home"></span>Home</span></a></li>
            <li><a href="/discover" class="uk-link-reset"><span uk-tooltip="title: Discover Photos; pos: right"><span class="uk-margin-right" uk-icon="icon: thumbnails"></span>Discover</span></a></li>
            <li><a href="/user" class="uk-link-reset"><span uk-tooltip="title: Open User Page; pos: right"><span class="uk-margin-right" uk-icon="icon: user"></span>Admin Page</span></a></li>
            <li><a href="/category" class="uk-link-reset"><span uk-tooltip="title: See Category; pos: right"><span class="uk-margin-right" uk-icon="icon: list"></span>Category</span></a></li>
        </ul>

    </div>
</div>

<!-- FIRST PHOTO LINE -->
<div style="background-image: url('/storage/file/bck_1.png'); background-repeat: no-repeat; background-position: right top;">
<div class="uk-card uk-card-body uk-margin-xlarge-left uk-margin-xlarge-right">
<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-1-2@m">
        <p>
            <h1 style="font-family: 'Fugaz One', cursive;"><b>Discover the photos</b></h1>
            <p>Find your favorite photos in discover page</p>
            <div class="uk-margin-medium-right">
            <div class="uk-margin-xlarge-right">
            <div class="uk-margin-xlarge-right button-container">
                <a class="button" style="text-decoration: none;" href="/discover">Visit Discover</a>
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
</div>

<div class="uk-section uk-section-secondary uk-section-xsmall"></div>

<div style="background-image: url('/storage/file/rage.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-small">
        <h1 class="uk-position-center" style="color: white; font-family: 'Fugaz One', cursive;">Find through<a class="link" href="/category"> Category</a> </h1>
    </div>
    <div class="uk-card uk-card-body uk-card-small">
        <h5 class="uk-position-center" style="color: #c4c4c4;">You can find your best photo through category page</h5>
    </div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large"></div>
</div>

<div style="background-image: url('/storage/file/unravel.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large">
        <h1 style="text-align: center; font-family: 'Fugaz One', cursive; font-size: 60px;background: -webkit-linear-gradient(#3ca55c, #b5ac49); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Annual Plan
        </h1>
    </div>
    

    <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match uk-margin-large-left uk-margin-large-right" uk-grid>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-card-small">
                <h3 class="uk-label">Default Plan</h3>
                <img src="/storage/file/0.png" alt="">
                <p>
                    <ul class="uk-list uk-list-divider">
                        <li><span uk-icon="check"></span><span> Free to upload a photo</span></li>
                        <li><span uk-icon="check"></span><span> Free to download a photo</span></li>
                        <li><span uk-icon="check"></span><span> Free to subscribe to a user</span></li>
                    </ul>
                </p>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-primary uk-card-body uk-card-small">
                <h3 class="uk-label">Monthly Prime</h3>
                <img src="/storage/file/499.png" alt="">
                <p>
                    <ul class="uk-list uk-list-divider">
                        <li><span uk-icon="check"></span><span> Free to upload a photo</span></li>
                        <li><span uk-icon="check"></span><span> Free to download a photo</span></li>
                        <li><span uk-icon="check"></span><span> Free to subscribe to a user</span></li>
                        <li><span uk-icon="check"></span><span> Set a private photo</span></li>
                        <li><span uk-icon="check"></span><span> Set a paid photo to download</span></li>
                        <li><span uk-icon="check"></span><span> Put ads on the photo page</span></li>
                        <li><span uk-icon="check"></span><span> Join a community</span></li>
                        <li><span uk-icon="check"></span><span> Only 30-days use, after 30-days account will set to Default</span></li>
                   </ul>
                </p>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-secondary uk-card-body uk-card-small">
                <h3 class="uk-label">Permanent Prime</h3>
                <img src="/storage/file/2099.png" alt="">
                <p>
                    <ul class="uk-list uk-list-divider">
                        <li><span uk-icon="check"></span><span> Free to upload a photo</span></li>
                        <li><span uk-icon="check"></span><span> Free to download a photo</span></li>
                        <li><span uk-icon="check"></span><span> Free to subscribe to a user</span></li>
                        <li><span uk-icon="check"></span><span> Set a private photo</span></li>
                        <li><span uk-icon="check"></span><span> Set a paid photo to download</span></li>
                        <li><span uk-icon="check"></span><span> Put ads on the photo page</span></li>
                        <li><span uk-icon="check"></span><span> Join a community</span></li>
                        <li><span uk-icon="check"></span><span> IT'S A PERMANENT</span></li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-large"></div>
</div>

<div class="uk-card uk-card-body uk-card-secondary">
    <div class="uk-card uk-card-body uk-card-large"></div>
    <div class="uk-card uk-card-body uk-card-small">
        <h1 style="font-family: 'Fugaz One', cursive; text-align: center;"><a class="link" href="/register">Join</a> the uStore</h1>
    </div>
    <div class="uk-card uk-card-body uk-card-small">
    <h6 style="font-family: 'Ubuntu', cursive; text-align: center;">Or maybe you already be a member? <a style="color: teal;" href="/login">Login</a></h6>
    </div>
    <div class="uk-card uk-card-body uk-card-large"></div>
</div>


@endsection