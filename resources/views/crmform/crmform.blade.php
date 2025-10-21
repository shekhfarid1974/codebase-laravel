@extends('layouts.standalone')
@section('title', $title)
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Simple Clean Design */
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --success: #10b981;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            color: var(--gray-800);
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid var(--gray-200);
            padding: 1.5rem 0;
            margin-bottom: 2rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--gray-800);
            margin: 0;
        }

        .agent-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--gray-100);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }

        .agent-info i {
            color: var(--primary);
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .card-header {
            background: var(--gray-100);
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-700);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Category Tabs */
        .category-tabs {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            padding-bottom: 1rem;
        }

        .category-tab {
            padding: 0.5rem 1rem;
            background: transparent;
            border: 1px solid var(--gray-300);
            border-radius: 0.375rem;
            color: var(--gray-600);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
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
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.25rem;
            font-size: 0.875rem;
        }

        .required::after {
            content: " *";
            color: #ef4444;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-control[readonly] {
            background-color: var(--gray-100);
            color: var(--gray-500);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        /* Buttons */
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
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
            background: #059669;
        }

        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        /* Tables */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-200);
        }

        .table th {
            background: var(--gray-100);
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody tr:hover {
            background: var(--gray-100);
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* Search Box */
        .search-box {
            position: relative;
            max-width: 300px;
        }

        .search-box input {
            padding-left: 2.5rem;
        }

        .search-box i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 2rem 0;
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .footer a {
            color: var(--primary);
            text-decoration: none;
        }

        /* Select2 Customization */
        .select2-container--default .select2-selection--single {
            height: 2.25rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.375rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-left: 0.75rem;
            line-height: 2.25rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 2.25rem;
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
                gap: 1rem;
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
            <div class="card-header"
                style="display: flex; justify-content: space-between; align-items: center; 
            padding: 6px 12px; background-color: #f8f9fa; border-bottom: 1px solid #ddd;">

                <h2 class="card-title" style="font-size: 16px; margin: 0; display: flex; align-items: center; gap: 6px;">
                    <i class="fas fa-user-plus" style="font-size: 14px; color: #007bff;"></i>
                    <span>Customer Information</span>
                </h2>

                <div class="agent-info" style="display: flex; align-items: center; gap: 6px; font-size: 14px; color: #555;">
                    <i class="fas fa-user-tie" style="font-size: 13px; color: #28a745;"></i>
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
                                    value="{{ $data->customer_id ?? 'NTR-001' }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Name</label>
                                <input type="text" name="name" value="{{ $data->name ?? '' }}" class="form-control"
                                    placeholder="Enter full name">
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
                                    @foreach (gender_options() as $key => $value)
                                        <option value="{{ $key }}"
                                            @isset($data){{ $data->gender == $key ? 'selected' : '' }}@endisset>
                                            {{ $value }}</option>
                                    @endforeach
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

                            <div class="form-group">
                                <label class="form-label">Other Crops</label>
                                <input type="text" name="other_crop" value="{{ $data->other_crop ?? '' }}"
                                    class="form-control" placeholder="Other crops grown">
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

                            <div class="form-group">
                                <label class="form-label">Recommended Solution</label>
                                <textarea name="product_solution" rows="2" class="form-control"
                                    placeholder="Products or solutions recommended"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Lead Status</label>
                                <select name="lead_status[]" multiple class="form-select select2">
                                    <option value="Interested">Interested</option>
                                    <option value="Not Interested">Not Interested</option>
                                    <option value="Callback">Callback</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Lead Source</label>
                                <select name="lead_source[]" multiple class="form-select select2">
                                    <option value="Farmer Meeting">Farmer Meeting</option>
                                    <option value="IFS">IFS</option>
                                    <option value="Website">Website</option>
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

                    <!-- Other Category Fields -->
                    <div id="dealer_fields" class="category-fields d-none">
                        <div class="text-center py-4 text-muted">
                            <p>Dealer form fields will appear here.</p>
                        </div>
                    </div>

                    <div id="retailer_fields" class="category-fields d-none">
                        <div class="text-center py-4 text-muted">
                            <p>Retailer form fields will appear here.</p>
                        </div>
                    </div>

                    <div id="others_fields" class="category-fields d-none">
                        <div class="text-center py-4 text-muted">
                            <p>Other category fields will appear here.</p>
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
                        <input type="text" class="form-control" name="search_here" id="search_here"
                            placeholder="Search...">
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
                        <tbody></tbody>
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
                        <input type="text" class="form-control" name="search_here" id="search_here"
                            placeholder="Search...">
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
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endSection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2({
                placeholder: 'Select an option',
                allowClear: true
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
                    url: "{{ route('crmform.data') }}",
                    type: "GET",
                    dataType: "JSON",
                    data: function(d) {
                        d._token = '{{ csrf_token() }}';
                        d.search = $('input[name="search_here"]').val();
                        d.agent = "{{ $agent ?? '' }}";
                        d.phone_number = "{{ $phone_number ?? '' }}";
                    },
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'problem',
                        name: 'problem'
                    },
                    {
                        data: 'solution',
                        name: 'solution'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
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

            // Search functionality
            $(document).on('keyup keydown', '#search_here', function() {
                interactionTable.search($(this).val()).draw();
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
