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

        <div class="" id="farmer-content">

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
    </div>

@endsection

@push('scripts')
    <script>
    </script>
@endpush
