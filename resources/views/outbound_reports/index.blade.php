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
                        <button id="resetFilters" class="btn btn-danger">Reset</button>
                        <button id="exportBtn" class="btn btn-primary ms-2">Export</button>
                    </div>
                </div>
            </div>

            <!-- DataTable -->
            <div class="table-responsive">
                <table id="campaignReportsTable" class="table table-bordered table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Land Size</th>
                            <th>1. আপনি কি অফারটি সম্পর্কে শুনেছেন?</th>
                            <th>2. কোন মাধ্যমে শুনেছেন?</th>
                            <th>3. আপনি কি ১০ লিটার নাভারা কিনেছেন?</th>
                            <th>4. অফারটি নিয়ে আপনার কোনো মতামত আছে? (verbatim)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rahim</td>
                            <td>Laxmipur</td>
                            <td>42 একর</td>
                            <td>হ্যা</td>
                            <td>অফিসার</td>
                            <td>হ্যা</td>
                            <td>খুব ভালো অফার, এটা আরও ছড়িয়ে দেওয়া উচিত।</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Karim</td>
                            <td>Dhaka</td>
                            <td>50 একর</td>
                            <td>না</td>
                            <td>নাই</td>
                            <td>না</td>
                            <td>মাঝারি, আরও প্রচারণা দরকার।</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Aziz</td>
                            <td>Chittagong</td>
                            <td>30 একর</td>
                            <td>হ্যা</td>
                            <td>ডিলার</td>
                            <td>হ্যা</td>
                            <td>অফারটি ভাল ছিল, তবে আরও পরিষ্কারভাবে জানানো উচিত ছিল।</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Salauddin</td>
                            <td>Barisal</td>
                            <td>35 একর</td>
                            <td>হ্যা</td>
                            <td>রিটেইলার</td>
                            <td>না</td>
                            <td>খুব ভালো প্রস্তাব, তবে স্টক ছিল না।</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Nashim</td>
                            <td>Rajshahi</td>
                            <td>40 একর</td>
                            <td>না</td>
                            <td>প্রচারণা সামগ্রী</td>
                            <td>না</td>
                            <td>অফারটি জানানো হয়নি, তবে আগ্রহী হতে পারি।</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Shakib</td>
                            <td>Khulna</td>
                            <td>25 একর</td>
                            <td>হ্যা</td>
                            <td>অফিসার</td>
                            <td>হ্যা</td>
                            <td>অফারটি সঠিক সময়ে জানানো হয়েছিল, তবে আরো ব্যাখ্যা দরকার ছিল।</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Raza</td>
                            <td>Sylhet</td>
                            <td>45 একর</td>
                            <td>না</td>
                            <td>অন্যান্য</td>
                            <td>না</td>
                            <td>মাঝারি, অফারটি ভালো কিন্তু জানানো হয়নি।</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Shihab</td>
                            <td>Comilla</td>
                            <td>60 একর</td>
                            <td>হ্যা</td>
                            <td>ডিলার</td>
                            <td>হ্যা</td>
                            <td>অফারটি উপকারী ছিল, তবে আরও পরিমাণে স্টক থাকতে হবে।</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        #campaignReportsTable th,
        #campaignReportsTable td {
            vertical-align: top;
        }

        /* Adjusting the widths of the columns */
        #campaignReportsTable th {
            width: 10%;
            /* Adjust as needed */
        }

        #campaignReportsTable td {
            word-wrap: break-word;
            white-space: normal;
        }

        /* Custom styling for multi-line text in table */
        #campaignReportsTable td {
            max-width: 150px;
            /* Set a max width for cell */
            overflow-wrap: break-word;
        }
    </style>
@endpush
