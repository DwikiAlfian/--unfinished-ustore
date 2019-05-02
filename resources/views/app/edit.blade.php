@extends('layouts.uikit')

@section('title')
uStore - User Index Page
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<div class="uk-preserve-color" style="background-color: black;">
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li>
                <a class="uk-button" type="button" uk-tooltip="title: Open Navigation Bar; pos: right" uk-toggle="target: #offcanvas-nav"><span uk-icon="icon: menu; ratio: 1.5;"></span><span class="uk-margin-left" style="color: white;">Edit Photos : {{ $post->name }}</span></a>
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

        <ul class="uk-list uk-list-divider" style="color: white;">
            <li><a href="/" class="uk-link-reset"><span uk-tooltip="title: Go Back to Home; pos: right"><span class="uk-margin-right" uk-icon="icon: home"></span>Home</span></a></li>
            <li><a href="/discover" class="uk-link-reset"><span uk-tooltip="title: Discover Photos; pos: right"><span class="uk-margin-right" uk-icon="icon: thumbnails"></span>Discover</span></a></li>
            <li><a href="/user" class="uk-link-reset"><span uk-tooltip="title: Open User Page; pos: right"><span class="uk-margin-right" uk-icon="icon: user"></span>Admin Page</span></a></li>
            <li><a href="/category" class="uk-link-reset"><span uk-tooltip="title: See Category; pos: right"><span class="uk-margin-right" uk-icon="icon: list"></span>Category</span></a></li>
        </ul>

    </div>
</div>


<!-- INSERT FORM -->
<div class="uk-card uk-card-body">
<form action="{{ route('user.update', $post->id) }}" method="POST" class="uk-form-stacked" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Name of your Photo</label>
        <div class="uk-form-controls">
            <input value="{{ $post->name }}" name="name" class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-form-controls">
            <input  value="{{ Auth::user()->name }}"name="user" class="uk-input" id="form-stacked-text" type="hidden">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Category</label>
        <div class="uk-form-controls">
            <select  value="{{ $post->category }}" name="category" class="uk-select" id="form-horizontal-select">
                <option>Panorama</option>
                <option>Portrait</option>
                <option>Animals</option>
                <option>Other</option>
            </select>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Description</label>
        <textarea name="description" class="uk-textarea" rows="5" placeholder="Textarea">{{ $post->description }}</textarea>
    </div>

    <div class="uk-margin" uk-margin>
        <label class="uk-form-label" for="form-stacked-text">Upload Image Here</label>
        <div uk-form-custom="target: true">
            <input name="image" type="file">
            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
        </div>
    </div>

    <button type="submit" class="uk-button uk-button-primary">POST</button>
    <a href="/user"><button class="uk-button uk-button-danger">CANCEL</button></a>

</form>
</div>

@endsection