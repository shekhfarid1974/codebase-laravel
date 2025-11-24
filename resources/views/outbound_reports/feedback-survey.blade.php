@extends('layouts.app')
@section('title', 'General Survey - Agricultural Survey')
@push('styles')
    <style>
        .align-items-bottom {
            align-items: end;
        }

        table th,
        table td {
            vertical-align: top !important;
            padding: 8px;
        }

        th.multi-line {
            min-width: 300px;
            white-space: normal;
            word-wrap: break-word;
        }

        /* Ensure table cells have proper spacing and alignment */
        .table td,
        .table th {
            vertical-align: top;
            padding: 8px;
            border: 1px solid #dee2e6;
        }

        /* Optional: Add background for header row */
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        
        /* Additional styling for the card layout */
        .card {
            margin-bottom: 20px;
        }
        
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 15px;
        }
        
        .card-body {
            padding: 15px;
        }
        
        .box {
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .box-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
            padding: 10px 15px;
        }
        
        .box-body {
            padding: 15px;
        }
        
        /* Pagination styling */
        .pagination {
            margin-top: 15px;
            margin-bottom: 0;
        }
        
        .pagination .page-item .page-link {
            color: #007bff;
        }
        
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        
        .pagination .page-item.disabled .page-link {
            color: #6c757d;
        }
        
        /* Pagination container */
        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        
        .pagination-info {
            margin-right: 15px;
        }
    </style>
@endpush
@section('content')
    <div class="card">
        <div class="card-header">Campaign: Feedback Survey</div>
        <div class="card-body">
            <!-- Filters Row -->
            <div class="row mb-3 align-items-center">
                <!-- Phone Search -->
                <div class="col-md-3">
                    <label class="fw-bold">Search by Phone</label>
                    <input type="text" id="phoneSearch" class="form-control" placeholder="Enter phone number">
                </div>

                <!-- Date Search -->
                <div class="col-md-3">
                    <label class="fw-bold">Date</label>
                    <input type="date" id="dateSearch" class="form-control">
                </div>

                <!-- Buttons -->
                <div class="col-md-3 d-flex gap-2">
                    <div class="mt-4">
                        <button type="button" id="filter-btn" class="btn btn-primary mr-1">Filter</button>
                        <button id="resetFilters" class="btn btn-danger">Reset</button>
                        <button id="exportBtn" class="btn btn-primary ms-2">Export</button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <div class="box-tools pull-left">
                            <h4>Reports</h4>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="report-datatable">
                                <thead>
                                    <tr>
                                        <th style="min-width: 30px; vertical-align: top;">SL</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">1. আপনি কি রহিম মিয়া বলছেন?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">2. আপনার ঠিকানা কোন এলাকায়?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">3. মে মাসের ৩ তারিখে খ বাজারে অটো ক্রপ কেয়ার এর একটি মিটিং হয়েছিল আপনি উপস্থিত ছিলেন?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">4. কোন বিষয়ে আলোচনা হয়েছিল আপনার মনে আছে?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">5. পণ্যটি নিয়ে আপনার কোনো মতামত আছে?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">6. আপনি কি পণ্যটি ক্রয় করেছেন বা ব্যবহার করেছেন?</th>
                                        <th style="min-width: 130px; vertical-align: top;">Survey Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: top;">1</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Laxmipur</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">পণ্য বিষয়ে আলোচনা হয়েছিল</td>
                                        <td style="vertical-align: top;">পণ্যটি খুব ভালো, ফলন বাড়াতে সাহায্য করে</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">2025-01-15</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">2</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">Dhaka</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">মিটিংয়ে উপস্থিত ছিলাম না</td>
                                        <td style="vertical-align: top;">জানি না, আগ্রহী হতে পারি</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">2025-01-16</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">3</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Chittagong</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">কীটনাশক ও সারের ব্যবহার সম্পর্কে</td>
                                        <td style="vertical-align: top;">পণ্যটি কার্যকর, তবে দাম কমানো দরকার</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">2025-01-17</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">4</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Barisal</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">ধান চাষে পণ্য ব্যবহারের পদ্ধতি</td>
                                        <td style="vertical-align: top;">অসাধারণ পণ্য, ফসলের গুণগত মান বৃদ্ধি করে</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">2025-01-18</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">5</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">Rajshahi</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">জানি না</td>
                                        <td style="vertical-align: top;">জানতাম না, তবে চেষ্টা করতে ইচ্ছা আছে</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">2025-01-19</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">6</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Khulna</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">সবজি চাষে পণ্যের ব্যবহার সম্পর্কে</td>
                                        <td style="vertical-align: top;">পণ্যটি কার্যকর, তবে ব্যবহার সংক্রান্ত নির্দেশনা প্রয়োজন</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">2025-01-20</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">7</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">Sylhet</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">কোন মিটিংয়ে যাই নি</td>
                                        <td style="vertical-align: top;">পণ্যটি সম্পর্কে কম তথ্য পাওয়া যায়</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">2025-01-21</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">8</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Comilla</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">ড্রাগন ফলে পণ্যের ব্যবহার সম্পর্কে</td>
                                        <td style="vertical-align: top;">পণ্যটি ভালো, তবে স্টক সমস্যা রয়েছে</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">2025-01-22</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">9</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Rangpur</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">গম চাষে পণ্য ব্যবহারের বিষয়ে</td>
                                        <td style="vertical-align: top;">খুব ভালো ফলাফল দিয়েছে</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">2025-01-23</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">10</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">Noakhali</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">জানি না</td>
                                        <td style="vertical-align: top;">আগ্রহী, তবে পাওয়ার উপায় খুঁজছি</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">2025-01-24</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">11</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Pabna</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">তরমুজ চাষে পণ্যের ব্যবহার সম্পর্কে</td>
                                        <td style="vertical-align: top;">অসাধারণ পণ্য, ফলের মান বৃদ্ধি করে</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">2025-01-25</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">12</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Jessore</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">পেঁপে চাষে পণ্য ব্যবহারের বিষয়ে</td>
                                        <td style="vertical-align: top;">ভালো পণ্য, তবে আরও প্রচারণা দরকার</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">2025-01-26</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="table-footer">
                            <div class="pagination-info">
                                Showing 1 to 10 of 12 entries
                            </div>
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection