@extends('layouts.auth')

@section('title', isset($isRegister) && $isRegister ? 'Register' : 'Login')

@section('content')
    <div class="container">
        <!-- Login Form -->
        <div id="login-form" class="form-container {{ isset($isRegister) && $isRegister ? 'hidden' : '' }}">
            <h1>Welcome Back</h1>

            <!-- Display Success Messages -->
            @if (session('status'))
                <div
                    style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div
                    style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="login" placeholder="Username or Email" required
                        value="{{ old('login') }}">
                </div>
                @error('login')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                        me</label>
                </div>

                <button type="submit" class="btn">Sign In</button>

                <div class="toggle-container">
                    <p>Don't have an account? <a href="{{ route('register') }}" id="show-register">Register</a></p>
                </div>
            </form>
        </div>

        <!-- Register Form -->
        <div id="register-form" class="form-container {{ !isset($isRegister) || !$isRegister ? 'hidden' : '' }}">
            <h1>Create Account</h1>

            <!-- Display Success Messages -->
            @if (session('status'))
                <div
                    style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div
                    style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Full Name" required value="{{ old('name') }}">
                </div>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <div class="remember-forgot">
                    <label>
                        <input type="checkbox" name="terms" value="1" {{ old('terms') ? 'checked' : '' }}>
                        I agree to the Terms & Conditions
                    </label>
                </div>
                @error('terms')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn">Register</button>

                <div class="toggle-container">
                    <p>Already have an account? <a href="{{ route('login') }}" id="show-login">Login</a></p>
                </div>
            </form>
        </div>

        <!-- Image Section -->
        <div class="image-container">
            <div class="image-overlay">
                @if (isset($isRegister) && $isRegister)
                    <h2>Welcome Back!</h2>
                    <p>To keep connected with us please login with your personal info</p>
                @else
                    <h2>Hello, Friend!</h2>
                    <p>Enter your personal details and start your journey with us today</p>
                @endif
            </div>
        </div>
    </div>
@endsection
