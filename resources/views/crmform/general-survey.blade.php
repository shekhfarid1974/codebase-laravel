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
                            <span>General Survey</span>
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
                                        <label class="form-label">১) চাষের প্রধান ফসল কোনটি?</label>
                                        <select name="crop_main" id="crop_main" class="form-select form-select-sm">
                                            <option value="">Select</option>
                                            <option value="dhaan">ধান</option>
                                            <option value="sobji">সবজি</option>
                                            <option value="dragon">ড্রাগন</option>
                                            <option value="am">আম</option>
                                            <option value="other">অন্যান্য</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="crop_other_block">
                                        <label class="form-label">অন্যান্য ফসল লিখুন</label>
                                        <input type="text" class="form-control form-control-sm" name="crop_other" placeholder="ফসলের নাম লিখুন...">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">২) আপনার জমির জলমর পরিমান কত?</label>
                                        <input type="text" class="form-control form-control-sm" name="water_level" placeholder="উদাহরণ: মাঝারি / কম / বেশি">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">৩) আমেটার ক্রপ কেয়ার এর নাম সম্পর্কে জানেন?</label>
                                        <select name="ametar_know" id="ametar_know" class="form-select form-select-sm">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="ametar_usage_block">
                                        <label class="form-label">৪) আমেটার ক্রপ কেয়ার এর ব্যবহারের নিয়ম সম্পর্কে জানেন?</label>
                                        <select name="ametar_usage" id="ametar_usage" class="form-select form-select-sm">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 d-none" id="ametar_learn_block">
                                        <label class="form-label">নিয়ম সম্পর্কে জানতে চান?</label>
                                        <select class="form-select form-select-sm" name="ametar_learn">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="ametar_whatknow_block">
                                        <label class="form-label">নিয়ম সম্পর্কে কী কী জানেন?</label>
                                        <textarea class="form-control form-control-sm" rows="2" name="ametar_whatknow"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">৫) নিয়ম সংগ্রহ করার পছন্দের স্থান কোনটি?</label>
                                        <input type="text" class="form-control form-control-sm" name="source_place" placeholder="উদাহরণ: দোকান / অফিস / প্রতিনিধি">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">৬) আমেটার ক্রপ কেয়ার এর প্রতিনিধি সম্পর্কে শুনেছেন?</label>
                                        <select name="ametar_rep" class="form-select form-select-sm">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">৭) নিয়ম সম্পর্কে আপনার মতামত কী?</label>
                                        <textarea name="final_opinion" class="form-control form-control-sm" rows="3"></textarea>
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
        $(document).ready(function() {

            // (1) Other crop option
            $('#crop_main').on('change', function() {
                if ($(this).val() === 'other') {
                    $('#crop_other_block').removeClass('d-none');
                } else {
                    $('#crop_other_block').addClass('d-none');
                }
            });


            // (3) Ametar Name Known?
            $('#ametar_know').on('change', function () {
                if ($(this).val() === 'yes') {
                    $('#ametar_usage_block').removeClass('d-none');
                } else {
                    $('#ametar_usage_block').addClass('d-none');
                    $('#ametar_learn_block').addClass('d-none');
                    $('#ametar_whatknow_block').addClass('d-none');
                }
            });


            // (4) Usage Known?
            $('#ametar_usage').on('change', function () {
                if ($(this).val() === 'yes') {
                    $('#ametar_whatknow_block').removeClass('d-none');

                    $('#ametar_learn_block').addClass('d-none');

                } else if ($(this).val() === 'no') {
                    $('#ametar_learn_block').removeClass('d-none');

                    $('#ametar_whatknow_block').addClass('d-none');

                } else {
                    $('#ametar_learn_block').addClass('d-none');
                    $('#ametar_whatknow_block').addClass('d-none');
                }
            });

        });
    </script>

@endpush
