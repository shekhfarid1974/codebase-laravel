@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="container">
        <!-- Register Form -->
        <div class="form-container">
            <h1>Create Account</h1>
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
                    <label><input type="checkbox" name="terms" value="1" {{ old('terms') ? 'checked' : '' }}> I agree to the Terms & Conditions</label>
                    @error('terms')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn">Register</button>
                
                <div class="toggle-container">
                    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </form>
        </div>

        <!-- Image Section -->
        <div class="image-container">
            <div class="image-overlay">
                <h2>Welcome Back!</h2>
                <p>To keep connected with us please login with your personal info</p>
            </div>
        </div>
    </div>
@endsection