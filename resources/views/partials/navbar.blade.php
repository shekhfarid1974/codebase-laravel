<!-- Header -->
<header class="header">
    <div class="header-left">
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <div class="logo">
            <img src="/images/accl logo.png" alt="ACCL" width="40" height="40">
        </div>
        <h2 class="page-title" id="pageTitle">@yield('page_title', 'Dashboard')</h2>
    </div>

    <div class="header-right">
        <!-- CRM Form Button - Only show if user can create CRM -->
        @can('create crm')
            <button class="crm-form-btn btn btn-success" id="crmFormBtn">
                <i class="fas fa-plus-circle"></i>
                <span>CRM Form</span>
            </button>
        @endcan

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
                <i class="fas fa-chevron-down profile-arrow"></i>
            </div>
            <div class="dropdown-menu" id="profileDropdown">
                <a href="{{ route('profile') }}" class="dropdown-item">
                    <i class="fas fa-user"></i>
                    My Profile
                </a>

                <!-- Only show user management to users with 'view users' permission -->
                @can('view users')
                    <a href="{{ route('users.index') }}" class="dropdown-item">
                        <i class="fas fa-users"></i>
                        User Management
                    </a>
                @endcan

                <a href="#" class="dropdown-item">
                    <i class="fas fa-key"></i>
                    Change Password
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-palette"></i>
                    Theme Settings
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
</header>

<style>
    /* Navbar Styles */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        height: 60px;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        left: 260px;
        right: 0;
        z-index: 900;
        transition: left 0.3s ease;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .sidebar-toggle {
        background: none;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
        color: #666;
        padding: 8px;
        border-radius: 4px;
        display: none;
    }

    .sidebar-toggle:hover {
        background: #f0f0f0;
        color: #007E33;
    }

    .header-left .logo {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .header-left .logo i {
        color: #007E33;
        font-size: 1.5rem;
    }

    .header-left .logo .logo-text {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
    }

    .page-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    /* CRM Form Button */
    .crm-form-btn .btn-primary {
        display: flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #007E33 0%, #00a041 100%);
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 126, 51, 0.2);
    }

    .crm-form-btn .btn-primary:hover {
        background: linear-gradient(135deg, #006627 0%, #008533 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 126, 51, 0.3);
    }

    .crm-form-btn .btn-primary:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 126, 51, 0.2);
    }

    .crm-form-btn .btn-primary i {
        font-size: 0.8rem;
    }

    /* Search Container */
    .search-container {
        position: relative;
        margin-right: 20px;
    }

    .search-input {
        width: 200px;
        padding: 6px 35px 6px 12px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        width: 250px;
        border-color: #007E33;
        box-shadow: 0 0 0 0.2rem rgba(0, 126, 51, 0.25);
    }

    .search-icon {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        pointer-events: none;
    }

    /* Notification Icon */
    .notification-icon {
        position: relative;
        font-size: 1.1rem;
        color: #6c757d;
        cursor: pointer;
        padding: 8px;
        border-radius: 4px;
        transition: all 0.2s;
    }

    .notification-icon:hover {
        color: #007E33;
        background-color: rgba(0, 126, 51, 0.1);
    }

    .notification-badge {
        position: absolute;
        top: 2px;
        right: 2px;
        background-color: #dc3545;
        color: white;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.7rem;
        font-weight: 600;
    }

    /* Profile Dropdown */
    .profile-dropdown {
        position: relative;
    }

    .profile-trigger {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 6px 12px;
        border-radius: 4px;
        transition: background-color 0.2s;
        gap: 8px;
    }

    .profile-trigger:hover {
        background-color: rgba(0, 126, 51, 0.1);
    }

    .profile-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #007E33 0%, #00a041 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 12px;
    }

    .profile-name {
        font-weight: 500;
        font-size: 0.9rem;
        color: #333;
    }

    .profile-arrow {
        font-size: 0.8rem;
        color: #6c757d;
        transition: transform 0.3s ease;
    }

    .profile-dropdown.show .profile-arrow {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        min-width: 200px;
        border-radius: 4px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #dee2e6;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
        margin-top: 5px;
    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        padding: 10px 16px;
        color: #333;
        text-decoration: none;
        transition: background-color 0.2s;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #007E33;
    }

    .dropdown-item i {
        margin-right: 10px;
        width: 16px;
        text-align: center;
        color: #007E33;
    }

    .dropdown-divider {
        height: 1px;
        background-color: #e9ecef;
        margin: 4px 0;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .header {
            left: 0;
        }

        .sidebar-toggle {
            display: block;
        }

        .crm-form-btn .btn-primary span {
            display: none;
        }

        .crm-form-btn .btn-primary i {
            margin-right: 0;
        }

        .page-title {
            display: none;
        }

        .search-input {
            width: 150px;
        }

        .search-input:focus {
            width: 180px;
        }
    }

    @media (max-width: 768px) {
        .search-container {
            display: none;
        }

        .profile-name {
            display: none;
        }

        .profile-arrow {
            display: none;
        }

        .crm-form-btn .btn-primary {
            padding: 8px;
        }
    }

    @media (max-width: 576px) {
        .header {
            padding: 0 10px;
        }

        .header-right {
            gap: 10px;
        }

        .notification-icon {
            margin-right: 0;
        }

        .notification-badge {
            width: 14px;
            height: 14px;
            font-size: 0.6rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileTrigger = document.getElementById('profileTrigger');
        const profileDropdown = document.getElementById('profileDropdown');
        const crmFormbtn = document.getElementById('crmFormbtn btn-sm btn-primary');

        // Profile dropdown
        if (profileTrigger && profileDropdown) {
            profileTrigger.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.add('show');
            });

            document.addEventListener('click', function(e) {
                if (profileDropdown.classList.contains('show')) {
                    if (!profileTrigger.contains(e.target) && !profileDropdown.contains(e.target)) {
                        profileDropdown.classList.remove('show');
                    }
                }
            });

            const dropdownItems = profileDropdown.querySelectorAll('.dropdown-item');
            if (dropdownItems) {
                dropdownItems.forEach(item => {
                    item.addEventListener('click', function() {
                        profileDropdown.classList.remove('show');
                    });
                });
            }
        }

        // CRM Form Button
        if (crmFormbtn btn-sm btn-primary) {
            crmFormbtn btn-sm btn-primary.addEventListener('click', function() {
                const crmUrl = '{{ url('/crmform') }}?phone_number=01521204476&agent=ShekhFarid';
                window.open(crmUrl, '_blank');
            });
        }
    });
</script>
