@extends('layouts.uikit')
@section('title')
uStore - Category
@endsection

@section('style')
<link rel="stylesheet" href="css/link/link.css" />

<style>


.masonry { /* Masonry container */
    -webkit-column-count: 4;
  -moz-column-count:4;
  column-count: 4;
  -webkit-column-gap: 1em;
  -moz-column-gap: 1em;
  column-gap: 1em;
   margin: 1em;
    padding: 0;
    -moz-column-gap: 1.5em;
    -webkit-column-gap: 1.5em;
    column-gap: 0.75em;
    font-size: .85em;
}
.item {
    display: inline-block;
    background: #fff;
    padding: 1em;
    margin: 0 0 1.5em;
    width: 100%;
	-webkit-transition:1s ease all;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-shadow: 2px 2px 4px 0 #ccc;
}
.item img{max-width:100%;}

@media only screen and (max-width: 320px) {
    .masonry {
        -moz-column-count: 1;
        -webkit-column-count: 1;
        column-count: 1;
    }
}

@media only screen and (min-width: 321px) and (max-width: 768px){
    .masonry {
        -moz-column-count: 2;
        -webkit-column-count: 2;
        column-count: 2;
    }
}
@media only screen and (min-width: 769px) and (max-width: 1200px){
    .masonry {
        -moz-column-count: 3;
        -webkit-column-count: 3;
        column-count: 3;
    }
}
@media only screen and (min-width: 1201px) {
    .masonry {
        -moz-column-count: 4;
        -webkit-column-count: 4;
        column-count: 4;
    }
}

</style>


@endsection

@section('content')
<div class="uk-background-cover uk-preserve-color" style="background-color: black;">
    
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left">

            <ul class="uk-navbar-nav">
                <li>

                    <a class="uk-button" type="button" uk-tooltip="title: Open Navigation Bar; pos: right" uk-toggle="target: #offcanvas-nav"><span uk-icon="icon: menu; ratio: 1.5;"></span><span class="uk-margin-left">Browse</span></a>

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

<!-- FIRST IMAGE LINE -->
<div class="uk-height-medium uk-flex uk-flex-right uk-flex-middle uk-background-cover uk-light"
     data-src="/storage/file/browse.png"
     data-srcset="/storage/file/browse.png"
     data-sizes="(min-width: 650px) 650px, 100vw" uk-img>
    <div>
        <h1 class="uk-margin-large-right" style="font-family: 'Nunito', sans-serif;">Search the <a href="#" class="r-link ai-element ai-element_type2 ai-element2 uk-link-reset">things</a> <br>you want</h1>
    </div>
</div>

<!-- IMAGE SHOWN -->
<div class="uk-card uk-card-body">
    @if(count($image)>0)
    <div class="masonry">
        @foreach($image as $img)
        <div>
            <div class="uk-margin uk-margin-small">
                <a href="{{ route('user.show',$img) }}">
                    <img src="/storage/images/{{ $img->image }}" alt="{{ $img->image }}" style="max-height:75%;">
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="uk-card uk-flex-center">
        <h3>No Post Found!</h3>
    </div>
    @endif
</div>

</div>
@endsection