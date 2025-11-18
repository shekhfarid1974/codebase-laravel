<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Others Form</title>

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
                <span>Others Information</span>
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
                            <label class="form-label text-success required">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                        </div>
                    </div>

                    <!-- Mobile Number -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Mobile Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $phone_number ?? '' }}" readonly required>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success required">Gender</label>
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
                            <label class="form-label text-success">District</label>
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
                            <label class="form-label text-success required">Upazila</label>
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
                            <label class="form-label text-success required">Union</label>
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
                            <label class="form-label text-success required">Village</label>
                            <input type="text" name="village" class="form-control" placeholder="Enter village name" required>
                        </div>
                    </div>

                    <!-- Others Interests -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Others Interests</label>
                            <select name="interested_query[]" class="form-control select2" multiple>
                                <option value="Product">Product</option>
                                <option value="Officer Information">Officer Information</option>
                                <option value="Disease">Disease</option>
                                <option value="Complain">Complain</option>
                            </select>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Additional Details</label>
                            <textarea name="verbatim" class="form-control" rows="2" placeholder="Any additional information"></textarea>
                        </div>
                    </div>

                    <!-- Customer Type -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label text-success">Customer Type</label>
                            <select name="customer_type" class="form-control">
                                <option value="">Select Customer Type</option>
                                <option value="SAAO">SAAO</option>
                                <option value="Scientific Officer">Scientific Officer</option>
                                <option value="NGO">NGO</option>
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
    <div class="card mb-3">
        <div class="card-header bg-white">
            <h4 class="card-title d-flex  align-items-center gap-2">
                <i class="fas fa-history"></i>
                Interaction History
            </h4>
        </div>

        <div class="card-body">
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
    </div>

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
    </script>
</body>
</html>
