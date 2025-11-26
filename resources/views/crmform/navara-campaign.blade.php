@extends('layouts.standalone')
@section('title', $title)
@push('styles')

@endpush

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Customer Form Card -->
                <div class="card mb-3 shadow-none bg-none">
                    <div class="card-header d-flex justify-content-between align-items-center bg-white">
                        <h5 class="card-title ">
                            <i class="fas fa-store dealer-icon"></i>
                            <span>Navara Campaign</span>
                        </h5>

                        <div class="agent-info">
                            <i class="fas fa-user-tie"></i>
                            @if (!empty($agent))
                                <span>Agent: {{ $agent }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" id="store_or_update_form">
                            @csrf
                            <input type="hidden" name="agent" value="{{ $agent ?? 'Default' }}">
                            <input type="hidden" name="customer_category" id="customer_category" value="Farmer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">নাম</label>
                                        <input type="text" class="form-control form-control-sm" name="address" placeholder="গ্রাহক নাম লিখুন">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ঠিকানা</label>
                                        <input type="text" class="form-control form-control-sm" name="address" placeholder="গ্রাহক ঠিকানা লিখুন">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">জমির পরিমান</label>
                                        <input type="text" class="form-control form-control-sm" name="address" placeholder="গ্রাহক জমির পরিমান লিখুন">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">১) আপনি অনলাইন অফারটি সম্পর্কে জানেন? *</label>
                                        <select class="form-select form-select-sm" name="q1_online_offer" id="q1_online_offer">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div id="q2_block" class="mb-3 d-none">
                                        <label class="form-label">২) পেতে জানলেন কীভাবে?</label>
                                        <select class="form-select form-select-sm" name="q2_media">
                                            <option value="">Select</option>
                                            <option value="officer">অফিসার</option>
                                            <option value="farmer">ফিল্ড</option>
                                            <option value="freelancer">ফ্রিল্যান্সার</option>
                                            <option value="promo">প্রচারণা সামগ্রী</option>
                                            <option value="other">অন্যান্য</option>
                                        </select>
                                    </div>

                                    <div id="q1_no_reason" class="mb-3 d-none">
                                        <label class="form-label">অফারটি জানেন না — কারণ/মন্তব্য</label>
                                        <textarea class="form-control form-control-sm" rows="2" name="q1_reason"></textarea>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">৩) আপনি ১০ লিটার নাভারা নিতে চান?</label>
                                        <select class="form-select form-select-sm" name="q3_buy" id="q3_buy">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div id="q3_offer_payesen" class="mb-3 d-none">
                                        <label class="form-label">অফারটি পেয়েছেন?</label>
                                        <select class="form-select form-select-sm" name="q3_offer_received">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div id="q3_interested_block" class="mb-3 d-none">
                                        <label class="form-label">অফারটি নিতে আগ্রহী?</label>
                                        <select class="form-select form-select-sm" name="q3_interested" id="q3_interested">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div id="q3_when_block" class="mb-3 d-none">
                                        <label class="form-label">কবে নাগাদ অফারটি নিতে চান?</label>
                                        <input type="text" name="q3_when" class="form-control form-control-sm" placeholder="উদাহরণঃ ২-৩ দিনের মধ্যে">
                                    </div>

                                    <div id="q3_no_opinion" class="mb-3 d-none">
                                        <label class="form-label">কারণ ও মতামত</label>
                                        <textarea class="form-control form-control-sm" rows="2" name="q3_no_reason"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">৪) অফারটি নিয়ে আপনার পক্ষ থেকে মতামত?</label>
                                        <textarea class="form-control form-control-sm" rows="3" name="q4_opinion"></textarea>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button class="btn btn-sm btn-primary btn btn-sm btn-primary-success" type="button" id="save-btn btn-sm btn-primary">
                                            <i class="fas fa-save"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer text-center">
            <p>&copy; {{ date('Y') }} All rights reserved | Developed by Shekh Farid
                <a href="https://myolbd.com" target="_blank">My Outsourcing Ltd</a>
            </p>
        </footer>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            // Q1 elements
            let q1 = $('#q1_online_offer');
            let q2_block = $('#q2_block');
            let q1_no_reason = $('#q1_no_reason');

            // Q3 elements
            let q3 = $('#q3_buy');
            let q3_offer = $('#q3_offer_payesen');
            let q3_interested_block = $('#q3_interested_block');
            let q3_interested_select = $('#q3_interested');
            let q3_when = $('#q3_when_block');
            let q3_no_reason = $('#q3_no_opinion');


            // Q1 Logic
            q1.on('change', function () {
                if ($(this).val() === 'yes') {
                    q2_block.removeClass('d-none');
                    q1_no_reason.addClass('d-none');
                }
                else if ($(this).val() === 'no') {
                    q2_block.addClass('d-none');
                    q1_no_reason.removeClass('d-none');
                }
                else {
                    q2_block.addClass('d-none');
                    q1_no_reason.addClass('d-none');
                }
            });


            // Q3 Logic
            q3.on('change', function () {
                if ($(this).val() === 'yes') {

                    q3_offer.removeClass('d-none');
                    q3_interested_block.addClass('d-none');
                    q3_when.addClass('d-none');
                    q3_no_reason.addClass('d-none');

                } else if ($(this).val() === 'no') {

                    q3_offer.addClass('d-none');
                    q3_interested_block.removeClass('d-none');

                } else {

                    q3_offer.addClass('d-none');
                    q3_interested_block.addClass('d-none');

                }
            });


            // Interested Logic
            q3_interested_select.on('change', function () {
                if ($(this).val() === 'yes') {
                    q3_when.removeClass('d-none');
                    q3_no_reason.addClass('d-none');
                }
                else if ($(this).val() === 'no') {
                    q3_when.addClass('d-none');
                    q3_no_reason.removeClass('d-none');
                }
            });

        });
    </script>
@endpush
