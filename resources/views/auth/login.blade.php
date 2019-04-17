@extends('layouts.nav')

@section('title')
uStore - Login
@endsection

@section('content')
<div class="uk-card uk-card-body uk-flex uk-flex-center">
    <div>
        <div>
        @if ($errors->has('email'))
            <span class="uk-alert uk-alert-danger" role="alert" uk-alert>
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
            <div>
                <div>
                <div>
                    <form class="uk-form-stacked" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="uk-margin">
                            <!-- <label for="email">{{ __('E-Mail Address') }}</label> -->

                            <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input id="email" placeholder="Username" type="email" class="uk-input uk-form-width-large{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="uk-margin">
                            <!-- <label for="password">{{ __('Password') }}</label> -->

                            <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input id="password" placeholder="Password here..." type="password" class="uk-input uk-form-width-large{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="uk-margin">
                                    <input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit" class="uk-button uk-button-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
