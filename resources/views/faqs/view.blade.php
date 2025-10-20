@extends('layouts.app')

@section('title', 'FAQ Management')
@section('page_title', 'FAQ Management')

@section('content')
<div id="viewFaqsView">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            FAQ Management
            <div>
                <button class="btn btn-primary" onclick="showAddFaqModal()">
                    <i class="fas fa-plus"></i> Add FAQ
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="faqTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#FAQ-001</td>
                            <td>How to identify and treat blast disease in rice?</td>
                            <td>Product</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>2023-09-15</td>
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
                            <td>#FAQ-002</td>
                            <td>What is the recommended fertilizer dosage for wheat?</td>
                            <td>Product</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>2023-09-14</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-002')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-002')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-002')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#FAQ-003</td>
                            <td>How to control stem borer in jute crops?</td>
                            <td>Process</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>2023-09-13</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-003')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-003')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-003')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#FAQ-004</td>
                            <td>What are the common diseases in tomato plants and their treatments?</td>
                            <td>Product</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>2023-09-12</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-004')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-004')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-004')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#FAQ-005</td>
                            <td>How to improve soil fertility for better crop yield?</td>
                            <td>Process</td>
                            <td><span class="badge badge-danger">Inactive</span></td>
                            <td>2023-09-11</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewFaq('FAQ-005')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="editFaq('FAQ-005')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteFaq('FAQ-005')">
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
<!-- Add FAQ Modal -->
<div class="modal" id="addFaqModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New FAQ</h5>
                <button type="button" class="btn-close" onclick="closeModal('addFaqModal')"></button>
            </div>
            <div class="modal-body">
                <form id="addFaqForm">
                    <div class="form-group">
                        <label class="form-label">Question</label>
                        <input type="text" class="form-control" id="faqQuestion" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Answer</label>
                        <textarea class="form-control" id="faqAnswer" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="faqCategory" required>
                            <option value="">Select Category</option>
                            <option value="product">Product</option>
                            <option value="process">Process</option>
                            <option value="complaint">Complaint</option>
                            <option value="service">Service</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" id="faqStatus" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('addFaqModal')">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveFaq()">Save FAQ</button>
            </div>
        </div>
    </div>
</div>
@endsection