@extends('layouts.uikit')
@section('title')
uStore - Category
@endsection

@section('style')
<link rel="stylesheet" href="css/link/link.css" />
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


<!-- Image Shown -->
<div class="uk-flex uk-flex-center uk-preserve-color">
<div class="uk-card uk-card-body uk-preserve-color">
<p class="uk-h2 uk-light">Recently Upload</p>
@foreach($image as $img)
<div class="uk-card uk-card-secondary uk-card-body uk-margin uk-margin-bottom uk-preserve-color">
    <div class="uk-card-badge uk-label uk-preserve-color">{{ $img->category }}</div>
    <h3 class="uk-card-title uk-margin-remove-bottom">{{ $img->name }}</h3>
    <p class="uk-text-meta uk-margin-remove-top">{{ $img->user }}</p>
    <!-- <p></p> -->
    <div class="uk-card uk-grid-collapse uk-child-width-1-3@s uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <img src="/storage/images/{{ $img->image }}" alt="{{ $img->image }}" uk-cover>
        <canvas width="480" height="320"></canvas>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title">Description of {{ $img->name }}</h3>
            <p>{{ $img->description }}</p>
            <a href="{{ route('user.show',$img) }}" class="uk-button uk-button-text">READ MORE</a>
        </div>
    </div>
</div>
</div>
@endforeach
</div>
</div>

</div>
@endsection