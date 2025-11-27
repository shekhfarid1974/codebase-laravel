<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <img src="/images/accl logo English.png" alt="AUTO CROP CARE LIMITED" width="180" height="60">
        </div>
        <button class="sidebar-toggle" id="sidebarToggleClose">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <nav class="sidebar-menu">
        <div class="menu-section">
            <div class="section-title">Main</div>
            <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
            @can('view settings')
                <a href="{{ route('mail.configure') }}"
                    class="menu-item {{ request()->routeIs('mail.configure') ? 'active' : '' }}">
                    <i class="fas fa-envelope menu-icon"></i>
                    <span class="menu-title">Mail Configure</span>
                </a>
            @endcan
        </div>

        @can('view crm')
            <div class="menu-section">
                <div class="section-title">CRM FORMS</div>

                @can('view crm')
                    <a href="#" class="menu-item submenu-trigger" data-submenu="crmFormSubmenu">
                        <i class="fas fa-user-plus menu-icon"></i>
                        <span class="menu-title">Inbound</span>
                        <i class="fas fa-chevron-down menu-arrow"></i>
                    </a>
                    <div class="submenu {{ request()->routeIs('crm.*') ? 'show' : '' }}" id="crmFormSubmenu">
                        @can('create crm')
                            <a target="_blank" href="{{ route('crmform.create') }}"
                                class="menu-item {{ request()->is('crm/form/inbound') ? 'active' : '' }}">
                                <i class="fas fa-phone-volume menu-icon"></i>
                                <span class="menu-title">Inbound</span>
                            </a>
                        @endcan
                    </div>
                @endcan

                @can('create crm')
                    <a href="#" class="menu-item submenu-trigger" data-submenu="outboundFormSubmenu">
                        <i class="fas fa-user-plus menu-icon"></i>
                        <span class="menu-title">Outbound</span>
                        <i class="fas fa-chevron-down menu-arrow"></i>
                    </a>
                    <div class="submenu {{ request()->routeIs('outbound.*') ? 'show' : '' }}" id="outboundFormSubmenu">
                        <a target="_blank" href="{{ route('outbound.form.type', ['type' => 'navara-campaign']) }}"
                            class="menu-item {{ request()->is('outbound/form/navara-campaign') ? 'active' : '' }}">
                            <i class="fas fa-phone menu-icon"></i>
                            <span class="menu-title">Navara Campaign</span>
                        </a>
                        <a target="_blank" href="{{ route('outbound.form.type', ['type' => 'general-survey']) }}"
                            class="menu-item {{ request()->is('outbound/form/general-survey') ? 'active' : '' }}">
                            <i class="fas fa-phone menu-icon"></i>
                            <span class="menu-title">General Survey</span>
                        </a>
                        <a target="_blank" href="{{ route('outbound.form.type', ['type' => 'meeting-feedback']) }}"
                            class="menu-item {{ request()->is('outbound/form/meeting-feedback') ? 'active' : '' }}">
                            <i class="fas fa-phone menu-icon"></i>
                            <span class="menu-title">Meeting Feedback</span>
                        </a>
                    </div>
                @endcan
            </div>
        @endcan

        @can('view reports')
            <div class="menu-section">
                <div class="section-title">Operations</div>

                @can('view reports')
                    <a href="#" class="menu-item submenu-trigger" data-submenu="inboundreportsSubmenu">
                        <i class="fas fa-chart-bar menu-icon"></i>
                        <span class="menu-title">Inbound Reports</span>
                        <i class="fas fa-chevron-down menu-arrow"></i>
                    </a>
                    <div class="submenu {{ request()->routeIs('inbound_reports.*') ? 'show' : '' }}"
                        id="inboundreportsSubmenu">
                        <a href="{{ route('inbound_reports.farmer') }}"
                            class="menu-item {{ request()->routeIs('inbound_reports.farmer') ? 'active' : '' }}">
                            <i class="fas fa-users-cog menu-icon"></i>
                            <span class="menu-title">Farmer Reports</span>
                        </a>
                        <a href="{{ route('inbound_reports.retailer') }}"
                            class="menu-item {{ request()->routeIs('inbound_reports.retailer') ? 'active' : '' }}">
                            <i class="fas fa-users-cog menu-icon"></i>
                            <span class="menu-title">Retailer Reports</span>
                        </a>
                        <a href="{{ route('inbound_reports.dealer') }}"
                            class="menu-item {{ request()->routeIs('inbound_reports.dealer') ? 'active' : '' }}">
                            <i class="fas fa-users-cog menu-icon"></i>
                            <span class="menu-title">Dealer Reports</span>
                        </a>
                        <a href="{{ route('inbound_reports.others') }}"
                            class="menu-item {{ request()->routeIs('inbound_reports.others') ? 'active' : '' }}">
                            <i class="fas fa-users-cog menu-icon"></i>
                            <span class="menu-title">Others Reports</span>
                        </a>
                    </div>
                @endcan

                @can('view reports')
                    <a href="#" class="menu-item submenu-trigger" data-submenu="outboundreportsSubmenu">
                        <i class="fas fa-chart-bar menu-icon"></i>
                        <span class="menu-title">Outbound Reports</span>
                        <i class="fas fa-chevron-down menu-arrow"></i>
                    </a>
                    <div class="submenu {{ request()->routeIs('outbound_reports.*') ? 'show' : '' }}"
                        id="outboundreportsSubmenu">
                        <a href="{{ route('outbound_reports.questionnaire') }}"
                            class="menu-item {{ request()->routeIs('outbound_reports.questionnaire') ? 'active' : '' }}">
                            <i class="fas fa-bullhorn menu-icon"></i>
                            <span class="menu-title">Questionnaire</span>
                        </a>
                        <a href="{{ route('outbound_reports.general-survey.form') }}"
                            class="menu-item {{ request()->routeIs('outbound_reports.general-survey.form') ? 'active' : '' }}">
                            <i class="fas fa-clipboard-check menu-icon"></i>
                            <span class="menu-title">General Survey</span>
                        </a>
                        <a href="{{ route('outbound_reports.feedback-survey') }}"
                            class="menu-item {{ request()->routeIs('outbound_reports.feedback-survey') ? 'active' : '' }}">
                            <i class="fas fa-comment-dots menu-icon"></i>
                            <span class="menu-title">Feedback Survey</span>
                        </a>
                    </div>
                @endcan
            </div>
        @endcan

        {{-- @can('view tickets')
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
                @can('create tickets')
                    <a href="{{ route('tickets.create') }}"
                        class="menu-item {{ request()->routeIs('tickets.create') ? 'active' : '' }}">
                        <i class="fas fa-plus menu-icon"></i>
                        <span class="menu-title">Create New</span>
                    </a>
                @endcan
                <a href="{{ route('tickets.resolved') }}"
                    class="menu-item {{ request()->routeIs('tickets.resolved') ? 'active' : '' }}">
                    <i class="fas fa-history menu-icon"></i>
                    <span class="menu-title">Resolved History</span>
                </a>
            </div>
        @endcan --}}

        @can('view leads')
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
        @endcan

        @can('view faqs')
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
                @can('create faqs')
                    <a href="{{ route('faqs.add') }}"
                        class="menu-item {{ request()->routeIs('faqs.add') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle menu-icon"></i>
                        <span class="menu-title">Add FAQ</span>
                    </a>
                @endcan
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
                    class="menu-item {{ request()->routeIs('faqs.identifications') ? 'active' : '' }}">
                    <i class="fas fa-fingerprint menu-icon"></i>
                    <span class="menu-title">Identification</span>
                </a>
            </div>
        @endcan

        @can('view products')
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
                @can('create products')
                    <a href="{{ route('products.addProduct') }}"
                        class="menu-item {{ request()->routeIs('products.addProduct') ? 'active' : '' }}">
                        <i class="fas fa-plus menu-icon"></i>
                        <span class="menu-title">Add Product</span>
                    </a>
                @endcan
                <a href="{{ route('products.addCategory') }}"
                    class="menu-item {{ request()->routeIs('products.addCategory') ? 'active' : '' }}">
                    <i class="fas fa-tags menu-icon"></i>
                    <span class="menu-title">Add Categories</span>
                </a>
            </div>
        @endcan

        {{-- @can('view sms')
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
                @can('create sms')
                    <a href="{{ route('sms.sendBulk') }}"
                        class="menu-item {{ request()->routeIs('sms.sendBulk') ? 'active' : '' }}">
                        <i class="fas fa-paper-plane menu-icon"></i>
                        <span class="menu-title">Send Bulk SMS</span>
                    </a>
                @endcan
            </div>
        @endcan --}}

        @can('view users')
            <div class="menu-section">
                <div class="section-title">Admin</div>
                <a href="{{ route('users.index') }}"
                    class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="fas fa-users menu-icon"></i>
                    <span class="menu-title">User Management</span>
                </a>
            </div>
        @endcan
    </nav>
</aside>


<style>
    /* Sidebar Styles */
    .sidebar {
        width: 260px;
        background: #fff;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        overflow-y: auto;
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid #eee;
        background: #f8f9fa;
    }

    .sidebar-header .logo,
    .sidebar .logo {
        /* Adjust selector to match your HTML */
        display: flex;
        align-items: center;
        justify-content: center;
        /* Centers the image */
        padding: 10px 0;
    }

    .sidebar-header .logo img,
    .sidebar .logo img {
        /* Target the image */
        max-width: 180px;
        /* Adjust as needed */
        height: auto;
        display: block;
    }

    .sidebar-toggle {
        background: none;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
        color: #666;
        padding: 5px;
        border-radius: 4px;
        display: none;
    }

    .sidebar-toggle:hover {
        background: #f0f0f0;
        color: #007E33;
    }

    .sidebar-menu {
        padding: 15px 0;
    }

    .menu-section {
        margin-bottom: 15px;
    }

    .section-title {
        padding: 8px 20px;
        font-size: 0.8rem;
        text-transform: uppercase;
        color: #666;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        color: #333;
        text-decoration: none;
        transition: all 0.2s;
        font-size: 0.9rem;
        position: relative;
    }

    .menu-item:hover {
        background: #f8f9fa;
        color: #007E33;
    }

    .menu-item.active {
        background: rgba(0, 126, 51, 0.1);
        color: #007E33;
        font-weight: 600;
        border-left: 3px solid #007E33;
    }

    .menu-icon {
        width: 20px;
        margin-right: 10px;
        text-align: center;
        color: #666;
    }

    .menu-item.active .menu-icon {
        color: #007E33;
    }

    .menu-title {
        flex: 1;
    }

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
        background: #fafafa;
    }

    .submenu.show {
        max-height: 500px;
    }

    .submenu .menu-item {
        padding-left: 45px;
        font-size: 0.85rem;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .sidebar {
            transform: translateX(-100%);
            width: 260px;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar-toggle {
            display: block;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarToggleClose = document.getElementById('sidebarToggleClose');
        const submenuTriggers = document.querySelectorAll('.submenu-trigger');

        // Submenu functionality
        submenuTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const submenuId = this.getAttribute('data-submenu');
                const submenu = document.getElementById(submenuId);
                const arrow = this.querySelector('.menu-arrow');

                if (submenu) {
                    // Close other submenus - FIXED: Check if parent section exists
                    const parentSection = this.closest('.menu-section');

                    if (parentSection) {
                        // If inside a menu section, only close submenus in that section
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
                    } else {
                        // If not inside a menu section, close all other submenus
                        const allSubmenus = document.querySelectorAll('.submenu');
                        const allArrows = document.querySelectorAll('.menu-arrow');

                        allSubmenus.forEach(otherSubmenu => {
                            if (otherSubmenu !== submenu) {
                                otherSubmenu.classList.remove('show');
                            }
                        });

                        allArrows.forEach(otherArrow => {
                            if (otherArrow !== arrow && otherArrow !== arrow) {
                                otherArrow.classList.remove('rotate');
                            }
                        });
                    }

                    // Toggle current submenu
                    submenu.classList.toggle('show');
                    if (arrow) {
                        arrow.classList.toggle('rotate');
                    }
                }
            });
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 992 && sidebar.classList.contains('active')) {
                if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });

        // Toggle sidebar open/close
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.add('active');
            });
        }

        if (sidebarToggleClose) {
            sidebarToggleClose.addEventListener('click', function() {
                sidebar.classList.remove('active');
            });
        }
    });
</script>
