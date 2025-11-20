<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <nav class="sidebar-menu">
        <div class="menu-section">
            <div class="section-title">Main</div>
            <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
            <a href="{{ route('mail.configure') }}"
                class="menu-item {{ request()->routeIs('mail.configure') ? 'active' : '' }}">
                <i class="fas fa-envelope menu-icon"></i>
                <span class="menu-title">Mail Configure</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="section-title">CRM FORMS</div>

            <!-- CRM FORM Submenu - Fixed structure -->
            <a href="#" class="menu-item submenu-trigger" data-submenu="crmFormSubmenu">
                <i class="fas fa-user-plus menu-icon"></i>
                <span class="menu-title">Inbound</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('crmform.*') ? 'show' : '' }}" id="crmFormSubmenu">
                <a href="{{ route('crmform.create', ['type' => 'inbound']) }}"
                    class="menu-item {{ request()->is('crmform/create/inbound') ? 'active' : '' }}">
                    <i class="fas fa-phone-volume menu-icon"></i>
                    <span class="menu-title">Inbound</span>
                </a>
            </div>

            <a href="#" class="menu-item submenu-trigger" data-submenu="outboundFormSubmenu">
                <i class="fas fa-user-plus menu-icon"></i>
                <span class="menu-title">Outbound</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('crmform.*') ? 'show' : '' }}" id="outboundFormSubmenu">
                <a href="{{ route('crmform.create', ['type' => 'outbound']) }}"
                    class="menu-item {{ request()->is('crmform/create/outbound') ? 'active' : '' }}">
                    <i class="fas fa-phone menu-icon"></i>
                    <span class="menu-title">Outbound Form</span>
                </a>
            </div>
        </div>

        {{-- <div class="menu-section">
            <div class="section-title">CRM</div>
            <a href="#" class="menu-item submenu-trigger" data-submenu="crmSubmenu">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">CRM</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('crm.*') ? 'show' : '' }}" id="crmSubmenu">
                <a href="{{ route('crmform.farmer') }}"
                    class="menu-item {{ request()->routeIs('crm.farmer') ? 'active' : '' }}">
                    <i class="fas fa-user-tie menu-icon"></i>
                    <span class="menu-title">Farmer CRM</span>
                </a>
                <a href="{{ route('crmform.dealer') }}"
                    class="menu-item {{ request()->routeIs('crm.dealer') ? 'active' : '' }}">
                    <i class="fas fa-store menu-icon"></i>
                    <span class="menu-title">Dealer CRM</span>
                </a>
                <a href="{{ route('crmform.retailer') }}"
                    class="menu-item {{ request()->routeIs('crm.retailer') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart menu-icon"></i>
                    <span class="menu-title">Retailer CRM</span>
                </a>
                <a href="{{ route('crmform.others') }}"
                    class="menu-item {{ request()->routeIs('crm.other') ? 'active' : '' }}">
                    <i class="fas fa-user-friends menu-icon"></i>
                    <span class="menu-title">Other CRM</span>
                </a>
                <a href="{{ route('crmform.campaign') }}"
                    class="menu-item {{ request()->routeIs('crm.campaign') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn menu-icon"></i>
                    <span class="menu-title">Campaign CRM</span>
                </a>
            </div>
        </div> --}}

        <div class="menu-section">
            <div class="section-title">Operations</div>

            <!-- Survey Submenu -->
            <a href="#" class="menu-item submenu-trigger" data-submenu="surveySubmenu">
                <i class="fas fa-poll menu-icon"></i>
                <span class="menu-title">Survey</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('survey.*') ? 'show' : '' }}" id="surveySubmenu">
                <a href="{{ route('survey.lead') }}"
                    class="menu-item {{ request()->routeIs('survey.lead') ? 'active' : '' }}">
                    <i class="fas fa-user-plus menu-icon"></i>
                    <span class="menu-title">Survey Lead</span>
                </a>
                <a href="{{ route('survey.reports') }}"
                    class="menu-item {{ request()->routeIs('survey.reports') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie menu-icon"></i>
                    <span class="menu-title">Survey Reports</span>
                </a>
            </div>

            <!-- Reports Submenu -->
            <a href="#" class="menu-item submenu-trigger" data-submenu="reportsSubmenu">
                <i class="fas fa-chart-bar menu-icon"></i>
                <span class="menu-title">Reports</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('reports.*') ? 'show' : '' }}" id="reportsSubmenu">
                <a href="{{ route('reports.crm') }}"
                    class="menu-item {{ request()->routeIs('reports.crm') ? 'active' : '' }}">
                    <i class="fas fa-users-cog menu-icon"></i>
                    <span class="menu-title">CRM Reports</span>
                </a>
                <a href="{{ route('reports.campaign') }}"
                    class="menu-item {{ request()->routeIs('reports.campaign') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn menu-icon"></i>
                    <span class="menu-title">Campaign Reports</span>
                </a>
                <a href="{{ route('reports.sms') }}"
                    class="menu-item {{ request()->routeIs('reports.sms') ? 'active' : '' }}">
                    <i class="fas fa-sms menu-icon"></i>
                    <span class="menu-title">SMS Reports</span>
                </a>
                <a href="{{ route('reports.ticket') }}"
                    class="menu-item {{ request()->routeIs('reports.ticket') ? 'active' : '' }}">
                    <i class="fas fa-ticket-alt menu-icon"></i>
                    <span class="menu-title">Ticket Reports</span>
                </a>
            </div>

            <!-- Ticket Submenu -->
            <a href="#" class="menu-item submenu-trigger" data-submenu="ticketSubmenu">
                <i class="fas fa-ticket-alt menu-icon"></i>
                <span class="menu-title">Ticket</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('tickets.*') ? 'show' : '' }}" id="ticketSubmenu">
                <a href="{{ route('tickets.all') }}"
                    class="menu-item {{ request()->routeIs('tickets.all') ? 'active' : '' }}">
                    <i class="fas fa-list menu-icon"></i>
                    <span class="menu-title">All Tickets</span>
                </a>
                <a href="{{ route('tickets.create') }}"
                    class="menu-item {{ request()->routeIs('tickets.create') ? 'active' : '' }}">
                    <i class="fas fa-plus menu-icon"></i>
                    <span class="menu-title">Create New</span>
                </a>
                <a href="{{ route('tickets.resolved') }}"
                    class="menu-item {{ request()->routeIs('tickets.resolved') ? 'active' : '' }}">
                    <i class="fas fa-history menu-icon"></i>
                    <span class="menu-title">Resolved History</span>
                </a>
            </div>

            <!-- Lead Management Submenu -->
            <a href="#" class="menu-item submenu-trigger" data-submenu="leadSubmenu">
                <i class="fas fa-user-friends menu-icon"></i>
                <span class="menu-title">Lead Management</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('leads.*') ? 'show' : '' }}" id="leadSubmenu">
                <a href="{{ route('leads.import') }}"
                    class="menu-item {{ request()->routeIs('leads.import') ? 'active' : '' }}">
                    <i class="fas fa-file-import menu-icon"></i>
                    <span class="menu-title">Import Leads</span>
                </a>
                <a href="{{ route('leads.reset') }}"
                    class="menu-item {{ request()->routeIs('leads.reset') ? 'active' : '' }}">
                    <i class="fas fa-redo menu-icon"></i>
                    <span class="menu-title">Reset Lead Data</span>
                </a>
            </div>

            <!-- FAQ Management Submenu -->
            <a href="#" class="menu-item submenu-trigger" data-submenu="faqSubmenu">
                <i class="fas fa-question-circle menu-icon"></i>
                <span class="menu-title">FAQ Management</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('faqs.*') ? 'show' : '' }}" id="faqSubmenu">
                <a href="{{ route('faqs.view') }}"
                    class="menu-item {{ request()->routeIs('faqs.view') ? 'active' : '' }}">
                    <i class="fas fa-question-circle menu-icon"></i>
                    <span class="menu-title">View FAQs</span>
                </a>
                <a href="{{ route('faqs.add') }}"
                    class="menu-item {{ request()->routeIs('faqs.add') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle menu-icon"></i>
                    <span class="menu-title">Add FAQ</span>
                </a>
                <a href="{{ route('faqs.categories') }}"
                    class="menu-item {{ request()->routeIs('faqs.categories') ? 'active' : '' }}">
                    <i class="fas fa-folder-open menu-icon"></i>
                    <span class="menu-title">Categories</span>
                </a>
                <a href="{{ route('faqs.crops') }}"
                    class="menu-item {{ request()->routeIs('faqs.crops') ? 'active' : '' }}">
                    <i class="fas fa-seedling menu-icon"></i>
                    <span class="menu-title">Crop</span>
                </a>
                <a href="{{ route('faqs.identifications') }}"
                    class="menu-item {{ request()->routeIs('faqs.identification') ? 'active' : '' }}">
                    <i class="fas fa-fingerprint menu-icon"></i>
                    <span class="menu-title">Identification</span>
                </a>
            </div>


            <!-- Product Features Submenu -->
            <a href="#" class="menu-item submenu-trigger" data-submenu="productSubmenu">
                <i class="fas fa-box menu-icon"></i>
                <span class="menu-title">Product Features</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('products.*') ? 'show' : '' }}" id="productSubmenu">
                <a href="{{ route('products.list') }}"
                    class="menu-item {{ request()->routeIs('products.list') ? 'active' : '' }}">
                    <i class="fas fa-list menu-icon"></i>
                    <span class="menu-title">Product List</span>
                </a>
                <a href="{{ route('products.addFeature') }}"
                    class="menu-item {{ request()->routeIs('products.addFeature') ? 'active' : '' }}">
                    <i class="fas fa-plus menu-icon"></i>
                    <span class="menu-title">Add Feature</span>
                </a>
                <a href="{{ route('products.featureCategories') }}"
                    class="menu-item {{ request()->routeIs('products.featureCategories') ? 'active' : '' }}">
                    <i class="fas fa-tags menu-icon"></i>
                    <span class="menu-title">Feature Categories</span>
                </a>
            </div>

            <!-- SMS Center Submenu -->
            <a href="#" class="menu-item submenu-trigger" data-submenu="smsSubmenu">
                <i class="fas fa-sms menu-icon"></i>
                <span class="menu-title">SMS Center</span>
                <i class="fas fa-chevron-down menu-arrow"></i>
            </a>
            <div class="submenu {{ request()->routeIs('sms.*') ? 'show' : '' }}" id="smsSubmenu">
                <a href="{{ route('sms.feature') }}"
                    class="menu-item {{ request()->routeIs('sms.feature') ? 'active' : '' }}">
                    <i class="fas fa-comment-alt menu-icon"></i>
                    <span class="menu-title">SMS Feature</span>
                </a>
                <a href="{{ route('sms.brochure') }}"
                    class="menu-item {{ request()->routeIs('sms.brochure') ? 'active' : '' }}">
                    <i class="fas fa-newspaper menu-icon"></i>
                    <span class="menu-title">SMS Brochure</span>
                </a>
                <a href="{{ route('sms.templates') }}"
                    class="menu-item {{ request()->routeIs('sms.templates') ? 'active' : '' }}">
                    <i class="fas fa-file-alt menu-icon"></i>
                    <span class="menu-title">Templates</span>
                </a>
                <a href="{{ route('sms.sendBulk') }}"
                    class="menu-item {{ request()->routeIs('sms.sendBulk') ? 'active' : '' }}">
                    <i class="fas fa-paper-plane menu-icon"></i>
                    <span class="menu-title">Send Bulk SMS</span>
                </a>
            </div>
        </div>
    </nav>
</aside>

<script>
    // Enhanced submenu functionality
    document.addEventListener('DOMContentLoaded', function() {
        const submenuTriggers = document.querySelectorAll('.submenu-trigger');

        submenuTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const submenuId = this.getAttribute('data-submenu');
                const submenu = document.getElementById(submenuId);
                const arrow = this.querySelector('.menu-arrow');

                if (submenu) {
                    // Close other submenus in the same section
                    const parentSection = this.closest('.menu-section');
                    const otherSubmenus = parentSection.querySelectorAll('.submenu');
                    const otherArrows = parentSection.querySelectorAll('.menu-arrow');

                    otherSubmenus.forEach(otherSubmenu => {
                        if (otherSubmenu !== submenu) {
                            otherSubmenu.classList.remove('show');
                        }
                    });

                    otherArrows.forEach(otherArrow => {
                        if (otherArrow !== arrow) {
                            otherArrow.classList.remove('rotate');
                        }
                    });

                    // Toggle current submenu
                    submenu.classList.toggle('show');
                    arrow.classList.toggle('rotate');
                }
            });
        });

        // Mobile menu functionality
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.getElementById('sidebar');

        if (mobileMenuToggle && sidebar) {
            mobileMenuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 992 &&
                    !sidebar.contains(e.target) &&
                    !mobileMenuToggle.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            });
        }
    });
</script>

<style>
    /* Enhanced submenu styles */
    .menu-arrow {
        transition: transform 0.3s ease;
        margin-left: auto;
    }

    .menu-arrow.rotate {
        transform: rotate(180deg);
    }

    .submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .submenu.show {
        max-height: 500px;
    }

    /* Mobile responsive */
    @media (max-width: 992px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .sidebar.show {
            transform: translateX(0);
        }
    }

    /* Active state improvements */
    .menu-item.active {
        background-color: rgba(0, 126, 51, 0.1);
        color: var(--primary-color);
        font-weight: 600;
        border-left: 3px solid var(--primary-color);
    }
</style>
