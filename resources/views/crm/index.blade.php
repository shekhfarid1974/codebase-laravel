{{-- resources/views/crm/index.blade.php --}}
@extends('layouts.app')

@section('title', 'CRM')

@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <span class="breadcrumb-item">Dashboard</span>
        <i class="breadcrumb-separator ri-arrow-right-s-line"></i>
        <span class="breadcrumb-item">Farmer CRM</span>
        <i class="breadcrumb-separator ri-arrow-right-s-line"></i>
        <span class="breadcrumb-item active">Farmer Details</span>
    </div>

    <!-- Content Area -->
    <main class="content">
        <div class="content-header">
            <div>
                <div class="tab-buttons">
                    <button type="button" class="tab-btn active" data-tab="farmer">Farmer</button>
                    <button type="button" class="tab-btn" data-tab="dealer">Dealer</button>
                    <button type="button" class="tab-btn" data-tab="retailer">Retailer</button>
                    <button type="button" class="tab-btn" data-tab="others">Others</button>
                </div>
                <h1 class="content-title">Farmer CRM</h1>
                <p class="content-subtitle">Manage farmer information, queries, and follow-ups</p>
            </div>
            <div class="content-actions">
                <button class="btn btn-outline">
                    <i class="ri-download-line"></i>
                    Export
                </button>
                <button class="btn btn-primary">
                    <i class="ri-add-line"></i>
                    New Farmer
                </button>
            </div>
        </div>

        <!-- Farmer Information Form -->
        <div class="form-container">
            <h2 class="form-title">Farmer Information</h2>
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label required" for="customerId">Customer ID</label>
                    <input type="text" class="form-input" id="customerId" placeholder="NTR-001" value="NTR-001">
                </div>

                <div class="form-group">
                    <label class="form-label required" for="farmerName">Farmer Name</label>
                    <input type="text" class="form-input" id="farmerName" placeholder="Rashed" value="Rashed">
                </div>

                <div class="form-group">
                    <label class="form-label required" for="mobileNumber">Mobile Number</label>
                    <input type="text" class="form-input" id="mobileNumber" placeholder="01716444345"
                        value="01716444345">
                </div>

                <div class="form-group">
                    <label class="form-label" for="altMobileNumber">Alternative Contact No</label>
                    <input type="text" class="form-input" id="altMobileNumber" placeholder="01638630722">
                </div>

                <div class="form-group">
                    <label class="form-label required" for="gender">Gender</label>
                    <select class="form-select" id="gender">
                        <option value="">Select Gender</option>
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="district">District</label>
                    <select class="form-select" id="district">
                        <option value="">Select District</option>
                        <option value="dhaka" selected>Dhaka</option>
                        <option value="dinajpur">Dinajpur</option>
                        <option value="bogra">Bogra</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="upazila">Upazila</label>
                    <select class="form-select" id="upazila">
                        <option value="">Select Upazila</option>
                        <option value="dhamrai" selected>Dhamrai</option>
                        <option value="dhanmondi">Dhanmondi</option>
                        <option value="dohar">Dohar</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="unionVillage">Union/Village</label>
                    <select class="form-select" id="unionVillage">
                        <option value="">Select Union/Village</option>
                        <option value="joypara" selected>Joypara</option>
                        <option value="kusumhathi">Kusumhathi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="targetedCrop">Targeted Crop</label>
                    <select class="form-select" id="targetedCrop">
                        <option value="">Select Crop</option>
                        <option value="rice" selected>Rice</option>
                        <option value="maize">Maize</option>
                        <option value="onion">Onion</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="landSize">Land Size (Dcml)</label>
                    <input type="number" class="form-input" id="landSize" placeholder="100" value="100">
                </div>

                <div class="form-group">
                    <label class="form-label" for="otherCrops">Other Crops</label>
                    <input type="text" class="form-input" id="otherCrops" placeholder="Jute / Wheat / Potato">
                </div>

                <div class="form-group">
                    <label class="form-label required" for="queryType">Query Type / Problem</label>
                    <select class="form-select" id="queryType">
                        <option value="">Select Query Type</option>
                        <option value="fungus">Fungus</option>
                        <option value="insect" selected>Insect attack</option>
                        <option value="fertilizer">Fertilizer problem</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="interestedQuery">Interested / Query</label>
                    <input type="text" class="form-input" id="interestedQuery"
                        placeholder="Product info / Solution advice" value="Product info">
                </div>

                <div class="form-group" style="grid-column: 1 / -1;">
                    <label class="form-label required" for="verbatim">Verbatim / Details</label>
                    <textarea class="form-input" id="verbatim" rows="3" placeholder="Farmer reported fungus on rice leaves.">Farmer reported insect attack on rice leaves.</textarea>
                </div>

                <div class="form-group" style="grid-column: 1 / -1;">
                    <label class="form-label" for="productSolution">Product / Solution</label>
                    <select class="form-select" id="productSolution" multiple>
                        <option value="venza">Venza</option>
                        <option value="tilt" selected>Tilt</option>
                        <option value="ridomil">Ridomil Gold</option>
                    </select>
                </div>

                <div class="form-group" style="grid-column: 1 / -1;">
                    <label class="form-label" for="remarks">Remarks</label>
                    <textarea class="form-input" id="remarks" rows="2" placeholder="Follow up after 7 days.">Follow up after 7 days.</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="registrationDate">Registration Date</label>
                    <input type="date" class="form-input" id="registrationDate" value="2025-10-16">
                </div>

                <div class="form-group">
                    <label class="form-label required" for="customerCategory">Customer Category</label>
                    <select class="form-select" id="customerCategory">
                        <option value="farmer" selected>Farmer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="existingCustomer">Existing Customer</label>
                    <select class="form-select" id="existingCustomer">
                        <option value="">Select</option>
                        <option value="yes" selected>Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="leadStatus">Lead Status</label>
                    <select class="form-select" id="leadStatus">
                        <option value="">Select Status</option>
                        <option value="reg_er" selected>Reg & Er</option>
                        <option value="new">New</option>
                        <option value="converted">Converted</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required" for="leadSource">Lead Source</label>
                    <select class="form-select" id="leadSource">
                        <option value="">Select Source</option>
                        <option value="farmer_meeting" selected>Farmer Meeting</option>
                        <option value="ifs">IFS</option>
                        <option value="website">Website</option>
                    </select>
                </div>
            </div>

            <div style="margin-top: 24px; display: flex; justify-content: flex-end;">
                <button class="btn btn-primary">
                    <i class="ri-save-line"></i>
                    Save Farmer Information
                </button>
            </div>
        </div>

        <!-- Interaction History -->
        <div class="history-container">
            <h2 class="history-title">Interaction History</h2>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Agent</th>
                            <th>Date</th>
                            <th>Query Type</th>
                            <th>Verbatim</th>
                            <th>Product Suggestion</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Myobd</td>
                            <td>2024-08-21 14:48:00</td>
                            <td>Insect attack</td>
                            <td>Farmer reported insect attack on rice leaves</td>
                            <td>Tilt</td>
                            <td><span style="color: #16a34a;">Resolved</span></td>
                        </tr>
                        <tr>
                            <td>Elias MYOL IT</td>
                            <td>2024-06-10 17:14:04</td>
                            <td>Fungus</td>
                            <td>Farmer reported fungus on rice leaves</td>
                            <td>Venza</td>
                            <td><span style="color: #16a34a;">Resolved</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Follow Up Section -->
        <div class="followup-container">
            <h2 class="followup-title">Follow Up</h2>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="followUpDate">Follow Up Date</label>
                    <input type="date" class="form-input" id="followUpDate" value="2024-06-24">
                </div>

                <div class="form-group">
                    <label class="form-label" for="followUpType">Follow Up Type</label>
                    <select class="form-select" id="followUpType">
                        <option value="">Select Type</option>
                        <option value="wish_call" selected>Wish Call</option>
                        <option value="product_followup">Product Follow-up</option>
                        <option value="issue_resolution">Issue Resolution</option>
                    </select>
                </div>
            </div>

            <div class="followup-actions">
                <button class="btn btn-primary">
                    <i class="ri-phone-line"></i>
                    Schedule Follow Up
                </button>
                <button class="btn btn-outline">
                    <i class="ri-calendar-line"></i>
                    View Calendar
                </button>
            </div>
        </div>
    </main>

    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => btn.classList.remove('active'));

                    // Add active class to clicked button
                    this.classList.add('active');

                    // Get the tab type
                    const tabType = this.getAttribute('data-tab');

                    // Here you would typically show/hide different content based on tab
                    console.log('Switched to tab:', tabType);

                    // Example: You could add logic here to load different form fields
                    // based on whether it's Farmer, Dealer, Retailer, or Others
                });
            });

            // Multiple select styling for product solution
            const productSelect = document.getElementById('productSolution');
            if (productSelect) {
                // Add some basic styling for multiple select
                productSelect.style.minHeight = '100px';
                productSelect.style.padding = '8px';
            }

            // Form validation example
            const saveButton = document.querySelector('.btn-primary');
            if (saveButton) {
                saveButton.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Basic validation
                    const requiredFields = document.querySelectorAll('.form-label.required');
                    let isValid = true;

                    requiredFields.forEach(label => {
                        const inputId = label.getAttribute('for');
                        const input = document.getElementById(inputId);

                        if (input && !input.value.trim()) {
                            isValid = false;
                            input.style.borderColor = '#EF4444';
                        } else if (input) {
                            input.style.borderColor = '';
                        }
                    });

                    if (isValid) {
                        // Form is valid, proceed with submission
                        alert('Farmer information saved successfully!');
                        // In a real application, you would submit the form via AJAX or regular form submission
                    } else {
                        alert('Please fill in all required fields.');
                    }
                });
            }
        });
    </script>
@endsection
