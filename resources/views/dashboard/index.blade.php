@extends('layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <div id="dashboardView">
        <div class="row">
            <div class="col-md-3">
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <div class="dashboard-card-title">Total Customers</div>
                        <div class="dashboard-card-icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="dashboard-card-value">8,247</div>
                    <div class="dashboard-card-change positive">
                        <i class="fas fa-arrow-up"></i> 12.5% from last month
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <div class="dashboard-card-title">Active Campaigns</div>
                        <div class="dashboard-card-icon green">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                    </div>
                    <div class="dashboard-card-value">12</div>
                    <div class="dashboard-card-change positive">
                        <i class="fas fa-arrow-up"></i> 3 new this week
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <div class="dashboard-card-title">SMS Sent Today</div>
                        <div class="dashboard-card-icon orange">
                            <i class="fas fa-sms"></i>
                        </div>
                    </div>
                    <div class="dashboard-card-value">1,428</div>
                    <div class="dashboard-card-change negative">
                        <i class="fas fa-arrow-down"></i> 5.2% from yesterday
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <div class="dashboard-card-title">Open Tickets</div>
                        <div class="dashboard-card-icon red">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                    </div>
                    <div class="dashboard-card-value">42</div>
                    <div class="dashboard-card-change positive">
                        <i class="fas fa-arrow-down"></i> 8 resolved today
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Customer Growth (Monthly)
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="customerGrowthChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Ticket Status Overview
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="ticketStatusChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Recent Tickets
                        <div>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> New Ticket
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="recentTicketsTable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Customer</th>
                                        <th>Category</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Assigned To</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#TK-1024</td>
                                        <td>Rice crop disease identification</td>
                                        <td>Md. Rahman</td>
                                        <td>Advisory</td>
                                        <td><span class="badge badge-danger">High</span></td>
                                        <td><span class="badge badge-warning">In Progress</span></td>
                                        <td>Agent Ahmed</td>
                                        <td>2023-09-20</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1024')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TK-1023</td>
                                        <td>Fertilizer application issue</td>
                                        <td>Farmer Karim</td>
                                        <td>Product Issue</td>
                                        <td><span class="badge badge-warning">Medium</span></td>
                                        <td><span class="badge badge-danger">Open</span></td>
                                        <td>Unassigned</td>
                                        <td>2023-09-20</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1023')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TK-1022</td>
                                        <td>Pest control for wheat field</td>
                                        <td>Abdul Malek</td>
                                        <td>Technical</td>
                                        <td><span class="badge badge-warning">Medium</span></td>
                                        <td><span class="badge badge-success">Resolved</span></td>
                                        <td>Field Agent Khan</td>
                                        <td>2023-09-19</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1022')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TK-1021</td>
                                        <td>Seed quality complaint</td>
                                        <td>Retailer Hasan</td>
                                        <td>Complaint</td>
                                        <td><span class="badge badge-danger">High</span></td>
                                        <td><span class="badge badge-warning">In Progress</span></td>
                                        <td>Supervisor Jaman</td>
                                        <td>2023-09-19</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1021')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TK-1020</td>
                                        <td>Irrigation system consultation</td>
                                        <td>Partner Agro</td>
                                        <td>Advisory</td>
                                        <td><span class="badge badge-info">Low</span></td>
                                        <td><span class="badge badge-secondary">Closed</span></td>
                                        <td>Agent Fatema</td>
                                        <td>2023-09-18</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1020')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
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
