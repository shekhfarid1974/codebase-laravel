<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Form</title>

    <!-- Common CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >

    <style>
        .form-label{
            font-weight: 600;
            margin-bottom: 0 !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #dee2e6;
        }
        .select2-container .select2-selection--single {
            height: 38px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #dee2e6;
        }
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #dee2e6;
        }
        .select2-container .select2-selection--multiple {
            min-height: 38px;
        }
    </style>
</head>
<body class="bg-light">
    <div id="topbar-loader" class="d-none"></div>

    <div class="container">
    <!-- Customer Form Card -->
    <div class="card mb-3 border-0 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h4 class="card-title ">
                <i class="fas fa-store dealer-icon"></i>
                <span>Farmer Information</span>
            </h4>

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
                <input type="hidden" name="customer_category" id="customer_category" value="Dealer">
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Name <span class="sr-only">(required)</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter full name" value="Farid Test" required>
                        </div>
                    </div>

                    <!-- Mobile Number -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Mobile Number <span class="sr-only">(required)</span></label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $phone_number ?? '' }}" readonly required>
                        </div>
                    </div>

                    <!-- Phone Number Own -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Phone Number Own</label>
                            <select name="own_number" class="form-control">
                                <option value="Yes" {{ (isset($own_number) && $own_number=='Yes') ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ (isset($own_number) && $own_number=='No') ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Alternative Contact Number -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Alternative Contact Number <span class="sr-only">(required)</span></label>
                            <input type="text" name="alt_number" class="form-control" placeholder="Enter alternative contact number" required>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Gender <span class="sr-only">(required)</span></label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- District -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">District <span class="sr-only">(required)</span></label>
                            <select name="district_id" class="form-control" required>
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
                    </div>

                    <!-- Upazila -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Upazila <span class="sr-only">(required)</span></label>
                            <select name="upazila_id" class="form-control" required>
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
                    </div>

                    <!-- Union -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Union <span class="sr-only">(required)</span></label>
                            <select name="union_id" class="form-control" required>
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
                    </div>

                    <!-- Village -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Village <span class="sr-only">(required)</span></label>
                            <input type="text" name="village" class="form-control" placeholder="Enter village name" required>
                        </div>
                    </div>

                    <!-- Targeted Crop -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Targeted Crop</label>
                            <select name="targeted_crop[]" class="form-control select2" multiple>
                                <option value="Rice">Rice</option>
                                <option value="Maize">Maize</option>
                                <option value="Onion">Onion</option>
                                <option value="Brinjal">Brinjal</option>
                            </select>
                        </div>
                    </div>

                    <!-- Land Size -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Land Size (Decimal)</label>
                            <input type="text" name="land_size" class="form-control" placeholder="Land size in decimals">
                        </div>
                    </div>

                    <!-- Product Interests -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Products Interests</label>
                            <select name="product_interest[]" class="form-control select2" multiple>
                                <option value="Insecticide">Insecticide</option>
                                <option value="Fungicide">Fungicide</option>
                                <option value="Herbicide">Herbicide</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>

                    <!-- Problem/Query -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Problem/Query</label>
                            <textarea name="q_type" rows="2" class="form-control" placeholder="Describe the problem"></textarea>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Additional Details</label>
                            <textarea name="verbatim" rows="2" class="form-control" placeholder="Customer Provided notes or other crop info"></textarea>
                        </div>
                    </div>

                    <!-- Recommended Products -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Recommended Products</label>
                            <select name="product_solution[]" class="form-control select2" multiple>
                                <option value="Fertilizer A">Fertilizer A</option>
                                <option value="Pesticide B">Pesticide B</option>
                                <option value="Herbicide C">Herbicide C</option>
                                <option value="Seed D">Seed D</option>
                                <option value="Equipment E">Equipment E</option>
                            </select>
                        </div>
                    </div>

                    <!-- Solution Details -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Solution Details</label>
                            <textarea name="product_solution_text" rows="2" class="form-control" placeholder="Detailed solution information"></textarea>
                        </div>
                    </div>

                    <!-- Lead Status -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Lead Status</label>
                            <select name="lead_status[]" class="form-control select2">
                                <option value="Regular">Regular</option>
                                <option value="Irregular">Irregular</option>
                            </select>
                        </div>
                    </div>

                    <!-- Lead Source -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Lead Source</label>
                            <select name="lead_source[]" class="form-control select2" multiple>
                                <option value="Farmer Meeting">Farmer Meeting</option>
                                <option value="IFS">IFS</option>
                                <option value="Website">Website</option>
                                <option value="DAE">DAE</option>
                                <option value="Trade">Trade</option>
                                <option value="Call Center">Call Center</option>
                            </select>
                        </div>
                    </div>

                    <!-- User of ACCL Product -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">User of ACCL Product</label>
                            <select name="existing_customer" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <button class="btn btn-success" type="button" id="save-btn">
                                <i class="fas fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- Interaction History Card -->
    <div class="card mb-3 border-0 shadow-sm">
        <div class="card-header bg-white">
            <h4 class="card-title d-flex  align-items-center gap-2 ">
                <i class="fas fa-history"></i>
                Interaction History
            </h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="data-datatable">
                    <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Problem</th>
                        <th>Solution</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Knowledge Base Card -->
    <div class="card mb-3 border-0 shadow-sm">
        <div class="card-header bg-white">
            <h4 class="card-title">
                <i class="fas fa-book"></i>
                Knowledge Base FAQ
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="faq-datatable">
                    <thead>
                            <th>SL</th>
                            <th>Question</th>
                            <th>Category</th>
                            <th>Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <p>&copy; {{ date('Y') }} All rights reserved | Developed by Shekh Farid
            <a href="https://myolbd.com" target="_blank">My Outsourcing Ltd</a>
        </p>
    </footer>
</div>

    <!-- Common Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

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
                        return '<button class="action-btn btn btn-sm btn-primary" title="Call"><i class="fas fa-eye"></i></button>';
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
                        return '<button class="action-btn btn btn-sm btn-primary" title="View"><i class="fas fa-eye"></i></button>';
                    }
                }
            ],
            language: {
                emptyTable: '<div class="text-center py-4 text-muted">No FAQ records found</div>',
                zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>'
            }
        });
    </script>
</body>
</html>
