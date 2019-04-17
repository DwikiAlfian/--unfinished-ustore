@extends('layouts.uikit')

@section('title')
uStore - User Index Page
@endsection

@section('content')

@if($errors->any())
    <div class="uk-alert uk-alert-danger" uk-alert>
        <ul>
            @foreach ($errors->all() as $error)
              <a class="uk-alert-close" uk-close></a>
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br/>
@endif

<div class="uk-background-cover" style="background-image: url(https://photographysite.surge.sh/image/forest.jpg);">
    
    <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left uk-margin-medium-left">

            <ul class="uk-navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/user">User Page</a></li>
                <li><a href="{{ route('user.create') }}">Upload Photo</a></li>
            </ul>

        </div>
        <div class="uk-navbar-right uk-margin-medium-right">

        <!-- AUTH BAR -->
            @guest
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    <li>
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
                    </li>
            @endguest
        </div>
    </nav>
</div>


<!-- INSERT FORM -->
<div class="uk-card uk-card-body">
<form action="{{ route('user.store') }}" class="uk-form-stacked" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Name of your Photo</label>
        <div class="uk-form-controls">
            <input name="name" class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-form-controls">
            <input name="user" class="uk-input" id="form-stacked-text" type="hidden" value="{{ Auth::user()->name }}">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Category</label>
        <div class="uk-form-controls">
            <select name="category" class="uk-select" id="form-horizontal-select">
                <option>Panorama</option>
                <option>Portrait</option>
                <option>Animals</option>
                <option>Other</option>
            </select>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Description</label>
        <textarea name="description" class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
    </div>

    <div class="uk-margin" uk-margin>
        <label class="uk-form-label" for="form-stacked-text">Upload Image Here</label>
        <div uk-form-custom="target: true">
            <input name="image" type="file">
            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
        </div>
    </div>

    <button type="submit" class="uk-button uk-button-primary">POST</button>
    <a href="/user" class="uk-button uk-button-danger">CANCEL</a>
</form>

</div>

@endsection