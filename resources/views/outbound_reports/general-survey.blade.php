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
        <div class="card-header">Campaign: General Survey</div>
        <div class="card-body">
            <!-- Filters Row -->
            <div class="row mb-3 align-items-center">
                <!-- Phone Search -->
                <div class="col-md-3">
                    <label class="fw-bold">Search by Phone</label>
                    <input type="text" id="phoneSearch" class="form-control form-control-sm" placeholder="Enter phone number">
                </div>

                <!-- Date Search -->
                <div class="col-md-3">
                    <label class="fw-bold">Date</label>
                    <input type="date" id="dateSearch" class="form-control form-control-sm">
                </div>

                <!-- Buttons -->
                <div class="col-md-3 d-flex gap-2">
                    <div class="mt-4">
                        <button type="button" id="filter-btn btn-sm btn-primary" class="btn btn-sm btn-primary btn btn-sm btn-primary-primary mr-1">Filter</button>
                        <button id="resetFilters" class="btn btn-sm btn-primary btn btn-sm btn-primary-danger">Reset</button>
                        <button id="exportbtn btn-sm btn-primary" class="btn btn-sm btn-primary btn btn-sm btn-primary-primary ms-2">Export</button>
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
                                        <th style="min-width: 120px; vertical-align: top;">Name</th>
                                        <th style="min-width: 120px; vertical-align: top;">Phone</th>
                                        <th style="min-width: 120px; vertical-align: top;">Address</th>
                                        <th style="min-width: 120px; vertical-align: top;">Land Size</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">1. চাষাবাদে প্রধান ফসল কি?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">2. অটো ক্রপ কেয়ার এর নাম শুনেছেন ?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">3. অটো ক্রপ কেয়ার এর কোনো পণ্য ব্যবহার করেন কি?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">4. অটো ক্রপ কেয়ার সম্পর্কে বিস্তারিত জানানো হ্যা/না হলে কী কী পণ্য?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">5. পণ্য সংগ্রহ করেন কোন স্থান থেকে?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">6. অটো ক্রপ কেয়ার এর কোনো প্রতিনিধির সাথে কথা হয়েছে?</th>
                                        <th class="multi-line" style="min-width: 300px; vertical-align: top;">7. আপনার পণ্য নিয়ে কোনো মতামত আছে?</th>
                                        <th style="min-width: 130px; vertical-align: top;">Survey Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: top;">1</td>
                                        <td style="vertical-align: top;">Rahim</td>
                                        <td style="vertical-align: top;">01712345678</td>
                                        <td style="vertical-align: top;">Laxmipur</td>
                                        <td style="vertical-align: top;">42 Acres</td>
                                        <td style="vertical-align: top;">ধান</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Auto Crop Care Product 1, Product 2</td>
                                        <td style="vertical-align: top;">Local retailer in Laxmipur</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Great product, would recommend to others. Improved yield.</td>
                                        <td style="vertical-align: top;">2025-01-15</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">2</td>
                                        <td style="vertical-align: top;">Karim</td>
                                        <td style="vertical-align: top;">01812345678</td>
                                        <td style="vertical-align: top;">Dhaka</td>
                                        <td style="vertical-align: top;">50 Acres</td>
                                        <td style="vertical-align: top;">সবজি</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">-</td>
                                        <td style="vertical-align: top;">Not yet, but considering for future crops.</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">Would like to know more about product usage.</td>
                                        <td style="vertical-align: top;">2025-01-16</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">3</td>
                                        <td style="vertical-align: top;">Aziz</td>
                                        <td style="vertical-align: top;">01912345678</td>
                                        <td style="vertical-align: top;">Chittagong</td>
                                        <td style="vertical-align: top;">30 Acres</td>
                                        <td style="vertical-align: top;">ড্রাগন</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">-</td>
                                        <td style="vertical-align: top;">Haven't bought yet, would like more details.</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Could be beneficial for fruit crops, but needs more information.</td>
                                        <td style="vertical-align: top;">2025-01-17</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">4</td>
                                        <td style="vertical-align: top;">Salauddin</td>
                                        <td style="vertical-align: top;">01612345678</td>
                                        <td style="vertical-align: top;">Barisal</td>
                                        <td style="vertical-align: top;">35 Acres</td>
                                        <td style="vertical-align: top;">আম</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Auto Crop Care Product 3</td>
                                        <td style="vertical-align: top;">Purchased from local dealer in Barisal</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Excellent product, saw a noticeable improvement in yield.</td>
                                        <td style="vertical-align: top;">2025-01-18</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">5</td>
                                        <td style="vertical-align: top;">Nashim</td>
                                        <td style="vertical-align: top;">01512345678</td>
                                        <td style="vertical-align: top;">Rajshahi</td>
                                        <td style="vertical-align: top;">40 Acres</td>
                                        <td style="vertical-align: top;">অন্যান্য</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">-</td>
                                        <td style="vertical-align: top;">Yet to explore. Interested in learning more.</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">Need more awareness and demonstrations in the region.</td>
                                        <td style="vertical-align: top;">2025-01-19</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">6</td>
                                        <td style="vertical-align: top;">Shakib</td>
                                        <td style="vertical-align: top;">01312345678</td>
                                        <td style="vertical-align: top;">Khulna</td>
                                        <td style="vertical-align: top;">25 Acres</td>
                                        <td style="vertical-align: top;">সবজি</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Auto Crop Care Product 2</td>
                                        <td style="vertical-align: top;">Bought from nearby distributor</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Effective, but more detailed guidelines needed for usage.</td>
                                        <td style="vertical-align: top;">2025-01-20</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">7</td>
                                        <td style="vertical-align: top;">Raza</td>
                                        <td style="vertical-align: top;">01412345678</td>
                                        <td style="vertical-align: top;">Sylhet</td>
                                        <td style="vertical-align: top;">45 Acres</td>
                                        <td style="vertical-align: top;">ধান</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">-</td>
                                        <td style="vertical-align: top;">Still learning about the benefits.</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">Not much information available about the product.</td>
                                        <td style="vertical-align: top;">2025-01-21</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">8</td>
                                        <td style="vertical-align: top;">Shihab</td>
                                        <td style="vertical-align: top;">01712345679</td>
                                        <td style="vertical-align: top;">Comilla</td>
                                        <td style="vertical-align: top;">60 Acres</td>
                                        <td style="vertical-align: top;">ড্রাগন</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Auto Crop Care Product 1, Product 3</td>
                                        <td style="vertical-align: top;">Ordered from regional supplier in Comilla</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Useful, but requires more stock and distribution points.</td>
                                        <td style="vertical-align: top;">2025-01-22</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">9</td>
                                        <td style="vertical-align: top;">Tarek</td>
                                        <td style="vertical-align: top;">01512345679</td>
                                        <td style="vertical-align: top;">Rangpur</td>
                                        <td style="vertical-align: top;">35 Acres</td>
                                        <td style="vertical-align: top;">গম</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Auto Crop Care Product 4</td>
                                        <td style="vertical-align: top;">Local shop in Rangpur</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Good results with wheat cultivation.</td>
                                        <td style="vertical-align: top;">2025-01-23</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">10</td>
                                        <td style="vertical-align: top;">Mamun</td>
                                        <td style="vertical-align: top;">01612345679</td>
                                        <td style="vertical-align: top;">Noakhali</td>
                                        <td style="vertical-align: top;">28 Acres</td>
                                        <td style="vertical-align: top;">জুট</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">-</td>
                                        <td style="vertical-align: top;">Looking for suppliers.</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">Interested in trying new products.</td>
                                        <td style="vertical-align: top;">2025-01-24</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">11</td>
                                        <td style="vertical-align: top;">Sohel</td>
                                        <td style="vertical-align: top;">01812345679</td>
                                        <td style="vertical-align: top;">Pabna</td>
                                        <td style="vertical-align: top;">45 Acres</td>
                                        <td style="vertical-align: top;">তরমুজ</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Auto Crop Care Product 5</td>
                                        <td style="vertical-align: top;">From supplier in Pabna</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Excellent for fruit crops.</td>
                                        <td style="vertical-align: top;">2025-01-25</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">12</td>
                                        <td style="vertical-align: top;">Rasel</td>
                                        <td style="vertical-align: top;">01912345679</td>
                                        <td style="vertical-align: top;">Jessore</td>
                                        <td style="vertical-align: top;">38 Acres</td>
                                        <td style="vertical-align: top;">পেঁপে</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">না</td>
                                        <td style="vertical-align: top;">-</td>
                                        <td style="vertical-align: top;">Planning to purchase soon.</td>
                                        <td style="vertical-align: top;">হ্যা</td>
                                        <td style="vertical-align: top;">Good for tropical fruits.</td>
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
