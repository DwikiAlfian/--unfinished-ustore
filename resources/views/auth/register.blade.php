@extends('layouts.uikit')

@section('title')
uStore - Register
@endsection

@section('style')
<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
<style>
    html{
        height: 100%;
    }
    body{
        height: 100%;
        background-image: url("/storage/file/zermatt.jpg");
        background-repeat: no-repeat; 
        background-size: cover;
    }
</style>
@endsection

@section('content')
<div class="uk-position-center uk-card uk-card-body uk-card-secondary" style="width: 550px; height: 300px;">
<h2 style="color: white; font-family: 'Viga', sans-serif;">Register</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
<ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
    <li><a href="#"><span uk-icon="user"></span></a></li>
    <li><a href="#"><span uk-icon="mail"></span></a></li>
    <li><a href="#"><span uk-icon="lock"></span></a></li>
    <li><a href="#"><span uk-icon="lifesaver"></span></a></li>
    <li><a href="#"><span uk-icon="camera"></span></a></li>
    <li><a href="#"><span uk-icon="info"></span></a></li>
    <li><a href="#"><span uk-icon="check"></span></a></li>
</ul>

<ul class="uk-switcher uk-margin">
    <li>
        <input placeholder="Username" id="name" type="text" class="uk-input uk-form-width-large{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="uk-alert uk-alert-danger" uk-alert role="alert">
            <a class="uk-alert-close" uk-close></a>
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </li>
    <li>
        <input placeholder="Email Address" id="email" type="email" class="uk-input uk-form-width-large{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="uk-alert uk-alert-danger" uk-alert role="alert">
            <a class="uk-alert-close" uk-close></a>
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </li>
    <li>
        <input placeholder="Password" id="password" type="password" class="uk-input uk-form-width-large{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required><br>
        <input placeholder="Confirm Password" id="password-confirm" type="password" class="uk-input uk-form-width-large uk-margin-top" name="password_confirmation" required>
        @if ($errors->has('password'))
            <span class="uk-alert uk-alert-danger" uk-alert role="alert">
            <a class="uk-alert-close" uk-close></a>
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </li>
    <li>
        <h5>Your gender</h5>
        <select name="gender" class="uk-select">
            <option>Male</option>
            <option>Female</option>
            <option>Other/Rather not Say</option>
        </select>
        @if ($errors->has('gender'))
            <span class="uk-alert uk-alert-danger" uk-alert role="alert">
            <a class="uk-alert-close" uk-close></a>
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
    </li>
    <li>
        <input type="text" name="photo">
        @if ($errors->has('photo'))
            <span class="uk-alert uk-alert-danger" uk-alert role="alert">
            <a class="uk-alert-close" uk-close></a>
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
        @endif
    </li>
    <li>
        <h5>Select your plan</h5>
        <select name="plan" class="uk-select">
            <option>Default Plan -- $0</option>
            <option>Monthly Plan -- $4.99</option>
            <option>Permanent Plan -- $20.99</option>
        </select>
        @if ($errors->has('plan'))
            <span class="uk-alert uk-alert-danger" uk-alert role="alert">
            <a class="uk-alert-close" uk-close></a>
                <strong>{{ $errors->first('plan') }}</strong>
            </span>
        @endif
    </li>
    <li>
        <button type="submit" class="uk-button uk-button-primary">
            {{ __('Register') }}
        </button>
    </li>
</ul>
</form>
</div>
@endsection
