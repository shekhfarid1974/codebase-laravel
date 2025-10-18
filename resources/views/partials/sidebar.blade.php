{{-- Extracted sidebar HTML --}}
<aside class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard.index') }}" class="sidebar-logo">
            <div class="sidebar-logo-icon">
                {{ strtoupper(substr(config('app.name', 'MyDashboard'), 0, 1)) }}
            </div>
            <span class="nav-text">{{ config('app.name', 'MyDashboard') }}</span>
        </a>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section">
            <div class="nav-section-header">Main</div>
            <div class="nav-item active">
                <i class="nav-icon ri-dashboard-line"></i>
                <span class="nav-text">Dashboard</span>
            </div>
            <div class="nav-item">
                <i class="nav-icon ri-bar-chart-line"></i>
                <span class="nav-text">Analytics</span>
            </div>
            <div class="nav-item">
                <i class="nav-icon ri-brain-line"></i>
                <span class="nav-text">AI Insights</span>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">Customer</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-group-line"></i>
                <span class="nav-text">Customer</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <div class="nav-section">
                    <div class="nav-section-header">Management</div>
                    {{-- ... other items ... --}}
                    <a href="{{ route('crm.index') }}"
                        class="nav-item {{ request()->routeIs('crm.index') ? 'active' : '' }}"> {{-- Example: Add active state --}}
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Farmer CRM</span>
                    </a>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-coupon-line"></i>
                    <span class="nav-text">Tickets</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-phone-line"></i>
                    <span class="nav-text">Call Center</span>
                </div>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">Business</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-building-line"></i>
                <span class="nav-text">Business</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <div class="nav-item">
                    <i class="nav-icon ri-file-text-line"></i>
                    <span class="nav-text">Reports</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-trending-up-line"></i>
                    <span class="nav-text">Performance</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-bar-chart-line"></i>
                    <span class="nav-text">Analytics</span>
                </div>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">Settings</div>
            <div class="nav-item">
                <i class="nav-icon ri-settings-3-line"></i>
                <span class="nav-text">Settings</span>
            </div>
            <div class="nav-item">
                <i class="nav-icon ri-shield-keyhole-line"></i>
                <span class="nav-text">Security</span>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">Account</div>
            <div class="nav-item">
                <i class="nav-icon ri-chat-3-line"></i>
                <span class="nav-text">Chat</span>
            </div>
            <div class="nav-item">
                <i class="nav-icon ri-user-line"></i>
                <span class="nav-text">My Profile</span>
            </div>
        </div>
    </nav>

    <div class="sidebar-footer">
        <button class="collapse-btn" id="collapseSidebar">
            <i class="ri-arrow-left-s-line"></i>
            <span class="nav-text">Collapse Menu</span>
        </button>
    </div>
</aside>
