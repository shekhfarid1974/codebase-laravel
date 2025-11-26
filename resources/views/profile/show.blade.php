{{-- resources/views/profile/show.blade.php --}}
@extends('layouts.app') {{-- Extend the main dashboard layout --}}

@section('title', 'Profile') {{-- Set the page title --}}

@section('content') {{-- Define the content section --}}

    <div class="content-header">
        <div>
            <h1 class="content-title">User Profile</h1>
            <p class="content-subtitle">Manage your account information</p>
        </div>
    </div>

    <div class="dashboard-grid" style="grid-template-columns: 1fr; max-width: 600px; margin: 0 auto;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profile Details</h3>
                <div class="card-icon">
                    <i class="ri-user-line"></i>
                </div>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <p>{{ $user->email }}</p>
                </div>
                <!-- Add more profile fields as needed -->
                <!-- <div class="form-group">
                    <label class="form-label">Role</label>
                    <p>{{ $user->role }}</p>
                </div> -->
            </div>
        </div>

        <!-- Optional: Edit Profile Button -->
        <div class="card">
            <div class="card-content" style="padding: 20px; text-align: center;">
                <button class="btn btn-sm btn-primary btn btn-sm btn-primary-primary">
                    <i class="ri-edit-line"></i>
                    Edit Profile
                </button>
            </div>
        </div>
    </div>

@endsection
