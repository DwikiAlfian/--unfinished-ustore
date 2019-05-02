@extends('layouts.uikit')

@section('title')
uStore - User Index Page
@endsection

@section('content')
<div class="uk-preserve-color" style="background-color: black;">
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li>
                <a class="uk-button" type="button" uk-tooltip="title: Open Navigation Bar; pos: right" uk-toggle="target: #offcanvas-nav"><span uk-icon="icon: menu; ratio: 1.5;"></span><span class="uk-margin-left" style="color: white;">Welcome! {{ Auth::user()->name }}</span></a>
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

@if(session()->get('success'))
    <div class="uk-alert-primary" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        {{ session()->get('success') }}
    </div><br />
@endif

@if(session()->get('errors'))
    <div class="uk-alert-primary" uk-alert>
        <a class="uk-alert-close" uk-close></a>
      {{ session()->get('errors') }}  
    </div><br />
@endif

    <!-- IMAGE TABLE -->
    <div class="uk-card uk-card-body">
    <table class="uk-table uk-table-divider">
    @if(count($posts)>0)
            <thead>
                <tr>
                    <th class="uk-width-small">Title</th>
                    <th>Uploader</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->user }}</td>
                    <td>{{ $post->category }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <img src="storage/images/{{ $post->image }}" alt="loading">
                    </td>
                    <td><a href="{{ route('user.edit',$post->id)}}" class="uk-button uk-button-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('user.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                            <button class="uk-button uk-button-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            @else
            <p>No post is found!</p>
        @endif
        </table>
</div>

@endsection