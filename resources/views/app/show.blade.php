@extends('layouts.uikit')
@section('title')
uStore - Show Data
@endsection

@section('content')


<script language=JavaScript>
<!--

//Disable right mouse click Script
//By Geek Site.in


var message="Function Disabled!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")

// --> 
</script>



<div class="uk-background-cover uk-preserve-color" style="background-color: black;">
    
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left">

            <ul class="uk-navbar-nav">
                <li>

                    <a class="uk-button" type="button" uk-tooltip="title: Open Navigation Bar; pos: right" uk-toggle="target: #offcanvas-nav"><span uk-icon="icon: menu; ratio: 1.5;"></span><span class="uk-margin-left">{{ $post->name }}</span></a>

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

        <ul class="uk-list uk-list-divider">
            <li><a href="/" class="uk-link-reset"><span uk-tooltip="title: Go Back to Home; pos: right"><span class="uk-margin-right" uk-icon="icon: home"></span>Home</span></a></li>
            <li><a href="/user" class="uk-link-reset"><span uk-tooltip="title: Open User Page; pos: right"><span class="uk-margin-right" uk-icon="icon: user"></span>Admin Page</span></a></li>
            <li><a href="/category" class="uk-link-reset"><span uk-tooltip="title: See Category; pos: right"><span class="uk-margin-right" uk-icon="icon: list"></span>Category</span></a></li>
            <li><a href="/browse" class="uk-link-reset"><span uk-tooltip="title: Browse the latest Post; pos: right"><span class="uk-margin-right" uk-icon="icon: thumbnails"></span>Browse</span></a></li>
        </ul>

    </div>
</div>


<div class="uk-card uk-card-body uk-light">
    <h3>{{ $post->name }}</h3>
    <img src="/storage/images/{{ $post->image }}" alt="">
    <h5>Uploaded by : {{ $post->user }}</h5>
    <p>{{ $post->description }}</p>
</div>










</div>
@endsection 