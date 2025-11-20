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
            border: 1px solid #dcdcdc;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
            cursor: pointer;
            background: #fff;
            transition: .15s;
        }

        .report-switch.active,
        .report-switch:hover {
            background: #0d6efd;
            color: #fff;
        }

        .kpi-box {
            background: #fff;
            border-radius: 10px;
            padding: 14px;
            border: 1px solid #eee;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .04);
            text-align: center;
        }

        .filter-input {
            height: 34px;
            font-size: 13px;
        }

        .small-muted {
            font-size: 12px;
            color: #6c757d;
        }

        .empty-note {
            padding: 30px;
            text-align: center;
            color: #6c757d;
        }

        .table-fixed {
            table-layout: fixed;
            word-wrap: break-word;
        }
    </style>

    <div class="container-fluid py-3">

        <!-- SWITCH BUTTONS -->
        <div class="row mb-3">
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

        <!-- KPI SECTION -->
        <div class="row mb-4" id="kpiRow">
            <div class="col-md-3 mb-3">
                <div class="kpi-box">
                    <div class="small-muted">Total Customers</div>
                    <h4 id="kpi_customers">0</h4>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="kpi-box">
                    <div class="small-muted">Total Leads</div>
                    <h4 id="kpi_leads">0</h4>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="kpi-box">
                    <div class="small-muted">ACCL Users</div>
                    <h4 id="kpi_users">0</h4>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="kpi-box">
                    <div class="small-muted">Avg Land Size</div>
                    <h4 id="kpi_land">0 Acre</h4>
                </div>
            </div>
        </div>

        <!-- FILTERS -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-2 align-items-center">
                    <div class="col-md-2"><input id="f_name" type="text" class="form-control filter-input"
                            placeholder="Search Name"></div>
                    <div class="col-md-2"><input id="f_mobile" type="text" class="form-control filter-input"
                            placeholder="Mobile"></div>
                    <div class="col-md-2"><select id="f_district" class="form-control filter-input">
                            <option value="">District</option>
                            <option>Dhaka</option>
                            <option>Chattogram</option>
                            <option>Rajshahi</option>
                        </select></div>
                    <div class="col-md-2"><select id="f_upazila" class="form-control filter-input">
                            <option value="">Upazila</option>
                            <option>Mirpur</option>
                            <option>Paltan</option>
                        </select></div>
                    <div class="col-md-2">
                        <select id="f_gender" class="form-control filter-input">
                            <option value="">Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="col-md-2 text-end">
                        <button id="btn_search" class="btn btn-primary btn-sm">Search</button>
                        <button id="btn_reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- REPORT TABLE -->
        <div class="card mb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Report Data — <span id="current_type">Farmer</span></strong>
                <div>
                    <button id="export_excel" class="btn btn-outline-primary btn-sm me-1">Export Excel</button>
                    <button id="export_pdf" class="btn btn-outline-danger btn-sm">PDF</button>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="crm_table" class="table table-bordered table-striped mb-0 table-fixed">
                        <thead class="table-light">
                            <tr>
                                <th style="width:6%">ID</th>
                                <th style="width:18%">Name</th>
                                <th style="width:12%">Mobile</th>
                                <th style="width:12%">District</th>
                                <th style="width:12%">Upazila</th>
                                <th style="width:12%">Union</th>
                                <th style="width:8%">Gender</th>
                                <th style="width:10%">Crop</th>
                                <th style="width:10%">Lead Source</th>
                                <th style="width:10%">Status</th>
                            </tr>
                        </thead>
                        <tbody id="crm_tbody"></tbody>
                    </table>

                    <div id="emptyNote" class="empty-note d-none">
                        No records to show for this report.
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- JS SCRIPT --}}
    <script>
        /* ALL YOUR JS EXACTLY AS PROVIDED – NO CHANGE */

        const demoData = {
            farmer: {
                kpi: {
                    total_customers: 1245,
                    total_leads: 320,
                    accl_users: 210,
                    avg_land: 2.4
                },
                rows: [{
                        id: 1,
                        name: 'Abdul Rahman',
                        mobile: '01711110001',
                        district: 'Dhaka',
                        upazila: 'Dhanmondi',
                        union: 'Uttara',
                        gender: 'Male',
                        crop: 'Rice',
                        lead_source: 'Field',
                        status: 'Active'
                    },
                    {
                        id: 2,
                        name: 'Jamal Uddin',
                        mobile: '01711110002',
                        district: 'Chattogram',
                        upazila: 'Panchlaish',
                        union: 'West',
                        gender: 'Male',
                        crop: 'Wheat',
                        lead_source: 'Call',
                        status: 'Follow-up'
                    },
                    {
                        id: 3,
                        name: 'Rina Akter',
                        mobile: '01711110003',
                        district: 'Rajshahi',
                        upazila: 'Bagha',
                        union: 'North',
                        gender: 'Female',
                        crop: 'Boro',
                        lead_source: 'Referral',
                        status: 'Active'
                    },
                    {
                        id: 4,
                        name: 'Karim Mia',
                        mobile: '01711110004',
                        district: 'Dhaka',
                        upazila: 'Mirpur',
                        union: 'Mirpur',
                        gender: 'Male',
                        crop: 'Corn',
                        lead_source: 'Field',
                        status: 'Active'
                    },
                    {
                        id: 5,
                        name: 'Fatema Begum',
                        mobile: '01711110005',
                        district: 'Chattogram',
                        upazila: 'Kotwali',
                        union: 'South',
                        gender: 'Female',
                        crop: 'Vegetables',
                        lead_source: 'Call',
                        status: 'Inactive'
                    }
                ]
            },
            retailer: {
                kpi: {
                    total_customers: 340,
                    total_leads: 87,
                    accl_users: 45,
                    avg_land: 0
                },
                rows: [{
                        id: 101,
                        name: 'Retail Shop A',
                        mobile: '01822220001',
                        district: 'Dhaka',
                        upazila: 'Gulshan',
                        union: 'N/A',
                        gender: 'N/A',
                        crop: 'N/A',
                        lead_source: 'Email',
                        status: 'Active'
                    },
                    {
                        id: 102,
                        name: 'Retail Shop B',
                        mobile: '01822220002',
                        district: 'Dhaka',
                        upazila: 'Banani',
                        union: 'N/A',
                        gender: 'N/A',
                        crop: 'N/A',
                        lead_source: 'Visit',
                        status: 'Inactive'
                    },
                    {
                        id: 103,
                        name: 'Retail Shop C',
                        mobile: '01822220003',
                        district: 'Chattogram',
                        upazila: 'Agrabad',
                        union: 'N/A',
                        gender: 'N/A',
                        crop: 'N/A',
                        lead_source: 'Referral',
                        status: 'Active'
                    }
                ]
            },
            dealer: {
                kpi: {
                    total_customers: 58,
                    total_leads: 12,
                    accl_users: 8,
                    avg_land: 0
                },
                rows: [{
                        id: 201,
                        name: 'Dealer One',
                        mobile: '01933330001',
                        district: 'Chattogram',
                        upazila: 'Kotwali',
                        union: 'N/A',
                        gender: 'N/A',
                        crop: 'N/A',
                        lead_source: 'Trade',
                        status: 'Active'
                    },
                    {
                        id: 202,
                        name: 'Dealer Two',
                        mobile: '01933330002',
                        district: 'Dhaka',
                        upazila: 'Motijheel',
                        union: 'N/A',
                        gender: 'N/A',
                        crop: 'N/A',
                        lead_source: 'Email',
                        status: 'Pending'
                    }
                ]
            },
            others: {
                kpi: {
                    total_customers: 78,
                    total_leads: 20,
                    accl_users: 5,
                    avg_land: 0.5
                },
                rows: [{
                        id: 301,
                        name: 'Coop Group',
                        mobile: '01644440001',
                        district: 'Dhaka',
                        upazila: 'Mirpur',
                        union: 'N/A',
                        gender: 'N/A',
                        crop: 'Vegetable',
                        lead_source: 'Workshop',
                        status: 'Active'
                    },
                    {
                        id: 302,
                        name: 'Agri NGO',
                        mobile: '01644440002',
                        district: 'Rajshahi',
                        upazila: 'Godagari',
                        union: 'N/A',
                        gender: 'N/A',
                        crop: 'Fruits',
                        lead_source: 'Seminar',
                        status: 'Active'
                    }
                ]
            }
        };

        function escapeHtml(text) {
            if (text === null || text === undefined) return '';
            return String(text)
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        let currentType = 'farmer';
        let currentData = [...demoData.farmer.rows];

        function renderReport(type) {
            const data = demoData[type] || {
                kpi: {},
                rows: []
            };
            currentType = type;
            currentData = [...data.rows];

            document.getElementById('current_type').innerText = capitalize(type);
            document.getElementById('kpi_customers').innerText = data.kpi.total_customers ?? 0;
            document.getElementById('kpi_leads').innerText = data.kpi.total_leads ?? 0;
            document.getElementById('kpi_users').innerText = data.kpi.accl_users ?? 0;
            document.getElementById('kpi_land').innerText = (data.kpi.avg_land ?? 0) + ' Acre';

            renderTableRows(currentData);
        }

        function renderTableRows(rows) {
            const tbody = document.getElementById('crm_tbody');
            tbody.innerHTML = '';

            if (!rows || rows.length === 0) {
                document.getElementById('emptyNote').classList.remove('d-none');
                document.getElementById('crm_table').classList.add('d-none');
                return;
            }

            document.getElementById('emptyNote').classList.add('d-none');
            document.getElementById('crm_table').classList.remove('d-none');

            rows.forEach(r => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                <td>${escapeHtml(r.id)}</td>
                <td>${escapeHtml(r.name)}</td>
                <td>${escapeHtml(r.mobile)}</td>
                <td>${escapeHtml(r.district)}</td>
                <td>${escapeHtml(r.upazila)}</td>
                <td>${escapeHtml(r.union)}</td>
                <td>${escapeHtml(r.gender)}</td>
                <td>${escapeHtml(r.crop)}</td>
                <td>${escapeHtml(r.lead_source)}</td>
                <td>${escapeHtml(r.status)}</td>
            `;
                tbody.appendChild(tr);
            });
        }

        function capitalize(s) {
            return s.charAt(0).toUpperCase() + s.slice(1);
        }

        document.addEventListener('DOMContentLoaded', function() {
            renderReport('farmer');

            document.querySelectorAll('.report-switch').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.report-switch').forEach(b => b.classList.remove(
                        'active'));
                    this.classList.add('active');
                    renderReport(this.dataset.type);
                });
            });

            document.getElementById('btn_search').addEventListener('click', function() {
                const name = document.getElementById('f_name').value.trim().toLowerCase();
                const mobile = document.getElementById('f_mobile').value.trim();
                const district = document.getElementById('f_district').value;
                const upazila = document.getElementById('f_upazila').value;
                const gender = document.getElementById('f_gender').value;

                const filteredRows = currentData.filter(r => {
                    if (name && !String(r.name).toLowerCase().includes(name)) return false;
                    if (mobile && !String(r.mobile).includes(mobile)) return false;
                    if (district && String(r.district) !== district) return false;
                    if (upazila && String(r.upazila) !== upazila) return false;
                    if (gender && String(r.gender) !== gender) return false;
                    return true;
                });

                renderTableRows(filteredRows);
            });

            document.getElementById('btn_reset').addEventListener('click', function() {
                ['f_name', 'f_mobile', 'f_district', 'f_upazila', 'f_gender'].forEach(id => document
                    .getElementById(id).value = '');
                renderReport(currentType);
            });

            document.getElementById('export_excel').addEventListener('click', () => {
                alert('Export Excel (demo)');
            });
            document.getElementById('export_pdf').addEventListener('click', () => {
                alert('Export PDF (demo)');
            });
        });
    </script>

@endsection
