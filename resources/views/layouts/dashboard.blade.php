<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Include the main dashboard content here -->
    <div class="dashboard-container py-12"> <!-- Adding padding to account for fixed navbar if implemented separately -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- ====================== -->
            <!-- TOP NAVBAR (Can be a separate component if reused) -->
            <!-- ====================== -->
            <!-- For now, including directly or assume it's part of the layout/app.blade.php if fixed -->
            <!-- <nav class="navbar bg-white shadow-md mb-6"> ... </nav> -->

            <!-- ====================== -->
            <!-- SIDEBAR (Can be a separate component if reused) -->
            <!-- ====================== -->
            <!-- For now, including directly or assume it's part of the layout/app.blade.php if fixed -->
            <!-- <aside class="sidebar bg-white shadow-md w-64 min-h-screen"> ... </aside> -->

            <!-- Main Content Area -->
            <div class="main-content ml-0 lg:ml-64"> <!-- Adjust margin based on sidebar state -->
                <!-- Dashboard Header -->
                <div class="dashboard-header mb-8">
                    <h1 class="dashboard-title text-3xl font-bold text-gray-900">Dashboard Overview</h1>
                    <p class="dashboard-subtitle text-gray-600">Welcome back, John Doe. Here's what's happening today.</p>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Revenue Card -->
                    <div class="stat-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="stat-header flex justify-between items-start">
                            <div>
                                <div class="stat-value text-2xl font-bold text-gray-900">$45,231</div>
                                <div class="stat-label text-sm text-gray-500">Total Revenue</div>
                                <div class="stat-change positive flex items-center gap-1 text-green-600 text-sm font-medium mt-1">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>12.5% from last month</span>
                                </div>
                            </div>
                            <div class="stat-icon primary w-12 h-12 rounded-lg flex items-center justify-center text-white text-xl" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Users Card -->
                    <div class="stat-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="stat-header flex justify-between items-start">
                            <div>
                                <div class="stat-value text-2xl font-bold text-gray-900">2,543</div>
                                <div class="stat-label text-sm text-gray-500">Total Users</div>
                                <div class="stat-change positive flex items-center gap-1 text-green-600 text-sm font-medium mt-1">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>8.2% from last month</span>
                                </div>
                            </div>
                            <div class="stat-icon success w-12 h-12 rounded-lg flex items-center justify-center text-white text-xl" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Orders Card -->
                    <div class="stat-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="stat-header flex justify-between items-start">
                            <div>
                                <div class="stat-value text-2xl font-bold text-gray-900">1,234</div>
                                <div class="stat-label text-sm text-gray-500">Total Orders</div>
                                <div class="stat-change negative flex items-center gap-1 text-red-600 text-sm font-medium mt-1">
                                    <i class="fas fa-arrow-down"></i>
                                    <span>3.1% from last month</span>
                                </div>
                            </div>
                            <div class="stat-icon warning w-12 h-12 rounded-lg flex items-center justify-center text-white text-xl" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Conversion Rate Card -->
                    <div class="stat-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="stat-header flex justify-between items-start">
                            <div>
                                <div class="stat-value text-2xl font-bold text-gray-900">3.24%</div>
                                <div class="stat-label text-sm text-gray-500">Conversion Rate</div>
                                <div class="stat-change positive flex items-center gap-1 text-green-600 text-sm font-medium mt-1">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>5.4% from last month</span>
                                </div>
                            </div>
                            <div class="stat-icon danger w-12 h-12 rounded-lg flex items-center justify-center text-white text-xl" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="activity-section bg-white p-6 rounded-xl shadow-md">
                    <div class="section-header flex justify-between items-center mb-6">
                        <h3 class="section-title text-xl font-semibold text-gray-900">Recent Activity</h3>
                        <button class="btn btn-secondary bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                            <span>View All</span>
                        </button>
                    </div>
                    <table class="activity-table w-full border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-200">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-500">Transaction ID</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-500">Customer</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-500">Date</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-500">Amount</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-500">Status</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-500">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-4">#TRX001</td>
                                <td class="py-4 px-4">Sarah Johnson</td>
                                <td class="py-4 px-4">2024-01-15</td>
                                <td class="py-4 px-4">$1,234.00</td>
                                <td class="py-4 px-4"><span class="status-badge success inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800"><i class="fas fa-check text-[0.625rem]"></i> Completed</span></td>
                                <td class="py-4 px-4"><button class="btn btn-secondary bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-medium py-1 px-2 rounded transition-colors duration-200">View</button></td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-4">#TRX002</td>
                                <td class="py-4 px-4">Mike Chen</td>
                                <td class="py-4 px-4">2024-01-15</td>
                                <td class="py-4 px-4">$567.00</td>
                                <td class="py-4 px-4"><span class="status-badge warning inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800"><i class="fas fa-clock text-[0.625rem]"></i> Pending</span></td>
                                <td class="py-4 px-4"><button class="btn btn-secondary bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-medium py-1 px-2 rounded transition-colors duration-200">View</button></td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-4">#TRX003</td>
                                <td class="py-4 px-4">Emily Davis</td>
                                <td class="py-4 px-4">2024-01-14</td>
                                <td class="py-4 px-4">$2,345.00</td>
                                <td class="py-4 px-4"><span class="status-badge success inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800"><i class="fas fa-check text-[0.625rem]"></i> Completed</span></td>
                                <td class="py-4 px-4"><button class="btn btn-secondary bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-medium py-1 px-2 rounded transition-colors duration-200">View</button></td>
                            </tr>
                            <tr class="hover:bg-gray-50"> <!-- Removed border-b from last row -->
                                <td class="py-4 px-4">#TRX004</td>
                                <td class="py-4 px-4">Robert Wilson</td>
                                <td class="py-4 px-4">2024-01-14</td>
                                <td class="py-4 px-4">$890.00</td>
                                <td class="py-4 px-4"><span class="status-badge danger inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800"><i class="fas fa-times text-[0.625rem]"></i> Failed</span></td>
                                <td class="py-4 px-4"><button class="btn btn-secondary bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-medium py-1 px-2 rounded transition-colors duration-200">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the JavaScript logic here or in a separate file -->
    <script>
        // The JavaScript logic remains largely the same, adapted slightly for potential Blade context
        // Toggle Sidebar - Mobile menu functionality
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) { // Check if sidebar exists
                sidebar.classList.toggle('active');
            }
        }

        // Minimize/Maximize Sidebar
        function minimizeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const minimizeIcon = document.querySelector('.minimize-toggle i');
            if (sidebar && mainContent && minimizeIcon) { // Check if elements exist
                sidebar.classList.toggle('minimized');
                mainContent.classList.toggle('expanded');
                if (sidebar.classList.contains('minimized')) {
                    minimizeIcon.classList.remove('fa-angle-left');
                    minimizeIcon.classList.add('fa-angle-right');
                } else {
                    minimizeIcon.classList.remove('fa-angle-right');
                    minimizeIcon.classList.add('fa-angle-left');
                }
            }
        }

        // Toggle Filter Menu
        function toggleFilterMenu() {
            const filterMenu = document.getElementById('filterMenu');
            if (filterMenu) { // Check if filter menu exists
                filterMenu.classList.toggle('active');
            }
        }

        // Toggle User Menu
        function toggleUserMenu() {
            const userDropdown = document.getElementById('userDropdown');
            if (userDropdown) { // Check if user dropdown exists
                userDropdown.classList.toggle('active');
            }
        }

        // Toggle Theme (Light/Dark Mode) - Example using a class on body
        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.querySelector('.theme-toggle i');
            body.classList.toggle('dark-theme'); // Define .dark-theme in your CSS
            if (body.classList.contains('dark-theme')) {
                if (themeIcon) {
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                }
            } else {
                if (themeIcon) {
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                }
            }
        }

        // Change Role - Update sidebar visibility based on selected role
        function changeRole() {
            const roleSelector = document.getElementById('roleSelector');
            if (roleSelector) { // Check if role selector exists
                const selectedRole = roleSelector.value;
                // Hide all sections and items first
                document.querySelectorAll('.nav-section, .nav-item').forEach(element => {
                    element.style.display = 'none';
                });
                // Show sections and items based on selected role
                document.querySelectorAll(`[data-role*="${selectedRole}"]`).forEach(element => {
                    element.style.display = 'block';
                });
                console.log(`Role changed to: ${selectedRole}`);
            }
        }

        // Active Navigation Link - Highlight current page
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Filter Menu Items - Click handlers
        document.querySelectorAll('.filter-item').forEach(item => {
            item.addEventListener('click', function() {
                const filterText = this.textContent;
                console.log(`Filter selected: ${filterText}`);
                const filterMenu = document.getElementById('filterMenu');
                if (filterMenu) {
                    filterMenu.classList.remove('active');
                }
            });
        });

        // User Dropdown Items - Click handlers
        document.querySelectorAll('.user-dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.querySelector('span').textContent;
                console.log(`User action: ${action}`);
                const userDropdown = document.getElementById('userDropdown');
                if (userDropdown) {
                    userDropdown.classList.remove('active');
                }
            });
        });

        // Search Functionality - Live search
        const searchInput = document.querySelector('.search-bar input');
        if (searchInput) { // Check if search input exists
            searchInput.addEventListener('input', function(e) {
                console.log('Searching for:', e.target.value);
            });
        }

        // Notification Bell - Click handler
        const notificationBell = document.querySelector('.notification-bell');
        if (notificationBell) { // Check if notification bell exists
            notificationBell.addEventListener('click', function() {
                console.log('Opening notifications panel');
            });
        }

        // CRM Button - Click handler
        const crmButton = document.querySelector('.crm-button');
        if (crmButton) { // Check if CRM button exists
            crmButton.addEventListener('click', function() {
                console.log('Opening CRM');
            });
        }

        // Table View Buttons - Click handlers
        document.querySelectorAll('.activity-table button').forEach(button => {
            button.addEventListener('click', function() {
                const transactionId = this.closest('tr').querySelector('td').textContent;
                console.log('Viewing transaction:', transactionId);
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            // Close filter menu
            const filterDropdown = document.querySelector('.filter-dropdown');
            const filterMenu = document.getElementById('filterMenu');
            if (filterDropdown && filterMenu && !filterDropdown.contains(e.target) && filterMenu.classList.contains('active')) {
                filterMenu.classList.remove('active');
            }
            // Close user dropdown
            const userMenu = document.querySelector('.user-menu');
            const userDropdown = document.getElementById('userDropdown');
            if (userMenu && userDropdown && !userMenu.contains(e.target) && userDropdown.classList.contains('active')) {
                userDropdown.classList.remove('active');
            }
            // Close mobile sidebar
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            if (sidebar && sidebarToggle && window.innerWidth <= 768 &&
                !sidebar.contains(e.target) &&
                !sidebarToggle.contains(e.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Window Resize Handler - Adjust layout on resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar && window.innerWidth > 768) {
                sidebar.classList.remove('active');
            }
        });

        // Initialize Dashboard - Run on page load
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Dashboard initialized');
            // Set initial role-based visibility
            changeRole(); // Call changeRole if role selector exists
            // Simulate loading data
            setTimeout(() => {
                console.log('Dashboard data loaded');
            }, 1000);
        });
    </script>

</x-app-layout>