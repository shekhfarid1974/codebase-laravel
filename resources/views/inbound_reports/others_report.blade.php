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
        <div class="" id="others-content">
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

@endsection

@push('scripts')
    <script>
    </script>
@endpush
