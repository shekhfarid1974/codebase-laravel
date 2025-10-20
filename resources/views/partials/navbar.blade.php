<!-- Header -->
<header class="header">
    <div class="logo">
        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <div class="logo-icon">
            <i class="fas fa-seedling"></i>
        </div>
        <div class="logo-text">ACCL</div>
        <h2 class="page-title" id="pageTitle">@yield('page_title', 'Dashboard')</h2>
    </div>
    <div class="header-right">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search...">
            <i class="fas fa-search search-icon"></i>
        </div>
        <div class="notification-icon">
            <i class="fas fa-bell"></i>
            <span class="notification-badge">5</span>
        </div>
        <div class="profile-dropdown">
            <div class="profile-trigger" id="profileTrigger">
                <div class="profile-avatar">
                    {{-- Display user initials --}}
                    @auth
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    @else
                        JD
                    @endauth
                </div>
                <div class="profile-name">
                    @auth
                        {{ auth()->user()->name }}
                    @else
                        John Doe
                    @endauth
                </div>
            </div>
            <div class="dropdown-menu" id="profileDropdown">
                {{-- <a href="{{ route('profile') }}" class="dropdown-item">
                    <i class="fas fa-user"></i>
                    My Profile
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-key"></i>
                    Change Password
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-palette"></i>
                    Theme Settings
                </a> --}}
                <div class="dropdown-divider"></div>
                {{-- Logout Form --}}
                <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    // Profile dropdown functionality
    document.addEventListener('DOMContentLoaded', function() {
        const profileTrigger = document.getElementById('profileTrigger');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileTrigger && profileDropdown) {
            // Toggle dropdown on click
            profileTrigger.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('show');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!profileTrigger.contains(e.target) && !profileDropdown.contains(e.target)) {
                    profileDropdown.classList.remove('show');
                }
            });

            // Close dropdown when clicking on a dropdown item
            profileDropdown.addEventListener('click', function(e) {
                if (e.target.tagName === 'A') {
                    profileDropdown.classList.remove('show');
                }
            });
        }

        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', function() {
                const sidebar = document.querySelector('.sidebar');
                if (sidebar) {
                    sidebar.classList.toggle('mobile-open');
                }
            });
        }
    });
</script>

<style>
    /* Add these styles for the dropdown functionality */
    .profile-dropdown {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        min-width: 200px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
        margin-top: 10px;
    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        color: #333;
        text-decoration: none;
        transition: background-color 0.3s;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    .dropdown-item i {
        margin-right: 10px;
        width: 16px;
        text-align: center;
    }

    .dropdown-divider {
        height: 1px;
        background-color: #e9ecef;
        margin: 4px 0;
    }

    .profile-trigger {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .profile-trigger:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .profile-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 14px;
        margin-right: 8px;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .profile-name {
            display: none;
        }
        
        .dropdown-menu {
            right: -10px;
            min-width: 180px;
        }
    }
</style>