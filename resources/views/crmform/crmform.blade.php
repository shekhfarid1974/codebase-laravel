@extends('layouts.standalone')
@section('title', $title)
@push('styles')
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

        /* Product List Styles */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .product-card {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            background: var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid var(--gray-200);
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .product-image .placeholder {
            color: var(--gray-500);
            font-size: 48px;
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 8px;
        }

        .product-category {
            font-size: 12px;
            color: var(--gray-600);
            background: var(--gray-100);
            padding: 2px 8px;
            border-radius: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 14px;
            color: var(--gray-600);
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .product-price {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .product-actions {
            display: flex;
            gap: 8px;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
            padding: 6px 12px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-size: 13px;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        .website-link {
            text-align: center;
            padding: 20px;
            background: var(--gray-100);
            border-radius: var(--border-radius);
            margin: 20px;
        }

        .website-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        .website-link a:hover {
            text-decoration: underline;
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

            .product-grid {
                grid-template-columns: 1fr;
                padding: 10px;
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
@endpush

@section('content')
    <div id="topbar-loader" class="d-none"></div>

    <div class="container">
        <!-- Customer Form Card -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-user-plus"></i>
                    <span>Customer Information</span>
                </h2>

                <div class="agent-info">
                    <i class="fas fa-user-tie"></i>
                    @if (!empty($agent))
                        <span>Agent: {{ $agent }}</span>
                    @endif
                </div>
            </div>

            <div class="card-body">
                <form method="POST" id="store_or_update_form">
                    @csrf
                    <input type="hidden" name="agent" value="{{ $agent ?? 'Default' }}">
                    <input type="hidden" name="customer_category" id="customer_category" value="Farmer">

                    <!-- Category Tabs -->
                    <div class="category-tabs" role="tablist">
                        <button type="button" class="category-tab active" role="tab" aria-selected="true"
                            aria-controls="dynamic_fields" data-category="Farmer">
                            <i class="fas fa-tractor"></i> Farmer
                        </button>
                        <button type="button" class="category-tab" role="tab" aria-selected="false"
                            aria-controls="dynamic_fields" data-category="Retailer">
                            <i class="fas fa-shopping-cart"></i> Retailer
                        </button>
                        <button type="button" class="category-tab" role="tab" aria-selected="false"
                            aria-controls="dynamic_fields" data-category="Dealer">
                            <i class="fas fa-store"></i> Dealer
                        </button>
                        <button type="button" class="category-tab" role="tab" aria-selected="false"
                            aria-controls="dynamic_fields" data-category="Others">
                            <i class="fas fa-ellipsis-h"></i> Others
                        </button>
                    </div>

                    <!-- Dynamic Fields Container -->
                    <div id="dynamic_fields" class="category-fields" role="tabpanel">
                        <!-- Fields will be loaded here dynamically -->
                    </div>
                </form>
            </div>
        </div>

        <!-- Interaction History Card -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-history"></i>
                    Interaction History
                </h2>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table" id="data-datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Problem</th>
                                <th>Solution</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded by DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Knowledge Base Card -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-book"></i>
                    <span id="knowledge-base-title">Knowledge Base FAQ</span>
                </h2>
            </div>
            <div class="card-body p-0">
                <!-- FAQ Table (for Farmer and Others) -->
                <div id="faq-section">
                    <div class="table-responsive">
                        <table class="table" id="faq-datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Question</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be loaded by DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Product List (for Retailer and Dealer) -->
                <div id="product-section" class="d-none">
                    <!-- Website Link -->
                    <div class="website-link">
                        <p>For complete product catalog and details, visit our official website:</p>
                        <a href="https://www.autocropcare.com/" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-external-link-alt"></i>
                            https://www.autocropcare.com/
                        </a>
                    </div>

                    <!-- Product Grid -->
                    <div class="product-grid" id="product-grid">
                        <!-- Products will be loaded here dynamically -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; {{ date('Y') }} All rights reserved | Developed by Shekh Farid
                <a href="https://myolbd.com" target="_blank">My Outsourcing Ltd</a>
            </p>
        </footer>
    </div>
@endsection

@push('scripts')
    <!-- jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Then Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        (function($) {
            'use strict';

            // Configuration object
            const CONFIG = {
                categoryFields: {
                    Farmer: {
                        customerId: 'FMR - 001',
                        fields: [
                            {
                                type: 'text',
                                name: 'name',
                                label: 'Name',
                                placeholder: 'Enter full name',
                                value: 'Farid Test',
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'phone_number',
                                label: 'Mobile Number',
                                readonly: true,
                                value: '{{ $phone_number ?? '' }}',
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'own_number',
                                label: 'Phone Number Own',
                                options: ['Yes', 'No'],
                                optionLabels: ['Yes', 'No'],
                                value: 'No',
                                required: false,
                                select2Hide: true
                            },
                            {
                                type: 'text',
                                name: 'alt_number',
                                label: 'Alternative Contact Number',
                                placeholder: 'Enter alternative contact number',
                                value: '',
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'gender',
                                label: 'Gender',
                                options: ['', 'male', 'female'],
                                optionLabels: ['Select Gender', 'Male', 'Female'],
                                required: true,
                                select2Hide: true
                            },
                            {
                                type: 'select',
                                name: 'district_id',
                                label: 'District',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select District', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'upazila_id',
                                label: 'Upazila',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select Upazila', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'union_id',
                                label: 'Union',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select Union', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'village',
                                label: 'Village',
                                placeholder: 'Enter village name',
                                required: true
                            },
                            {
                                type: 'select-multiple',
                                name: 'targeted_crop[]',
                                label: 'Targeted Crop',
                                options: ['Rice', 'Maize', 'Onion', 'Brinjal'],
                                required: false
                            },
                            {
                                type: 'text',
                                name: 'land_size',
                                label: 'Land Size (Decimal)',
                                placeholder: 'Land size in decimals',
                                required: false
                            },
                            {
                                type: 'select-multiple',
                                name: 'product_interest[]',
                                label: 'Products Interests',
                                options: ['Insecticide', 'Fungicide', 'Herbicide', 'Others'],
                                required: false
                            },
                            {
                                type: 'textarea',
                                name: 'q_type',
                                label: 'Problem/Query',
                                placeholder: 'Describe the problem',
                                rows: 2,
                                required: false
                            },
                            {
                                type: 'textarea',
                                name: 'verbatim',
                                label: 'Additional Details',
                                placeholder: 'Customer Provided notes or other crop info',
                                rows: 2,
                                required: false
                            },
                            {
                                type: 'select-multiple',
                                name: 'product_solution[]',
                                label: 'Recommended Products',
                                options: ['Fertilizer A', 'Pesticide B', 'Herbicide C', 'Seed D',
                                    'Equipment E'
                                ],
                                required: false
                            },
                            {
                                type: 'textarea',
                                name: 'product_solution_text',
                                label: 'Solution Details',
                                placeholder: 'Detailed solution information',
                                rows: 2,
                                required: false
                            },
                            {
                                type: 'select',
                                name: 'lead_status[]',
                                label: 'Lead Status',
                                options: ['Regular', 'Irregular'],
                                optionLabels: ['Regular', 'Irregular'],
                                required: false
                            },
                            {
                                type: 'select-multiple',
                                name: 'lead_source[]',
                                label: 'Lead Source',
                                options: ['Farmer Meeting', 'IFS', 'Website', 'DAE', 'Trade', 'Call Center'],
                                required: false
                            },
                            {
                                type: 'select',
                                name: 'existing_customer',
                                label: 'User of ACCL Product',
                                options: ['Yes', 'No'],
                                optionLabels: ['Yes', 'No'],
                                value: 'No',
                                required: false,
                                select2Hide: true
                            },
                        ]
                    },
                    Retailer: {
                        customerId: 'RTL - 001',
                        fields: [
                            {
                                type: 'text',
                                name: 'retailer_name',
                                label: 'Retailer Name',
                                placeholder: 'Enter retailer name',
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'phone_number',
                                label: 'Mobile Number',
                                readonly: true,
                                value: '{{ $phone_number ?? '' }}',
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'alt_number',
                                label: 'Alternative Contact Number',
                                placeholder: 'Enter alternative contact number',
                                value: '',
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'gender',
                                label: 'Gender',
                                options: ['', 'male', 'female'],
                                optionLabels: ['Select Gender', 'Male', 'Female'],
                                required: true,
                                select2Hide: true
                            },
                            {
                                type: 'select',
                                name: 'district_id',
                                label: 'District',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select District', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: false
                            },
                            {
                                type: 'select',
                                name: 'upazila_id',
                                label: 'Upazila',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select Upazila', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: false
                            },
                            {
                                type: 'select',
                                name: 'union_id',
                                label: 'Union',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select Union', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'village',
                                label: 'Village',
                                placeholder: 'Enter village name',
                                required: true
                            },
                            {
                                type: 'select-multiple',
                                name: 'interested_query',
                                label: 'Retailer Interests',
                                placeholder: 'Retailer\'s interests',
                                rows: 2,
                                options: ['New retailer accquisition', 'Dealer Information',
                                    'Officer Information', 'Complain', 'Offers',
                                ],
                                required: false
                            },
                            {
                                type: 'textarea',
                                name: 'verbatim',
                                label: 'Additional Details',
                                placeholder: 'Any additional information',
                                rows: 2,
                                required: false
                            },
                        ]
                    },
                    Dealer: {
                        customerId: 'DLR - 001',
                        fields: [
                            {
                                type: 'text',
                                name: 'dealer_name',
                                label: 'Dealer Name',
                                placeholder: 'Enter dealer name',
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'phone_number',
                                label: 'Mobile Number',
                                readonly: true,
                                value: '{{ $phone_number ?? '' }}',
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'alt_number',
                                label: 'Alternative Contact Number',
                                placeholder: 'Enter alternative contact number',
                                value: '',
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'gender',
                                label: 'Gender',
                                options: ['', 'male', 'female'],
                                optionLabels: ['Select Gender', 'Male', 'Female'],
                                required: true,
                                select2Hide: true
                            },
                            {
                                type: 'select',
                                name: 'district_id',
                                label: 'District',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select District', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: false
                            },
                            {
                                type: 'select',
                                name: 'upazila_id',
                                label: 'Upazila',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select Upazila', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'union_id',
                                label: 'Union',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select Union', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'village',
                                label: 'Village',
                                placeholder: 'Enter village name',
                                required: true
                            },
                            {
                                type: 'select-multiple',
                                name: 'interested_query',
                                label: 'Dealer Interests',
                                placeholder: 'Dealer\'s interests',
                                options: ['New dealership', 'Credit Limit', 'Product Information',
                                    'Officer Information', 'Complain', 'Offers',
                                ],
                                required: false
                            },
                            {
                                type: 'textarea',
                                name: 'recommendate',
                                label: 'Recommended',
                                placeholder: 'Enter suggested product/solution',
                                rows: 2,
                                required: false
                            },
                            {
                                type: 'textarea',
                                name: 'verbatim',
                                label: 'Additional Details',
                                placeholder: 'Any additional information',
                                rows: 2,
                                required: false
                            },
                        ]
                    },
                    Others: {
                        customerId: 'OTH - 001',
                        fields: [
                            {
                                type: 'text',
                                name: 'name',
                                label: 'Name',
                                placeholder: 'Enter full name',
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'phone_number',
                                label: 'Mobile Number',
                                readonly: true,
                                value: '{{ $phone_number ?? '' }}',
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'gender',
                                label: 'Gender',
                                options: ['', 'male', 'female'],
                                optionLabels: ['Select Gender', 'Male', 'Female'],
                                required: true,
                                select2Hide: true
                            },
                            {
                                type: 'select',
                                name: 'district_id',
                                label: 'District',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select District', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: false
                            },
                            {
                                type: 'select',
                                name: 'upazila_id',
                                label: 'Upazila',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select Upazila', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: true
                            },
                            {
                                type: 'select',
                                name: 'union_id',
                                label: 'Union',
                                options: ['', '1', '2', '3', '4', '5', '6', '7', '8'],
                                optionLabels: ['Select Union', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna',
                                    'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh'
                                ],
                                required: true
                            },
                            {
                                type: 'text',
                                name: 'village',
                                label: 'Village',
                                placeholder: 'Enter village name',
                                required: true
                            },
                            {
                                type: 'select-multiple',
                                name: 'interested_query',
                                label: 'Others Interests',
                                placeholder: 'Dealer\'s interests',
                                options: ['Product', 'Officer Information', 'Disease', 'Complain'],
                                required: false
                            },
                            {
                                type: 'textarea',
                                name: 'verbatim',
                                label: 'Additional Details',
                                placeholder: 'Any additional information',
                                rows: 2,
                                required: false
                            },
                            {
                                type: 'select',
                                name: 'customer_type',
                                label: 'Customer Type',
                                options: ['', 'SAAO', 'Scientific Officer', 'NGO'],
                                optionLabels: ['Select Customer Type', 'SAAO', 'Scientific Officer',
                                    'NGO'
                                ],
                                required: false
                            },
                        ]
                    }
                },
                products: {
                    Retailer: [
                        {
                            id: 1,
                            name: 'Crop Protection Insecticide',
                            category: 'Insecticide',
                            description: 'Advanced formula for comprehensive crop protection against various insects.',
                            price: '৳ 1,250',
                            image: null
                        },
                        {
                            id: 2,
                            name: 'Fungicide Pro Max',
                            category: 'Fungicide',
                            description: 'Effective fungal disease control for multiple crops with long-lasting protection.',
                            price: '৳ 980',
                            image: null
                        },
                        {
                            id: 3,
                            name: 'Weed Master Herbicide',
                            category: 'Herbicide',
                            description: 'Broad-spectrum weed control solution for clean and healthy crops.',
                            price: '৳ 1,150',
                            image: null
                        },
                        {
                            id: 4,
                            name: 'Growth Booster Fertilizer',
                            category: 'Fertilizer',
                            description: 'Organic growth enhancer for improved yield and plant health.',
                            price: '৳ 850',
                            image: null
                        },
                        {
                            id: 5,
                            name: 'Seed Treatment Kit',
                            category: 'Seed Treatment',
                            description: 'Complete seed protection package for better germination and early growth.',
                            price: '৳ 2,300',
                            image: null
                        },
                        {
                            id: 6,
                            name: 'Soil Conditioner Pro',
                            category: 'Soil Care',
                            description: 'Improves soil structure and nutrient availability for optimal plant growth.',
                            price: '৳ 1,750',
                            image: null
                        }
                    ],
                    Dealer: [
                        {
                            id: 1,
                            name: 'Premium Insecticide Pack',
                            category: 'Insecticide',
                            description: 'Bulk packaging for dealers with special wholesale pricing.',
                            price: 'Contact for Price',
                            image: null
                        },
                        {
                            id: 2,
                            name: 'Dealer Fungicide Collection',
                            category: 'Fungicide',
                            description: 'Complete range of fungicides for comprehensive crop protection.',
                            price: 'Contact for Price',
                            image: null
                        },
                        {
                            id: 3,
                            name: 'Herbicide Bulk Pack',
                            category: 'Herbicide',
                            description: 'Economical bulk packaging for large-scale farming operations.',
                            price: 'Contact for Price',
                            image: null
                        },
                        {
                            id: 4,
                            name: 'Fertilizer Combo Pack',
                            category: 'Fertilizer',
                            description: 'Special combination pack for dealers with volume discounts.',
                            price: 'Contact for Price',
                            image: null
                        },
                        {
                            id: 5,
                            name: 'Complete Crop Care Kit',
                            category: 'Package',
                            description: 'All-in-one solution for complete crop management and protection.',
                            price: 'Contact for Price',
                            image: null
                        },
                        {
                            id: 6,
                            name: 'Seasonal Promotion Pack',
                            category: 'Special Offer',
                            description: 'Limited time promotional package with exclusive dealer benefits.',
                            price: 'Contact for Price',
                            image: null
                        }
                    ]
                }
            };

            // Global variables
            let interactionTable, faqTable;

            // DOM Ready
            $(document).ready(function() {
                initializeApplication();
            });

            function initializeApplication() {
                initializeSelect2();
                initializeCategoryTabs();
                initializeDataTables();
                initializeEventHandlers();
                showLoader();
            }

            function initializeSelect2() {
                $('select').each(function() {
                    const $el = $(this);
                    const config = {
                        width: '100%',
                        placeholder: 'Select options',
                        allowClear: true
                    };

                    if ($el.hasClass('select2-hide') || $el.attr('name') === 'gender' || $el.attr('name') ===
                        'existing_customer') {
                        config.minimumResultsForSearch = Infinity;
                    }

                    if ($el.attr('multiple') || $el.hasClass('select2-multiple')) {
                        config.closeOnSelect = false;
                    }

                    $el.select2(config);
                });
            }

            function initializeCategoryTabs() {
                // Load initial category
                loadCategoryFields('Farmer');

                // Tab click handler
                $(document).on('click', '.category-tab', function() {
                    const category = $(this).data('category');
                    switchCategory(category, $(this));
                });
            }

            function switchCategory(category, $tab) {
                // Update UI
                $('.category-tab').removeClass('active').attr('aria-selected', 'false');
                $tab.addClass('active').attr('aria-selected', 'true');

                // Update hidden field
                $('#customer_category').val(category);

                // Load fields
                loadCategoryFields(category);

                // Update knowledge base section based on category
                updateKnowledgeBaseSection(category);
            }

            function updateKnowledgeBaseSection(category) {
                const $faqSection = $('#faq-section');
                const $productSection = $('#product-section');
                const $knowledgeBaseTitle = $('#knowledge-base-title');

                if (category === 'Retailer' || category === 'Dealer') {
                    // Show product list for Retailer and Dealer
                    $faqSection.addClass('d-none');
                    $productSection.removeClass('d-none');
                    $knowledgeBaseTitle.html('Product Catalog');
                    loadProductList(category);
                } else {
                    // Show FAQ for Farmer and Others
                    $faqSection.removeClass('d-none');
                    $productSection.addClass('d-none');
                    $knowledgeBaseTitle.html('Knowledge Base FAQ');
                }
            }

            function loadProductList(category) {
                const products = CONFIG.products[category] || [];
                const $productGrid = $('#product-grid');
                
                if (products.length === 0) {
                    $productGrid.html('<div class="text-center py-4 text-muted">No products available</div>');
                    return;
                }

                const productHtml = products.map(product => `
                    <div class="product-card">
                        <div class="product-image">
                            ${product.image ? 
                                `<img src="${product.image}" alt="${product.name}" />` : 
                                `<div class="placeholder"><i class="fas fa-seedling"></i></div>`
                            }
                        </div>
                        <div class="product-info">
                            <div class="product-category">${product.category}</div>
                            <div class="product-name">${product.name}</div>
                            <div class="product-description">${product.description}</div>
                            <div class="product-price">${product.price}</div>
                            <div class="product-actions">
                                <a href="https://www.autocropcare.com/" target="_blank" class="btn-outline">
                                    <i class="fas fa-info-circle"></i> Details
                                </a>
                                <button class="btn-outline" onclick="addToRecommendation('${product.name}')">
                                    <i class="fas fa-plus"></i> Recommend
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('');

                $productGrid.html(productHtml);
            }

            function loadCategoryFields(category) {
                const categoryConfig = CONFIG.categoryFields[category];
                if (!categoryConfig) return;

                const fieldsHtml = generateFieldsHtml(categoryConfig.fields);

                $('#dynamic_fields').html(`
                    <div class="form-grid">
                        ${fieldsHtml}
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-success" type="button" id="save-btn">
                            <i class="fas fa-save"></i> Save Customer
                        </button>
                    </div>
                `);

                // Reinitialize Select2 for new fields
                initializeSelect2();
            }

            function generateFieldsHtml(fields) {
                return fields.map(field => {
                    const requiredClass = field.required ? 'required' : '';
                    const requiredAttr = field.required ? 'required' : '';
                    const readonlyAttr = field.readonly ? 'readonly' : '';
                    const value = field.value || '';

                    let fieldHtml = `
                        <div class="form-group">
                            <label class="form-label ${requiredClass}">
                                ${field.label}
                                ${field.required ? '<span class="sr-only">(required)</span>' : ''}
                            </label>
                    `;

                    switch (field.type) {
                        case 'text':
                            fieldHtml += `
                                <input type="text" 
                                       name="${field.name}" 
                                       class="form-control ${field.readonly ? 'readonly' : ''}"
                                       placeholder="${field.placeholder || ''}"
                                       value="${value}"
                                       ${readonlyAttr}
                                       ${requiredAttr}>
                            `;
                            break;

                        case 'textarea':
                            fieldHtml += `
                                <textarea name="${field.name}" 
                                          class="form-control"
                                          placeholder="${field.placeholder || ''}"
                                          rows="${field.rows || 2}"
                                          ${requiredAttr}>${value}</textarea>
                            `;
                            break;

                        case 'select':
                            const selectOptions = field.options.map((option, index) => {
                                const optionLabel = field.optionLabels ? field.optionLabels[index] :
                                    option;
                                const selected = option === value ? 'selected' : '';
                                return `<option value="${option}" ${selected}>${optionLabel}</option>`;
                            }).join('');

                            fieldHtml += `
                                <select name="${field.name}" 
                                        class="form-select ${field.select2Hide ? 'select2-hide' : ''}"
                                        ${requiredAttr}>
                                    ${selectOptions}
                                </select>
                            `;
                            break;

                        case 'select-multiple':
                            const multipleOptions = field.options.map(option => {
                                return `<option value="${option}">${option}</option>`;
                            }).join('');

                            fieldHtml += `
                                <select name="${field.name}" 
                                        multiple 
                                        class="form-select select2-multiple"
                                        ${requiredAttr}>
                                    ${multipleOptions}
                                </select>
                            `;
                            break;
                    }

                    fieldHtml += `</div>`;
                    return fieldHtml;
                }).join('');
            }

            function initializeDataTables() {
                // Interaction History Table
                interactionTable = $('#data-datatable').DataTable({
                    processing: false,
                    serverSide: false,
                    responsive: true,
                    searching: true,
                    bInfo: true,
                    paging: true,
                    data: [
                        [1, 'Farid Test', '01521204476', 'Crop disease issue',
                            'Recommended pesticide solution', ''
                        ],
                        [2, 'John Farmer', '01887654321', 'Fertilizer inquiry',
                            'Suggested organic fertilizer', ''
                        ],
                        [3, 'Mary Retailer', '01911223344', 'Product availability',
                            'Confirmed stock availability', ''
                        ],
                        [4, 'Robert Dealer', '01555666777', 'Pricing inquiry', 'Provided bulk pricing', '']
                    ],
                    columns: [{
                            title: 'SL'
                        },
                        {
                            title: 'Name'
                        },
                        {
                            title: 'Phone Number'
                        },
                        {
                            title: 'Problem'
                        },
                        {
                            title: 'Solution'
                        },
                        {
                            title: 'Action',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return '<button class="action-btn" title="Call"><i class="fas fa-eye"></i></button>';
                            }
                        }
                    ],
                    language: {
                        emptyTable: '<div class="text-center py-4 text-muted">No interaction records found</div>',
                        zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>'
                    }
                });

                // FAQ Table
                faqTable = $('#faq-datatable').DataTable({
                    processing: false,
                    serverSide: false,
                    responsive: true,
                    searching: true,
                    bInfo: true,
                    paging: true,
                    data: [
                        [1, 'How to treat rice blast disease?', 'Disease Control', ''],
                        [2, 'Best fertilizer for wheat cultivation?', 'Fertilizer', ''],
                        [3, 'How to control aphids in vegetables?', 'Pest Control', ''],
                        [4, 'What is the ideal pH for soil?', 'Soil Health', '']
                    ],
                    columns: [{
                            title: 'SL'
                        },
                        {
                            title: 'Question'
                        },
                        {
                            title: 'Category'
                        },
                        {
                            title: 'Action',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return '<button class="action-btn" title="View"><i class="fas fa-eye"></i></button>';
                            }
                        }
                    ],
                    language: {
                        emptyTable: '<div class="text-center py-4 text-muted">No FAQ records found</div>',
                        zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>'
                    }
                });
            }

            function initializeEventHandlers() {
                // Save button handler
                $(document).on('click', '#save-btn', handleSave);

                // District change handler
                $(document).on('change', '[name="district_id"]', handleDistrictChange);
            }

            function handleSave() {
                if (!validateForm()) {
                    showNotification('error', 'Please fill all required fields');
                    return;
                }

                const formData = new FormData(document.getElementById('store_or_update_form'));

                $.ajax({
                    url: "{{ route('crmform.store') }}",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    cache: false,
                    beforeSend: function() {
                        $('#save-btn').html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop(
                            'disabled', true);
                    },
                    complete: function() {
                        $('#save-btn').html('<i class="fas fa-save"></i> Save Customer').prop('disabled',
                            false);
                    },
                    success: function(data) {
                        clearValidationErrors();

                        if (data.status == false) {
                            handleValidationErrors(data.errors);
                        } else {
                            showNotification(data.status, data.message);
                            if (data.status == 'success') {
                                // Refresh table if using server-side
                                // interactionTable.ajax.reload();
                                console.log('Customer saved successfully');
                            }
                        }
                    },
                    error: function(xhr, ajaxOption, thrownError) {
                        console.error('Error:', thrownError, xhr.statusText, xhr.responseText);
                        showNotification('error', 'An error occurred. Please try again.');
                    }
                });
            }

            function validateForm() {
                const category = $('#customer_category').val();
                const requiredFields = $(`[required]`);
                let isValid = true;

                clearValidationErrors();

                requiredFields.each(function() {
                    if (!$(this).val().trim()) {
                        $(this).addClass('is-invalid');
                        isValid = false;
                    }
                });

                return isValid;
            }

            function clearValidationErrors() {
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
            }

            function handleValidationErrors(errors) {
                $.each(errors, function(key, value) {
                    showNotification('error', value);
                    $(`[name="${key}"]`).addClass('is-invalid');
                });
            }

            function handleDistrictChange() {
                const districtId = $(this).val();
                const $upazilaSelect = $('[name="upazila_id"]');

                // Clear existing options
                $upazilaSelect.empty().append('<option value="">Select Upazila</option>');

                if (districtId) {
                    // Simulate loading upazilas based on district
                    const upazilas = getUpazilasByDistrict(districtId);
                    upazilas.forEach(upazila => {
                        $upazilaSelect.append(`<option value="${upazila.id}">${upazila.name}</option>`);
                    });
                }

                $upazilaSelect.trigger('change');
            }

            function getUpazilasByDistrict(districtId) {
                // Mock data - replace with actual API call
                const upazilaData = {
                    '1': [{
                        id: '1',
                        name: 'Dhaka North'
                    }, {
                        id: '2',
                        name: 'Dhaka South'
                    }],
                    '2': [{
                        id: '3',
                        name: 'Chittagong City'
                    }, {
                        id: '4',
                        name: 'Rangunia'
                    }],
                    // Add more districts as needed
                };

                return upazilaData[districtId] || [];
            }

            function showLoader() {
                const loader = $('#topbar-loader');
                loader.removeClass('d-none');

                setTimeout(() => loader.css('width', '30%'), 100);
                setTimeout(() => loader.css('width', '70%'), 500);
                setTimeout(() => loader.css('width', '100%'), 800);

                $(window).on('load', function() {
                    setTimeout(() => loader.fadeOut(300), 400);
                });
            }

            function showNotification(type, message) {
                // Remove existing notifications
                $('.alert').remove();

                const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';

                const alertDiv = $(`
                    <div class="alert ${alertClass} alert-dismissible">
                        <i class="fas ${icon}"></i>
                        <span>${message}</span>
                        <button type="button" class="btn-close">&times;</button>
                    </div>
                `);

                $('body').append(alertDiv);

                // Auto remove after 5 seconds
                setTimeout(() => alertDiv.fadeOut(300, () => alertDiv.remove()), 5000);

                // Close button handler
                alertDiv.find('.btn-close').on('click', function() {
                    alertDiv.fadeOut(300, () => alertDiv.remove());
                });
            }

            // Global function to add product to recommendations
            window.addToRecommendation = function(productName) {
                const $solutionField = $('[name="product_solution[]"]');
                if ($solutionField.length) {
                    // For Farmer category
                    if (!$solutionField.find(`option[value="${productName}"]`).length) {
                        $solutionField.append(new Option(productName, productName));
                    }
                    $solutionField.val([...$solutionField.val(), productName]).trigger('change');
                } else {
                    // For Retailer/Dealer categories
                    const $verbatimField = $('[name="verbatim"]');
                    const currentValue = $verbatimField.val();
                    const recommendationText = `Recommended: ${productName}`;
                    $verbatimField.val(currentValue ? `${currentValue}\n${recommendationText}` : recommendationText);
                }
                showNotification('success', `Added "${productName}" to recommendations`);
            }

        })(jQuery);
    </script>
@endpush