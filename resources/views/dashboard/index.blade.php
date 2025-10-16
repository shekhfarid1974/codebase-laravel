{{-- Main dashboard content (body content from your HTML) --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <main class="content">
        <div class="content-header">
            <div>
                <h1 class="content-title">Dashboard</h1>
                <p class="content-subtitle">Welcome back! Here's what's happening today.</p>
            </div>
            <div class="content-actions">
                <button class="btn btn-outline">
                    <i class="ri-download-line"></i>
                    Export
                </button>
                <button class="btn btn-primary">
                    <i class="ri-add-line"></i>
                    New Report
                </button>
            </div>
        </div>


        <div class="dashboard-grid">
            <!-- KPI Cards -->
            <div class="card kpi-card" data-chart="revenue">
                <div class="card-header">
                    <h3 class="card-title">Revenue</h3>
                    <div class="card-icon">
                        <i class="ri-money-dollar-circle-line"></i>
                    </div>
                </div>
                <div class="card-value">$24,568</div>
                <p class="card-description">+12.5% from last month</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 75%; background: var(--accent-gradient);"></div>
                </div>
            </div>

            <div class="card kpi-card" data-chart="users">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                    <div class="card-icon">
                        <i class="ri-user-line"></i>
                    </div>
                </div>
                <div class="card-value">3,842</div>
                <p class="card-description">+8.2% from last week</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 60%; background: var(--accent-gradient-teal);"></div>
                </div>
            </div>

            <div class="card kpi-card" data-chart="conversion">
                <div class="card-header">
                    <h3 class="card-title">Conversion</h3>
                    <div class="card-icon">
                        <i class="ri-exchange-dollar-line"></i>
                    </div>
                </div>
                <div class="card-value">4.8%</div>
                <p class="card-description">+2.1% from last month</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 48%; background: var(--accent-gradient);"></div>
                </div>
            </div>

            <div class="card kpi-card" data-chart="sessions">
                <div class="card-header">
                    <h3 class="card-title">Sessions</h3>
                    <div class="card-icon">
                        <i class="ri-eye-line"></i>
                    </div>
                </div>
                <div class="card-value">12.4K</div>
                <p class="card-description">+15.3% from last week</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 82%; background: var(--accent-gradient-teal);"></div>
                </div>
            </div>

            <!-- Chart Cards -->
            <div class="card chart-card">
                <div class="card-header">
                    <h3 class="card-title">Performance Trend</h3>
                    <div class="card-icon">
                        <i class="ri-line-chart-line"></i>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>

            <div class="card chart-card">
                <div class="card-header">
                    <h3 class="card-title">Conversion Breakdown</h3>
                    <div class="card-icon">
                        <i class="ri-pie-chart-line"></i>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="conversionChart"></canvas>
                </div>
            </div>

            <!-- Activities & Quick Actions -->
            <div class="card activities-card">
                <div class="card-header">
                    <h3 class="card-title">Recent Activities</h3>
                    <div class="card-icon">
                        <i class="ri-history-line"></i>
                    </div>
                </div>

                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="ri-user-add-line"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">New user registered</div>
                            <div class="activity-time">2 minutes ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="ri-shopping-cart-line"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Order #2845 completed</div>
                            <div class="activity-time">15 minutes ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="ri-coupon-line"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">New ticket assigned</div>
                            <div class="activity-time">1 hour ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="ri-file-text-line"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Monthly report generated</div>
                            <div class="activity-time">3 hours ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card quick-actions-card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                    <div class="card-icon">
                        <i class="ri-flashlight-line"></i>
                    </div>
                </div>

                <div class="quick-actions-grid">
                    <div class="action-btn">
                        <div class="action-icon">
                            <i class="ri-add-line"></i>
                        </div>
                        <span class="action-text">New Task</span>
                    </div>

                    <div class="action-btn">
                        <div class="action-icon">
                            <i class="ri-user-add-line"></i>
                        </div>
                        <span class="action-text">Add User</span>
                    </div>

                    <div class="action-btn">
                        <div class="action-icon">
                            <i class="ri-file-text-line"></i>
                        </div>
                        <span class="action-text">Create Report</span>
                    </div>

                    <div class="action-btn">
                        <div class="action-icon">
                            <i class="ri-settings-3-line"></i>
                        </div>
                        <span class="action-text">Settings</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="data-table-container">
            <div class="table-header">
                <h3 class="table-title">User Management</h3>
                <div class="table-controls">
                    <input type="text" class="table-search" placeholder="Search users...">
                    <div class="table-actions">
                        <button class="btn btn-outline">
                            <i class="ri-download-line"></i>
                            Export
                        </button>
                        <button class="btn btn-primary">
                            <i class="ri-user-add-line"></i>
                            Add User
                        </button>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>Admin</td>
                        <td><span class="status status-active">Active</span></td>
                        <td>2 hours ago</td>
                        <td>
                            <button class="nav-action">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button class="nav-action">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>jane.smith@example.com</td>
                        <td>Manager</td>
                        <td><span class="status status-active">Active</span></td>
                        <td>1 day ago</td>
                        <td>
                            <button class="nav-action">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button class="nav-action">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Robert Johnson</td>
                        <td>robert.j@example.com</td>
                        <td>User</td>
                        <td><span class="status status-inactive">Inactive</span></td>
                        <td>5 days ago</td>
                        <td>
                            <button class="nav-action">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button class="nav-action">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Sarah Williams</td>
                        <td>sarah.w@example.com</td>
                        <td>Editor</td>
                        <td><span class="status status-pending">Pending</span></td>
                        <td>Just now</td>
                        <td>
                            <button class="nav-action">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button class="nav-action">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
