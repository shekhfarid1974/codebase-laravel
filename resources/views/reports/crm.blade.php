@extends('layouts.app')

@section('title', 'CRM Reports - Auto Crop Care Limited')
@section('page_title', 'CRM Reports Dashboard')

@section('styles')
<style>
    .report-card {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }
    .report-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .farmer-card { border-left-color: #28a745; }
    .retailer-card { border-left-color: #17a2b8; }
    .dealer-card { border-left-color: #ffc107; }
    .other-card { border-left-color: #6f42c1; }
    
    .metric-card {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .metric-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .nav-tabs .nav-link {
        color: #495057;
        font-weight: 500;
    }
    .nav-tabs .nav-link.active {
        font-weight: 600;
        color: #0d6efd;
    }
    
    .table-responsive {
        max-height: 400px;
    }
    
    .progress {
        height: 25px;
    }
    
    .chart-container {
        position: relative;
        height: 300px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Dashboard Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0">CRM Reports Dashboard</h2>
            <p class="text-muted">Comprehensive reports for all ACCL stakeholders</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary">
                <i class="fas fa-download me-2"></i>Export Reports
            </button>
            <button class="btn btn-primary">
                <i class="fas fa-filter me-2"></i>Filter Data
            </button>
        </div>
    </div>

    <!-- Stakeholder Summary Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card report-card farmer-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="card-title text-success">Farmer Support</h5>
                            <h2 class="mb-0">1,248</h2>
                            <p class="text-muted mb-0">Active farmers</p>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                            <i class="fas fa-seedling fa-2x text-success"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#farmerReportModal">
                            View Full Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card report-card retailer-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="card-title text-info">Retailer Communication</h5>
                            <h2 class="mb-0">326</h2>
                            <p class="text-muted mb-0">Active retailers</p>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle">
                            <i class="fas fa-store fa-2x text-info"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-info w-100" data-bs-toggle="modal" data-bs-target="#retailerReportModal">
                            View Full Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card report-card dealer-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="card-title text-warning">Dealer Performance</h5>
                            <h2 class="mb-0">87</h2>
                            <p class="text-muted mb-0">Active dealers</p>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle">
                            <i class="fas fa-handshake fa-2x text-warning"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-warning w-100" data-bs-toggle="modal" data-bs-target="#dealerReportModal">
                            View Full Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card report-card other-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="card-title text-purple">Other Stakeholders</h5>
                            <h2 class="mb-0">142</h2>
                            <p class="text-muted mb-0">Partners & associates</p>
                        </div>
                        <div class="bg-purple bg-opacity-10 p-3 rounded-circle">
                            <i class="fas fa-user-friends fa-2x text-purple"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-purple w-100" data-bs-toggle="modal" data-bs-target="#otherReportModal">
                            View Full Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Combined Metrics Overview -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Combined Metrics Overview</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="metric-card bg-light p-3 text-center">
                        <h6>Total Interactions</h6>
                        <h3 class="text-primary">4,826</h3>
                        <p class="mb-0 text-success"><i class="fas fa-arrow-up"></i> 12.4% from last month</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="metric-card bg-light p-3 text-center">
                        <h6>Issues Resolved</h6>
                        <h3 class="text-success">4,128</h3>
                        <p class="mb-0 text-success"><i class="fas fa-arrow-up"></i> 8.7% from last month</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="metric-card bg-light p-3 text-center">
                        <h6>Pending Follow-ups</h6>
                        <h3 class="text-warning">698</h3>
                        <p class="mb-0 text-danger"><i class="fas fa-arrow-up"></i> 3.2% from last month</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="metric-card bg-light p-3 text-center">
                        <h6>Satisfaction Rate</h6>
                        <h3 class="text-info">87.3%</h3>
                        <p class="mb-0 text-success"><i class="fas fa-arrow-up"></i> 2.1% from last month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Tabs -->
    <ul class="nav nav-tabs mb-4" id="reportTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="farmer-tab" data-bs-toggle="tab" data-bs-target="#farmer" type="button" role="tab">Farmer Support</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="retailer-tab" data-bs-toggle="tab" data-bs-target="#retailer" type="button" role="tab">Retailer Communication</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="dealer-tab" data-bs-toggle="tab" data-bs-target="#dealer" type="button" role="tab">Dealer Performance</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab">Other Stakeholders</button>
        </li>
    </ul>

    <div class="tab-content" id="reportTabsContent">
        <!-- Farmer Support Report -->
        <div class="tab-pane fade show active" id="farmer" role="tabpanel">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Farmer Support Report</h5>
                    <span class="badge bg-success">Last Updated: Today</span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Farmer Call Summary</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Count</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Total farmer calls</td>
                                            <td>1,842</td>
                                            <td>100%</td>
                                        </tr>
                                        <tr>
                                            <td>New farmers</td>
                                            <td>426</td>
                                            <td>23.1%</td>
                                        </tr>
                                        <tr>
                                            <td>Returning farmers</td>
                                            <td>1,416</td>
                                            <td>76.9%</td>
                                        </tr>
                                        <tr>
                                            <td>Districts covered</td>
                                            <td>42</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Lead Source Distribution</h5>
                            <div class="chart-container">
                                <canvas id="farmerLeadSourceChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Crop-wise Query Breakdown</h5>
                            <div class="progress mb-2" style="height: 25px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 42%">Rice (42%)</div>
                            </div>
                            <div class="progress mb-2" style="height: 25px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 27%">Maize (27%)</div>
                            </div>
                            <div class="progress mb-2" style="height: 25px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 18%">Potato (18%)</div>
                            </div>
                            <div class="progress mb-2" style="height: 25px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 8%">Vegetables (8%)</div>
                            </div>
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 5%">Fruit crops (5%)</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Problem Category</h5>
                            <div class="chart-container">
                                <canvas id="farmerProblemChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Solution Provided</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Solution Type</th>
                                            <th>Count</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Product recommendation</td>
                                            <td>842</td>
                                            <td>45.7%</td>
                                        </tr>
                                        <tr>
                                            <td>Dosage guideline</td>
                                            <td>526</td>
                                            <td>28.6%</td>
                                        </tr>
                                        <tr>
                                            <td>Cultural practice</td>
                                            <td>312</td>
                                            <td>16.9%</td>
                                        </tr>
                                        <tr>
                                            <td>Follow-up required</td>
                                            <td>126</td>
                                            <td>6.8%</td>
                                        </tr>
                                        <tr>
                                            <td>Escalated to ACCL</td>
                                            <td>36</td>
                                            <td>2.0%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Farmer Interest</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product/Interest</th>
                                            <th>Category</th>
                                            <th>Demand Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ACCL Fungicide B</td>
                                            <td>Fungicide</td>
                                            <td><span class="badge bg-danger">Very High</span></td>
                                        </tr>
                                        <tr>
                                            <td>ACCL Insecticide A</td>
                                            <td>Insecticide</td>
                                            <td><span class="badge bg-warning">High</span></td>
                                        </tr>
                                        <tr>
                                            <td>ACCL Hybrid Maize</td>
                                            <td>Seed</td>
                                            <td><span class="badge bg-warning">High</span></td>
                                        </tr>
                                        <tr>
                                            <td>ACCL Micronutrient X</td>
                                            <td>Micronutrient</td>
                                            <td><span class="badge bg-info">Medium</span></td>
                                        </tr>
                                        <tr>
                                            <td>ACCL Herbicide C</td>
                                            <td>Herbicide</td>
                                            <td><span class="badge bg-info">Medium</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Retailer Communication Report -->
        <div class="tab-pane fade" id="retailer" role="tabpanel">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Retailer Communication Report</h5>
                    <span class="badge bg-info">Last Updated: Today</span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Retailer Interaction Summary</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Interaction Type</th>
                                            <th>Count</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Total retailers contacted</td>
                                            <td>326</td>
                                            <td>100%</td>
                                        </tr>
                                        <tr>
                                            <td>Retailer questions received</td>
                                            <td>1,248</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Stock feedback</td>
                                            <td>486</td>
                                            <td>39.0%</td>
                                        </tr>
                                        <tr>
                                            <td>Product complaints</td>
                                            <td>312</td>
                                            <td>25.0%</td>
                                        </tr>
                                        <tr>
                                            <td>Price-related queries</td>
                                            <td>286</td>
                                            <td>22.9%</td>
                                        </tr>
                                        <tr>
                                            <td>Promotional support</td>
                                            <td>164</td>
                                            <td>13.1%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Product Demand at Retail Level</h5>
                            <div class="chart-container">
                                <canvas id="retailerDemandChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Retailer Issues Identified</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Issue Type</th>
                                            <th>Count</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Frequent farmer complaints</td>
                                            <td>142</td>
                                            <td>35.4%</td>
                                        </tr>
                                        <tr>
                                            <td>Stock shortages</td>
                                            <td>126</td>
                                            <td>31.4%</td>
                                        </tr>
                                        <tr>
                                            <td>Competitor comparison</td>
                                            <td>86</td>
                                            <td>21.4%</td>
                                        </tr>
                                        <tr>
                                            <td>Miscommunication on dosage</td>
                                            <td>47</td>
                                            <td>11.7%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Retailer Training Needs</h5>
                            <div class="chart-container">
                                <canvas id="retailerTrainingChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Follow-Up Actions</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Action Type</th>
                                            <th>Count</th>
                                            <th>Status</th>
                                            <th>Responsible</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cases closed</td>
                                            <td>286</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                            <td>Call Center</td>
                                        </tr>
                                        <tr>
                                            <td>Dealers notified</td>
                                            <td>142</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                            <td>Field Team</td>
                                        </tr>
                                        <tr>
                                            <td>ACCL marketing notified</td>
                                            <td>86</td>
                                            <td><span class="badge bg-warning">In Progress</span></td>
                                            <td>Marketing</td>
                                        </tr>
                                        <tr>
                                            <td>Training scheduled</td>
                                            <td>64</td>
                                            <td><span class="badge bg-primary">Scheduled</span></td>
                                            <td>Training Team</td>
                                        </tr>
                                        <tr>
                                            <td>Product feedback to R&D</td>
                                            <td>42</td>
                                            <td><span class="badge bg-info">Pending</span></td>
                                            <td>R&D</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dealer Performance Report -->
        <div class="tab-pane fade" id="dealer" role="tabpanel">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Dealer Performance Report</h5>
                    <span class="badge bg-warning">Last Updated: Today</span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Dealer Summary</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Count</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Total dealers contacted</td>
                                            <td>87</td>
                                            <td>100%</td>
                                        </tr>
                                        <tr>
                                            <td>Dealer-wise calls</td>
                                            <td>426</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>District coverage</td>
                                            <td>32</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Active dealers</td>
                                            <td>78</td>
                                            <td>89.7%</td>
                                        </tr>
                                        <tr>
                                            <td>Inactive dealers</td>
                                            <td>9</td>
                                            <td>10.3%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Dealer Performance Metrics</h5>
                            <div class="chart-container">
                                <canvas id="dealerPerformanceChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Farmer Feedback About Dealers</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Feedback Type</th>
                                            <th>Count</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Positive comments</td>
                                            <td>312</td>
                                            <td>68.4%</td>
                                        </tr>
                                        <tr>
                                            <td>Negative feedback</td>
                                            <td>86</td>
                                            <td>18.9%</td>
                                        </tr>
                                        <tr>
                                            <td>Dealer location problems</td>
                                            <td>38</td>
                                            <td>8.3%</td>
                                        </tr>
                                        <tr>
                                            <td>Dealer behavior issues</td>
                                            <td>20</td>
                                            <td>4.4%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Product Movement Indicators</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Movement</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ACCL Insecticide A</td>
                                            <td>Insecticide</td>
                                            <td>High</td>
                                            <td><span class="badge bg-success">Fast Moving</span></td>
                                        </tr>
                                        <tr>
                                            <td>ACCL Fungicide B</td>
                                            <td>Fungicide</td>
                                            <td>High</td>
                                            <td><span class="badge bg-success">Fast Moving</span></td>
                                        </tr>
                                        <tr>
                                            <td>ACCL Herbicide C</td>
                                            <td>Herbicide</td>
                                            <td>Medium</td>
                                            <td><span class="badge bg-info">Stable</span></td>
                                        </tr>
                                        <tr>
                                            <td>ACCL Micronutrient X</td>
                                            <td>Micronutrient</td>
                                            <td>Low</td>
                                            <td><span class="badge bg-warning">Slow Moving</span></td>
                                        </tr>
                                        <tr>
                                            <td>ACCL Hybrid Seed</td>
                                            <td>Seed</td>
                                            <td>Low</td>
                                            <td><span class="badge bg-danger">Stock Shortage</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Dealer Lead Status</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Dealer Name</th>
                                            <td>District</td>
                                            <th>Referred Farmers</th>
                                            <th>Leads Assigned</th>
                                            <th>Follow-up Performance</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>AgroCare Solutions</td>
                                            <td>Rajshahi</td>
                                            <td>42</td>
                                            <td>38</td>
                                            <td>92%</td>
                                            <td><span class="badge bg-success">Excellent</span></td>
                                        </tr>
                                        <tr>
                                            <td>GreenField Dealers</td>
                                            <td>Bogura</td>
                                            <td>38</td>
                                            <td>32</td>
                                            <td>84%</td>
                                            <td><span class="badge bg-success">Good</span></td>
                                        </tr>
                                        <tr>
                                            <td>CropMax Distributors</td>
                                            <td>Cumilla</td>
                                            <td>27</td>
                                            <td>22</td>
                                            <td>81%</td>
                                            <td><span class="badge bg-success">Good</span></td>
                                        </tr>
                                        <tr>
                                            <td>Harvest Suppliers</td>
                                            <td>Manikganj</td>
                                            <td>18</td>
                                            <td>12</td>
                                            <td>67%</td>
                                            <td><span class="badge bg-warning">Average</span></td>
                                        </tr>
                                        <tr>
                                            <td>AgriSource Ltd.</td>
                                            <td>Jashore</td>
                                            <td>32</td>
                                            <td>18</td>
                                            <td>56%</td>
                                            <td><span class="badge bg-danger">Needs Attention</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Stakeholders Report -->
        <div class="tab-pane fade" id="other" role="tabpanel">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Other Stakeholders Report</h5>
                    <span class="badge bg-purple">Last Updated: Today</span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>IFS / Field Supervisor Interactions</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Count</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Total leads provided</td>
                                            <td>486</td>
                                            <td>100%</td>
                                        </tr>
                                        <tr>
                                            <td>Follow-up success</td>
                                            <td>382</td>
                                            <td>78.6%</td>
                                        </tr>
                                        <tr>
                                            <td>Farmer meeting reports</td>
                                            <td>124</td>
                                            <td>25.5%</td>
                                        </tr>
                                        <tr>
                                            <td>Area performance</td>
                                            <td>86</td>
                                            <td>17.7%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>NGO/Govt/DAE Queries</h5>
                            <div class="chart-container">
                                <canvas id="ngoQueriesChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Business Partners</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Partner Type</th>
                                            <th>Count</th>
                                            <th>Interaction Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Machinery suppliers</td>
                                            <td>24</td>
                                            <td>Product interest</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Financial institutions</td>
                                            <td>18</td>
                                            <td>New stock request</td>
                                            <td><span class="badge bg-warning">In Progress</span></td>
                                        </tr>
                                        <tr>
                                            <td>Research organizations</td>
                                            <td>12</td>
                                            <td>Joint projects</td>
                                            <td><span class="badge bg-info">Exploratory</span></td>
                                        </tr>
                                        <tr>
                                            <td>Logistics partners</td>
                                            <td>8</td>
                                            <td>Service complaints</td>
                                            <td><span class="badge bg-danger">Needs Attention</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Market Insights</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Insight Type</th>
                                            <th>Count</th>
                                            <th>Impact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Competitor information</td>
                                            <td>42</td>
                                            <td><span class="badge bg-warning">Medium</span></td>
                                        </tr>
                                        <tr>
                                            <td>Price differences</td>
                                            <td>38</td>
                                            <td><span class="badge bg-danger">High</span></td>
                                        </tr>
                                        <tr>
                                            <td>New product demand</td>
                                            <td>28</td>
                                            <td><span class="badge bg-success">High</span></td>
                                        </tr>
                                        <tr>
                                            <td>Regulatory changes</td>
                                            <td>12</td>
                                            <td><span class="badge bg-danger">High</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Stakeholder Engagement Summary</h5>
                            <div class="chart-container">
                                <canvas id="stakeholderEngagementChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Farmer Report Modal -->
<div class="modal fade" id="farmerReportModal" tabindex="-1" aria-labelledby="farmerReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="farmerReportModalLabel">Farmer Support Detailed Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success">
                    <h5>Report Summary</h5>
                    <p>This report provides a comprehensive overview of farmer support activities, including call volumes, crop-specific issues, and solution effectiveness. The data helps ACCL understand farmer needs and improve product offerings.</p>
                </div>
                
                <h5>Key Findings</h5>
                <ul>
                    <li>Rice-related queries increased by 21% due to BPH infestation</li>
                    <li>Maize farmers showed high interest in ACCL Hybrid seeds</li>
                    <li>78% of issues were resolved with product recommendations</li>
                    <li>Farmer satisfaction rate improved to 87.3%</li>
                </ul>
                
                <h5>Recommendations</h5>
                <ol>
                    <li>Increase production of ACCL Fungicide B to meet demand</li>
                    <li>Develop targeted awareness programs for BPH control in rice</li>
                    <li>Provide additional training to field staff on maize cultivation</li>
                    <li>Enhance follow-up mechanisms for unresolved issues</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Retailer Report Modal -->
<div class="modal fade" id="retailerReportModal" tabindex="-1" aria-labelledby="retailerReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="retailerReportModalLabel">Retailer Communication Detailed Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <h5>Report Summary</h5>
                    <p>This report analyzes retailer interactions, product demand patterns, and support needs. The insights help ACCL strengthen the retail network and improve product availability.</p>
                </div>
                
                <h5>Key Findings</h5>
                <ul>
                    <li>Stock shortages were the most common retailer issue (31.4%)</li>
                    <li>ACCL Insecticide A and Fungicide B are in high demand</li>
                    <li>35% of retailers need additional product training</li>
                    <li>Competitor comparisons are increasing (21.4%)</li>
                </ul>
                
                <h5>Recommendations</h5>
                <ol>
                    <li>Improve supply chain to reduce stock shortages</li>
                    <li>Develop retailer training programs on product knowledge</li>
                    <li>Create competitive pricing strategies for key products</li>
                    <li>Establish a retailer feedback mechanism for continuous improvement</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Dealer Report Modal -->
<div class="modal fade" id="dealerReportModal" tabindex="-1" aria-labelledby="dealerReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dealerReportModalLabel">Dealer Performance Detailed Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <h5>Report Summary</h5>
                    <p>This report evaluates dealer performance, product movement, and customer satisfaction. The analysis helps ACCL optimize the dealer network and improve service quality.</p>
                </div>
                
                <h5>Key Findings</h5>
                <ul>
                    <li>89.7% of dealers are actively performing well</li>
                    <li>ACCL Hybrid Seed faces stock shortages at dealer level</li>
                    <li>68.4% of farmer feedback about dealers is positive</li>
                    <li>5 dealers need immediate attention for performance issues</li>
                </ul>
                
                <h5>Recommendations</h5>
                <ol>
                    <li>Increase production of ACCL Hybrid Seed to meet demand</li>
                    <li>Provide additional support to underperforming dealers</li>
                    <li>Implement a dealer recognition program for top performers</li>
                    <li>Strengthen dealer-farmer relationship initiatives</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Other Stakeholders Report Modal -->
<div class="modal fade" id="otherReportModal" tabindex="-1" aria-labelledby="otherReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otherReportModalLabel">Other Stakeholders Detailed Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-purple">
                    <h5>Report Summary</h5>
                    <p>This report covers interactions with IFS personnel, government agencies, NGOs, and business partners. The insights help ACCL build strategic partnerships and stay informed about market trends.</p>
                </div>
                
                <h5>Key Findings</h5>
                <ul>
                    <li>IFS/Field Supervisors provided 486 leads with 78.6% success rate</li>
                    <li>Government agencies show interest in joint crop protection programs</li>
                    <li>Price differences with competitors are a major concern</li>
                    <li>New product demand signals opportunities for innovation</li>
                </ul>
                
                <h5>Recommendations</h5>
                <ol>
                    <li>Strengthen partnerships with IFS/Field Supervisors for lead generation</li>
                    <li>Explore collaborative projects with government agencies</li>
                    <li>Review pricing strategy to remain competitive</li>
                    <li>Invest in R&D for new product development based on market insights</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Export Report</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Farmer Lead Source Chart
        const farmerLeadSourceCtx = document.getElementById('farmerLeadSourceChart').getContext('2d');
        new Chart(farmerLeadSourceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Farmer Meeting', 'Field Supervisor', 'Call Center', 'IFS Program', 'Dealer Outlet'],
                datasets: [{
                    data: [35, 25, 20, 12, 8],
                    backgroundColor: [
                        '#28a745',
                        '#17a2b8',
                        '#ffc107',
                        '#6f42c1',
                        '#dc3545'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Lead Source Distribution'
                    }
                }
            }
        });

        // Farmer Problem Category Chart
        const farmerProblemCtx = document.getElementById('farmerProblemChart').getContext('2d');
        new Chart(farmerProblemCtx, {
            type: 'bar',
            data: {
                labels: ['Pest Attack', 'Diseases', 'Weed Control', 'Fertilizer', 'Seed Selection', 'Product Usage'],
                datasets: [{
                    label: 'Problem Count',
                    data: [542, 486, 312, 268, 186, 148],
                    backgroundColor: '#28a745'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Problem Category Distribution'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Retailer Demand Chart
        const retailerDemandCtx = document.getElementById('retailerDemandChart').getContext('2d');
        new Chart(retailerDemandCtx, {
            type: 'horizontalBar',
            data: {
                labels: ['Insecticides', 'Fungicides', 'Herbicides', 'Seeds', 'Micronutrients'],
                datasets: [{
                    label: 'Demand Level',
                    data: [85, 78, 62, 58, 42],
                    backgroundColor: '#17a2b8'
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Product Demand at Retail Level'
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Retailer Training Chart
        const retailerTrainingCtx = document.getElementById('retailerTrainingChart').getContext('2d');
        new Chart(retailerTrainingCtx, {
            type: 'pie',
            data: {
                labels: ['Product Knowledge', 'Packaging & Labels', 'Fertilizer/Pesticide Mix', 'Application Techniques'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#17a2b8',
                        '#6f42c1',
                        '#ffc107',
                        '#28a745'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Retailer Training Needs'
                    }
                }
            }
        });

        // Dealer Performance Chart
        const dealerPerformanceCtx = document.getElementById('dealerPerformanceChart').getContext('2d');
        new Chart(dealerPerformanceCtx, {
            type: 'radar',
            data: {
                labels: ['Stock Availability', 'Delivery Issues', 'Responsiveness', 'Product Returns', 'Retailer Support'],
                datasets: [{
                    label: 'Performance Score',
                    data: [78, 85, 72, 90, 68],
                    backgroundColor: 'rgba(255, 193, 7, 0.2)',
                    borderColor: '#ffc107',
                    pointBackgroundColor: '#ffc107'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Dealer Performance Metrics'
                    }
                },
                scales: {
                    r: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // NGO Queries Chart
        const ngoQueriesCtx = document.getElementById('ngoQueriesChart').getContext('2d');
        new Chart(ngoQueriesCtx, {
            type: 'polarArea',
            data: {
                labels: ['Crop Advisory', 'Joint Programs', 'Training Support', 'Product Information', 'Research Collaboration'],
                datasets: [{
                    data: [35, 25, 20, 15, 5],
                    backgroundColor: [
                        'rgba(111, 66, 193, 0.7)',
                        'rgba(111, 66, 193, 0.6)',
                        'rgba(111, 66, 193, 0.5)',
                        'rgba(111, 66, 193, 0.4)',
                        'rgba(111, 66, 193, 0.3)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'NGO/Govt/DAE Query Types'
                    }
                }
            }
        });

        // Stakeholder Engagement Chart
        const stakeholderEngagementCtx = document.getElementById('stakeholderEngagementChart').getContext('2d');
        new Chart(stakeholderEngagementCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'IFS/Field Supervisors',
                        data: [65, 72, 78, 82, 86, 90],
                        borderColor: '#6f42c1',
                        backgroundColor: 'rgba(111, 66, 193, 0.1)',
                        tension: 0.3
                    },
                    {
                        label: 'NGO/Govt',
                        data: [28, 32, 35, 38, 42, 45],
                        borderColor: '#17a2b8',
                        backgroundColor: 'rgba(23, 162, 184, 0.1)',
                        tension: 0.3
                    },
                    {
                        label: 'Business Partners',
                        data: [42, 45, 48, 52, 55, 58],
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(40, 167, 69, 0.1)',
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Stakeholder Engagement Trend'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection