@extends('layouts.app')

@section('title', 'FAQ Management')
@section('page_title', 'FAQ Management')

@section('content')
    <div id="viewFaqsView">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                FAQ Management
                <div>
                    <a href="{{ route('faqs.add') }}" class="btn btn-primary" >
                        <i class="fas fa-plus"></i> Add FAQ
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="faqTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Crop</th>
                                <th>Category</th>
                                <th>Identification</th>
                                <th>Problem</th>
                                <th>Solution</th>
                                <th>Snap/Video</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#FAQ-001</td>
                                <td>Rice</td>
                                <td>Disease</td>
                                <td>Blast Disease</td>
                                <td class="problem-description">White to gray-green lesions on leaves with dark borders</td>
                                <td class="solution-description">Apply fungicides containing tricyclazole or azoxystrobin
                                </td>
                                <td>
                                    <img src="https://via.placeholder.com/100x80?text=Blast" alt="Blast Disease"
                                        class="crop-image">
                                </td>
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
                                <td>Wheat</td>
                                <td>Nutrition</td>
                                <td>Nutrient Deficiency</td>
                                <td class="problem-description">Yellowing of leaves and stunted growth</td>
                                <td class="solution-description">Apply NPK fertilizer in 120:60:40 kg/ha ratio</td>
                                <td>
                                    <img src="https://via.placeholder.com/100x80?text=Wheat" alt="Wheat"
                                        class="crop-image">
                                </td>
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
                                <td>Jute</td>
                                <td>Pest</td>
                                <td>Stem Borer</td>
                                <td class="problem-description">Holes in stems, wilting plants</td>
                                <td class="solution-description">Use chlorpyrifos spray and remove infected plants</td>
                                <td>
                                    <img src="https://via.placeholder.com/100x80?text=Jute" alt="Jute"
                                        class="crop-image">
                                </td>
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
                                <td>Tomato</td>
                                <td>Disease</td>
                                <td>Early Blight</td>
                                <td class="problem-description">Dark spots with concentric rings on leaves</td>
                                <td class="solution-description">Apply copper-based fungicides and practice crop rotation
                                </td>
                                <td>
                                    <img src="https://via.placeholder.com/100x80?text=Tomato" alt="Tomato"
                                        class="crop-image">
                                </td>
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
                                <td>General</td>
                                <td>Soil</td>
                                <td>Soil Fertility</td>
                                <td class="problem-description">Poor crop yield and nutrient deficiency</td>
                                <td class="solution-description">Add organic compost and practice green manuring</td>
                                <td>
                                    <img src="https://via.placeholder.com/100x80?text=Soil" alt="Soil"
                                        class="crop-image">
                                </td>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New FAQ</h5>
                    <button type="button" class="btn-close" onclick="closeModal('addFaqModal')"></button>
                </div>
                <div class="modal-body">
                    <form id="addFaqForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Crop</label>
                                    <select class="form-control" id="faqCrop" required>
                                        <option value="">Select Crop</option>
                                        <option value="Rice">Rice</option>
                                        <option value="Wheat">Wheat</option>
                                        <option value="Jute">Jute</option>
                                        <option value="Tomato">Tomato</option>
                                        <option value="General">General</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" id="faqCategory" required>
                                        <option value="">Select Category</option>
                                        <option value="Disease">Disease</option>
                                        <option value="Pest">Pest</option>
                                        <option value="Nutrition">Nutrition</option>
                                        <option value="Soil">Soil</option>
                                        <option value="Irrigation">Irrigation</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Identification</label>
                            <input type="textarea" class="form-control" id="faqIdentification"
                                placeholder="Enter problem identification" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Problem Description</label>
                            <textarea class="form-control" id="faqProblem" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Solution</label>
                            <textarea class="form-control" id="faqSolution" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Upload Image/Video</label>
                            <input type="file" class="form-control" id="faqImage" accept="image/*,video/*">
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

    <!-- View FAQ Modal -->
    <div class="modal" id="viewFaqModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">FAQ Details</h5>
                    <button type="button" class="btn-close" onclick="closeModal('viewFaqModal')"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>FAQ ID:</strong> <span id="viewFaqId"></span>
                        </div>
                        <div class="col-md-6">
                            <strong>Status:</strong> <span id="viewFaqStatus"></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Crop:</strong> <span id="viewFaqCrop"></span>
                        </div>
                        <div class="col-md-6">
                            <strong>Category:</strong> <span id="viewFaqCategory"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <strong>Identification:</strong> <span id="viewFaqIdentification"></span>
                    </div>
                    <div class="mb-3">
                        <strong>Problem Description:</strong>
                        <p id="viewFaqProblem" class="mt-1"></p>
                    </div>
                    <div class="mb-3">
                        <strong>Solution:</strong>
                        <p id="viewFaqSolution" class="mt-1"></p>
                    </div>
                    <div class="mb-3">
                        <strong>Image/Video:</strong>
                        <div id="viewFaqMedia" class="mt-2"></div>
                    </div>
                    <div class="mb-3">
                        <strong>Created Date:</strong> <span id="viewFaqCreated"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('viewFaqModal')">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit FAQ Modal -->
    <div class="modal" id="editFaqModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit FAQ</h5>
                    <button type="button" class="btn-close" onclick="closeModal('editFaqModal')"></button>
                </div>
                <div class="modal-body">
                    <form id="editFaqForm">
                        <input type="hidden" id="editFaqId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Crop</label>
                                    <select class="form-control" id="editFaqCrop" required>
                                        <option value="">Select Crop</option>
                                        <option value="Rice">Rice</option>
                                        <option value="Wheat">Wheat</option>
                                        <option value="Jute">Jute</option>
                                        <option value="Tomato">Tomato</option>
                                        <option value="General">General</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" id="editFaqCategory" required>
                                        <option value="">Select Category</option>
                                        <option value="Disease">Disease</option>
                                        <option value="Pest">Pest</option>
                                        <option value="Nutrition">Nutrition</option>
                                        <option value="Soil">Soil</option>
                                        <option value="Irrigation">Irrigation</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Identification</label>
                            <input type="text" class="form-control" id="editFaqIdentification" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Problem Description</label>
                            <textarea class="form-control" id="editFaqProblem" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Solution</label>
                            <textarea class="form-control" id="editFaqSolution" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Upload Image/Video</label>
                            <input type="file" class="form-control" id="editFaqImage" accept="image/*,video/*">
                            <div id="currentImage" class="mt-2"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="editFaqStatus" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('editFaqModal')">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateFaq()">Update FAQ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteFaqModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" onclick="closeModal('deleteFaqModal')"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this FAQ? This action cannot be undone.</p>
                    <p><strong>FAQ ID:</strong> <span id="deleteFaqId"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        onclick="closeModal('deleteFaqModal')">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDeleteFaq()">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Modal functions
        function showModal(modalId) {
            document.getElementById(modalId).classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        // Show Add FAQ Modal
        function showAddFaqModal() {
            document.getElementById('addFaqForm').reset();
            showModal('addFaqModal');
        }

        // Save FAQ (Demo function)
        function saveFaq() {
            // Demo function - in real app, this would submit to backend
            showToast('FAQ saved successfully!', 'success');
            closeModal('addFaqModal');
        }

        // View FAQ (Demo function)
        function viewFaq(faqId) {
            // Sample data for demo
            const sampleData = {
                'FAQ-001': {
                    id: 'FAQ-001',
                    crop: 'Rice',
                    category: 'Disease',
                    identification: 'Blast Disease',
                    problem: 'White to gray-green lesions on leaves with dark borders. The lesions may have a reddish-brown margin and can cause significant yield loss if not treated promptly.',
                    solution: 'Apply fungicides containing tricyclazole or azoxystrobin. Ensure proper field drainage and avoid excessive nitrogen fertilization. Remove and destroy infected plant debris.',
                    image: 'https://via.placeholder.com/100x80?text=Blast',
                    status: 'Active',
                    created: '2023-09-15'
                },
                'FAQ-002': {
                    id: 'FAQ-002',
                    crop: 'Wheat',
                    category: 'Nutrition',
                    identification: 'Nutrient Deficiency',
                    problem: 'Yellowing of leaves starting from tips and margins, stunted growth, and reduced tillering. Older leaves show symptoms first.',
                    solution: 'Apply NPK fertilizer in 120:60:40 kg/ha ratio. Conduct soil testing to determine specific nutrient deficiencies. Consider foliar application of micronutrients if needed.',
                    image: 'https://via.placeholder.com/100x80?text=Wheat',
                    status: 'Active',
                    created: '2023-09-14'
                }
            };

            const faq = sampleData[faqId] || sampleData['FAQ-001'];

            document.getElementById('viewFaqId').textContent = faq.id;
            document.getElementById('viewFaqCrop').textContent = faq.crop;
            document.getElementById('viewFaqCategory').textContent = faq.category;
            document.getElementById('viewFaqIdentification').textContent = faq.identification;
            document.getElementById('viewFaqProblem').textContent = faq.problem;
            document.getElementById('viewFaqSolution').textContent = faq.solution;
            document.getElementById('viewFaqStatus').innerHTML = faq.status === 'Active' ?
                '<span class="badge badge-success">Active</span>' :
                '<span class="badge badge-danger">Inactive</span>';
            document.getElementById('viewFaqCreated').textContent = faq.created;

            // Set media
            const mediaContainer = document.getElementById('viewFaqMedia');
            mediaContainer.innerHTML = `<img src="${faq.image}" alt="${faq.identification}" class="crop-image">`;

            showModal('viewFaqModal');
        }

        // Edit FAQ (Demo function)
        function editFaq(faqId) {
            // Sample data for demo
            const sampleData = {
                'FAQ-001': {
                    id: 'FAQ-001',
                    crop: 'Rice',
                    category: 'Disease',
                    identification: 'Blast Disease',
                    problem: 'White to gray-green lesions on leaves with dark borders',
                    solution: 'Apply fungicides containing tricyclazole or azoxystrobin',
                    image: 'https://via.placeholder.com/100x80?text=Blast',
                    status: 'active'
                }
            };

            const faq = sampleData[faqId] || sampleData['FAQ-001'];

            document.getElementById('editFaqId').value = faq.id;
            document.getElementById('editFaqCrop').value = faq.crop;
            document.getElementById('editFaqCategory').value = faq.category;
            document.getElementById('editFaqIdentification').value = faq.identification;
            document.getElementById('editFaqProblem').value = faq.problem;
            document.getElementById('editFaqSolution').value = faq.solution;
            document.getElementById('editFaqStatus').value = faq.status;

            // Set current image
            const currentImageContainer = document.getElementById('currentImage');
            currentImageContainer.innerHTML = `<p class="text-muted">Current Image:</p>
                                         <img src="${faq.image}" alt="${faq.identification}" class="crop-image">`;

            showModal('editFaqModal');
        }

        // Update FAQ (Demo function)
        function updateFaq() {
            showToast('FAQ updated successfully!', 'success');
            closeModal('editFaqModal');
        }

        // Delete FAQ (Demo function)
        function deleteFaq(faqId) {
            document.getElementById('deleteFaqId').textContent = faqId;
            showModal('deleteFaqModal');
        }

        // Confirm Delete FAQ (Demo function)
        function confirmDeleteFaq() {
            const faqId = document.getElementById('deleteFaqId').textContent;
            showToast(`FAQ ${faqId} deleted successfully!`, 'success');
            closeModal('deleteFaqModal');
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize DataTable for FAQ table
            if ($('#faqTable').length) {
                $('#faqTable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [
                        [8, 'desc']
                    ] // Order by created date
                });
            }
        });
    </script>
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
