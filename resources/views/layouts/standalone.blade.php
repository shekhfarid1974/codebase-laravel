<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Common CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
    <style>
        :root {
            --primary: #0066cc;
            --primary-dark: #0052a3;
            --success: #28a745;
            --danger: #dc3545;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --gray-900: #212529;
            --shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            --border-radius: 4px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f5f7fa;
            color: var(--gray-800);
            line-height: 1.5;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .header {
            background: white;
            border-bottom: 1px solid var(--gray-300);
            padding: 15px 0;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 22px;
            font-weight: 600;
            color: var(--gray-900);
            margin: 0;
        }

        .agent-info {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--gray-100);
            padding: 6px 12px;
            border-radius: var(--border-radius);
            font-size: 14px;
        }

        .agent-info i {
            color: var(--primary);
        }

        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: 20px;
            overflow: hidden;
            border: 1px solid var(--gray-200);
        }

        .card-header {
            background: white;
            padding: 15px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-800);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-body {
            padding: 15px;
        }

        .category-tabs {
            display: flex;
            gap: 5px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--gray-200);
            padding-bottom: 10px;
            flex-wrap: wrap;
        }

        .category-tab {
            padding: 8px 15px;
            background: transparent;
            border: 1px solid var(--gray-300);
            border-radius: var(--border-radius);
            color: var(--gray-700);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
        }

        .category-tab:hover {
            background: var(--gray-100);
        }

        .category-tab.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 5px;
            font-size: 14px;
        }

        .required::after {
            content: " *";
            color: var(--danger);
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--gray-400);
            border-radius: var(--border-radius);
            font-size: 14px;
            transition: border-color 0.2s;
            min-height: 42px;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .form-control[readonly] {
            background-color: var(--gray-100);
            color: var(--gray-600);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 70px;
            padding-top: 8px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 15px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: var(--border-radius);
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--gray-200);
        }

        .table th {
            background: var(--gray-100);
            font-weight: 600;
            color: var(--gray-700);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody tr:hover {
            background: rgba(0, 102, 204, 0.05);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .action-btn {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-size: 16px;
            padding: 4px 8px;
            border-radius: var(--border-radius);
            transition: background-color 0.2s;
        }

        .action-btn:hover {
            background-color: rgba(0, 102, 204, 0.1);
        }

        .search-box {
            position: relative;
            width: 220px;
        }

        .search-box input {
            padding-left: 32px;
            height: 36px;
            font-size: 14px;
            border-radius: var(--border-radius);
            border: 1px solid var(--gray-400);
            transition: all 0.3s ease;
            width: 100%;
        }

        .search-box i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-600);
            font-size: 14px;
            z-index: 1;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(0, 102, 204, 0.25);
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            color: var(--gray-600);
            font-size: 13px;
        }

        .footer a {
            color: var(--primary);
            text-decoration: none;
        }

        /* Select2 Customization */
        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            height: 42px;
            border: 1px solid var(--gray-400);
            border-radius: var(--border-radius);
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-left: 12px;
            line-height: 40px;
            font-size: 14px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }

        .select2-container--default .select2-selection--multiple {
            height: auto;
            min-height: 42px;
            border: 1px solid var(--gray-400);
            border-radius: var(--border-radius);
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding: 2px 8px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 3px;
            padding: 2px 6px;
            margin: 3px 3px 3px 0;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
            margin-right: 4px;
        }

        .select2-container--focus .select2-selection {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        /* Loader */
        #topbar-loader {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: var(--primary);
            width: 0%;
            z-index: 9999;
            transition: width 0.3s ease;
        }

        /* Form Validation */
        .is-invalid {
            border-color: var(--danger) !important;
        }

        .invalid-feedback {
            color: var(--danger);
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }

        /* Alert Styles */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            padding: 12px 16px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert .btn-close {
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
            margin-left: auto;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .category-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
            }

            .search-box {
                width: 100%;
                margin-top: 10px;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        .d-none {
            display: none !important;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div id="topbar-loader" class="d-none"></div>

    <div class="container">
        @yield('content')
    </div>

    <!-- Common Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    @stack('scripts')
</body>
</html>