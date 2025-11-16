@extends('layouts.app')

@section('title', 'Add FAQ')
@section('page_title', 'Add FAQ')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Add New FAQ
            <a href="{{ route('faqs.view') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to FAQs
            </a>
        </div>
        <div class="card-body">
            <form id="addFaqForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Article/Crop ID *</label>
                            <input type="text" class="form-control" name="article_id" placeholder="Enter Article/Crop ID"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Crop *</label>
                            <select class="form-select" name="crop" required>
                                <option value="">Select Crop</option>
                                <option value="Rice">Rice</option>
                                <option value="Wheat">Wheat</option>
                                <option value="Maize">Maize</option>
                                <option value="Jute">Jute</option>
                                <option value="Tomato">Tomato</option>
                                <option value="Potato">Potato</option>
                                <option value="Sugarcane">Sugarcane</option>
                                <option value="Cotton">Cotton</option>
                                <option value="General">General</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Category *</label>
                            <select class="form-select" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Disease">Disease</option>
                                <option value="Pest">Pest</option>
                                <option value="Nutrition">Nutrition</option>
                                <option value="Soil">Soil</option>
                                <option value="Irrigation">Irrigation</option>
                                <option value="Weed">Weed Management</option>
                                <option value="Harvesting">Harvesting</option>
                                <option value="Storage">Storage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Identification *</label>
                            <select class="form-select" name="identification" required>
                                <option value="">Select Category</option>
                                <option value="Disease">Disease</option>
                                <option value="Pest">Pest</option>
                                <option value="Nutrition">Nutrition</option>
                                <option value="Soil">Soil</option>
                                <option value="Irrigation">Irrigation</option>
                                <option value="Weed">Weed Management</option>
                                <option value="Harvesting">Harvesting</option>
                                <option value="Storage">Storage</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Problem in brief *</label>
                    <textarea class="form-control" name="problem" rows="4" placeholder="Describe the problem in detail" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Solution/Recommendation *</label>
                    <textarea class="form-control" name="solution" rows="4" placeholder="Provide solution and recommendations"
                        required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Snap/Videos</label>
                            <input type="file" class="form-control" name="media" accept="image/*,video/*">
                            <small class="form-text text-muted">Upload images or videos related to the problem</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Suggestion</label>
                            <textarea class="form-control" name="suggestion" rows="3"
                                placeholder="Additional suggestions or preventive measures"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Status *</label>
                    <select class="form-select" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary btn-lg" onclick="saveFaq()">
                        <i class="fas fa-save"></i> Save FAQ
                    </button>
                    <button type="reset" class="btn btn-secondary btn-lg">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function saveFaq() {
            const form = document.getElementById('addFaqForm');
            const formData = new FormData(form);

            // Basic validation
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                showToast('Please fill in all required fields', 'error');
                return;
            }

            // Show loading state
            const saveBtn = form.querySelector('button[type="button"]');
            const originalText = saveBtn.innerHTML;
            saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
            saveBtn.disabled = true;

            // Simulate API call - replace with actual API call in production
            setTimeout(() => {
                showToast('FAQ saved successfully!', 'success');

                // Reset form
                form.reset();

                // Restore button state
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;

                // Redirect to view page after 2 seconds
                setTimeout(() => {
                    window.location.href = "{{ route('faqs.view') }}";
                }, 2000);
            }, 1500);

            // In production, you would use:
            /*
            fetch("{{ route('faqs.store') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                showToast('FAQ saved successfully!', 'success');
                setTimeout(() => {
                    window.location.href = "{{ route('faqs.view') }}";
                }, 2000);
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Error saving FAQ', 'error');
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;
            });
            */
        }

        // Add real-time validation
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.hasAttribute('required') && !this.value.trim()) {
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                    }
                });
            });
        });
    </script>
@endpush

<style>
    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .btn-lg {
        padding: 10px 30px;
        margin: 0 10px;
    }
</style>
