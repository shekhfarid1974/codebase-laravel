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

        <ul class="nav nav-tabs mb-4 gap-2" id="reportTabs" role="tablist" style="border-bottom: none;">
            <li class="nav-item" role="presentation">
                <button class="btn btn-primary active" id="farmer-tab" data-bs-toggle="tab" data-bs-target="#farmer-content" type="button" role="tab" aria-controls="farmer-content" aria-selected="true">Farmer Report</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-primary" id="retailer-tab" data-bs-toggle="tab" data-bs-target="#retailer-content" type="button" role="tab" aria-controls="retailer-content" aria-selected="false">Retailer Report</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-primary" id="dealer-tab" data-bs-toggle="tab" data-bs-target="#dealer-content" type="button" role="tab" aria-controls="dealer-content" aria-selected="false">Dealer Report</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-primary" id="others-tab" data-bs-toggle="tab" data-bs-target="#others-content" type="button" role="tab" aria-controls="others-content" aria-selected="false">Others Report</button>
            </li>
        </ul>

        <div class="tab-content" id="reportTabContent">

            <div class="tab-pane fade show active" id="farmer-content" role="tabpanel" aria-labelledby="farmer-tab">

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Total Calls</div>
                            <h4 id="kpi_farmer_calls">1245</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Total Leads</div>
                            <h4 id="kpi_farmer_leads">320</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">ACCL Users</div>
                            <h4 id="kpi_farmer_users">210</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Avg Land Size</div>
                            <h4 id="kpi_farmer_land">2.4 Acre</h4>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Search Name, Phone Number">
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
                                <select name="upazila_id" class="form-select" required="">
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
                        <strong>Report Data — Farmer</strong>

                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="table_farmer" class="table table-bordered table-striped mb-0 table-fixed">
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
                                        <th style="width:10%">Targeted Crop</th>
                                        <th style="width:8%">Land Size</th>
                                        <th style="width:10%">Product Interests</th>
                                        <th style="width:12%">Problem/Query</th>
                                        <th style="width:12%">Additional Details</th>
                                        <th style="width:12%">Recommended Products</th>
                                        <th style="width:12%">Solution Details</th>
                                        <th style="width:10%">Lead Status</th>
                                        <th style="width:12%">Lead Source</th>
                                        <th style="width:8%">ACCL User</th>
                                        <th style="width:12%">Date</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody_farmer">
                                    <!-- Row 1 -->
                                    <tr>
                                        <td>FMR-001</td>
                                        <td>Farid Test</td>
                                        <td>01521204476</td>
                                        <td>Yes</td>
                                        <td>01711110001</td>
                                        <td>Male</td>
                                        <td>Dhaka</td>
                                        <td>Dhamrai</td>
                                        <td>Kushura</td>
                                        <td>Charpara</td>
                                        <td>Rice, Maize</td>
                                        <td>30 Decimal</td>
                                        <td>Insecticide, Herbicide</td>
                                        <td>Insect attack in rice field</td>
                                        <td>Farmer also grows maize seasonally</td>
                                        <td>Pesticide B, Fertilizer A</td>
                                        <td>Apply Pesticide B every 10 days</td>
                                        <td><span class="badge bg-success">Regular</span></td>
                                        <td>Farmer Meeting, Website</td>
                                        <td>No</td>
                                        <td>
                                            2024-11-25
                                        </td>
                                    </tr>

                                    <!-- Row 2 -->
                                    <tr>
                                        <td>FMR-002</td>
                                        <td>Rina Akter</td>
                                        <td>01711110003</td>
                                        <td>No</td>
                                        <td>01799990011</td>
                                        <td>Female</td>
                                        <td>Rajshahi</td>
                                        <td>Bagha</td>
                                        <td>Arani</td>
                                        <td>Notunpara</td>
                                        <td>Boro</td>
                                        <td>45 Decimal</td>
                                        <td>Fungicide</td>
                                        <td>Leaf spot problem</td>
                                        <td>Uses organic fertilizer</td>
                                        <td>Fungicide X</td>
                                        <td>Spray twice every 7 days</td>
                                        <td><span class="badge bg-warning text-dark">Irregular</span></td>
                                        <td>Referral, Call Center</td>
                                        <td>Yes</td>
                                        <td>
                                            2024-11-25
                                        </td>
                                    </tr>

                                    <!-- Row 3 -->
                                    <tr>
                                        <td>FMR-003</td>
                                        <td>Karim Hossain</td>
                                        <td>01712220005</td>
                                        <td>Yes</td>
                                        <td>01756660044</td>
                                        <td>Male</td>
                                        <td>Khulna</td>
                                        <td>Dacope</td>
                                        <td>Pankhali</td>
                                        <td>Sundarpur</td>
                                        <td>Potato, Onion</td>
                                        <td>60 Decimal</td>
                                        <td>Herbicide, Others</td>
                                        <td>Weed problem</td>
                                        <td>Farmer wants demo plot</td>
                                        <td>Herbicide C</td>
                                        <td>Use 2ml per liter water</td>
                                        <td><span class="badge bg-success">Regular</span></td>
                                        <td>Website, DAE</td>
                                        <td>No</td>
                                        <td>
                                            2024-11-25
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="retailer-content" role="tabpanel" aria-labelledby="retailer-tab">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Total Shops</div>
                            <h4 id="kpi_retailer_calls">450</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">New Registration</div>
                            <h4 id="kpi_retailer_leads">55</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Active Users</div>
                            <h4 id="kpi_retailer_users">300</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Avg Monthly Sales</div>
                            <h4 id="kpi_retailer_sales">BDT 50K</h4>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Shop Name, Mobile">
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
                                <select name="product_interest" id="product_interest" class="form-select" >
                                    <option value="New retailer accquisition">Product Interest</option>
                                    <option value="Dealer Information" >Dealer Information</option>
                                    <option value="Officer Information" >Officer Information</option>
                                    <option value="Complain" >Complain</option>
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
                        <strong>Report Data — Retailer</strong>

                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="table_retailer" class="table table-bordered table-striped mb-0 table-fixed">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width:6%">ID</th>
                                        <th style="width:14%">Retailer Name</th>
                                        <th style="width:10%">Mobile</th>
                                        <th style="width:8%">Own No</th>
                                        <th style="width:10%">Alt. Number</th>
                                        <th style="width:8%">District</th>
                                        <th style="width:8%">Upazila</th>
                                        <th style="width:8%">Union</th>
                                        <th style="width:8%">Village</th>
                                        <th style="width:14%">Retailer Interests</th>
                                        <th style="width:14%">Additional Details</th>
                                        <th style="width:8%">Date</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody_retailer">

                                    <!-- Row 1 -->
                                    <tr>
                                        <td>RTL-001</td>
                                        <td>Maa Enterprise</td>
                                        <td>01823456789</td>
                                        <td>Yes</td>
                                        <td>01711112222</td>
                                        <td>Dhaka</td>
                                        <td>Savar</td>
                                        <td>Birulia</td>
                                        <td>Ghoshbag</td>
                                        <td>Dealer Info, Offers</td>
                                        <td>Interested to expand business</td>
                                        <td>2024-11-25</td>
                                    </tr>

                                    <!-- Row 2 -->
                                    <tr>
                                        <td>RTL-002</td>
                                        <td>Jamal Store</td>
                                        <td>01987654321</td>
                                        <td>No</td>
                                        <td>01799990022</td>
                                        <td>Cumilla</td>
                                        <td>Barura</td>
                                        <td>Khoshbas</td>
                                        <td>South Para</td>
                                        <td>New Retailer Acquisition</td>
                                        <td>Looking for dealership</td>
                                        <td>2024-11-25</td>
                                    </tr>

                                    <!-- Row 3 -->
                                    <tr>
                                        <td>RTL-003</td>
                                        <td>Rahman Agro</td>
                                        <td>01722223333</td>
                                        <td>Yes</td>
                                        <td>01855556666</td>
                                        <td>Rajshahi</td>
                                        <td>Puthia</td>
                                        <td>Belpukur</td>
                                        <td>Shibpur</td>
                                        <td>Complain, Officer Info</td>
                                        <td>Requested information about field officer</td>
                                        <td>2024-11-25</td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="dealer-content" role="tabpanel" aria-labelledby="dealer-tab">
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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="table_dealer" class="table table-bordered table-striped mb-0 table-fixed">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width:6%">ID</th>
                                        <th style="width:16%">Dealer Name</th>
                                        <th style="width:12%">Mobile</th>
                                        <th style="width:8%">District</th>
                                        <th style="width:8%">Upazila</th>
                                        <th style="width:8%">Union</th>
                                        <th style="width:8%">Village</th>
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
                                        <td>North East Agro</td>
                                        <td>01733445566</td>
                                        <td>Sylhet</td>
                                        <td>Kanaighat</td>
                                        <td>Fatehpur</td>
                                        <td>Shibganj</td>
                                        <td>New Dealership, Offers</td>
                                        <td>Pesticides & Fertilizers</td>
                                        <td>Interested in bulk supply</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>2024-11-25</td>
                                    </tr>

                                    <!-- Row 2 -->
                                    <tr>
                                        <td>DL-002</td>
                                        <td>Bhuiyan Seeds</td>
                                        <td>01899887766</td>
                                        <td>Dhaka</td>
                                        <td>Keraniganj</td>
                                        <td>Joydebpur</td>
                                        <td>Shantinagar</td>
                                        <td>Product Info, Credit Limit</td>
                                        <td>Hybrid Seeds</td>
                                        <td>Requested price list and availability</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>2024-11-25</td>
                                    </tr>

                                    <!-- Row 3 -->
                                    <tr>
                                        <td>DL-003</td>
                                        <td>Rahim Traders</td>
                                        <td>01777778888</td>
                                        <td>Chittagong</td>
                                        <td>Boalkhali</td>
                                        <td>Fatikchhari</td>
                                        <td>Kanchanpur</td>
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

            <div class="tab-pane fade" id="others-content" role="tabpanel" aria-labelledby="others-tab">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Total Contacts</div>
                            <h4 id="kpi_others_calls">150</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Organisations</div>
                            <h4 id="kpi_others_leads">35</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Last Contact (Days)</div>
                            <h4 id="kpi_others_users">7</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kpi-box">
                            <div class="small-muted">Category Count</div>
                            <h4 id="kpi_others_category">5</h4>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Name/Org, Mobile">
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" aria-label="Category filter">
                                    <option selected>Category</option>
                                    <option value="Media">Media</option>
                                    <option value="Govt">Govt</option>
                                    <option value="NGO">NGO</option>
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
                        <strong>Report Data — Others</strong>

                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="table_others" class="table table-bordered table-striped mb-0 table-fixed">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width:6%">ID</th>
                                        <th style="width:22%">Name / Organisation</th>
                                        <th style="width:12%">Mobile(s)</th>
                                        <th style="width:12%">Category</th>
                                        <th style="width:14%">Interests / Interaction History</th>
                                        <th style="width:12%">ACCL Link</th>
                                        <th style="width:8%">Status</th>
                                        <th style="width:14%">Date</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody_others">

                                    <!-- Row 1 -->
                                    <tr>
                                        <td>OTH-001</td>
                                        <td>Ministry of Agriculture</td>
                                        <td>N/A</td>
                                        <td>Govt</td>
                                        <td>Product, Officer Information (Meeting: 2025-05-10)</td>
                                        <td><span class="badge bg-success">Yes</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>2024-11-25</td>
                                    </tr>

                                    <!-- Row 2 -->
                                    <tr>
                                        <td>OTH-002</td>
                                        <td>Shuvro Media</td>
                                        <td>01511223344</td>
                                        <td>Media</td>
                                        <td>Disease, Complain (Email: 2025-11-20)</td>
                                        <td><span class="badge bg-warning text-dark">No</span></td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <td>2024-11-25</td>
                                    </tr>

                                    <!-- Row 3 -->
                                    <tr>
                                        <td>OTH-003</td>
                                        <td>Green NGO</td>
                                        <td>01766778899</td>
                                        <td>NGO</td>
                                        <td>Product, Officer Information</td>
                                        <td><span class="badge bg-success">Yes</span></td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>2024-11-25</td>
                                    </tr>

                                    <!-- Row 4 -->
                                    <tr>
                                        <td>OTH-004</td>
                                        <td>Dr. Karim (Scientific Officer)</td>
                                        <td>01812345678</td>
                                        <td>Scientific Officer</td>
                                        <td>Complain, Disease</td>
                                        <td><span class="badge bg-warning text-dark">No</span></td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <td>2024-11-25</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
    </script>
@endpush
