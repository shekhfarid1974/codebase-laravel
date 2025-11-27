@extends('layouts.app')

@section('title', 'FAQ Crop')
@section('page_title', 'FAQ Crop')

@section('content')
    <div id="viewFaqsView">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                FAQ Crop
                <div>
                    <a href="{{ route('faqs.crops.create') }}" class="btn btn-sm btn-primary btn btn-sm btn-primary-primary" >
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="faqTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rice</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Onion</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Brinjal</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Garlic</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Maize</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Banana</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Cabbage</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Watermelon</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Wheat</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Chilli</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2025-09-15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-001')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-001')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-001')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')

@endsection

@push('scripts')

@endpush

<style>
    .crop-image {
        max-width: 100px;
        max-height: 80px;
        object-fit: cover;
        border-radius: 4px;
    }

    .problem-description,
    .solution-description {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
    }

    .modal-lg {
        max-width: 800px;
    }

    .modal-content {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 0.3rem;
        outline: 0;
    }
</style>
