@extends('layouts.app')

@section('title', 'Send Bulk SMS')
@section('page_title', 'Send Bulk SMS')

@section('content')
<div id="sendBulkSmsView">
    <div class="card">
        <div class="card-header">
            Send Bulk SMS
        </div>
        <div class="card-body">
            <form id="bulkSmsForm">
                <div class="form-group">
                    <label class="form-label">Recipient Type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recipientType" id="allCustomers" value="all" checked>
                        <label class="form-check-label" for="allCustomers">
                            All Customers
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recipientType" id="byCategory" value="category">
                        <label class="form-check-label" for="byCategory">
                            By Category
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recipientType" id="byDistrict" value="district">
                        <label class="form-check-label" for="byDistrict">
                            By District
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recipientType" id="customList" value="custom">
                        <label class="form-check-label" for="customList">
                            Custom List
                        </label>
                    </div>
                </div>
                <div class="form-group" id="categorySelect" style="display: none;">
                    <label class="form-label">Select Category</label>
                    <select class="form-control form-control-sm" id="recipientCategory">
                        <option value="farmer">Farmers</option>
                        <option value="dealer">Dealers</option>
                        <option value="retailer">Retailers</option>
                    </select>
                </div>
                <div class="form-group" id="districtSelect" style="display: none;">
                    <label class="form-label">Select District</label>
                    <select class="form-control form-control-sm" id="recipientDistrict">
                        <option value="dhaka">Dhaka</option>
                        <option value="rajshahi">Rajshahi</option>
                        <option value="khulna">Khulna</option>
                        <option value="sylhet">Sylhet</option>
                    </select>
                </div>
                <div class="form-group" id="customListUpload" style="display: none;">
                    <label class="form-label">Upload Phone List (CSV)</label>
                    <input type="file" class="form-control form-control-sm" id="phoneList" accept=".csv">
                </div>
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea class="form-control form-control-sm" id="smsMessage" rows="4" placeholder="Enter your message here..."></textarea>
                    <small class="form-text text-muted">0/160 characters</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Schedule (Optional)</label>
                    <input type="datetime-local" class="form-control form-control-sm" id="smsSchedule">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-primary btn btn-sm btn-primary-secondary" onclick="resetSmsForm()">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-sm btn-primary btn btn-sm btn-primary-primary">
                        <i class="fas fa-paper-plane"></i> Send SMS
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Initialize SMS Form script here if needed, or ensure it's called in the layout script section
    // document.addEventListener('DOMContentLoaded', initializeSMSForm); // This is already called in the layout script
</script>
@endsection
