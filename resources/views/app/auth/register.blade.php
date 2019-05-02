@extends('layouts.nav')

@section('content')
<div class="uk-card uk-card-body uk-flex uk-flex-center">
    <div>
        <div>
            <div>
                <div class="uk-legend">{{ __('Register') }}</div>

                <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="uk-margin">
                            <!-- <label for="name">{{ __('Name') }}</label> -->

                            <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input placeholder="Username" id="name" type="text" class="uk-input uk-form-width-large{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="uk-margin">
                            <!-- <label for="email">{{ __('E-Mail Address') }}</label> -->

                            <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input placeholder="Email Address" id="email" type="email" class="uk-input uk-form-width-large{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="uk-margin">
                            <!-- <label for="password">{{ __('Password') }}</label> -->

                            <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input placeholder="Password" id="password" type="password" class="uk-input uk-form-width-large{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="uk-margin">
                            <!-- <label for="password-confirm">{{ __('Confirm Password') }}</label> -->

                            <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: unlock"></span>
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="uk-input uk-form-width-large" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="uk-margin">
                            
                            <div class="uk-form-controls">
                                <select class="uk-select" id="form-stacked-select">
                                    <option>Option 01</option>
                                    <option>Option 02</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit" class="uk-button uk-button-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
