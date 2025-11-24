@extends('layouts.app')

@section('title', 'Campaign Reports')
@section('page_title', 'Campaign Reports')

@section('content')
    <div class="card">
        <div class="card-header">Campaign: Questionnaire</div>
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

            <!-- DataTable -->
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <div class="box-tools pull-left">
                            <h4>Reports</h4>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="campaignReportsTable" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width: 30px; vertical-align: top;">SL</th>
                                        <th style="min-width: 120px; vertical-align: top;">Name</th>
                                        <th style="min-width: 120px; vertical-align: top;">Phone</th>
                                        <th style="min-width: 120px; vertical-align: top;">Address</th>
                                        <th style="min-width: 120px; vertical-align: top;">Land Size</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">1. আপনি কি অফারটি সম্পর্কে শুনেছেন?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">2. কোন মাধ্যমে শুনেছেন?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">3. আপনি কি ১০ লিটার নাভারা কিনেছেন?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">4. অফারটি নিয়ে আপনার কোনো মতামত আছে? (verbatim)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: top;">1</td>
                                        <td style="vertical-align: top;">Rahim</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Laxmipur</td>
                                        <td style="vertical-align: top;">42 একর</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফিসার</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">খুব ভালো অফার, এটা আরও ছড়িয়ে দেওয়া উচিত।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">2</td>
                                        <td style="vertical-align: top;">Karim</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Dhaka</td>
                                        <td style="vertical-align: top;">50 একর</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">নাই</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">মাঝারি, আরও প্রচারণা দরকার।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">3</td>
                                        <td style="vertical-align: top;">Aziz</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Chittagong</td>
                                        <td style="vertical-align: top;">30 একর</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">ডিলার</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফারটি ভাল ছিল, তবে আরও পরিষ্কারভাবে জানানো উচিত ছিল।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">4</td>
                                        <td style="vertical-align: top;">Salauddin</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Barisal</td>
                                        <td style="vertical-align: top;">35 একর</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">রিটেইলার</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">খুব ভালো প্রস্তাব, তবে স্টক ছিল না।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">5</td>
                                        <td style="vertical-align: top;">Nashim</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Rajshahi</td>
                                        <td style="vertical-align: top;">40 একর</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">প্রচারণা সামগ্রী</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">অফারটি জানানো হয়নি, তবে আগ্রহী হতে পারি।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">6</td>
                                        <td style="vertical-align: top;">Shakib</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Khulna</td>
                                        <td style="vertical-align: top;">25 একর</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফিসার</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফারটি সঠিক সময়ে জানানো হয়েছিল, তবে আরো ব্যাখ্যা দরকার ছিল।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">7</td>
                                        <td style="vertical-align: top;">Raza</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Sylhet</td>
                                        <td style="vertical-align: top;">45 একর</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">অন্যান্য</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">মাঝারি, অফারটি ভালো কিন্তু জানানো হয়নি।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">8</td>
                                        <td style="vertical-align: top;">Shihab</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Comilla</td>
                                        <td style="vertical-align: top;">60 একর</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">ডিলার</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফারটি উপকারী ছিল, তবে আরও পরিমাণে স্টক থাকতে হবে।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">9</td>
                                        <td style="vertical-align: top;">Tarek</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Rangpur</td>
                                        <td style="vertical-align: top;">35 একর</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফিসার</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফারটি খুব ভালো ছিল, আমি খুশি।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">10</td>
                                        <td style="vertical-align: top;">Mamun</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Noakhali</td>
                                        <td style="vertical-align: top;">28 একর</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">ডিলার</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">আগ্রহী কিন্তু জানতাম না।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">11</td>
                                        <td style="vertical-align: top;">Sohel</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Pabna</td>
                                        <td style="vertical-align: top;">45 একর</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">রিটেইলার</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফারটি খুব কার্যকর ছিল।</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">12</td>
                                        <td style="vertical-align: top;">Rasel</td>
                                        <td style="vertical-align: top;">01521204476</td>
                                        <td style="vertical-align: top;">Jessore</td>
                                        <td style="vertical-align: top;">38 একর</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">অফিসার</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">অফারটি ভালো কিন্তু সময়মতো জানানো হয়নি।</td>
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