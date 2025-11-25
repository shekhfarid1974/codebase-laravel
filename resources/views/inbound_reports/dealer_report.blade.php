@extends('layouts.app')

@section('title', 'CRM Reports')
@section('page_title', 'CRM Reports')
@push('styles')
    <style>
        .nav-link {
            text-align: center;
            border-radius: 0.25rem 0.25rem 0 0;
            color: #495057;
            padding: 1rem;
            margin-right: 5px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-bottom: none;
        }
        .nav-link.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            border-bottom: 3px solid #007bff !important;
            font-weight: 500;
        }
        .kpi-box {
            background-color: #fff;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            text-align: center;
        }
        .small-muted {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        .table-fixed th {
            white-space: nowrap;
        }
    </style>
@endpush
@section('content')

    <div class="container-fluid py-3">
        <div class="" id="dealer-content">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="kpi-box">
                        <div class="small-muted">Total Dealers</div>
                        <h4 id="kpi_dealer_calls">85</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="kpi-box">
                        <div class="small-muted">Monthly Order Value</div>
                        <h4 id="kpi_dealer_leads">BDT 2M</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="kpi-box">
                        <div class="small-muted">Top Products</div>
                        <h4 id="kpi_dealer_users">4</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="kpi-box">
                        <div class="small-muted">Sales Growth (%)</div>
                        <h4 id="kpi_dealer_growth">12%</h4>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="Name, Mobile">
                        </div>
                        <div class="col-md-3">
                            <select name="district_id" class="form-select" required="">
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

                        <div class="col-md-3">
                            <select name="dealer_interested_query" id="dealer_interested_query" class="form-select">
                                <option value="">Dealer Interests</option>
                                <option value="New dealership">New dealership</option>
                                <option value="Credit Limit">Credit Limit</option>
                                <option value="Product Information">Product Information</option>
                                <option value="Officer Information">Officer Information</option>
                                <option value="Complain">Complain</option>
                                <option value="Offers">Offers</option>
                            </select>

                        </div>
                        <div class="col-md-3 d-flex">
                            <button type="submit" class="btn btn-success me-2">Search</button>
                            <button type="reset" class="btn btn-secondary me-2">Reset</button>
                            <button type ="button" class="btn btn-outline-success me-1">Export</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Report Data — Dealer</strong>

                </div>
                <div class="card-body ">
                    <div class="table-responsive">
                        <table id="table_dealer" class="table table-bordered table-striped mb-0 table-fixed">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:6%">ID</th>
                                    <th style="width:12%">Name</th>
                                    <th style="width:10%">Mobile</th>
                                    <th style="width:10%">Own Number</th>
                                    <th style="width:10%">Alt. Number</th>
                                    <th style="width:6%">Gender</th>
                                    <th style="width:8%">District</th>
                                    <th style="width:8%">Upazila</th>
                                    <th style="width:8%">Union</th>
                                    <th style="width:10%">Village</th>
                                    <th style="width:12%">Dealer Interests</th>
                                    <th style="width:12%">Recommended</th>
                                    <th style="width:12%">Additional Details</th>
                                    <th style="width:8%">Status</th>
                                    <th style="width:8%">Date</th>
                                </tr>
                            </thead>

                            <tbody id="tbody_dealer">

                                <!-- Row 1 -->
                                <tr>
                                    <td>DL-001</td>
                                    <td>Farid Test</td>
                                    <td>01521204476</td>
                                    <td>Yes</td>
                                    <td>01711110001</td>
                                    <td>Male</td>
                                    <td>Dhaka</td>
                                    <td>Dhamrai</td>
                                    <td>Kushura</td>
                                    <td>Charpara</td>
                                    <td>New Dealership, Offers</td>
                                    <td>Pesticides & Fertilizers</td>
                                    <td>Interested in bulk supply</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>2024-11-25</td>
                                </tr>

                                <!-- Row 2 -->
                                <tr>
                                    <td>DL-002</td>
                                    <td>Farid Test</td>
                                    <td>01521204476</td>
                                    <td>Yes</td>
                                    <td>01711110001</td>
                                    <td>Male</td>
                                    <td>Dhaka</td>
                                    <td>Dhamrai</td>
                                    <td>Kushura</td>
                                    <td>Charpara</td>
                                    <td>Product Info, Credit Limit</td>
                                    <td>Hybrid Seeds</td>
                                    <td>Requested price list and availability</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>2024-11-25</td>
                                </tr>

                                <!-- Row 3 -->
                                <tr>
                                    <td>DL-003</td>
                                    <td>Farid Test</td>
                                    <td>01521204476</td>
                                    <td>Yes</td>
                                    <td>01711110001</td>
                                    <td>Male</td>
                                    <td>Dhaka</td>
                                    <td>Dhamrai</td>
                                    <td>Kushura</td>
                                    <td>Charpara</td>
                                    <td>Officer Info, Complain</td>
                                    <td>Seeds, Agro Chemicals</td>
                                    <td>Has query about delivery timeline</td>
                                    <td><span class="badge bg-warning text-dark">Inactive</span></td>
                                    <td>2024-11-25</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        table = new DataTable('#table_dealer', {
            processing: false,
            serverSide: false,
            responsive: false,
            order: [], // Initial no order
            bInfo: true, // Show total number of data
            bFilter: false, // Hide default search box
            ordering: false,
            searching: false,
            lengthMenu: [
                [5, 10, 15, 25, 50, 100, 200],
                [5, 10, 15, 25, 50, 100, 200]
            ],
            pageLength: 15, // Rows per page
            language: {
                emptyTable: '<strong class="text-danger">No Data Found</strong>',
                infoEmpty: '',
                zeroRecords: '<strong class="text-danger">No Data Found</strong>',
                paginate: {
                    previous: "Previous",
                    next: "Next"
                },
                lengthMenu: `_MENU_ `,
            },
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 text-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 text-end'p>>",
                buttons: [
                {
                    text: '<i class="fas fa-file-download fa-sm"></i> Export',
                    className: 'excelButton btn btn-sm btn-info export_btn rounded-0 text-white'
                },
                {
                    text: '+ Add New',
                    className: 'btn btn-sm btn-primary add_btn'
                },
            ]
        });
    </script>
@endpush
