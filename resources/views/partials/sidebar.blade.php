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
        {{-- MAIN --}}
        <div class="nav-section">
            <div class="nav-section-header">Main</div>
            <a href="{{ route('dashboard.index') }}" class="nav-item active">
                <i class="nav-icon ri-dashboard-3-line"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </div>

        {{-- CUSTOMER --}}
        <div class="nav-section">
            <div class="nav-section-header">Customer</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-group-line"></i>
                <span class="nav-text">Customer</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-plant-line"></i>
                    <span class="nav-text">Farmer</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-store-3-line"></i>
                    <span class="nav-text">Dealer</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-shopping-bag-3-line"></i>
                    <span class="nav-text">Retailers</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-user-smile-line"></i>
                    <span class="nav-text">Others</span>
                </a>
            </div>
        </div>

        {{-- CRM --}}
        <div class="nav-section">
            <div class="nav-section-header">CRM</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-database-2-line"></i>
                <span class="nav-text">CRM</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <a href="{{ route('crm.index') }}" class="nav-item">
                    <i class="nav-icon ri-plant-line"></i>
                    <span class="nav-text">Farmer CRM</span>
                </a>
                <a href="{{ route('crm.index') }}" class="nav-item">
                    <i class="nav-icon ri-store-3-line"></i>
                    <span class="nav-text">Dealer CRM</span>
                </a>
                <a href="{{ route('crm.index') }}" class="nav-item">
                    <i class="nav-icon ri-shopping-bag-3-line"></i>
                    <span class="nav-text">Retailers CRM</span>
                </a>
                <a href="{{ route('crm.index') }}" class="nav-item">
                    <i class="nav-icon ri-user-smile-line"></i>
                    <span class="nav-text">Others CRM</span>
                </a>
            </div>
        </div>

        {{-- SURVEY REPORTS --}}
        <div class="nav-section">
            <div class="nav-section-header">Survey Reports</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-bar-chart-2-line"></i>
                <span class="nav-text">Reports</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-clipboard-line"></i>
                    <span class="nav-text">Product Survey</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-seedling-line"></i>
                    <span class="nav-text">Seed Survey</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-leaf-line"></i>
                    <span class="nav-text">Crop Survey</span>
                </a>
            </div>
        </div>

        {{-- SURVEY LEAD --}}
        <div class="nav-section">
            <div class="nav-section-header">Survey Lead</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-folder-chart-line"></i>
                <span class="nav-text">Lead</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-upload-2-line"></i>
                    <span class="nav-text">Import</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-refresh-line"></i>
                    <span class="nav-text">Reset Lead</span>
                </a>
            </div>
        </div>

        {{-- TICKETS --}}
        <div class="nav-section">
            <div class="nav-section-header">Tickets</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-customer-service-2-line"></i>
                <span class="nav-text">Tickets</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-ticket-2-line"></i>
                    <span class="nav-text">Product Ticket</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-ticket-line"></i>
                    <span class="nav-text">Seed Ticket</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-service-line"></i>
                    <span class="nav-text">Crop Ticket</span>
                </a>
            </div>
        </div>

        {{-- CALL CENTER --}}
        <div class="nav-section">
            <div class="nav-section-header">Call Center</div>
            <div class="nav-item has-dropdown">
                <i class="nav-icon ri-phone-line"></i>
                <span class="nav-text">Call Center</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </div>
            <div class="nav-dropdown">
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-survey-line"></i>
                    <span class="nav-text">Product Survey</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-voiceprint-line"></i>
                    <span class="nav-text">Seed Survey</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="nav-icon ri-bar-chart-line"></i>
                    <span class="nav-text">Crop Survey</span>
                </a>
            </div>
        </div>

        {{-- SETTINGS --}}
        <div class="nav-section">
            <div class="nav-section-header">Settings</div>
            <a href="#" class="nav-item">
                <i class="nav-icon ri-settings-3-line"></i>
                <span class="nav-text">Settings</span>
            </a>
            <a href="#" class="nav-item">
                <i class="nav-icon ri-shield-check-line"></i>
                <span class="nav-text">Security</span>
            </a>
        </div>

        {{-- ACCOUNT --}}
        <div class="nav-section">
            <div class="nav-section-header">Account</div>
            <a href="#" class="nav-item">
                <i class="nav-icon ri-chat-3-line"></i>
                <span class="nav-text">Chat</span>
            </a>
            <a href="#" class="nav-item">
                <i class="nav-icon ri-user-3-line"></i>
                <span class="nav-text">My Profile</span>
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <button class="collapse-btn" id="collapseSidebar">
            <i class="ri-arrow-left-s-line"></i>
            <span class="nav-text">Collapse Menu</span>
        </button>
    </div>
</aside>
