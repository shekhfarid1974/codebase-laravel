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
        <div class="" id="retailer-content">
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
    </div>

@endsection

@push('scripts')
    <script>
    </script>
@endpush
