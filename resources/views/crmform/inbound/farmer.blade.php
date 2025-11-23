<!-- Customer Form Card -->
<div class="card mb-3 shadow-none bg-none">
    <div class="card-header d-flex justify-content-between align-items-center bg-white">
        <h5 class="card-title ">
            <i class="fas fa-store dealer-icon"></i>
            <span>Farmer Information</span>
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
                <!-- Name -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label  required">Name <span class="sr-only">(required)</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter full name"
                            value="Farid Test" required>
                    </div>
                </div>

                <!-- Mobile Number -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label  required">Mobile Number <span
                                class="sr-only">(required)</span></label>
                        <input type="text" name="phone_number" class="form-control" value="{{ $phone_number ?? '' }}"
                            readonly required>
                    </div>
                </div>

                <!-- Phone Number Own -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Phone Number Own</label>
                        <select name="own_number" class="form-control">
                            <option value="Yes" {{ isset($own_number) && $own_number == 'Yes' ? 'selected' : '' }}>
                                Yes</option>
                            <option value="No" {{ isset($own_number) && $own_number == 'No' ? 'selected' : '' }}>No
                            </option>
                        </select>
                    </div>
                </div>

                <!-- Alternative Contact Number -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label  required">Alternative Contact Number <span
                                class="sr-only">(required)</span></label>
                        <input type="text" name="alt_number" class="form-control"
                            placeholder="Enter alternative contact number" required>
                    </div>
                </div>

                <!-- Gender -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label  required">Gender <span class="sr-only">(required)</span></label>
                        <select name="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <!-- District -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label  required">District <span class="sr-only">(required)</span></label>
                        <select name="district_id" class="form-control" required>
                            <option value="">Select District</option>
                            <option value="1">Dhaka</option>
                            <option value="2">Chittagong</option>
                            <option value="3">Rajshahi</option>
                            <option value="4">Khulna</option>
                            <option value="5">Barishal</option>
                            <option value="6">Sylhet</option>
                            <option value="7">Rangpur</option>
                            <option value="8">Mymensingh</option>
                        </select>
                    </div>
                </div>

                <!-- Upazila -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label  required">Upazila <span class="sr-only">(required)</span></label>
                        <select name="upazila_id" class="form-control" required>
                            <option value="">Select Upazila</option>
                            <option value="1">Dhaka</option>
                            <option value="2">Chittagong</option>
                            <option value="3">Rajshahi</option>
                            <option value="4">Khulna</option>
                            <option value="5">Barishal</option>
                            <option value="6">Sylhet</option>
                            <option value="7">Rangpur</option>
                            <option value="8">Mymensingh</option>
                        </select>
                    </div>
                </div>

                <!-- Union -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label  required">Union <span class="sr-only">(required)</span></label>
                        <select name="union_id" class="form-control" required>
                            <option value="">Select Union</option>
                            <option value="1">Dhaka</option>
                            <option value="2">Chittagong</option>
                            <option value="3">Rajshahi</option>
                            <option value="4">Khulna</option>
                            <option value="5">Barishal</option>
                            <option value="6">Sylhet</option>
                            <option value="7">Rangpur</option>
                            <option value="8">Mymensingh</option>
                        </select>
                    </div>
                </div>

                <!-- Village -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label  required">Village <span class="sr-only">(required)</span></label>
                        <input type="text" name="village" class="form-control" placeholder="Enter village name"
                            required>
                    </div>
                </div>

                <!-- Targeted Crop -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Targeted Crop</label>
                        <select name="targeted_crop[]" class="form-control select2" multiple>
                            <option value="Rice">Rice</option>
                            <option value="Maize">Maize</option>
                            <option value="Onion">Onion</option>
                            <option value="Brinjal">Brinjal</option>
                        </select>
                    </div>
                </div>

                <!-- Land Size -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Land Size (Decimal)</label>
                        <input type="text" name="land_size" class="form-control"
                            placeholder="Land size in decimals">
                    </div>
                </div>

                <!-- Product Interests -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Products Interests</label>
                        <select name="product_interest[]" class="form-control select2" multiple>
                            <option value="Insecticide">Insecticide</option>
                            <option value="Fungicide">Fungicide</option>
                            <option value="Herbicide">Herbicide</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <!-- Problem/Query -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Problem/Query</label>
                        <textarea name="q_type" rows="2" class="form-control" placeholder="Describe the problem"></textarea>
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Additional Details</label>
                        <textarea name="verbatim" rows="2" class="form-control"
                            placeholder="Customer Provided notes or other crop info"></textarea>
                    </div>
                </div>

                <!-- Recommended Products -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Recommended Products</label>
                        <select name="product_solution[]" class="form-control select2" multiple>
                            <option value="Fertilizer A">Fertilizer A</option>
                            <option value="Pesticide B">Pesticide B</option>
                            <option value="Herbicide C">Herbicide C</option>
                            <option value="Seed D">Seed D</option>
                            <option value="Equipment E">Equipment E</option>
                        </select>
                    </div>
                </div>

                <!-- Solution Details -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Solution Details</label>
                        <textarea name="product_solution_text" rows="2" class="form-control"
                            placeholder="Detailed solution information"></textarea>
                    </div>
                </div>

                <!-- Lead Status -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Lead Status</label>
                        <select name="lead_status[]" class="form-control select2">
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                    </div>
                </div>

                <!-- Lead Source -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Lead Source</label>
                        <select name="lead_source[]" class="form-control select2" multiple>
                            <option value="Farmer Meeting">Farmer Meeting</option>
                            <option value="IFS">IFS</option>
                            <option value="Website">Website</option>
                            <option value="DAE">DAE</option>
                            <option value="Trade">Trade</option>
                            <option value="Call Center">Call Center</option>
                        </select>
                    </div>
                </div>

                <!-- User of ACCL Product -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">User of ACCL Product</label>
                        <select name="existing_customer" class="form-control">
                            <option value="Yes">Yes</option>
                            <option value="No" selected>No</option>
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

<!-- Interaction History Card -->
<div class="card mb-3 shadow-none bg-none">
    <div class="card-header bg-white">
        <h5 class="card-title d-flex  align-items-center gap-2 ">
            <i class="fas fa-history"></i>
            Interaction History
        </h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered w-100" id="data-datatable">
                <thead>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Problem</th>
                    <th>Solution</th>
                    <th>Action</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Knowledge Base Card -->
<div class="card mb-3 shadow-none bg-none">
    <div class="card-header bg-white">
        <h5 class="card-title">
            <i class="fas fa-book"></i>
            Knowledge Base FAQ
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered w-100" id="faq-datatable">
                <thead>
                    <th>SL</th>
                    <th>Question</th>
                    <th>Category</th>
                    <th>Action</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
