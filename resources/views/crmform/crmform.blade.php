@extends('layouts.standalone')
@section('title', $title)
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Design to match the screenshot */
        :root {
            --primary: #0066cc;
            --primary-dark: #0052a3;
            --success: #28a745;
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

        /* Apply border-box to all elements */
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

        /* Header */
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

        /* Cards */
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

        /* Category Tabs */
        .category-tabs {
            display: flex;
            gap: 5px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--gray-200);
            padding-bottom: 10px;
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

        /* Form Styles */
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
            color: #dc3545;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--gray-400);
            border-radius: var(--border-radius);
            font-size: 14px;
            transition: border-color 0.2s;
            height: 36px;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(0, 102, 204, 0.25);
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

        /* Form Grid - Updated to match image */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        /* Buttons */
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

        /* Tables - Updated to match image */
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

        /* Action button with phone icon */
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

        /* Search Box - Right Aligned */
        .card-header {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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


        /* Footer */
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
        .select2-container--default .select2-selection--single {
            height: 36px;
            border: 1px solid var(--gray-400);
            border-radius: var(--border-radius);
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-left: 12px;
            line-height: 34px;
            font-size: 14px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 34px;
        }

        .select2-container--default .select2-selection--multiple {
            height: auto;
            min-height: 36px;
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
                flex-wrap: wrap;
            }
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
                    <div class="category-tabs">
                        <button type="button" class="category-tab active" data-category="Farmer">
                            <i class="fas fa-tractor"></i> Farmer
                        </button>
                        <button type="button" class="category-tab" data-category="Dealer">
                            <i class="fas fa-store"></i> Dealer
                        </button>
                        <button type="button" class="category-tab" data-category="Retailer">
                            <i class="fas fa-shopping-cart"></i> Retailer
                        </button>
                        <button type="button" class="category-tab" data-category="Others">
                            <i class="fas fa-ellipsis-h"></i> Others
                        </button>
                    </div>

                    <!-- FARMER FIELDS -->
                    <div id="farmer_fields" class="category-fields">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Customer ID</label>
                                <input type="text" readonly name="customer_id"
                                    value="{{ $data->customer_id ?? 'NTR - 001' }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Name</label>
                                <input type="text" name="name" value="{{ $data->name ?? 'Tarek Test' }}"
                                    class="form-control" placeholder="Enter full name">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Mobile Number</label>
                                <input type="text" readonly name="phone_number" id="phone_number"
                                    value="{{ $phone_number ?? '' }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Gender</label>
                                <select name="gender" id="gender" class="form-select select2-hide">
                                    <option value="">Select Gender</option>
                                    {{-- @foreach (GENDER as $key => $value)
                                        <option value="{{ $key }}"
                                            @isset($data){{ $data->gender == $key ? 'selected' : '' }}@endisset>
                                            {{ $value }}</option>
                                    @endforeach --}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">District</label>
                                <select name="district_id" id="district_id" class="form-select select2">
                                    <option value="">Select District</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Upazila</label>
                                <select name="upazila_id" id="upazila_id" class="form-select select2">
                                    <option value="">Select Upazila</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Village/Area</label>
                                <input type="text" name="village" value="{{ $data->village ?? '' }}" class="form-control"
                                    placeholder="Enter village name">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Targeted Crop</label>
                                <input type="text" name="targeted_crop" value="{{ $data->targeted_crop ?? '' }}"
                                    class="form-control" placeholder="e.g. Rice, Wheat">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Land Size (Decimal)</label>
                                <input type="text" name="land_size" value="{{ $data->land_size ?? '' }}"
                                    class="form-control" placeholder="Land size in decimals">
                            </div>

                            <!-- Other Crops -->
                            <div class="form-group">
                                <label class="form-label">Other Crops</label>
                                <select name="other_crop[]" multiple class="form-select select2-multiple">
                                    <option value="Rice">Rice</option>
                                    <option value="Wheat">Wheat</option>
                                    <option value="Maize">Maize</option>
                                    <option value="Jute">Jute</option>
                                    <option value="Sugarcane">Sugarcane</option>
                                    <option value="Potato">Potato</option>
                                    <option value="Vegetables">Vegetables</option>
                                    <option value="Fruits">Fruits</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="form-label">Problem/Query Type</label>
                                <textarea name="q_type" rows="2" class="form-control" placeholder="Describe the problem"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Customer Interests</label>
                                <textarea name="interested_query" rows="2" class="form-control" placeholder="Customer's interests"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Additional Details</label>
                                <textarea name="verbatim" rows="2" class="form-control" placeholder="Any additional information"></textarea>
                            </div>

                            <!-- Recommended Products -->
                            <div class="form-group">
                                <label class="form-label">Recommended Products</label>
                                <select name="product_solution[]" multiple class="form-select select2-multiple">
                                    <option value="Fertilizer A">Fertilizer A</option>
                                    <option value="Pesticide B">Pesticide B</option>
                                    <option value="Herbicide C">Herbicide C</option>
                                    <option value="Seed D">Seed D</option>
                                    <option value="Equipment E">Equipment E</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Solution Details</label>
                                <textarea name="product_solution_text" rows="2" class="form-control"
                                    placeholder="Detailed solution information"></textarea>
                            </div>

                            <!-- Lead Status -->
                            <div class="form-group">
                                <label class="form-label">Lead Status</label>
                                <select name="lead_status[]" multiple class="form-select select2-multiple">
                                    <option value="Interested">Interested</option>
                                    <option value="Not Interested">Not Interested</option>
                                    <option value="Callback">Callback</option>
                                    <option value="Hot Lead">Hot Lead</option>
                                    <option value="Cold Lead">Cold Lead</option>
                                </select>
                            </div>

                            <!-- Lead Source -->
                            <div class="form-group">
                                <label class="form-label">Lead Source</label>
                                <select name="lead_source[]" multiple class="form-select select2-multiple">
                                    <option value="Farmer Meeting">Farmer Meeting</option>
                                    <option value="IFS">IFS</option>
                                    <option value="Website">Website</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Advertisement">Advertisement</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Existing Customer</label>
                                <select name="existing_customer" class="form-select select2-hide">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Registration Date</label>
                                <input type="text" readonly name="registration_date"
                                    value="{{ now()->format('Y-m-d') }}" class="form-control">
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-success" type="button" id="save-btn">
                                <i class="fas fa-save"></i> Save Customer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Interaction History Card -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="card-title">
                        <i class="fas fa-history"></i>
                        Interaction History
                    </h2>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" name="search_interaction"
                            placeholder="Search interaction...">
                    </div>
                </div>
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
                            <!-- Sample data to match the screenshot -->
                            <tr>
                                <td>1</td>
                                <td>Tarek Test</td>
                                <td>01712345678</td>
                                <td>Crop disease issue</td>
                                <td>Recommended pesticide solution</td>
                                <td>
                                    <button class="action-btn" title="Call">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>John Farmer</td>
                                <td>01887654321</td>
                                <td>Fertilizer inquiry</td>
                                <td>Suggested organic fertilizer</td>
                                <td>
                                    <button class="action-btn" title="Call">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Knowledge Base Card -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="card-title">
                        <i class="fas fa-book"></i>
                        Knowledge Base FAQ
                    </h2>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" name="search_faq" placeholder="Search FAQ...">
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
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
                            <!-- Sample data -->
                            <tr>
                                <td>1</td>
                                <td>How to treat rice blast disease?</td>
                                <td>Disease Control</td>
                                <td>
                                    <button class="action-btn" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Best fertilizer for wheat cultivation?</td>
                                <td>Fertilizer</td>
                                <td>
                                    <button class="action-btn" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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

    {{-- @include('crm.update') --}}
@endSection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2({
                placeholder: 'Select options',
                allowClear: true
            });

            // Initialize multiple select with better configuration
            $('.select2-multiple').select2({
                placeholder: 'Select options',
                allowClear: true,
                closeOnSelect: false
            });

            $('.select2-hide').select2({
                minimumResultsForSearch: Infinity
            });

            $('.select2-hide').select2({
                minimumResultsForSearch: Infinity
            });

            // Category Switching
            $(document).on('click', '.category-tab', function() {
                $('.category-tab').removeClass('active');
                $(this).addClass('active');

                let category = $(this).data('category');
                $('#customer_category').val(category);

                $('.category-fields').addClass('d-none');
                $('#' + category.toLowerCase() + '_fields').removeClass('d-none');
            });

            // Simulate loader progress
            let loader = $('#topbar-loader');
            loader.removeClass('d-none');

            setTimeout(() => loader.css('width', '30%'), 100);
            setTimeout(() => loader.css('width', '70%'), 500);
            setTimeout(() => loader.css('width', '100%'), 800);

            $(window).on('load', function() {
                setTimeout(() => {
                    loader.fadeOut(300);
                }, 400);
            });

            // Initialize DataTables
            let interactionTable = $('#data-datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searching: false,
                order: [],
                bInfo: false,
                bFilter: false,
                ordering: false,
                paging: true,
                ajax: {
                    url: "{{ route('crmform.store', ['phone_number' => $phone_number, 'agent' => $agent]) }}",
                    type: "GET",
                    dataType: "JSON",
                    data: function(d) {
                        d._token = _token;
                        d.search = $('input[name="search_here"]').val();
                        d.agent = "{{ request()->get('agent') }}"
                    },
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'phone_number'
                    },
                    {
                        data: 'problem'
                    },
                    {
                        data: 'solution'
                    },
                    {
                        data: 'action',
                        render: function(data, type, row) {
                            return '<button class="action-btn" title="Call"><i class="fas fa-phone"></i></button>';
                        }
                    }
                ],
                language: {
                    emptyTable: '<div class="text-center py-4 text-muted">No interaction records found</div>',
                    infoEmpty: '',
                    zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>',
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    }
                }
            });

            // Initialize FAQ DataTable
            let faqTable = $('#faq-datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searching: false,
                order: [],
                bInfo: false,
                bFilter: false,
                ordering: false,
                paging: true,
                ajax: {
                    url: "{{ route('crmform.store') }}",
                    type: "GET",
                    dataType: "JSON",
                    data: function(d) {
                        d._token = '{{ csrf_token() }}';
                        d.search = $('#faq-datatable').closest('.card').find(
                            'input[name="search_here"]').val();
                    },
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'question'
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'action',
                        render: function(data, type, row) {
                            return '<button class="action-btn" title="View"><i class="fas fa-eye"></i></button>';
                        }
                    }
                ],
                language: {
                    emptyTable: '<div class="text-center py-4 text-muted">No FAQ records found</div>',
                    infoEmpty: '',
                    zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>',
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    }
                }
            });

            // Search functionality for Interaction History
            $('input[name="search_interaction"]').on('keyup', function() {
                interactionTable.search($(this).val()).draw();
            });

            // Search functionality for FAQ
            $('input[name="search_faq"]').on('keyup', function() {
                faqTable.search($(this).val()).draw();
            });

            // Save functionality
            $(document).on('click', '#save-btn', function() {
                var form_data = document.getElementById('store_or_update_form');
                var form = new FormData(form_data);

                $.ajax({
                    url: "{{ route('crmform.store') }}",
                    type: "POST",
                    data: form,
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    cache: false,
                    beforeSend: function() {
                        $('#save-btn').html('<i class="fas fa-spinner fa-spin"></i> Saving...');
                        $('#save-btn').prop('disabled', true);
                    },
                    complete: function() {
                        $('#save-btn').html('<i class="fas fa-save"></i> Save Customer');
                        $('#save-btn').prop('disabled', false);
                    },
                    success: function(data) {
                        $('#store_or_update_form').find('.is-invalid').removeClass(
                            'is-invalid');
                        $('#store_or_update_form').find('.error').remove();

                        if (data.status == false) {
                            $.each(data.errors, function(key, value) {
                                notification('error', value);
                                $('#store_or_update_form [name="' + key + '"]')
                                    .addClass('is-invalid');
                            });
                        } else {
                            notification(data.status, data.message);
                            if (data.status == 'success') {
                                setTimeout(() => {
                                    location.reload(true);
                                }, 1000);
                            }
                        }
                    },
                    error: function(xhr, ajaxOption, thrownError) {
                        console.log(thrownError + '\r\n' + xhr.statusText + '\r\n' + xhr
                            .responseText);
                        notification('error', 'An error occurred. Please try again.');
                    }
                });
            });

            // Notification function
            function notification(type, message) {
                const alertDiv = document.createElement('div');
                alertDiv.className =
                    `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
                alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
                alertDiv.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
                        <div>${message}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                    </div>
                `;

                document.body.appendChild(alertDiv);

                setTimeout(() => {
                    alertDiv.remove();
                }, 5000);
            }
        });
    </script>
@endpush
