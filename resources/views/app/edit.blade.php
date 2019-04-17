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

<div class="uk-background-cover" style="background-image: url(/storage/file/forets.jpg);">
    
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
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
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