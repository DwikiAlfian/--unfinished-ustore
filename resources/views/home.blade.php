@extends('layouts.nav')

@section('content')

<div class="uk-flex uk-flex-center">
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
        <div class="uk-card-badge uk-label">{{ Auth::user()->name }}</div>
        <h3 class="uk-card-title">Welcome, aboard!</h3>
        <p>You are logged in</p>
    </div>
</div>

@endsection
