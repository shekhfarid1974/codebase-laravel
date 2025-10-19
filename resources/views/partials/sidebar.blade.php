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
                    {{-- ... other items ... --}}
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Farmer</span>
                    </a>
                </div>
                <div class="nav-section">
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Dealer</span>
                    </a>
                </div>
                <div class="nav-section">
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Retailers</span>
                    </a>
                </div>
                <div class="nav-section">
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Others</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">CRM</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-group-line"></i>
                <span class="nav-text">Crm</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <div class="nav-section">
                    <div class="nav-section-header">Management</div>
                    {{-- ... other items ... --}}
                    <a href="{{ route('crm.index') }}"
                        class="nav-item {{ request()->routeIs('crm.index') ? '' : '' }}"> {{-- Example: Add active state --}}
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Farmer CRM</span>
                    </a>
                </div>
                <div class="nav-section">
                    <div class="nav-section-header">Management</div>
                    {{-- ... other items ... --}}
                    <a href="{{ route('crm.index') }}"
                        class="nav-item {{ request()->routeIs('crm.index') ? '' : '' }}"> {{-- Example: Add active state --}}
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Dealer CRM</span>
                    </a>
                </div>
                <div class="nav-section">
                    <div class="nav-section-header">Management</div>
                    {{-- ... other items ... --}}
                    <a href="{{ route('crm.index') }}"
                        class="nav-item {{ request()->routeIs('crm.index') ? '' : '' }}"> {{-- Example: Add active state --}}
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Retailers CRM</span>
                    </a>
                </div>
                <div class="nav-section">
                    <div class="nav-section-header">Management</div>
                    {{-- ... other items ... --}}
                    <a href="{{ route('crm.index') }}"
                        class="nav-item {{ request()->routeIs('crm.index') ? '' : '' }}"> {{-- Example: Add active state --}}
                        <i class="nav-icon ri-user-line"></i> {{-- Or choose a more specific icon if available --}}
                        <span class="nav-text">Others CRM</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">SURVEY REPORTS</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-building-line"></i>
                <span class="nav-text">REPORTS</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <div class="nav-item">
                    <i class="nav-icon ri-file-text-line"></i>
                    <span class="nav-text">Product Survey</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-trending-up-line"></i>
                    <span class="nav-text">Seed Survey</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-bar-chart-line"></i>
                    <span class="nav-text">Crop Survey</span>
                </div>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">SURVEY LEAD</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-building-line"></i>
                <span class="nav-text">Lead</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <div class="nav-item">
                    <i class="nav-icon ri-file-text-line"></i>
                    <span class="nav-text">Import</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-trending-up-line"></i>
                    <span class="nav-text">Reset Lead</span>
                </div>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">TICKETS</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-building-line"></i>
                <span class="nav-text">Tickets</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <div class="nav-item">
                    <i class="nav-icon ri-file-text-line"></i>
                    <span class="nav-text">Product Survey</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-trending-up-line"></i>
                    <span class="nav-text">Seed Survey</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-bar-chart-line"></i>
                    <span class="nav-text">Crop Survey</span>
                </div>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-header">CALL CENTER</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-building-line"></i>
                <span class="nav-text">Call Center</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <div class="nav-item">
                    <i class="nav-icon ri-file-text-line"></i>
                    <span class="nav-text">Product Survey</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-trending-up-line"></i>
                    <span class="nav-text">Seed Survey</span>
                </div>
                <div class="nav-item">
                    <i class="nav-icon ri-bar-chart-line"></i>
                    <span class="nav-text">Crop Survey</span>
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
