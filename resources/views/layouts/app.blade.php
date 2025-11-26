<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ACCL Admin Dashboard — Classic Edition')</title>
    <link rel="icon" href="/images/accl logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #007E33;
            --secondary-color: #00a041;
            --accent-color: #FFC107;
            --light-color: #F8F9FA;
            --dark-color: #343a40;
            --sidebar-width: 250px;
            --header-height: 60px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: var(--dark-color);
        }

        /* Header Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            z-index: 1000;
        }

        /* Updated logo styles for image */
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Centers the image */
            padding: 10px 0;
        }

        .logo img {
            max-width: 180px;
            /* Adjust this width as needed */
            height: auto;
            display: block;
        }

        .page-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-left: 20px;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .search-container {
            position: relative;
            margin-right: 20px;
        }

        .search-input {
            width: 200px;
            padding: 6px 30px 6px 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .notification-icon {
            position: relative;
            margin-right: 20px;
            font-size: 1.1rem;
            color: var(--dark-color);
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.7rem;
        }

        .profile-dropdown {
            position: relative;
        }

        .profile-trigger {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .profile-trigger:hover {
            background-color: #f8f9fa;
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            margin-right: 8px;
        }

        .profile-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            min-width: 180px;
            background-color: white;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 4px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .175);
            margin-top: 5px;
            display: none;
            z-index: 1001;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 8px 16px;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            text-decoration: none;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .dropdown-item:hover {
            color: #16181b;
            text-decoration: none;
            background-color: #f8f9fa;
        }

        .dropdown-item i {
            margin-right: 8px;
            width: 16px;
            text-align: center;
            color: var(--primary-color);
        }

        .dropdown-divider {
            height: 0;
            margin: 0.5rem 0;
            overflow: hidden;
            border-top: 1px solid #e9ecef;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: var(--header-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--header-height));
            background-color: white;
            border-right: 1px solid #dee2e6;
            overflow-y: auto;
            z-index: 999;
        }

        .sidebar-menu {
            padding: 10px 0;
        }

        .menu-section {
            margin-bottom: 15px;
        }

        .section-title {
            padding: 8px 20px;
            font-size: 0.75rem;
            font-weight: 700;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: var(--dark-color);
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .menu-item:hover {
            background-color: #f8f9fa;
        }

        .menu-item.active {
            background-color: rgba(0, 126, 51, 0.1);
            color: var(--primary-color);
            font-weight: 600;
            border-left: 3px solid var(--primary-color);
        }

        .menu-icon {
            width: 20px;
            margin-right: 10px;
            text-align: center;
            color: var(--primary-color);
        }

        .menu-title {
            flex-grow: 1;
        }

        .menu-badge {
            background-color: var(--accent-color);
            color: white;
            border-radius: 10px;
            padding: 2px 6px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .menu-arrow {
            margin-left: 5px;
            font-size: 0.8rem;
            color: #6c757d;
        }

        .submenu {
            display: none;
            background-color: #f8f9fa;
        }

        .submenu.show {
            display: block;
        }

        .submenu .menu-item {
            padding-left: 50px;
            font-size: 0.9rem;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--header-height);
            padding: 20px;
        }

        /* Card Styles */
        .card {
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
            padding: 12px 20px;
            font-weight: 600;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            margin-bottom: 0;
            font-size: 1.1rem;
        }

        /* Dashboard Cards */
        .dashboard-card {
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
            padding: 20px;
            margin-bottom: 20px;
            background-color: white;
            transition: box-shadow 0.3s;
        }

        .dashboard-card:hover {
            box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(0, 0, 0, .23);
        }

        .dashboard-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .dashboard-card-title {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
        }

        .dashboard-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .dashboard-card-icon.blue {
            background-color: #007bff;
        }

        .dashboard-card-icon.green {
            background-color: #28a745;
        }

        .dashboard-card-icon.orange {
            background-color: #fd7e14;
        }

        .dashboard-card-icon.red {
            background-color: #dc3545;
        }

        .dashboard-card-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .dashboard-card-change {
            font-size: 0.85rem;
        }

        .dashboard-card-change.positive {
            color: #28a745;
        }

        .dashboard-card-change.negative {
            color: #dc3545;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            /* border: 1px solid transparent; */
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 4px;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            color: #fff;
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            color: #fff;
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-warning {
            color: #212529;
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .btn-warning:hover {
            color: #212529;
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        /* Form Styles */
        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: var(--primary-color);
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 126, 51, 0.25);
        }

        .form-label {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        /* Table Styles */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, 0.075);
        }

        /* Status Badge */
        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .badge-success {
            color: #fff;
            background-color: #28a745;
        }

        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }

        .badge-warning {
            color: #212529;
            background-color: var(--accent-color);
        }

        .badge-info {
            color: #fff;
            background-color: #17a2b8;
        }

        /* Modal Styles */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            display: none;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-dialog {
            max-width: 500px;
            margin: 1.75rem auto;
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 0.3rem;
            outline: 0;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1rem;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: calc(0.3rem - 1px);
            border-top-right-radius: calc(0.3rem - 1px);
        }

        .modal-title {
            margin-bottom: 0;
            line-height: 1.5;
        }

        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: 1rem;
        }

        .modal-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 1rem;
            border-top: 1px solid #dee2e6;
            border-bottom-right-radius: calc(0.3rem - 1px);
            border-bottom-left-radius: calc(0.3rem - 1px);
        }

        .btn-close {
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: 0.25em 0.25em;
            color: #000;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: 0.25rem;
            opacity: 0.5;
        }

        .btn-close:hover {
            color: #000;
            text-decoration: none;
            opacity: 0.75;
        }

        /* Chart Container */
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 20px;
        }

        /* Toast Notification */
        .toast-container {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1050;
        }

        .toast {
            position: relative;
            min-width: 250px;
            max-width: 350px;
            margin-bottom: 10px;
            background-color: rgba(255, 255, 255, 0.95);
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
            border-radius: 0.25rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .toast.show {
            opacity: 1;
        }

        .toast-header {
            display: flex;
            align-items: center;
            padding: 0.75rem 0.75rem;
            color: #6c757d;
            background-color: rgba(255, 255, 255, 0.85);
            background-clip: padding-box;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top-left-radius: calc(0.25rem - 1px);
            border-top-right-radius: calc(0.25rem - 1px);
        }

        .toast-body {
            padding: 0.75rem;
        }

        .toast-icon {
            margin-right: 10px;
        }

        .toast-success .toast-icon {
            color: #28a745;
        }

        .toast-error .toast-icon {
            color: #dc3545;
        }

        .toast-warning .toast-icon {
            color: var(--accent-color);
        }

        .toast-info .toast-icon {
            color: #17a2b8;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-toggle {
                display: block;
            }
        }

        @media (min-width: 993px) {
            .mobile-menu-toggle {
                display: none;
            }
        }

        .mobile-menu-toggle {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: var(--primary-color);
            cursor: pointer;
            margin-right: 10px;
        }

        /* Loading Spinner */
        .spinner-border {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border: 0.2em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spinner-border .75s linear infinite;
        }

        @keyframes spinner-border {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    @include('partials.navbar')
    @include('partials.sidebar')

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        @yield('content')
    </main>

    <!-- Toast Notification Container -->
    <div class="toast-container" id="toastContainer"></div>
    <!-- Modals -->
    @yield('modals')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.getElementById('sidebar');

        if (mobileToggle && sidebar) {
            mobileToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });
        }

        // Profile dropdown toggle
        const profileTrigger = document.getElementById('profileTrigger');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileTrigger && profileDropdown) {
            profileTrigger.addEventListener('click', function() {
                profileDropdown.classList.toggle('show');
            });
        }

        // Close dropdown when clicking outside
        if (profileTrigger && profileDropdown) {
            document.addEventListener('click', function(event) {
                if (!profileTrigger.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.remove('show');
                }
            });
        }

        // Submenu toggle
        function toggleSubmenu(submenuId) {
            const submenu = document.getElementById(submenuId);
            submenu.classList.toggle('show');
            // Close other submenus
            const allSubmenus = document.querySelectorAll('.submenu');
            allSubmenus.forEach(menu => {
                if (menu.id !== submenuId) {
                    menu.classList.remove('show');
                }
            });
        }
        // Module navigation - Removed JS navigation, relying on Laravel routes
        // Initialize DataTables
        function initializeDataTables() {
            // Initialize Recent Tickets Table
            if ($('#recentTicketsTable').length) {
                $('#recentTicketsTable').DataTable({
                    responsive: true,
                    pageLength: 5,
                    order: [
                        [7, 'desc']
                    ]
                });
            }
            // Initialize Farmer CRM Table
            if ($('#farmerCrmTable').length) {
                $('#farmerCrmTable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [
                        [7, 'desc']
                    ]
                });
            }
            // Initialize All Tickets Table
            if ($('#allTicketsTable').length) {
                $('#allTicketsTable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [
                        [7, 'desc']
                    ]
                });
            }
            // Initialize FAQ Table
            if ($('#faqTable').length) {
                $('#faqTable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [
                        [4, 'desc']
                    ]
                });
            }
        }
        // Initialize SMS Form
        function initializeSMSForm() {
            const recipientTypeRadios = document.querySelectorAll('input[name="recipientType"]');
            const categorySelect = document.getElementById('categorySelect');
            const districtSelect = document.getElementById('districtSelect');
            const customListUpload = document.getElementById('customListUpload');
            recipientTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Hide all options
                    categorySelect.style.display = 'none';
                    districtSelect.style.display = 'none';
                    customListUpload.style.display = 'none';
                    // Show selected option
                    if (this.value === 'category') {
                        categorySelect.style.display = 'block';
                    } else if (this.value === 'district') {
                        districtSelect.style.display = 'block';
                    } else if (this.value === 'custom') {
                        customListUpload.style.display = 'block';
                    }
                });
            });
            // Character counter for message
            const messageTextarea = document.getElementById('smsMessage');
            const messageCounter = document.querySelector('.form-text.text-muted');
            messageTextarea.addEventListener('input', function() {
                const length = this.value.length;
                messageCounter.textContent = `${length}/160 characters`;
                if (length > 160) {
                    messageCounter.style.color = '#dc3545';
                } else {
                    messageCounter.style.color = '#6c757d';
                }
            });
        }

        // Modal functions
        function showModal(modalId) {
            document.getElementById(modalId).classList.add('show');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
        }

        // View functions (Placeholder for Laravel routes)
        function viewTicket(ticketId) {
            // Example: window.location.href = '/tickets/' + ticketId;
            showToast(`Viewing ticket ${ticketId}`, 'info');
        }

        function editTicket(ticketId) {
            // Example: window.location.href = '/tickets/' + ticketId + '/edit';
            showToast(`Editing ticket ${ticketId}`, 'info');
        }

        function viewFarmer(farmerId) {
            // Example: window.location.href = '/farmers/' + farmerId;
            showToast(`Viewing farmer ${farmerId}`, 'info');
        }

        function editFarmer(farmerId) {
            // Example: window.location.href = '/farmers/' + farmerId + '/edit';
            showToast(`Editing farmer ${farmerId}`, 'info');
        }

        function deleteFarmer(farmerId) {
            if (confirm(`Are you sure you want to delete farmer ${farmerId}?`)) {
                // Example: Submit form to delete route
                showToast(`Farmer ${farmerId} deleted successfully`, 'success');
            }
        }

        function viewFaq(faqId) {
            // Example: window.location.href = '/faqs/' + faqId;
            showToast(`Viewing FAQ ${faqId}`, 'info');
        }

        function editFaq(faqId) {
            // Example: window.location.href = '/faqs/' + faqId + '/edit';
            showToast(`Editing FAQ ${faqId}`, 'info');
        }

        function deleteFaq(faqId) {
            if (confirm(`Are you sure you want to delete FAQ ${faqId}?`)) {
                // Example: Submit form to delete route
                showToast(`FAQ ${faqId} deleted successfully`, 'success');
            }
        }

        // Import functions
        function importFarmers() {
            showToast('Opening import dialog...', 'info');
        }
        // Mail configuration functions
        function resetMailConfig() {
            document.getElementById('mailConfigForm').reset();
            showToast('Mail configuration reset', 'info');
        }

        function testMailConfig() {
            showToast('Sending test email...', 'info');
            setTimeout(() => {
                showToast('Test email sent successfully', 'success');
            }, 1500);
        }
        // SMS form functions
        function resetSmsForm() {
            document.getElementById('bulkSmsForm').reset();
            document.getElementById('categorySelect').style.display = 'none';
            document.getElementById('districtSelect').style.display = 'none';
            document.getElementById('customListUpload').style.display = 'none';
            document.querySelector('.form-text.text-muted').textContent = '0/160 characters';
        }
        // Toast notification
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toastContainer');
            const toastId = 'toast-' + Date.now();
            const toastHtml = `
                <div id="${toastId}" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header toast-${type}">
                        <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : type === 'warning' ? 'fa-exclamation-triangle' : 'fa-info-circle'} toast-icon"></i>
                        <strong class="me-auto">ACCL Dashboard</strong>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `;
            toastContainer.insertAdjacentHTML('beforeend', toastHtml);
            const toastElement = document.getElementById(toastId);
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
            // Remove toast element after it's hidden
            toastElement.addEventListener('hidden.bs.toast', function() {
                toastElement.remove();
            });
        }

        // Form submissions - Removed inline handlers, rely on Laravel forms
        // Initialize charts when DOM is loaded
        // Initialize charts when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Customer Growth Chart
            const customerGrowthCtx = document.getElementById('customerGrowthChart');
            if (customerGrowthCtx) {
                new Chart(customerGrowthCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                        datasets: [{
                            label: 'Customers',
                            data: [6500, 6800, 7200, 7600, 7900, 8100, 8150, 8200,
                                8247
                            ], // Fixed: removed the extra bracket
                            borderColor: '#007E33',
                            backgroundColor: 'rgba(0, 126, 51, 0.1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#007E33',
                            pointRadius: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: false,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            // Ticket Status Chart
            const ticketStatusCtx = document.getElementById('ticketStatusChart');
            if (ticketStatusCtx) {
                new Chart(ticketStatusCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Open', 'In Progress', 'Resolved', 'Closed'],
                        datasets: [{
                            data: [42, 18, 65, 125], // Fixed: removed the extra bracket
                            backgroundColor: [
                                '#dc3545',
                                '#ffc107',
                                '#28a745',
                                '#6c757d'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'right'
                            }
                        }
                    }
                });
            }

            // Initialize DataTables for dashboard
            initializeDataTables();
        });
    </script>
    @stack('scripts')
</body>

</html>
