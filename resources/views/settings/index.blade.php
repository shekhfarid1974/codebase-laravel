{{-- resources/views/settings/index.blade.php --}}
@extends('layouts.app') {{-- Extend the main dashboard layout --}}

@section('title', 'Settings') {{-- Set the page title --}}

@section('content') {{-- Define the content section --}}

    <div class="content-header">
        <div>
            <h1 class="content-title">Settings</h1>
            <p class="content-subtitle">Configure your application preferences</p>
        </div>
    </div>

    <div class="dashboard-grid" style="grid-template-columns: 1fr; max-width: 800px; margin: 0 auto;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">General Settings</h3>
                <div class="card-icon">
                    <i class="ri-settings-3-line"></i>
                </div>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="form-group">
                    <label class="form-label" for="languageSelect">Language</label>
                    <select class="form-input" id="languageSelect">
                        <option value="en" selected>English</option>
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                        <!-- Add more options -->
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="timezoneSelect">Timezone</label>
                    <select class="form-input" id="timezoneSelect">
                        <option value="UTC">UTC</option>
                        <option value="EST">EST</option>
                        <option value="PST">PST</option>
                        <!-- Add more options -->
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <input type="checkbox"> Enable notifications
                    </label>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <input type="checkbox"> Dark Mode (Note: Theme toggle is in navbar)
                    </label>
                </div>

                <!-- Add more general settings as needed -->
            </div>
            <div class="card-content" style="padding: 20px; text-align: center;">
                <button class="btn btn-primary">
                    <i class="ri-save-line"></i>
                    Save Settings
                </button>
            </div>
        </div>

        <!-- Example: Security Settings Card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Security</h3>
                <div class="card-icon">
                    <i class="ri-shield-keyhole-line"></i>
                </div>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="form-group">
                    <label class="form-label">
                        <input type="checkbox"> Two-Factor Authentication
                    </label>
                </div>

                <div class="form-group">
                    <button class="btn btn-outline">
                        <i class="ri-key-line"></i>
                        Change Password
                    </button>
                </div>

                <div class="form-group">
                    <button class="btn btn-outline">
                        <i class="ri-logout-box-r-line"></i>
                        Log out of other sessions
                    </button>
                </div>
                <!-- Add more security settings as needed -->
            </div>
        </div>
    </div>

@endsection
