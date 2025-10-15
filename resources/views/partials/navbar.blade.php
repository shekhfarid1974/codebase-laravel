{{-- Extracted navbar HTML --}}
<header class="navbar">
    <div class="navbar-left">
        <button class="sidebar-toggle" id="toggleSidebar">
            <i class="ri-menu-line"></i>
        </button>
    </div>

    <div class="navbar-center">
        <div class="search-container">
            <i class="search-icon ri-search-line"></i>
            <input type="text" class="search-input" placeholder="Search...">
        </div>
    </div>

    <div class="navbar-right">
        <div class="navbar-actions">
            <button class="nav-action notification">
                <i class="ri-notification-3-line"></i>
            </button>
            <button class="nav-action" id="themeToggle">
                <i class="ri-sun-line"></i>
            </button>
            <button class="nav-action">
                <i class="ri-global-line"></i>
            </button>

            <div class="profile-dropdown">
                <button class="profile-btn" id="profileDropdown">
                    <div class="profile-avatar">SF</div>
                    <span class="profile-name">Sheikh Farid</span>
                    <i class="ri-arrow-down-s-line"></i>
                </button>
                <div class="dropdown-menu" id="profileMenu">
                    <div class="dropdown-item">
                        <i class="ri-user-line"></i>
                        <span>Profile</span>
                    </div>
                    <div class="dropdown-item">
                        <i class="ri-settings-3-line"></i>
                        <span>Settings</span>
                    </div>
                    <div class="dropdown-item">
                        <i class="ri-moon-line"></i>
                        <span>Theme</span>
                    </div>
                    <div class="dropdown-item">
                        <i class="ri-logout-box-r-line"></i>
                        <span>Logout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
