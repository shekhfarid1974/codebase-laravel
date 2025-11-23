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
                            <span>Meeting Feedback</span>
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
                                        <label class="form-label">১) আপনি কি রহিম মিয়া বলছেন?</label>
                                        <select name="rahim_mia" id="rahim_mia" class="form-select">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">২) আপনার ঠিকানা কোন এলাকায়?</label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="আপনার এলাকা লিখুন">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            ৩) মে মাসের ৩ তারিখে খ বাজারে অটো ক্রপ কেয়ার এর একটি মিটিং হয়েছিল। আপনি
                                            উপস্থিত ছিলেন?
                                        </label>
                                        <select name="meeting_attend" id="meeting_attend" class="form-select">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="discussion_topic_block">
                                        <label class="form-label">৪) কোন বিষয়ে আলোচনা হয়েছিল আপনার মনে আছে?</label>
                                        <textarea class="form-control" rows="2" name="discussion_topic"></textarea>
                                    </div>

                                    <div class="mb-3 d-none" id="product_opinion_block">
                                        <label class="form-label">৫) পণ্যটি নিয়ে আপনার কোনো মতামত আছে?</label>
                                        <textarea class="form-control" rows="2" name="product_opinion"></textarea>
                                    </div>

                                    <div class="mb-3 d-none" id="product_used_block">
                                        <label class="form-label">৬) আপনি কি পণ্যটি ক্রয় করেছেন বা ব্যবহার করেছেন?</label>
                                        <select name="product_used" class="form-select">
                                            <option value="">Select</option>
                                            <option value="yes">হ্যাঁ</option>
                                            <option value="no">না</option>
                                        </select>
                                    </div>

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button class="btn btn-success" type="button" id="save-btn">
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
            $('#meeting_attend').on('change', function() {
                if ($(this).val() === 'yes') {
                    $('#discussion_topic_block').removeClass('d-none');
                    $('#product_opinion_block').removeClass('d-none');
                    $('#product_used_block').removeClass('d-none');
                } else {
                    $('#discussion_topic_block').addClass('d-none');
                    $('#product_opinion_block').addClass('d-none');
                    $('#product_used_block').addClass('d-none');
                }
            });
        });
    </script>
@endpush
