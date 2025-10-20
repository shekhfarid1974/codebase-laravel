<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <nav class="sidebar-menu">
        <div class="menu-section">
            <div class="section-title">Main</div>
            <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
            <a href="{{ route('mail.configure') }}" class="menu-item {{ request()->routeIs('mail.configure') ? 'active' : '' }}">
                <i class="fas fa-envelope menu-icon"></i>
                <span class="menu-title">Mail Configure</span>
            </a>
        </div>
        <div class="menu-section">
            <div class="section-title">CRM</div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('crmSubmenu')">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">CRM</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="crmSubmenu">
                <a href="{{ route('crm.farmer') }}" class="menu-item {{ request()->routeIs('crm.farmer') ? 'active' : '' }}">
                    <i class="fas fa-user-tie menu-icon"></i>
                    <span class="menu-title">Farmer CRM</span>
                </a>
                <a href="{{ route('crm.dealer') }}" class="menu-item {{ request()->routeIs('crm.dealer') ? 'active' : '' }}">
                    <i class="fas fa-store menu-icon"></i>
                    <span class="menu-title">Dealer CRM</span>
                </a>
                <a href="{{ route('crm.retailer') }}" class="menu-item {{ request()->routeIs('crm.retailer') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart menu-icon"></i>
                    <span class="menu-title">Retailer CRM</span>
                </a>
                <a href="{{ route('crm.other') }}" class="menu-item {{ request()->routeIs('crm.other') ? 'active' : '' }}">
                    <i class="fas fa-user-friends menu-icon"></i>
                    <span class="menu-title">Other CRM</span>
                </a>
                <a href="{{ route('crm.campaign') }}" class="menu-item {{ request()->routeIs('crm.campaign') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn menu-icon"></i>
                    <span class="menu-title">Campaign CRM</span>
                </a>
            </div>
        </div>
        <div class="menu-section">
            <div class="section-title">Operations</div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('surveySubmenu')">
                <i class="fas fa-poll menu-icon"></i>
                <span class="menu-title">Survey</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="surveySubmenu">
                <a href="{{ route('survey.lead') }}" class="menu-item {{ request()->routeIs('survey.lead') ? 'active' : '' }}">
                    <i class="fas fa-user-plus menu-icon"></i>
                    <span class="menu-title">Survey Lead</span>
                </a>
                <a href="{{ route('survey.reports') }}" class="menu-item {{ request()->routeIs('survey.reports') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie menu-icon"></i>
                    <span class="menu-title">Survey Reports</span>
                </a>
            </div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('reportsSubmenu')">
                <i class="fas fa-chart-bar menu-icon"></i>
                <span class="menu-title">Reports</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="reportsSubmenu">
                <a href="{{ route('reports.crm') }}" class="menu-item {{ request()->routeIs('reports.crm') ? 'active' : '' }}">
                    <i class="fas fa-users-cog menu-icon"></i>
                    <span class="menu-title">CRM Reports</span>
                </a>
                <a href="{{ route('reports.campaign') }}" class="menu-item {{ request()->routeIs('reports.campaign') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn menu-icon"></i>
                    <span class="menu-title">Campaign Reports</span>
                </a>
                <a href="{{ route('reports.sms') }}" class="menu-item {{ request()->routeIs('reports.sms') ? 'active' : '' }}">
                    <i class="fas fa-sms menu-icon"></i>
                    <span class="menu-title">SMS Reports</span>
                </a>
                <a href="{{ route('reports.ticket') }}" class="menu-item {{ request()->routeIs('reports.ticket') ? 'active' : '' }}">
                    <i class="fas fa-ticket-alt menu-icon"></i>
                    <span class="menu-title">Ticket Reports</span>
                </a>
            </div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('ticketSubmenu')">
                <i class="fas fa-ticket-alt menu-icon"></i>
                <span class="menu-title">Ticket</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="ticketSubmenu">
                <a href="{{ route('tickets.all') }}" class="menu-item {{ request()->routeIs('tickets.all') ? 'active' : '' }}">
                    <i class="fas fa-list menu-icon"></i>
                    <span class="menu-title">All Tickets</span>
                </a>
                <a href="{{ route('tickets.create') }}" class="menu-item {{ request()->routeIs('tickets.create') ? 'active' : '' }}">
                    <i class="fas fa-plus menu-icon"></i>
                    <span class="menu-title">Create New</span>
                </a>
                <a href="{{ route('tickets.resolved') }}" class="menu-item {{ request()->routeIs('tickets.resolved') ? 'active' : '' }}">
                    <i class="fas fa-history menu-icon"></i>
                    <span class="menu-title">Resolved History</span>
                </a>
            </div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('leadSubmenu')">
                <i class="fas fa-user-friends menu-icon"></i>
                <span class="menu-title">Lead Management</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="leadSubmenu">
                <a href="{{ route('leads.import') }}" class="menu-item {{ request()->routeIs('leads.import') ? 'active' : '' }}">
                    <i class="fas fa-file-import menu-icon"></i>
                    <span class="menu-title">Import Leads</span>
                </a>
                <a href="{{ route('leads.reset') }}" class="menu-item {{ request()->routeIs('leads.reset') ? 'active' : '' }}">
                    <i class="fas fa-redo menu-icon"></i>
                    <span class="menu-title">Reset Lead Data</span>
                </a>
            </div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('campaignsSubmenu')">
                <i class="fas fa-bullhorn menu-icon"></i>
                <span class="menu-title">Campaigns</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="campaignsSubmenu">
                <a href="{{ route('campaigns.active') }}" class="menu-item {{ request()->routeIs('campaigns.active') ? 'active' : '' }}">
                    <i class="fas fa-play-circle menu-icon"></i>
                    <span class="menu-title">Active Campaigns</span>
                    <span class="menu-badge">3</span>
                </a>
                <a href="{{ route('campaigns.create') }}" class="menu-item {{ request()->routeIs('campaigns.create') ? 'active' : '' }}">
                    <i class="fas fa-plus menu-icon"></i>
                    <span class="menu-title">Create Campaign</span>
                </a>
                <a href="{{ route('campaigns.archive') }}" class="menu-item {{ request()->routeIs('campaigns.archive') ? 'active' : '' }}">
                    <i class="fas fa-archive menu-icon"></i>
                    <span class="menu-title">Campaign Archive</span>
                </a>
            </div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('faqSubmenu')">
                <i class="fas fa-question-circle menu-icon"></i>
                <span class="menu-title">FAQ Management</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="faqSubmenu">
                <a href="{{ route('faqs.view') }}" class="menu-item {{ request()->routeIs('faqs.view') ? 'active' : '' }}">
                    <i class="fas fa-list menu-icon"></i>
                    <span class="menu-title">View FAQs</span>
                </a>
                <a href="{{ route('faqs.add') }}" class="menu-item {{ request()->routeIs('faqs.add') ? 'active' : '' }}">
                    <i class="fas fa-plus menu-icon"></i>
                    <span class="menu-title">Add FAQ</span>
                </a>
                <a href="{{ route('faqs.categories') }}" class="menu-item {{ request()->routeIs('faqs.categories') ? 'active' : '' }}">
                    <i class="fas fa-tags menu-icon"></i>
                    <span class="menu-title">Categories</span>
                </a>
            </div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('productSubmenu')">
                <i class="fas fa-box menu-icon"></i>
                <span class="menu-title">Product Features</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="productSubmenu">
                <a href="{{ route('products.list') }}" class="menu-item {{ request()->routeIs('products.list') ? 'active' : '' }}">
                    <i class="fas fa-list menu-icon"></i>
                    <span class="menu-title">Product List</span>
                </a>
                <a href="{{ route('products.addFeature') }}" class="menu-item {{ request()->routeIs('products.addFeature') ? 'active' : '' }}">
                    <i class="fas fa-plus menu-icon"></i>
                    <span class="menu-title">Add Feature</span>
                </a>
                <a href="{{ route('products.featureCategories') }}" class="menu-item {{ request()->routeIs('products.featureCategories') ? 'active' : '' }}">
                    <i class="fas fa-tags menu-icon"></i>
                    <span class="menu-title">Feature Categories</span>
                </a>
            </div>
            <a href="#" class="menu-item" onclick="toggleSubmenu('smsSubmenu')">
                <i class="fas fa-sms menu-icon"></i>
                <span class="menu-title">SMS Center</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu" id="smsSubmenu">
                <a href="{{ route('sms.feature') }}" class="menu-item {{ request()->routeIs('sms.feature') ? 'active' : '' }}">
                    <i class="fas fa-comment-alt menu-icon"></i>
                    <span class="menu-title">SMS Feature</span>
                </a>
                <a href="{{ route('sms.brochure') }}" class="menu-item {{ request()->routeIs('sms.brochure') ? 'active' : '' }}">
                    <i class="fas fa-brochure menu-icon"></i>
                    <span class="menu-title">SMS Brochure</span>
                </a>
                <a href="{{ route('sms.templates') }}" class="menu-item {{ request()->routeIs('sms.templates') ? 'active' : '' }}">
                    <i class="fas fa-file-alt menu-icon"></i>
                    <span class="menu-title">Templates</span>
                </a>
                <a href="{{ route('sms.sendBulk') }}" class="menu-item {{ request()->routeIs('sms.sendBulk') ? 'active' : '' }}">
                    <i class="fas fa-paper-plane menu-icon"></i>
                    <span class="menu-title">Send Bulk SMS</span>
                </a>
            </div>
        </div>
    </nav>
</aside>