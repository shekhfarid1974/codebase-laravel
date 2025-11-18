<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealer Form</title>

    <!-- Common CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >

    <style>
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
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title ">
                <i class="fas fa-store dealer-icon"></i>
                <span>Dealer Information</span>
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
                <div class="row align-items-end">

                    <!-- Dealer Name -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label required">Dealer Name <span class="sr-only">(required)</span></label>
                            <input type="text" name="dealer_name" class="form-control" placeholder="Enter dealer name" required>
                        </div>
                    </div>

                    <!-- Mobile Number -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label required">Mobile Number <span class="sr-only">(required)</span></label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $phone_number ?? '' }}" readonly required>
                        </div>
                    </div>

                    <!-- Alternative Contact Number -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label required">Alternative Contact Number <span class="sr-only">(required)</span></label>
                            <input type="text" name="alt_number" class="form-control" placeholder="Enter alternative contact number" required>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label required">Gender <span class="sr-only">(required)</span></label>
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
                            <label class="form-label">District</label>
                            <select name="district_id" class="form-control select2">
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
                            <label class="form-label required">Upazila <span class="sr-only">(required)</span></label>
                            <select name="upazila_id" class="form-control select2" required>
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
                            <label class="form-label required">Union <span class="sr-only">(required)</span></label>
                            <select name="union_id" class="form-control select2" required>
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
                            <label class="form-label required">Village <span class="sr-only">(required)</span></label>
                            <input type="text" name="village" class="form-control" placeholder="Enter village name" required>
                        </div>
                    </div>

                    <!-- Dealer Interests -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">Dealer Interests</label>
                            <select name="interested_query[]" class="form-control select2" multiple>
                                <option value="New dealership">New dealership</option>
                                <option value="Credit Limit">Credit Limit</option>
                                <option value="Product Information">Product Information</option>
                                <option value="Officer Information">Officer Information</option>
                                <option value="Complain">Complain</option>
                                <option value="Offers">Offers</option>
                            </select>
                        </div>
                    </div>

                    <!-- Recommended -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">Recommended</label>
                            <textarea name="recommendate" rows="2" class="form-control" placeholder="Enter suggested product/solution"></textarea>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">Additional Details</label>
                            <textarea name="verbatim" rows="2" class="form-control" placeholder="Any additional information"></textarea>
                        </div>
                    </div>
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
    {{-- <div class="card mb-3">
        <div class="card-header">
            <h4 class="card-title d-flex  align-items-center gap-2">
                <i class="fas fa-history"></i>
                Interaction History
            </h4>
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
                            <td>Robert Dealer</td>
                            <td>01555666777</td>
                            <td>Pricing inquiry</td>
                            <td>Provided bulk pricing</td>
                            <td><button class="action-btn" title="Call"><i class="fas fa-eye"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <!-- Knowledge Base Card -->
    {{-- <div class="card">
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
                            <td>How to manage dealer network?</td>
                            <td>Dealer Management</td>
                            <td><button class="action-btn" title="View"><i class="fas fa-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Best practices for dealer incentives?</td>
                            <td>Incentives</td>
                            <td><button class="action-btn" title="View"><i class="fas fa-eye"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

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
    </script>
</body>
</html>
