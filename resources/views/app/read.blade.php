@extends('layouts.uikit')

@section('title')
uStore - User Index Page
@endsection

@section('content')
<div class="uk-background-cover" style="background-image: url(/storage/file/forest.jpg);">
    
    <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left uk-margin-medium-left">

            <ul class="uk-navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/user">User Page</a></li>
                <li><a href="{{ route('user.create') }}">Upload Photo</a></li>
                <li><a href="/browse">Browse Photo</a></li>
                <li><a href="/category">Category</a></li>
            </ul>

        </div>
        <div class="uk-navbar-right uk-margin-medium-right">
            <!-- AUTH BAR -->
            @guest
            <div class="uk-button uk-button-primary">
                <a class="uk-button uk-button-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>
                
                @if (Route::has('register'))
                <div class="uk-button uk-button-secondary">
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
                    
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