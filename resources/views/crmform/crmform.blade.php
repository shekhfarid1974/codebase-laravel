@extends('layouts.standalone')
@section('title', $title)
@push('styles')

@endpush

@section('content')
    <div class="container">

            <ul class="nav nav-pills bg-white border p-3 border-bottom-0 rounded" id="pills-tab" role="tablist">
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
                        return '<button class="action-btn btn btn-sm btn-primary" title="Call"><i class="fas fa-eye"></i></button>';
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
            searching: true,
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
                        return '<button class="action-btn btn btn-sm btn-primary" title="View"><i class="fas fa-eye"></i></button>';
                    }
                }
            ],
            language: {
                emptyTable: '<div class="text-center py-4 text-muted">No FAQ records found</div>',
                zeroRecords: '<div class="text-center py-4 text-muted">No matching records found</div>'
            }
        });

    </script>
@endpush
