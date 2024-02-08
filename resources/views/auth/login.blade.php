@extends('layouts.auth')
@section('content')
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form action="{{ route('login') }}" class="login" method="post">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" value="{{ old('email', '') }}"
                            placeholder="User name / Email" name="email">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" value="{{ old('password', '') }}" placeholder="Password"
                            name="password">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <a href="{{ route('showRegistrationForm') }}">
                        <h3>Register</h3>
                    </a>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
@endsection
