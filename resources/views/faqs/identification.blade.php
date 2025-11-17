@extends('layouts.app')

@section('title', 'FAQ Identification')
@section('page_title', 'FAQ Identification')

@section('content')
    <div id="viewFaqsView">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                FAQ Identification
                <div>
                    <a href="{{ route('faqs.identifications.create') }}" class="btn btn-primary" >
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
                                <td>Leaf spot</td>
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
                                <td>Leafe curle</td>
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
                                <td>Seath Blight</td>
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
                                <td>Seath rot</td>
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
                                <td>Bakane</td>
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
                                <td>Early blight</td>
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
                                <td>late blight</td>
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
                                <td>Stem cangker</td>
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
