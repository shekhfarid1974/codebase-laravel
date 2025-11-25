@extends('layouts.app')

@section('title', 'Import Leads')
@section('page_title', 'Import Leads')

@section('content')
<div class="card">
    <div class="card-header">
        Import Leads
    </div>
    <div class="card-body">
        <div class="alert alert-info">
            <strong>নোটিস:</strong> সার্ভে লিড আপলোড করার আগে অবশ্যই My Outsourcing Ltd. এর সাথে যোগাযোগ করুন।
        </div>
        
        <form action="{{ route('leads.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="file">Select CSV File</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".csv" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="import_type">Import Type</label>
                        <select class="form-control" id="import_type" name="import_type">
                            <option value="new">New Leads Only</option>
                            <option value="update">Update Existing</option>
                            <option value="replace">Replace All</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-file-upload"></i> Import Leads
                </button>
                <button type="button" class="btn btn-secondary ml-2" id="download-template">
                    <i class="fas fa-download"></i> Download Template
                </button>
            </div>
        </form>
        
        <div class="mt-4">
            <h5>Import Guidelines:</h5>
            <ul>
                <li>Only CSV files are allowed</li>
                <li>Maximum file size: 10MB</li>
                <li>Required fields: Name, Phone, Email</li>
                <li>Download the template to see the required format</li>
                <li>File must not contain duplicate phone numbers</li>
                <li>All phone numbers must be in valid format (11 digits)</li>
                <li>Email addresses must be in valid format</li>
                <li>Maximum 1000 records per upload</li>
                <li>Only English characters are allowed in names</li>
            </ul>
        </div>
    </div>
</div>
@endsection