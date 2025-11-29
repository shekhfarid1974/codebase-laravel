@extends('layouts.standalone')
@section('title', $title)
@push('styles')
    <style>
        #faqSuggestionList li:hover {
            background: #d1f7ff;
        }
    </style>
@endpush

@section('content')
    <div class="container">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white pb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="farmer-tab" data-bs-toggle="pill" data-bs-target="#pills-farmer" type="button" role="tab" aria-controls="pills-farmer" aria-selected="true"><i class="fas fa-tractor"></i> Farmer</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="retailer-tab" data-bs-toggle="pill" data-bs-target="#pills-retailer" type="button" role="tab" aria-controls="pills-retailer" aria-selected="false"><i class="fas fa-shopping-cart"></i> Retailer</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dealer-tab" data-bs-toggle="pill" data-bs-target="#pills-dealer" type="button" role="tab" aria-controls="pills-dealer" aria-selected="false"><i class="fas fa-store"></i> Dealer</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="otherdata-tab" data-bs-toggle="pill" data-bs-target="#pills-otherdata" type="button" role="tab" aria-controls="pills-otherdata" aria-selected="false"><i class="fas fa-ellipsis-h"></i> Others</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-farmer" role="tabpanel" aria-labelledby="farmer-tab" tabindex="0">
                            @include('crmform.inbound.farmer')
                        </div>
                        <div class="tab-pane fade" id="pills-retailer" role="tabpanel" aria-labelledby="retailer-tab" tabindex="0">
                            @include('crmform.inbound.retailer')
                        </div>
                        <div class="tab-pane fade" id="pills-dealer" role="tabpanel" aria-labelledby="dealer-tab" tabindex="0">
                            @include('crmform.inbound.dealer')
                        </div>
                        <div class="tab-pane fade" id="pills-otherdata" role="tabpanel" aria-labelledby="otherdata-tab" tabindex="0">
                            @include('crmform.inbound.others')
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


    {{-- Faq Modal --}}
    <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow-lg">

                <!-- Header -->
                <div class="modal-header border-0 bg-light">
                    <h1 class="modal-title fs-5 text-success fw-semibold" id="faqModalLabel">
                        <i class="fas fa-question-circle me-1"></i> FAQ Search
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">

                    <!-- Search Box -->
                    <div class="row mb-3 justify-content-center">
                        <div class="col-10 col-md-8">
                            <div class="input-group shadow-sm">
                                <input id="faqSearchInput" type="text" class="form-control border-success" placeholder="Search FAQ">
                                {{-- <button type="button" class="input-group-text text-success bg-white border-success">
                                    <i class="fas fa-search"></i>
                                </button> --}}
                            </div>

                            <!-- Suggestions -->
                            <ul id="faqSuggestionList"
                                class="list-group mt-2 shadow-sm"
                                style="display:none; cursor:pointer; max-height:250px; overflow-y:auto;">
                            </ul>
                        </div>
                    </div>

                    <!-- Result -->
                    <div id="faqFullContent" class="p-3 rounded border border-success mt-3 shadow-sm d-none"></div>

                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Interaction History Table
        farmerInteractionTable = $('#data-datatable').DataTable({
            processing: false,
            serverSide: false,
            responsive: true,
            searching: true,
            bInfo: true,
            paging: true,
            data: [
                [1, 'Farid Test', '01521204476', 'Crop disease issue',
                    'Recommended pesticide solution', ''
                ],
                [2, 'John Farmer', '01887654321', 'Fertilizer inquiry',
                    'Suggested organic fertilizer', ''
                ],
                [3, 'Mary Retailer', '01911223344', 'Product availability',
                    'Confirmed stock availability', ''
                ],
                [4, 'Robert Dealer', '01555666777', 'Pricing inquiry', 'Provided bulk pricing', '']
            ],
            columns: [{
                    title: 'SL'
                },
                {
                    title: 'Name'
                },
                {
                    title: 'Phone Number'
                },
                {
                    title: 'Problem'
                },
                {
                    title: 'Solution'
                },
                {
                    title: 'Action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return '<button class="action-btn btn-sm btn-primary btn btn-sm btn-primary" title="Call"><i class="fas fa-eye"></i></button>';
                    }
                }
            ],
            language: {
                emptyTable: '<div class="text-center py-4 text-muted">No interaction records found</div>',
                zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>'
            }
        });
        // FAQ Table
        farmerFaqTable = $('#faq-datatable').DataTable({
            processing: false,
            serverSide: false,
            responsive: true,
            searching: false,
            bInfo: true,
            paging: true,
            data: [
                [1, 'How to treat rice blast disease?', 'Disease Control', ''],
                [2, 'Best fertilizer for wheat cultivation?', 'Fertilizer', ''],
                [3, 'How to control aphids in vegetables?', 'Pest Control', ''],
                [4, 'What is the ideal pH for soil?', 'Soil Health', '']
            ],
            columns: [{
                    title: 'SL'
                },
                {
                    title: 'Question'
                },
                {
                    title: 'Category'
                },
                {
                    title: 'Action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return '<button class="action-btn btn-sm btn-primary btn btn-sm btn-primary" title="View"><i class="fas fa-eye"></i></button>';
                    }
                }
            ],
            language: {
                emptyTable: '<div class="text-center py-4 text-muted">No FAQ records found</div>',
                zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>'
            }
        });

        function showFaqModal() {
            var faqModal = new bootstrap.Modal(document.getElementById('faqModal'),{
                keyboard: false,
                backdrop: 'static'
            });
            faqModal.show();
        }

        var faqData = {
            "faqs": [
                {
                "title": "পেঁয়াজের এরিওফাইট মাকড় / Eriophyid mite",
                "symptoms": [
                    "অতি ক্ষুদ্র মাকড়ের আক্রমণে পাতা নিচের দিকে কুঁকড়িয়ে বাদামি রং ধারণ করে",
                    "কন্দের আকার ছোট হয়ে ফলন কম হয়"
                ],
                "control": [
                    "সানমেকটিন ১.৮ ইসি ১.২ মিলি/লিটার পানি অথবা",
                    "কুমুলাস ডি এফ ৪ গ্রাম/লিটার পানি স্প্রে করা"
                ],
                "donts": [
                    "অতি ঘন করে পেঁয়াজ চাষ করবেন না"
                ],
                "dos": [
                    "ক্ষেত পরিস্কার পরিচ্ছন্ন রাখুন"
                ]
                },
                {
                "title": "পেঁয়াজের কন্দ ফেটে যাওয়া সমস্যা / Bulb splitting or cracking",
                "cause": [
                    "দীর্ঘ খরা বা শুষ্ক-গরম বাতাসে শারীরবৃত্তীয় সমস্যা",
                    "মাটি শক্ত থাকা",
                    "হঠাৎ সেচ",
                    "অতিরিক্ত নাইট্রোজেন বা হরমোন"
                ],
                "management": [
                    "নিয়মিত পরিমিত সেচ",
                    "পর্যাপ্ত জৈব সার",
                    "সলুবোর বোরন মাত্রা অনুযায়ী প্রয়োগ"
                ],
                "donts": [
                    "অতি ঘন চাষ করবেন না",
                    "অতিরিক্ত নাইট্রোজেন বা হরমোন প্রয়োগ করবেন না"
                ],
                "dos": [
                    "জমি ভালোভাবে চাষ দিয়ে ঝুরঝুরে করুন",
                    "পর্যাপ্ত জৈব সার দিন"
                ]
                },
                {
                "title": "পেঁয়াজের ঘোড়া পোকা / Cutworm / Greasy cutworm",
                "symptoms": [
                    "পাতার সবুজ অংশ খেয়ে ফেলে"
                ],
                "control": [
                    "পাতায় ডিম/পোকা তুলে নষ্ট করা",
                    "অটোফস ২০ ইসি (৪ মিলি/লিটার) অথবা নাইট্রো ৫০৫ ইসি (২ মিলি/লিটার) স্প্রে করা",
                    "ক্ষেতের আশেপাশের আগাছা পরিষ্কার করা"
                ],
                "donts": [
                    "ক্ষেতের আশেপাশ অপরিচ্ছন্ন রাখবেন না"
                ],
                "dos": [
                    "ক্ষেতে পাখি বসার জন্য ডাল পুঁতে দিন"
                ]
                },
                {
                "title": "পেঁয়াজের চারার গোড়া পচা / Damping-off of Onion Seedling",
                "symptoms": [
                    "ছত্রাকে চারার গোড়া পঁচে যায়",
                    "চারা নেতিয়ে পড়ে"
                ],
                "control": [
                    "বেডে চারা তৈরি করা",
                    "পানি নিস্কাশন নিশ্চিত করা",
                    "অটোস্টিন ৫০ ডব্লিউডিজি ২–৩ গ্রাম/লিটার স্প্রে করা",
                    "ব্যাকটাফ ৫০ এসপি ১.৫ মিলি/লিটার (ব্যাকটেরিয়াজনিত হলে)"
                ]
                },
                {
                "title": "পেঁয়াজের থ্রিপস / Onion thrips / চোষী পোকা",
                "symptoms": [
                    "কচি পাতার রস শুষে গাছ দুর্বল করে",
                    "পাতা উপরের দিকে কুঁকড়িয়ে যায়",
                    "বাদামি দাগ দেখা দেয়"
                ],
                "control": [
                    "হলুদ রঙের ফাঁদ ব্যবহার",
                    "তামাকগুড়া + সাবানগুড়া + নিমপাতা নির্যাস (প্রতি লিটার পানিতে)",
                    "গ্লাডিয়াস ১০ এসসি (১ মিলি/লিটার) বা সাকসেস ২.৫ এসসি (১.৫ মিলি/লিটার)"
                ],
                "donts": [
                    "অতি ঘন করে চাষ করবেন না"
                ],
                "dos": [
                    "ক্ষেত পরিস্কার পরিচ্ছন্ন রাখুন"
                ]
                },
                {
                "title": "পেঁয়াজের পার্পল ব্লচ / Purple blotch of Onion",
                "symptoms": [
                    "পাতা ও বীজকান্ডে তামাটে/বাদামি/হালকা বেগুনি দাগ",
                    "পাতা উপরের দিক থেকে শুকিয়ে মারা যায়",
                    "গাছ ভেঙে পড়ে"
                ],
                "control": [
                    "আক্রান্ত পাতা/বীজকান্ড কেটে ফেলা",
                    "সুষম সার প্রয়োগ",
                    "রোভরাল ৫০ ডব্লিউপি (২ গ্রাম/লিটার) বা ইন্ডোফিল এম-৪৫ (২ গ্রাম/লিটার)",
                    "নাভারা ২৮ এসসি (১ মিলি/লিটার) স্প্রে করা — উষ্ণ-আদ্র পরিবেশে ঘন ঘন স্প্রে দরকার"
                ],
                "donts": [
                    "অতি ঘন করে চাষ করবেন না",
                    "একই জমিতে বারবার পেঁয়াজ/রসুন চাষ করবেন না"
                ],
                "dos": [
                    "ক্ষেত পরিস্কার পরিচ্ছন্ন রাখুন"
                ]
                }
            ]
        }

        $("#faqSearchInput").on("keyup enter", function () {
            let keyword = $(this).val().toLowerCase();
            let suggestionBox = $("#faqSuggestionList");

            suggestionBox.empty();
            $("#faqFullContent").hide().html(''); // HIDE full content on search
            $("#faqFullContent").removeClass('d-none'); // HIDE full content on search

            if (keyword.length === 0) {
                suggestionBox.hide();
                return;
            }

            let found = false;

            faqData.faqs.forEach((item, index) => {

                let combinedText = JSON.stringify(item).toLowerCase();

                if (combinedText.includes(keyword)) {
                    found = true;
                    suggestionBox.append(`
                        <li class="list-group-item" data-index="${index}">
                            ${item.title}
                        </li>
                    `);
                }
            });

            if (found) {
                suggestionBox.show();
            } else {
                suggestionBox.hide();
            }
        });

        // ========== CLICK ON SUGGESTION SHOW FULL CONTENT ==========

        $(document).on("click", "#faqSuggestionList li", function () {
            let index = $(this).data("index");
            let data = faqData.faqs[index];

            $("#faqSearchInput").val($(this).text().trim());
            $("#faqSuggestionList").hide();

            let html = `<h4>${data.title}</h4><hr>`;

            for (let key in data) {
                if (key !== "title") {
                    html += `<h6 class="mt-2 text-primary">${key.toUpperCase()}</h6><ul>`;
                    data[key].forEach(v => {
                        html += `<li>${v}</li>`;
                    });
                    html += `</ul>`;
                }
            }

            $("#faqFullContent").html(html).show();
        });

    </script>
@endpush
