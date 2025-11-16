@extends('layouts.standalone')
@section('title', 'Farmer CRM Form')

@push('styles')
    <style>
        /* Farmer-specific styles if needed */
        .farmer-icon {
            color: #28a745;
        }
    </style>
@endpush

@section('content')
    <!-- Customer Form Card -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-tractor farmer-icon"></i>
                <span>Farmer Information</span>
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
                    <a href="{{ route('crmform.farmer') }}" class="category-tab active" role="tab" aria-selected="true">
                        <i class="fas fa-tractor"></i> Farmer
                    </a>
                    <a href="{{ route('crmform.retailer') }}" class="category-tab" role="tab" aria-selected="false">
                        <i class="fas fa-shopping-cart"></i> Retailer
                    </a>
                    <a href="{{ route('crmform.dealer') }}" class="category-tab" role="tab" aria-selected="false">
                        <i class="fas fa-store"></i> Dealer
                    </a>
                    <a href="{{ route('crmform.others') }}" class="category-tab" role="tab" aria-selected="false">
                        <i class="fas fa-ellipsis-h"></i> Others
                    </a>
                </div>

                <!-- Dynamic Fields Container -->
                <div id="dynamic_fields" class="category-fields" role="tabpanel">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label required">
                                Name
                                <span class="sr-only">(required)</span>
                            </label>
                            <input type="text" name="name" class="form-control" placeholder="Enter full name" value="Farid Test" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                Mobile Number
                                <span class="sr-only">(required)</span>
                            </label>
                            <input type="text" name="phone_number" class="form-control readonly" value="{{ $phone_number ?? '' }}" readonly required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Phone Number Own
                            </label>
                            <select name="own_number" class="form-select select2-hide">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                Alternative Contact Number
                                <span class="sr-only">(required)</span>
                            </label>
                            <input type="text" name="alt_number" class="form-control" placeholder="Enter alternative contact number" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                Gender
                                <span class="sr-only">(required)</span>
                            </label>
                            <select name="gender" class="form-select select2-hide" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                District
                                <span class="sr-only">(required)</span>
                            </label>
                            <select name="district_id" class="form-select" required>
                                <option value="">Select District</option>
                                <option value="1">Dhaka</option>
                                <option value="2">Chittagong</option>
                                <option value="3">Rajshahi</option>
                                <option value="4">Khulna</option>
                                <option value="5">Barishal</option>
                                <option value="6">Sylhet</option>
                                <option value="7">Rangpur</option>
                                <option value="8">Mymensingh</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                Upazila
                                <span class="sr-only">(required)</span>
                            </label>
                            <select name="upazila_id" class="form-select" required>
                                <option value="">Select Upazila</option>
                                <option value="1">Dhaka</option>
                                <option value="2">Chittagong</option>
                                <option value="3">Rajshahi</option>
                                <option value="4">Khulna</option>
                                <option value="5">Barishal</option>
                                <option value="6">Sylhet</option>
                                <option value="7">Rangpur</option>
                                <option value="8">Mymensingh</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                Union
                                <span class="sr-only">(required)</span>
                            </label>
                            <select name="union_id" class="form-select" required>
                                <option value="">Select Union</option>
                                <option value="1">Dhaka</option>
                                <option value="2">Chittagong</option>
                                <option value="3">Rajshahi</option>
                                <option value="4">Khulna</option>
                                <option value="5">Barishal</option>
                                <option value="6">Sylhet</option>
                                <option value="7">Rangpur</option>
                                <option value="8">Mymensingh</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                Village
                                <span class="sr-only">(required)</span>
                            </label>
                            <input type="text" name="village" class="form-control" placeholder="Enter village name" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Targeted Crop
                            </label>
                            <select name="targeted_crop[]" multiple class="form-select select2-multiple">
                                <option value="Rice">Rice</option>
                                <option value="Maize">Maize</option>
                                <option value="Onion">Onion</option>
                                <option value="Brinjal">Brinjal</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Land Size (Decimal)
                            </label>
                            <input type="text" name="land_size" class="form-control" placeholder="Land size in decimals">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Products Interests
                            </label>
                            <select name="product_interest[]" multiple class="form-select select2-multiple">
                                <option value="Insecticide">Insecticide</option>
                                <option value="Fungicide">Fungicide</option>
                                <option value="Herbicide">Herbicide</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Problem/Query
                            </label>
                            <textarea name="q_type" class="form-control" placeholder="Describe the problem" rows="2"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Additional Details
                            </label>
                            <textarea name="verbatim" class="form-control" placeholder="Customer Provided notes or other crop info" rows="2"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Recommended Products
                            </label>
                            <select name="product_solution[]" multiple class="form-select select2-multiple">
                                <option value="Fertilizer A">Fertilizer A</option>
                                <option value="Pesticide B">Pesticide B</option>
                                <option value="Herbicide C">Herbicide C</option>
                                <option value="Seed D">Seed D</option>
                                <option value="Equipment E">Equipment E</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Solution Details
                            </label>
                            <textarea name="product_solution_text" class="form-control" placeholder="Detailed solution information" rows="2"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Lead Status
                            </label>
                            <select name="lead_status[]" class="form-select select2-hide">
                                <option value="Regular">Regular</option>
                                <option value="Irregular">Irregular</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Lead Source
                            </label>
                            <select name="lead_source[]" multiple class="form-select select2-multiple">
                                <option value="Farmer Meeting">Farmer Meeting</option>
                                <option value="IFS">IFS</option>
                                <option value="Website">Website</option>
                                <option value="DAE">DAE</option>
                                <option value="Trade">Trade</option>
                                <option value="Call Center">Call Center</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                User of ACCL Product
                            </label>
                            <select name="existing_customer" class="form-select select2-hide">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button class="btn btn-success" type="button" id="save-btn">
                            <i class="fas fa-save"></i> Save Farmer
                        </button>
                    </div>
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
                        <tr>
                            <td>1</td>
                            <td>Farid Test</td>
                            <td>01521204476</td>
                            <td>Crop disease issue</td>
                            <td>Recommended pesticide solution</td>
                            <td><button class="action-btn" title="Call"><i class="fas fa-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>John Farmer</td>
                            <td>01887654321</td>
                            <td>Fertilizer inquiry</td>
                            <td>Suggested organic fertilizer</td>
                            <td><button class="action-btn" title="Call"><i class="fas fa-eye"></i></button></td>
                        </tr>
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
                Knowledge Base FAQ
            </h2>
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
                        <tr>
                            <td>1</td>
                            <td>How to treat rice blast disease?</td>
                            <td>Disease Control</td>
                            <td><button class="action-btn" title="View"><i class="fas fa-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Best fertilizer for wheat cultivation?</td>
                            <td>Fertilizer</td>
                            <td><button class="action-btn" title="View"><i class="fas fa-eye"></i></button></td>
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
@endsection

@push('scripts')
    <script>
        (function($) {
            'use strict';

            // DOM Ready
            $(document).ready(function() {
                initializeApplication();
            });

            function initializeApplication() {
                initializeSelect2();
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

                    if ($el.hasClass('select2-hide') || $el.attr('name') === 'gender' || $el.attr('name') === 'existing_customer') {
                        config.minimumResultsForSearch = Infinity;
                    }

                    if ($el.attr('multiple') || $el.hasClass('select2-multiple')) {
                        config.closeOnSelect = false;
                    }

                    $el.select2(config);
                });
            }

            function initializeDataTables() {
                // Interaction History Table
                $('#data-datatable').DataTable({
                    processing: false,
                    serverSide: false,
                    responsive: true,
                    searching: true,
                    bInfo: true,
                    paging: true,
                    language: {
                        emptyTable: '<div class="text-center py-4 text-muted">No interaction records found</div>',
                        zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>'
                    }
                });

                // FAQ Table
                $('#faq-datatable').DataTable({
                    processing: false,
                    serverSide: false,
                    responsive: true,
                    searching: true,
                    bInfo: true,
                    paging: true,
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
                        $('#save-btn').html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop('disabled', true);
                    },
                    complete: function() {
                        $('#save-btn').html('<i class="fas fa-save"></i> Save Farmer').prop('disabled', false);
                    },
                    success: function(data) {
                        clearValidationErrors();

                        if (data.status == false) {
                            handleValidationErrors(data.errors);
                        } else {
                            showNotification(data.status, data.message);
                            if (data.status == 'success') {
                                console.log('Farmer saved successfully');
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
                    '1': [{ id: '1', name: 'Dhaka North' }, { id: '2', name: 'Dhaka South' }],
                    '2': [{ id: '3', name: 'Chittagong City' }, { id: '4', name: 'Rangunia' }],
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

        })(jQuery);
    </script>
@endpush