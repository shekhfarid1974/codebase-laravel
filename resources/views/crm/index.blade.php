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
    <span class="breadcrumb-item active">Customer Details</span>
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
            <h1 class="content-title">Customer Management</h1>
            <p class="content-subtitle">Manage customer information, queries, and follow-ups</p>
        </div>
        <div class="content-actions">
            <button class="btn btn-outline">
                <i class="ri-download-line"></i>
                Export
            </button>
            <button class="btn btn-primary">
                <i class="ri-add-line"></i>
                New Customer
            </button>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content-container">
        <!-- Farmer Tab -->
        <div class="tab-content active" id="farmer-tab">
            <!-- Farmer Information Form -->
            <div class="form-container">
                <h2 class="form-title">Farmer Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required" for="farmer-customerId">Customer ID</label>
                        <input type="text" class="form-input" id="farmer-customerId" placeholder="NTR-001" value="NTR-001">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-name">Farmer Name</label>
                        <input type="text" class="form-input" id="farmer-name" placeholder="Rashed" value="Rashed">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-mobile">Mobile Number</label>
                        <input type="text" class="form-input" id="farmer-mobile" placeholder="01716444345" value="01716444345">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="farmer-altMobile">Alternative Contact No</label>
                        <input type="text" class="form-input" id="farmer-altMobile" placeholder="01638630722">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-gender">Gender</label>
                        <select class="form-select" id="farmer-gender">
                            <option value="">Select Gender</option>
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-district">District</label>
                        <select class="form-select" id="farmer-district">
                            <option value="">Select District</option>
                            <option value="dhaka" selected>Dhaka</option>
                            <option value="dinajpur">Dinajpur</option>
                            <option value="bogra">Bogra</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-upazila">Upazila</label>
                        <select class="form-select" id="farmer-upazila">
                            <option value="">Select Upazila</option>
                            <option value="dhamrai" selected>Dhamrai</option>
                            <option value="dhanmondi">Dhanmondi</option>
                            <option value="dohar">Dohar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-union">Union/Village</label>
                        <select class="form-select" id="farmer-union">
                            <option value="">Select Union/Village</option>
                            <option value="joypara" selected>Joypara</option>
                            <option value="kusumhathi">Kusumhathi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-crop">Targeted Crop</label>
                        <select class="form-select" id="farmer-crop">
                            <option value="">Select Crop</option>
                            <option value="rice" selected>Rice</option>
                            <option value="maize">Maize</option>
                            <option value="onion">Onion</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="farmer-land">Land Size (Dcml)</label>
                        <input type="number" class="form-input" id="farmer-land" placeholder="100" value="100">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="farmer-otherCrops">Other Crops</label>
                        <input type="text" class="form-input" id="farmer-otherCrops" placeholder="Jute / Wheat / Potato">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-queryType">Query Type / Problem</label>
                        <select class="form-select" id="farmer-queryType">
                            <option value="">Select Query Type</option>
                            <option value="fungus">Fungus</option>
                            <option value="insect" selected>Insect attack</option>
                            <option value="fertilizer">Fertilizer problem</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-query">Interested / Query</label>
                        <input type="text" class="form-input" id="farmer-query" placeholder="Product info / Solution advice" value="Product info">
                    </div>

                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label required" for="farmer-verbatim">Verbatim / Details</label>
                        <textarea class="form-input" id="farmer-verbatim" rows="3" placeholder="Farmer reported fungus on rice leaves.">Farmer reported insect attack on rice leaves.</textarea>
                    </div>

                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="farmer-product">Product / Solution</label>
                        <select class="form-select" id="farmer-product" multiple>
                            <option value="venza">Venza</option>
                            <option value="tilt" selected>Tilt</option>
                            <option value="ridomil">Ridomil Gold</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-regDate">Registration Date</label>
                        <input type="date" class="form-input" id="farmer-regDate" value="2025-10-16">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-category">Customer Category</label>
                        <select class="form-select" id="farmer-category">
                            <option value="farmer" selected>Farmer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-existing">Existing Customer</label>
                        <select class="form-select" id="farmer-existing">
                            <option value="">Select</option>
                            <option value="yes" selected>Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-leadStatus">Lead Status</label>
                        <select class="form-select" id="farmer-leadStatus">
                            <option value="">Select Status</option>
                            <option value="reg_er" selected>Reg & Er</option>
                            <option value="new">New</option>
                            <option value="converted">Converted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="farmer-leadSource">Lead Source</label>
                        <select class="form-select" id="farmer-leadSource">
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
        </div>

        <!-- Dealer Tab -->
        <div class="tab-content" id="dealer-tab">
            <!-- Dealer Information Form -->
            <div class="form-container">
                <h2 class="form-title">Dealer Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required" for="dealer-customerId">Customer ID</label>
                        <input type="text" class="form-input" id="dealer-customerId" placeholder="DLR-001">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-name">Dealer Name</label>
                        <input type="text" class="form-input" id="dealer-name" placeholder="Dealer Name">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-mobile">Mobile Number</label>
                        <input type="text" class="form-input" id="dealer-mobile" placeholder="017XXXXXXXX">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="dealer-altMobile">Alternative Contact No</label>
                        <input type="text" class="form-input" id="dealer-altMobile" placeholder="016XXXXXXXX">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-gender">Gender</label>
                        <select class="form-select" id="dealer-gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-district">District</label>
                        <select class="form-select" id="dealer-district">
                            <option value="">Select District</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="dinajpur">Dinajpur</option>
                            <option value="bogra">Bogra</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-upazila">Upazila</label>
                        <select class="form-select" id="dealer-upazila">
                            <option value="">Select Upazila</option>
                            <option value="dhamrai">Dhamrai</option>
                            <option value="dhanmondi">Dhanmondi</option>
                            <option value="dohar">Dohar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-union">Union/Village</label>
                        <select class="form-select" id="dealer-union">
                            <option value="">Select Union/Village</option>
                            <option value="joypara">Joypara</option>
                            <option value="kusumhathi">Kusumhathi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-business">Business Type</label>
                        <select class="form-select" id="dealer-business">
                            <option value="">Select Business Type</option>
                            <option value="agro">Agro Shop</option>
                            <option value="wholesale">Wholesale</option>
                            <option value="retail">Retail</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="dealer-size">Business Size</label>
                        <input type="text" class="form-input" id="dealer-size" placeholder="Small/Medium/Large">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="dealer-products">Products Interested</label>
                        <input type="text" class="form-input" id="dealer-products" placeholder="Fertilizers, Pesticides, etc.">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-queryType">Query Type / Problem</label>
                        <select class="form-select" id="dealer-queryType">
                            <option value="">Select Query Type</option>
                            <option value="pricing">Pricing</option>
                            <option value="availability">Product Availability</option>
                            <option value="partnership">Partnership</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-query">Interested / Query</label>
                        <input type="text" class="form-input" id="dealer-query" placeholder="Partnership opportunity">
                    </div>

                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label required" for="dealer-verbatim">Verbatim / Details</label>
                        <textarea class="form-input" id="dealer-verbatim" rows="3" placeholder="Details about the dealer's query"></textarea>
                    </div>

                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="dealer-product">Product / Solution</label>
                        <select class="form-select" id="dealer-product" multiple>
                            <option value="venza">Venza</option>
                            <option value="tilt">Tilt</option>
                            <option value="ridomil">Ridomil Gold</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-regDate">Registration Date</label>
                        <input type="date" class="form-input" id="dealer-regDate">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-category">Customer Category</label>
                        <select class="form-select" id="dealer-category">
                            <option value="dealer" selected>Dealer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-existing">Existing Customer</label>
                        <select class="form-select" id="dealer-existing">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-leadStatus">Lead Status</label>
                        <select class="form-select" id="dealer-leadStatus">
                            <option value="">Select Status</option>
                            <option value="reg_er">Reg & Er</option>
                            <option value="new">New</option>
                            <option value="converted">Converted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="dealer-leadSource">Lead Source</label>
                        <select class="form-select" id="dealer-leadSource">
                            <option value="">Select Source</option>
                            <option value="dealer_meeting">Dealer Meeting</option>
                            <option value="referral">Referral</option>
                            <option value="website">Website</option>
                        </select>
                    </div>
                </div>

                <div style="margin-top: 24px; display: flex; justify-content: flex-end;">
                    <button class="btn btn-primary">
                        <i class="ri-save-line"></i>
                        Save Dealer Information
                    </button>
                </div>
            </div>
        </div>

        <!-- Retailer Tab -->
        <div class="tab-content" id="retailer-tab">
            <!-- Retailer Information Form -->
            <div class="form-container">
                <h2 class="form-title">Retailer Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required" for="retailer-customerId">Customer ID</label>
                        <input type="text" class="form-input" id="retailer-customerId" placeholder="RTL-001">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-name">Retailer Name</label>
                        <input type="text" class="form-input" id="retailer-name" placeholder="Retailer Name">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-mobile">Mobile Number</label>
                        <input type="text" class="form-input" id="retailer-mobile" placeholder="017XXXXXXXX">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="retailer-altMobile">Alternative Contact No</label>
                        <input type="text" class="form-input" id="retailer-altMobile" placeholder="016XXXXXXXX">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-gender">Gender</label>
                        <select class="form-select" id="retailer-gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-district">District</label>
                        <select class="form-select" id="retailer-district">
                            <option value="">Select District</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="dinajpur">Dinajpur</option>
                            <option value="bogra">Bogra</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-upazila">Upazila</label>
                        <select class="form-select" id="retailer-upazila">
                            <option value="">Select Upazila</option>
                            <option value="dhamrai">Dhamrai</option>
                            <option value="dhanmondi">Dhanmondi</option>
                            <option value="dohar">Dohar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-union">Union/Village</label>
                        <select class="form-select" id="retailer-union">
                            <option value="">Select Union/Village</option>
                            <option value="joypara">Joypara</option>
                            <option value="kusumhathi">Kusumhathi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-shop">Shop Name</label>
                        <input type="text" class="form-input" id="retailer-shop" placeholder="Shop Name">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="retailer-size">Shop Size</label>
                        <input type="text" class="form-input" id="retailer-size" placeholder="Small/Medium/Large">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="retailer-products">Products Interested</label>
                        <input type="text" class="form-input" id="retailer-products" placeholder="Fertilizers, Pesticides, etc.">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-queryType">Query Type / Problem</label>
                        <select class="form-select" id="retailer-queryType">
                            <option value="">Select Query Type</option>
                            <option value="pricing">Pricing</option>
                            <option value="availability">Product Availability</option>
                            <option value="credit">Credit Facility</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-query">Interested / Query</label>
                        <input type="text" class="form-input" id="retailer-query" placeholder="Product availability">
                    </div>

                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label required" for="retailer-verbatim">Verbatim / Details</label>
                        <textarea class="form-input" id="retailer-verbatim" rows="3" placeholder="Details about the retailer's query"></textarea>
                    </div>

                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="retailer-product">Product / Solution</label>
                        <select class="form-select" id="retailer-product" multiple>
                            <option value="venza">Venza</option>
                            <option value="tilt">Tilt</option>
                            <option value="ridomil">Ridomil Gold</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-regDate">Registration Date</label>
                        <input type="date" class="form-input" id="retailer-regDate">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-category">Customer Category</label>
                        <select class="form-select" id="retailer-category">
                            <option value="retailer" selected>Retailer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-existing">Existing Customer</label>
                        <select class="form-select" id="retailer-existing">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-leadStatus">Lead Status</label>
                        <select class="form-select" id="retailer-leadStatus">
                            <option value="">Select Status</option>
                            <option value="reg_er">Reg & Er</option>
                            <option value="new">New</option>
                            <option value="converted">Converted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="retailer-leadSource">Lead Source</label>
                        <select class="form-select" id="retailer-leadSource">
                            <option value="">Select Source</option>
                            <option value="retailer_meeting">Retailer Meeting</option>
                            <option value="referral">Referral</option>
                            <option value="website">Website</option>
                        </select>
                    </div>
                </div>

                <div style="margin-top: 24px; display: flex; justify-content: flex-end;">
                    <button class="btn btn-primary">
                        <i class="ri-save-line"></i>
                        Save Retailer Information
                    </button>
                </div>
            </div>
        </div>

        <!-- Others Tab -->
        <div class="tab-content" id="others-tab">
            <!-- Others Information Form -->
            <div class="form-container">
                <h2 class="form-title">Other Customer Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required" for="others-customerId">Customer ID</label>
                        <input type="text" class="form-input" id="others-customerId" placeholder="OTH-001">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-name">Customer Name</label>
                        <input type="text" class="form-input" id="others-name" placeholder="Customer Name">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-mobile">Mobile Number</label>
                        <input type="text" class="form-input" id="others-mobile" placeholder="017XXXXXXXX">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="others-altMobile">Alternative Contact No</label>
                        <input type="text" class="form-input" id="others-altMobile" placeholder="016XXXXXXXX">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-gender">Gender</label>
                        <select class="form-select" id="others-gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-district">District</label>
                        <select class="form-select" id="others-district">
                            <option value="">Select District</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="dinajpur">Dinajpur</option>
                            <option value="bogra">Bogra</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-upazila">Upazila</label>
                        <select class="form-select" id="others-upazila">
                            <option value="">Select Upazila</option>
                            <option value="dhamrai">Dhamrai</option>
                            <option value="dhanmondi">Dhanmondi</option>
                            <option value="dohar">Dohar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-union">Union/Village</label>
                        <select class="form-select" id="others-union">
                            <option value="">Select Union/Village</option>
                            <option value="joypara">Joypara</option>
                            <option value="kusumhathi">Kusumhathi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-type">Customer Type</label>
                        <select class="form-select" id="others-type">
                            <option value="">Select Type</option>
                            <option value="influencer">Influencer</option>
                            <option value="ngo">NGO</option>
                            <option value="govt">Government</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="others-organization">Organization</label>
                        <input type="text" class="form-input" id="others-organization" placeholder="Organization Name">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="others-interest">Area of Interest</label>
                        <input type="text" class="form-input" id="others-interest" placeholder="Agriculture, Training, etc.">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-queryType">Query Type / Problem</label>
                        <select class="form-select" id="others-queryType">
                            <option value="">Select Query Type</option>
                            <option value="information">General Information</option>
                            <option value="partnership">Partnership</option>
                            <option value="training">Training</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-query">Interested / Query</label>
                        <input type="text" class="form-input" id="others-query" placeholder="Partnership opportunity">
                    </div>

                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label required" for="others-verbatim">Verbatim / Details</label>
                        <textarea class="form-input" id="others-verbatim" rows="3" placeholder="Details about the customer's query"></textarea>
                    </div>

                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="others-product">Product / Solution</label>
                        <select class="form-select" id="others-product" multiple>
                            <option value="venza">Venza</option>
                            <option value="tilt">Tilt</option>
                            <option value="ridomil">Ridomil Gold</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-regDate">Registration Date</label>
                        <input type="date" class="form-input" id="others-regDate">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-category">Customer Category</label>
                        <select class="form-select" id="others-category">
                            <option value="others" selected>Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-existing">Existing Customer</label>
                        <select class="form-select" id="others-existing">
                            <option value="">Select</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-leadStatus">Lead Status</label>
                        <select class="form-select" id="others-leadStatus">
                            <option value="">Select Status</option>
                            <option value="reg_er">Reg & Er</option>
                            <option value="new">New</option>
                            <option value="converted">Converted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="others-leadSource">Lead Source</label>
                        <select class="form-select" id="others-leadSource">
                            <option value="">Select Source</option>
                            <option value="meeting">Meeting</option>
                            <option value="referral">Referral</option>
                            <option value="website">Website</option>
                        </select>
                    </div>
                </div>

                <div style="margin-top: 24px; display: flex; justify-content: flex-end;">
                    <button class="btn btn-primary">
                        <i class="ri-save-line"></i>
                        Save Customer Information
                    </button>
                </div>
            </div>
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
    const tabContents = document.querySelectorAll('.tab-content');

    // Show farmer tab by default
    document.getElementById('farmer-tab').classList.add('active');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Get the tab type
            const tabType = this.getAttribute('data-tab');
            
            // Show the corresponding tab content
            document.getElementById(`${tabType}-tab`).classList.add('active');
            
            // Update the page title
            const titles = {
                'farmer': 'Farmer CRM',
                'dealer': 'Dealer CRM',
                'retailer': 'Retailer CRM',
                'others': 'Other Customers CRM'
            };
            
            document.querySelector('.content-title').textContent = titles[tabType];
            
            // Update the subtitle
            const subtitles = {
                'farmer': 'Manage farmer information, queries, and follow-ups',
                'dealer': 'Manage dealer information, queries, and follow-ups',
                'retailer': 'Manage retailer information, queries, and follow-ups',
                'others': 'Manage other customer information, queries, and follow-ups'
            };
            
            document.querySelector('.content-subtitle').textContent = subtitles[tabType];
        });
    });

    // Multiple select styling for product solution
    const productSelects = document.querySelectorAll('select[multiple]');
    productSelects.forEach(select => {
        select.style.minHeight = '100px';
        select.style.padding = '8px';
    });

    // Form validation example
    const saveButtons = document.querySelectorAll('.form-container .btn-primary');
    saveButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get the current form container
            const formContainer = this.closest('.form-container');
            
            // Basic validation
            const requiredFields = formContainer.querySelectorAll('.form-label.required');
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
                const customerType = formContainer.querySelector('h2').textContent.split(' ')[0];
                alert(`${customerType} information saved successfully!`);
                // In a real application, you would submit the form via AJAX or regular form submission
            } else {
                alert('Please fill in all required fields.');
            }
        });
    });
});
</script>
@endsection