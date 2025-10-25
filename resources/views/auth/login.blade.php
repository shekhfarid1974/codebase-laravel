@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="container">
        <!-- Login Form -->
        <div class="form-container">
            <h1>Welcome Back</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="login" placeholder="Username or Email" required value="{{ old('login') }}">
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
                    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </form>
        </div>

        <!-- Image Section -->
        <div class="image-container">
            <div class="image-overlay">
                <h2>Hello, Friend!</h2>
                <p>Enter your personal details and start your journey with us today</p>
            </div>
        </div>
    </div>
@endsection
