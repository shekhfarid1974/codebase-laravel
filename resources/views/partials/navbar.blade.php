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
        <!-- CRM Form Button -->
        <button class="crm-form-btn" id="crmFormBtn">
            <i class="fas fa-plus-circle"></i>
            CRM Form
        </button>

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
                <i class="fas fa-chevron-down profile-arrow"></i>
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
                </a>
                <div class="dropdown-divider"></div> --}}
                {{-- Logout Form --}}
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

<script>
    // Profile dropdown functionality - Simplified version
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Navbar script loaded'); // Debug line

        const profileTrigger = document.getElementById('profileTrigger');
        const profileDropdown = document.getElementById('profileDropdown');
        const crmFormBtn = document.getElementById('crmFormBtn');

        console.log('Profile Trigger:', profileTrigger); // Debug
        console.log('Profile Dropdown:', profileDropdown); // Debug

        // Profile dropdown toggle
        if (profileTrigger && profileDropdown) {
            profileTrigger.addEventListener('click', function(e) {
                e
                    .stopPropagation(); // This prevents the outside click listener from immediately closing it
                console.log('Profile trigger clicked'); // Debug
                // Explicitly add the 'show' class. If it's already there, it won't add it again.
                // If it's not, it will add it.
                profileDropdown.classList.add('show');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (profileDropdown && profileDropdown.classList.contains('show')) {
                    if (!profileTrigger.contains(e.target) && !profileDropdown.contains(e.target)) {
                        console.log('Closing dropdown - clicked outside'); // Debug
                        profileDropdown.classList.remove('show');
                    }
                }
            });

            // Close dropdown when clicking on dropdown items
            const dropdownItems = profileDropdown.querySelectorAll('.dropdown-item');
            if (dropdownItems) { // Check if dropdownItems exist before iterating
                dropdownItems.forEach(item => {
                    item.addEventListener('click', function() {
                        console.log('Dropdown item clicked'); // Debug
                        profileDropdown.classList.remove('show');
                    });
                });
            }
        } else {
            console.error('Profile elements not found!');
        }

        // CRM Form Button functionality
        if (crmFormBtn) {
            crmFormBtn.addEventListener('click', function() {
                // Use your new CRM form URL
                const crmUrl = '{{ url('/crmform') }}?phone_number=01521204476&agent=ShekhFarid';

                console.log('Opening New CRM Form:', crmUrl);

                // Open in NEW TAB
                window.open(crmUrl, '_blank');
            });
        }

        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.querySelector('.sidebar');

        if (mobileMenuToggle && sidebar) {
            mobileMenuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Mobile menu clicked'); // Debug
                sidebar.classList.toggle('show');
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 992 && sidebar.classList.contains('show')) {
                    if (!sidebar.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                        sidebar.classList.remove('show');
                    }
                }
            });
        }
    });
</script>

<style>
    /* CRM Form Button Styles */
    .crm-form-btn {
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
        margin-right: 15px;
        box-shadow: 0 2px 4px rgba(0, 126, 51, 0.2);
    }

    .crm-form-btn:hover {
        background: linear-gradient(135deg, #006627 0%, #008533 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 126, 51, 0.3);
    }

    .crm-form-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 126, 51, 0.2);
    }

    .crm-form-btn i {
        font-size: 0.8rem;
    }

    /* Profile dropdown styles that work with your existing CSS */
    .profile-dropdown {
        position: relative;
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

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .crm-form-btn {
            margin-right: 10px;
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        .crm-form-btn span {
            display: none;
        }

        .crm-form-btn i {
            margin-right: 0;
            font-size: 0.9rem;
        }

        .profile-name {
            display: none;
        }

        .profile-arrow {
            display: none;
        }

        .dropdown-menu {
            right: -10px;
            min-width: 160px;
        }

        .search-container {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .crm-form-btn {
            margin-right: 5px;
            padding: 6px 8px;
        }

        .notification-icon {
            margin-right: 10px;
        }

        .logo-text {
            font-size: 1.2rem;
        }

        .page-title {
            font-size: 1rem;
            margin-left: 10px;
        }
    }

    /* Search container improvements */
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

    /* Notification icon improvements */
    .notification-icon {
        position: relative;
        margin-right: 20px;
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
</style>
