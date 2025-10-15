{{-- resources/views/layouts/auth.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth') | MyDashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body data-theme="light">
    <button class="theme-toggle" id="themeToggle">
        <i class="ri-sun-line"></i>
    </button>

    <div class="auth-container">
        <div class="auth-left">
            <div class="floating-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
            <div class="auth-logo">
                <div class="auth-logo-icon">M</div>
                <div class="auth-logo-text">MyDashboard</div>
            </div>
            <h1 class="auth-title">Welcome Back!</h1>
            <p class="auth-subtitle">Sign in to access your personalized dashboard and analytics.</p>

            <ul class="feature-list">
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="ri-dashboard-line"></i>
                    </div>
                    Advanced Analytics & Reporting
                </li>
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="ri-shield-keyhole-line"></i>
                    </div>
                    Enterprise-grade Security
                </li>
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="ri-team-line"></i>
                    </div>
                    Team Collaboration Tools
                </li>
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="ri-cloud-line"></i>
                    </div>
                    Cloud Storage & Backup
                </li>
            </ul>
        </div>

        <div class="auth-right">
            @yield('content')
        </div>
    </div>

    <script>
        // Theme Toggle JS (same as in your HTML)
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = themeToggle.querySelector('i');

        themeToggle.addEventListener('click', () => {
            const currentTheme = document.body.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';

            document.body.setAttribute('data-theme', newTheme);
            themeIcon.className = newTheme === 'light' ? 'ri-sun-line' : 'ri-moon-line';

            // Save theme preference
            localStorage.setItem('theme', newTheme);
        });

        // Check for saved theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.body.setAttribute('data-theme', savedTheme);
            themeIcon.className = savedTheme === 'light' ? 'ri-sun-line' : 'ri-moon-line';
        }

        // Form Toggle JS (same as in your HTML, or adjust as needed)
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const showRegister = document.getElementById('showRegister');
            const showLogin = document.getElementById('showLogin');

            if (showRegister && loginForm && registerForm) {
                showRegister.addEventListener('click', (e) => {
                    e.preventDefault();
                    loginForm.classList.add('hidden');
                    registerForm.classList.remove('hidden');
                });
            }

            if (showLogin && loginForm && registerForm) {
                showLogin.addEventListener('click', (e) => {
                    e.preventDefault();
                    registerForm.classList.add('hidden');
                    loginForm.classList.remove('hidden');
                });
            }
        });
    </script>
    @yield('scripts') {{-- For page-specific JS --}}
    <script src="{{ asset('js/auth.js') }}"></script> {{-- This now points to your auth JS --}}
</body>
</html>
