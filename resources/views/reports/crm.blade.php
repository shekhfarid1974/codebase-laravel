{{-- @extends('layouts.app')

@section('title', 'CRM Reports')
@section('page_title', 'CRM Reports')

@section('content')
<div class="card">
    <div class="card-header">
        CRM Reports
    </div>
    <div class="card-body text-center">
        <i class="fas fa-tools" style="font-size: 3rem; color: #adb5bd; margin-bottom: 20px;"></i>
        <h3>Module Under Development</h3>
        <p>This module is currently under development and will be available soon.</p>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('title', 'CRM Reports')
@section('page_title', 'CRM Reports')

@section('content')

<style>
    .report-switch {
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        font-size: 15px;
        cursor: pointer;
        border: 1px solid #dee2e6;
        background: #fff;
        transition: 0.3s;
    }
    .report-switch.active {
        background: #0d6efd;
        color: #fff;
    }
    .report-switch:hover {
        background: #0d6efd;
        color: #fff;
    }
    .kpi-box {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 18px;
        text-align: center;
        border: 1px solid #eee;
    }
    .filter-input {
        height: 32px;
        font-size: 13px;
    }
</style>

<!-- ====================== REPORT SWITCH BUTTONS ====================== -->

<div class="row mb-4">
    <div class="col-3">
        <div class="report-switch active" data-type="farmer">Farmer Report</div>
    </div>
    <div class="col-3">
        <div class="report-switch" data-type="retailer">Retailer Report</div>
    </div>
    <div class="col-3">
        <div class="report-switch" data-type="dealer">Dealer Report</div>
    </div>
    <div class="col-3">
        <div class="report-switch" data-type="others">Others Report</div>
    </div>
</div>

<!-- ====================== KPI SECTION ====================== -->

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="kpi-box">
            <small>Total Customers</small>
            <h4>0</h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="kpi-box">
            <small>Total Leads</small>
            <h4>0</h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="kpi-box">
            <small>ACCL Users</small>
            <h4>0</h4>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="kpi-box">
            <small>Avg Land Size</small>
            <h4>0 Acre</h4>
        </div>
    </div>
</div>

<!-- ====================== TABLE FILTERS ====================== -->

<div class="card mb-3">
    <div class="card-body">

        <div class="row g-2">

            <div class="col-md-2">
                <input type="text" class="form-control filter-input" placeholder="Search Name">
            </div>

            <div class="col-md-2">
                <input type="text" class="form-control filter-input" placeholder="Mobile">
            </div>

            <div class="col-md-2">
                <select class="form-control filter-input">
                    <option value="">District</option>
                </select>
            </div>

            <div class="col-md-2">
                <select class="form-control filter-input">
                    <option value="">Upazila</option>
                </select>
            </div>

            <div class="col-md-2">
                <select class="form-control filter-input">
                    <option value="">Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <div class="col-md-2 text-end">
                <button class="btn btn-primary btn-sm">Export Excel</button>
                <button class="btn btn-danger btn-sm">PDF</button>
            </div>

        </div>

    </div>
</div>

<!-- ====================== REPORT TABLE ====================== -->

<div class="card">
    <div class="card-header">
        <strong>Report Data</strong>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>District</th>
                        <th>Upazila</th>
                        <th>Union</th>
                        <th>Gender</th>
                        <th>Crop</th>
                        <th>Lead Source</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- dynamic rows here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Switch between different report views
    document.querySelectorAll('.report-switch').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.report-switch').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            let type = this.getAttribute('data-type');
            console.log("Selected Report Type:", type);

            // TODO: load table data for selected report
        });
    });
</script>
@endsection
