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

        .chip {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            background: #f1f3f5;
            font-size: 12px;
            margin-right: 6px;
        }

        .modal-lg {
            max-width: 900px;
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
                    <div class="small-muted">Total Calls</div>
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
                    <h4 id="kpi_land">0</h4>
                </div>
            </div>
        </div>

        <!-- FILTERS (dynamic per type) -->
        <div class="card mb-3">
            <div class="card-body" id="filterArea">
                <!-- dynamic filters will be injected here -->
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
                    <!-- Tables for each type (only one visible at a time) -->

                    <table id="table_farmer" class="table table-bordered table-striped mb-0 table-fixed d-none">
                        <thead class="table-light">
                            <tr>
                                <th style="width:6%">ID</th>
                                <th style="width:16%">Name</th>
                                <th style="width:10%">Mobile</th>
                                <th style="width:8%">District</th>
                                <th style="width:8%">Upazila</th>
                                <th style="width:8%">Crop(s)</th>
                                <th style="width:8%">Land Size</th>
                                <th style="width:10%">Lead Source</th>
                                <th style="width:8%">Status</th>
                                <th style="width:18%">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_farmer"></tbody>
                    </table>

                    <table id="table_retailer" class="table table-bordered table-striped mb-0 table-fixed d-none">
                        <thead class="table-light">
                            <tr>
                                <th style="width:6%">ID</th>
                                <th style="width:20%">Retailer Name</th>
                                <th style="width:12%">Mobile(s)</th>
                                <th style="width:10%">District / Upazila</th>
                                <th style="width:12%">Interest</th>
                                <th style="width:12%">Product List</th>
                                <th style="width:10%">ACCL Link</th>
                                <th style="width:8%">Status</th>
                                <th style="width:10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_retailer"></tbody>
                    </table>

                    <table id="table_dealer" class="table table-bordered table-striped mb-0 table-fixed d-none">
                        <thead class="table-light">
                            <tr>
                                <th style="width:6%">ID</th>
                                <th style="width:20%">Dealer Name</th>
                                <th style="width:12%">Mobile(s)</th>
                                <th style="width:12%">District / Upazila</th>
                                <th style="width:12%">Recommended</th>
                                <th style="width:12%">Product List</th>
                                <th style="width:8%">ACCL Link</th>
                                <th style="width:8%">Status</th>
                                <th style="width:10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_dealer"></tbody>
                    </table>

                    <table id="table_others" class="table table-bordered table-striped mb-0 table-fixed d-none">
                        <thead class="table-light">
                            <tr>
                                <th style="width:6%">ID</th>
                                <th style="width:22%">Name / Organisation</th>
                                <th style="width:12%">Mobile(s)</th>
                                <th style="width:12%">Category</th>
                                <th style="width:14%">Interaction History</th>
                                <th style="width:12%">ACCL Link</th>
                                <th style="width:8%">Status</th>
                                <th style="width:14%">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_others"></tbody>
                    </table>

                    <div id="emptyNote" class="empty-note d-none">No records to show for this report.</div>

                </div>
            </div>
        </div>

    </div>

    <!-- Details modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Record Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- injected -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Demo data built from the forms you provided (trimmed examples). Replace with AJAX to server in production.
        const demo = {
            farmer: {
                kpi: {
                    total_customers: 1245,
                    total_leads: 320,
                    accl_users: 210,
                    avg_land: 2.4
                },
                rows: [{
                        id: 'FMR-001',
                        name: 'Abdul Rahman',
                        mobile: '01711110001',
                        phone_own: 'Yes',
                        alt_contact: '01710000001',
                        gender: 'Male',
                        district: 'Dhaka',
                        upazila: 'Dhanmondi',
                        union: 'Uttara',
                        village: 'Ward 5',
                        problem_query: 'Yellowing leaves',
                        crops: ['Rice', 'Boro'],
                        land_size: 2.5,
                        solution: 'Apply fertilizer X',
                        interests: ['Seed A', 'Fertilizer B'],
                        lead_source: 'Field',
                        lead_status: 'Regular',
                        additional: 'Has previous purchases'
                    },
                    {
                        id: 'FMR-002',
                        name: 'Rina Akter',
                        mobile: '01711110003',
                        phone_own: 'No',
                        alt_contact: '',
                        gender: 'Female',
                        district: 'Rajshahi',
                        upazila: 'Bagha',
                        union: 'North',
                        village: 'Bagha',
                        problem_query: 'Water logging',
                        crops: ['Boro'],
                        land_size: 1.2,
                        solution: 'Raised bed',
                        interests: ['Pump'],
                        lead_source: 'Referral',
                        lead_status: 'Irregular',
                        additional: ''
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
                    id: 'RTR-001',
                    name: 'Retail Shop A',
                    mobiles: ['01822220001', '01822220005'],
                    gender: 'N/A',
                    district: 'Dhaka',
                    upazila: 'Gulshan',
                    village: 'Gulshan 2',
                    interest: 'Seed Retail',
                    product_list: ['Seed A', 'Fertilizer B'],
                    acc_link: 'https://accl.example/shopA',
                    remarks: 'Main retail',
                    status: 'Active'
                }]
            },
            dealer: {
                kpi: {
                    total_customers: 58,
                    total_leads: 12,
                    accl_users: 8,
                    avg_land: 0
                },
                rows: [{
                    id: 'DLR-001',
                    name: 'Dealer One',
                    mobiles: ['01933330001'],
                    district: 'Chattogram',
                    upazila: 'Kotwali',
                    recommended: 'Fertilizer B',
                    product_list: ['Seed A', 'Fertilizer B'],
                    acc_link: 'https://accl.example/dealer1',
                    remarks: 'Large capacity',
                    status: 'Active'
                }]
            },
            others: {
                kpi: {
                    total_customers: 78,
                    total_leads: 20,
                    accl_users: 5,
                    avg_land: 0.5
                },
                rows: [{
                    id: 'OTH-001',
                    category: 'NGO',
                    name: 'Coop Group',
                    mobiles: ['01644440001'],
                    remarks: 'Community program',
                    interaction_history: '2025-10-01: Workshop',
                    acc_link: 'https://accl.example/coop',
                    status: 'Active'
                }]
            }
        };

        function escapeHtml(text) {
            if (text === null || text === undefined) return '';
            return String(text).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        let currentType = 'farmer';
        let currentData = [...demo.farmer.rows];

        function renderKPIs(type) {
            const data = demo[type].kpi || {};
            document.getElementById('kpi_customers').innerText = data.total_customers ?? 0;
            document.getElementById('kpi_leads').innerText = data.total_leads ?? 0;
            document.getElementById('kpi_users').innerText = data.accl_users ?? 0;
            document.getElementById('kpi_land').innerText = (data.avg_land ?? 0) + ' Acre';
        }

        function renderFilters(type) {
            const area = document.getElementById('filterArea');
            area.innerHTML = '';
            if (type === 'farmer') {
                area.innerHTML = `
            <div class="row g-2 align-items-center">
                <div class="col-md-2"><input id="f_name" type="text" class="form-control filter-input" placeholder="Search Name"></div>
                <div class="col-md-2"><input id="f_mobile" type="text" class="form-control filter-input" placeholder="Mobile"></div>
                <div class="col-md-2"><select id="f_district" class="form-control filter-input"><option value="">District</option><option>Dhaka</option><option>Chattogram</option><option>Rajshahi</option></select></div>
                <div class="col-md-2"><select id="f_upazila" class="form-control filter-input"><option value="">Upazila</option><option>Dhanmondi</option><option>Mirpur</option></select></div>
                <div class="col-md-2"><select id="f_gender" class="form-control filter-input"><option value="">Gender</option><option>Male</option><option>Female</option></select></div>
                <div class="col-md-2 text-end"><button id="btn_search" class="btn btn-primary btn-sm">Search</button> <button id="btn_reset" class="btn btn-secondary btn-sm">Reset</button></div>
            </div>`;
            } else if (type === 'retailer') {
                area.innerHTML = `
            <div class="row g-2 align-items-center">
                <div class="col-md-3"><input id="r_name" type="text" class="form-control filter-input" placeholder="Retailer Name"></div>
                <div class="col-md-3"><input id="r_mobile" type="text" class="form-control filter-input" placeholder="Mobile"></div>
                <div class="col-md-3"><select id="r_district" class="form-control filter-input"><option value="">District</option><option>Dhaka</option><option>Chattogram</option></select></div>
                <div class="col-md-3 text-end"><button id="btn_search" class="btn btn-primary btn-sm">Search</button> <button id="btn_reset" class="btn btn-secondary btn-sm">Reset</button></div>
            </div>`;
            } else if (type === 'dealer') {
                area.innerHTML = `
            <div class="row g-2 align-items-center">
                <div class="col-md-3"><input id="d_name" type="text" class="form-control filter-input" placeholder="Dealer Name"></div>
                <div class="col-md-3"><input id="d_mobile" type="text" class="form-control filter-input" placeholder="Mobile"></div>
                <div class="col-md-3"><select id="d_district" class="form-control filter-input"><option value="">District</option><option>Dhaka</option><option>Chattogram</option></select></div>
                <div class="col-md-3 text-end"><button id="btn_search" class="btn btn-primary btn-sm">Search</button> <button id="btn_reset" class="btn btn-secondary btn-sm">Reset</button></div>
            </div>`;
            } else if (type === 'others') {
                area.innerHTML = `
            <div class="row g-2 align-items-center">
                <div class="col-md-3"><input id="o_name" type="text" class="form-control filter-input" placeholder="Name / Org"></div>
                <div class="col-md-3"><input id="o_mobile" type="text" class="form-control filter-input" placeholder="Mobile"></div>
                <div class="col-md-3"><select id="o_category" class="form-control filter-input"><option value="">Category</option><option>NGO</option><option>SAAO</option><option>Scientific Officer</option></select></div>
                <div class="col-md-3 text-end"><button id="btn_search" class="btn btn-primary btn-sm">Search</button> <button id="btn_reset" class="btn btn-secondary btn-sm">Reset</button></div>
            </div>`;
            }

            // attach handlers
            document.getElementById('btn_search').addEventListener('click', applyFilters);
            document.getElementById('btn_reset').addEventListener('click', function() {
                renderReport(currentType);
            });
        }

        function renderReport(type) {
            currentType = type;
            document.getElementById('current_type').innerText = capitalize(type);
            renderKPIs(type);
            renderFilters(type);
            hideAllTables();
            const data = demo[type];
            currentData = [...(data.rows || [])];
            if (!currentData.length) {
                document.getElementById('emptyNote').classList.remove('d-none');
            } else {
                document.getElementById('emptyNote').classList.add('d-none');
            }
            if (type === 'farmer') {
                document.getElementById('table_farmer').classList.remove('d-none');
                renderFarmerRows(currentData);
            }
            if (type === 'retailer') {
                document.getElementById('table_retailer').classList.remove('d-none');
                renderRetailerRows(currentData);
            }
            if (type === 'dealer') {
                document.getElementById('table_dealer').classList.remove('d-none');
                renderDealerRows(currentData);
            }
            if (type === 'others') {
                document.getElementById('table_others').classList.remove('d-none');
                renderOthersRows(currentData);
            }
        }

        function hideAllTables() {
            ['table_farmer', 'table_retailer', 'table_dealer', 'table_others'].forEach(id => document.getElementById(id)
                .classList.add('d-none'));
        }

        function renderFarmerRows(rows) {
            const tbody = document.getElementById('tbody_farmer');
            tbody.innerHTML = '';
            if (!rows.length) return;
            rows.forEach(r => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
            <td>${escapeHtml(r.id)}</td>
            <td>${escapeHtml(r.name)}</td>
            <td>${escapeHtml(r.mobile)}</td>
            <td>${escapeHtml(r.district)}</td>
            <td>${escapeHtml(r.upazila)}</td>
            <td>${escapeHtml((r.crops||[]).join(', '))}</td>
            <td>${escapeHtml(r.land_size)} Acre</td>
            <td>${escapeHtml(r.lead_source)}</td>
            <td>${escapeHtml(r.lead_status)}</td>
            <td><button class="btn btn-sm btn-outline-primary me-1" onclick="showDetails('farmer','${r.id}')">View</button><button class="btn btn-sm btn-outline-secondary" onclick="callNumber('${r.mobile}')">Call</button></td>
        `;
                tbody.appendChild(tr);
            });
        }

        function renderRetailerRows(rows) {
            const tbody = document.getElementById('tbody_retailer');
            tbody.innerHTML = '';
            if (!rows.length) return;
            rows.forEach(r => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
            <td>${escapeHtml(r.id)}</td>
            <td>${escapeHtml(r.name)}</td>
            <td>${escapeHtml((r.mobiles||[]).join(', '))}</td>
            <td>${escapeHtml(r.district + ' / ' + r.upazila)}</td>
            <td>${escapeHtml(r.interest)}</td>
            <td>${escapeHtml((r.product_list||[]).join(', '))}</td>
            <td>${r.acc_link? `<a href='${escapeHtml(r.acc_link)}' target='_blank'>Link</a>`: ''}</td>
            <td>${escapeHtml(r.status||'')}</td>
            <td><button class="btn btn-sm btn-outline-primary me-1" onclick="showDetails('retailer','${r.id}')">View</button></td>
        `;
                tbody.appendChild(tr);
            });
        }

        function renderDealerRows(rows) {
            const tbody = document.getElementById('tbody_dealer');
            tbody.innerHTML = '';
            if (!rows.length) return;
            rows.forEach(r => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
            <td>${escapeHtml(r.id)}</td>
            <td>${escapeHtml(r.name)}</td>
            <td>${escapeHtml((r.mobiles||[]).join(', '))}</td>
            <td>${escapeHtml(r.district + ' / ' + r.upazila)}</td>
            <td>${escapeHtml(r.recommended || '')}</td>
            <td>${escapeHtml((r.product_list||[]).join(', '))}</td>
            <td>${r.acc_link? `<a href='${escapeHtml(r.acc_link)}' target='_blank'>Link</a>`: ''}</td>
            <td>${escapeHtml(r.status||'')}</td>
            <td><button class="btn btn-sm btn-outline-primary me-1" onclick="showDetails('dealer','${r.id}')">View</button></td>
        `;
                tbody.appendChild(tr);
            });
        }

        function renderOthersRows(rows) {
            const tbody = document.getElementById('tbody_others');
            tbody.innerHTML = '';
            if (!rows.length) return;
            rows.forEach(r => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
            <td>${escapeHtml(r.id)}</td>
            <td>${escapeHtml(r.name)}</td>
            <td>${escapeHtml((r.mobiles||[]).join(', '))}</td>
            <td>${escapeHtml(r.category||'')}</td>
            <td>${escapeHtml(r.interaction_history||'')}</td>
            <td>${r.acc_link? `<a href='${escapeHtml(r.acc_link)}' target='_blank'>Link</a>`: ''}</td>
            <td>${escapeHtml(r.status||'')}</td>
            <td><button class="btn btn-sm btn-outline-primary me-1" onclick="showDetails('others','${r.id}')">View</button></td>
        `;
                tbody.appendChild(tr);
            });
        }

        function showDetails(type, id) {
            const rec = demo[type].rows.find(r => r.id === id);
            if (!rec) return;
            const modal = document.getElementById('modalBody');
            modal.innerHTML = buildDetailsHtml(type, rec);
            var myModal = new bootstrap.Modal(document.getElementById('detailsModal'));
            myModal.show();
        }

        function buildDetailsHtml(type, r) {
            let html = '<div class="row">';
            if (type === 'farmer') {
                html +=
                    `<div class="col-md-6"><h6>Basic</h6><p><strong>ID:</strong> ${escapeHtml(r.id)}<br><strong>Name:</strong> ${escapeHtml(r.name)}<br><strong>Mobile:</strong> ${escapeHtml(r.mobile)}<br><strong>Phone Own:</strong> ${escapeHtml(r.phone_own)}</p></div>`;
                html +=
                    `<div class="col-md-6"><h6>Location</h6><p><strong>District:</strong> ${escapeHtml(r.district)}<br><strong>Upazila:</strong> ${escapeHtml(r.upazila)}<br><strong>Union:</strong> ${escapeHtml(r.union)}<br><strong>Village:</strong> ${escapeHtml(r.village)}</p></div>`;
                html +=
                    `<div class="col-12"><h6>Crop & Interest</h6><p><strong>Crops:</strong> ${escapeHtml((r.crops||[]).join(', '))}<br><strong>Land Size:</strong> ${escapeHtml(r.land_size)} Acre<br><strong>Interests:</strong> ${escapeHtml((r.interests||[]).join(', '))}</p></div>`;
                html +=
                    `<div class="col-12"><h6>Problem & Solution</h6><p><strong>Problem:</strong> ${escapeHtml(r.problem_query)}<br><strong>Solution:</strong> ${escapeHtml(r.solution)}<br><strong>Additional:</strong> ${escapeHtml(r.additional)}</p></div>`;
            } else if (type === 'retailer') {
                html +=
                    `<div class="col-md-6"><h6>Retailer</h6><p><strong>ID:</strong> ${escapeHtml(r.id)}<br><strong>Name:</strong> ${escapeHtml(r.name)}<br><strong>Mobiles:</strong> ${escapeHtml((r.mobiles||[]).join(', '))}</p></div>`;
                html +=
                    `<div class="col-md-6"><h6>Location & Links</h6><p><strong>District/Upazila:</strong> ${escapeHtml(r.district + ' / ' + r.upazila)}<br><strong>ACCL:</strong> ${r.acc_link? `<a href='${escapeHtml(r.acc_link)}' target='_blank'>Link</a>` : ''}</p></div>`;
                html +=
                    `<div class="col-12"><h6>Products & Remarks</h6><p>${escapeHtml((r.product_list||[]).join(', '))}<br>${escapeHtml(r.remarks||'')}</p></div>`;
            } else if (type === 'dealer') {
                html +=
                    `<div class="col-md-6"><h6>Dealer</h6><p><strong>ID:</strong> ${escapeHtml(r.id)}<br><strong>Name:</strong> ${escapeHtml(r.name)}<br><strong>Mobiles:</strong> ${escapeHtml((r.mobiles||[]).join(', '))}</p></div>`;
                html +=
                    `<div class="col-md-6"><h6>Business</h6><p><strong>Recommended:</strong> ${escapeHtml(r.recommended||'')}<br><strong>ACCL:</strong> ${r.acc_link? `<a href='${escapeHtml(r.acc_link)}' target='_blank'>Link</a>` : ''}</p></div>`;
                html +=
                    `<div class="col-12"><h6>Product List & Remarks</h6><p>${escapeHtml((r.product_list||[]).join(', '))}<br>${escapeHtml(r.remarks||'')}</p></div>`;
            } else if (type === 'others') {
                html +=
                    `<div class="col-md-6"><h6>Contact</h6><p><strong>ID:</strong> ${escapeHtml(r.id)}<br><strong>Category:</strong> ${escapeHtml(r.category)}<br><strong>Name:</strong> ${escapeHtml(r.name)}<br><strong>Mobiles:</strong> ${escapeHtml((r.mobiles||[]).join(', '))}</p></div>`;
                html +=
                    `<div class="col-md-6"><h6>History & Links</h6><p><strong>Interaction History:</strong> ${escapeHtml(r.interaction_history||'')}<br><strong>ACCL:</strong> ${r.acc_link? `<a href='${escapeHtml(r.acc_link)}' target='_blank'>Link</a>` : ''}</p></div>`;
                html += `<div class="col-12"><h6>Remarks</h6><p>${escapeHtml(r.remarks||'')}</p></div>`;
            }
            html += '</div>';
            return html;
        }

        function callNumber(mobile) { // integrate with your telephone system here (example uses tel:)
            if (!mobile) {
                alert('No mobile number');
                return;
            }
            // If you have a click-to-call system, replace with appropriate URL/POST
            window.location.href = `tel:${mobile}`;
        }

        function applyFilters() {
            const type = currentType;
            let filtered = [...currentData];
            if (type === 'farmer') {
                const name = document.getElementById('f_name').value.trim().toLowerCase();
                const mobile = document.getElementById('f_mobile').value.trim();
                const district = document.getElementById('f_district').value;
                const upazila = document.getElementById('f_upazila').value;
                const gender = document.getElementById('f_gender').value;
                filtered = filtered.filter(r => {
                    if (name && !String(r.name).toLowerCase().includes(name)) return false;
                    if (mobile && !String(r.mobile).includes(mobile)) return false;
                    if (district && String(r.district) !== district) return false;
                    if (upazila && String(r.upazila) !== upazila) return false;
                    if (gender && String(r.gender) !== gender) return false;
                    return true;
                });
                renderFarmerRows(filtered);
            } else if (type === 'retailer') {
                const name = document.getElementById('r_name').value.trim().toLowerCase();
                const mobile = document.getElementById('r_mobile').value.trim();
                const district = document.getElementById('r_district').value;
                filtered = filtered.filter(r => {
                    if (name && !String(r.name).toLowerCase().includes(name)) return false;
                    if (mobile && !((r.mobiles || []).join(', ').includes(mobile))) return false;
                    if (district && String(r.district) !== district) return false;
                    return true;
                });
                renderRetailerRows(filtered);
            } else if (type === 'dealer') {
                const name = document.getElementById('d_name').value.trim().toLowerCase();
                const mobile = document.getElementById('d_mobile').value.trim();
                const district = document.getElementById('d_district').value;
                filtered = filtered.filter(r => {
                    if (name && !String(r.name).toLowerCase().includes(name)) return false;
                    if (mobile && !((r.mobiles || []).join(', ').includes(mobile))) return false;
                    if (district && String(r.district) !== district) return false;
                    return true;
                });
                renderDealerRows(filtered);
            } else if (type === 'others') {
                const name = document.getElementById('o_name').value.trim().toLowerCase();
                const mobile = document.getElementById('o_mobile').value.trim();
                const cat = document.getElementById('o_category').value;
                filtered = filtered.filter(r => {
                    if (name && !String(r.name).toLowerCase().includes(name)) return false;
                    if (mobile && !((r.mobiles || []).join(', ').includes(mobile))) return false;
                    if (cat && String(r.category) !== cat) return false;
                    return true;
                });
                renderOthersRows(filtered);
            }
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

            document.getElementById('export_excel').addEventListener('click',
                () => { // replace with real export to server
                    alert('Export Excel - implement server-side export (send current filters and type)');
                });
            document.getElementById('export_pdf').addEventListener('click', () => {
                alert('Export PDF - implement server-side export (send current filters and type)');
            });
        });
    </script>

@endsection
