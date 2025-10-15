{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="auth-form-container">
        <!-- Login Form Container -->
        <div class="form-container" id="loginForm">
            <h2 class="form-title">Sign In</h2>
            <p class="form-subtitle">Enter your credentials to access your account</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="login" method="POST" action="{{ route('login.attempt') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="loginEmail">Email Address</label>
                    <input type="email" class="form-input" id="loginEmail" name="email" placeholder="name@company.com"
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="loginPassword">Password</label>
                    <input type="password" class="form-input" id="loginPassword" name="password" placeholder="••••••••"
                        required>
                </div>

                <div class="form-options">
                    <div class="checkbox-container">
                        <input type="checkbox" class="checkbox" id="rememberMe" name="remember">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="ri-login-box-line"></i>
                    Sign In
                </button>
            </form>

            <div class="divider">
                <div class="divider-line"></div>
                <div class="divider-text">or</div>
                <div class="divider-line"></div>
            </div>

            <button class="btn btn-google">
                <i class="ri-google-fill"></i>
                Continue with Google
            </button>

            <div class="auth-switch">
                Don't have an account?
                <a href="#" class="auth-link" id="showRegister">Sign up</a> <!-- Link to show register form -->
            </div>
        </div>

        <!-- Register Form Container -->
        <div class="form-container hidden" id="registerForm"> <!-- Initially hidden -->
            <h2 class="form-title">Create Account</h2>
            <p class="form-subtitle">Set up your new account in just a few steps</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="register" method="POST" action="{{ route('register.attempt') }}"> {{-- Use the correct route name --}}
                @csrf
                <div class="form-group">
                    <label class="form-label" for="registerName">Full Name</label>
                    <input type="text" class="form-input" id="registerName" name="name" placeholder="John Doe"
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="registerEmail">Email Address</label>
                    <input type="email" class="form-input" id="registerEmail" name="email"
                        placeholder="name@company.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="registerPassword">Password</label>
                    <input type="password" class="form-input" id="registerPassword" name="password" placeholder="••••••••"
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="registerConfirmPassword">Confirm Password</label>
                    <input type="password" class="form-input" id="registerConfirmPassword" name="password_confirmation"
                        placeholder="••••••••" required>
                </div>

                <div class="form-options">
                    <div class="checkbox-container">
                        <input type="checkbox" class="checkbox" id="agreeTerms" name="terms" required>
                        <label for="agreeTerms">I agree to the <a href="#" class="forgot-link">Terms &
                                Conditions</a></label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="ri-user-add-line"></i>
                    Create Account
                </button>
            </form>

            <div class="divider">
                <div class="divider-line"></div>
                <div class="divider-text">or</div>
                <div class="divider-line"></div>
            </div>

            <button class="btn btn-google">
                <i class="ri-google-fill"></i>
                Continue with Google
            </button>

            <div class="auth-switch">
                Already have an account?
                <a href="#" class="auth-link" id="showLogin">Sign in</a> <!-- Link to show login form -->
            </div>
        </div>
    </div>
@endsection
