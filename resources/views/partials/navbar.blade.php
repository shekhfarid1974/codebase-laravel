{{-- resources/views/partials/navbar.blade.php --}}
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
                @auth
                    <button class="profile-btn" id="profileDropdown">
                        <div class="profile-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }} {{-- Show first two letters of name --}}
                        </div>
                        <span class="profile-name">{{ Auth::user()->name ?? 'User' }}</span> {{-- Show user name --}}
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div class="dropdown-menu" id="profileMenu">
                        {{-- Example: Conditional link based on user role --}}
                        @can('view-profile') {{-- Example: Using Laravel's @can directive --}}
                            <a href="{{ route('profile.show') }}" class="dropdown-item">
                                <i class="ri-user-line"></i>
                                <span>Profile</span>
                            </a>
                        @endcan

                        {{-- Example: Always show settings --}}
                        <a href="{{ route('settings.index') }}" class="dropdown-item">
                            <i class="ri-settings-3-line"></i>
                            <span>Settings</span>
                        </a>

                        {{-- Example: Theme switcher item (could be a button triggering JS) --}}
                        <div class="dropdown-item" id="themeToggleDropdownItem">
                            <i class="ri-moon-line"></i>
                            <span>Toggle Theme</span>
                        </div>

                        {{-- Example: Logout link --}}
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ri-logout-box-r-line"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    {{-- Optional: Show login link if not authenticated --}}
                    <a href="{{ route('login') }}" class="profile-btn">
                        <div class="profile-avatar">L</div> {{-- Or a generic icon --}}
                        <span class="profile-name">Login</span>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>