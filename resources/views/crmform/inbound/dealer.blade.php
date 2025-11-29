

<!-- Customer Form Card -->
<div class="card mb-3 shadow-none bg-none">
    <div class="card-header d-flex justify-content-between align-items-center bg-white">
        <h5 class="card-title mb-0">
            <i class="fas fa-store dealer-icon"></i>
            <span>Dealer Information</span>
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
            <input type="hidden" name="customer_category" id="customer_category" value="Dealer">
            <div class="row align-items-end">

                <!-- Name -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label  required">Name <span class="sr-only">(required)</span></label>
                            <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter full name" value="Farid Test" required>
                        </div>
                    </div>

                    <!-- Mobile Number -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label  required">Mobile Number <span class="sr-only">(required)</span></label>
                            <input type="text" name="phone_number" class="form-control form-control-sm" value="{{ $phone_number ?? '' }}" readonly required>
                        </div>
                    </div>

                    <!-- Phone Number Own -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label ">Phone Number Own</label>
                            <select name="own_number" class="form-select form-select-sm">
                                <option value="Yes" {{ (isset($own_number) && $own_number=='Yes') ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ (isset($own_number) && $own_number=='No') ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Alternative Contact Number -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label  required">Alternative Contact Number <span class="sr-only">(required)</span></label>
                            <input type="text" name="alt_number" class="form-control form-control-sm" placeholder="Enter alternative contact number" required>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label  required">Gender <span class="sr-only">(required)</span></label>
                            <select name="gender" class="form-select form-select-sm" required>
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
                            <select name="district_id" class="form-select form-select-sm" required>
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
                            <select name="upazila_id" class="form-select form-select-sm" required>
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
                            <select name="union_id" class="form-select form-select-sm" required>
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
                            <input type="text" name="village" class="form-control form-control-sm" placeholder="Enter village name" required>
                        </div>
                    </div>

                <!-- Dealer Interests -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Dealer Interests</label>
                        <select name="dealer_interested_query[]" id="dealer_interested_query" class="form-select form-select-sm select2" multiple>
                            <option value="New dealership">New dealership</option>
                            <option value="Credit Limit">Credit Limit</option>
                            <option value="Product Information">Product Information</option>
                            <option value="Officer Information">Officer Information</option>
                            <option value="Complain">Complain</option>
                            <option value="Offers">Offers</option>
                        </select>
                    </div>
                </div>

                <!-- Recommended -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Recommended</label>
                        <textarea name="recommendate" rows="2" class="form-control form-control-sm" placeholder="Enter suggested product/solution"></textarea>
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Additional Details</label>
                        <textarea name="verbatim" rows="2" class="form-control form-control-sm" placeholder="Any additional information"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label text-danger">Is Ticket</label>
                        <select name="is_ticket" class="form-select form-select-sm">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                        <button class="btn btn-sm btn-success" type="button" id="save-btn">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>


<div class="card mb-3 shadow-none bg-none">
    <div class="card-header bg-white d-flex align-items-center justify-content-between">
        <h4 class="card-title d-flex align-items-center gap-2 mb-0">
            <i class="fas fa-history"></i>
            Products List
        </h4>
        <div class="d-flex gap-2">
            <a href="https://www.autocropcare.com/" target="_blank" class="btn btn-sm btn-primary">Website</a>
            <input type="search" class="form-control form-control-sm" placeholder="Search...">
        </div>
    </div>

    <div class="card-body">
         <div class="row g-4">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Price (৳)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Crop Protection Insecticide</td>
                            <td>Insecticide</td>
                            <td>Advanced formula for comprehensive crop protection against various insects.</td>
                            <td>1,250</td>
                        </tr>
                        <tr>
                            <td>Fungicide Pro Max</td>
                            <td>Fungicide</td>
                            <td>Effective fungal disease control for multiple crops with long-lasting protection.</td>
                            <td>980</td>
                        </tr>
                        <tr>
                            <td>Weed Master Herbicide</td>
                            <td>Herbicide</td>
                            <td>Broad-spectrum weed control solution for clean and healthy crops.</td>
                            <td>1,150</td>
                        </tr>
                        <tr>
                            <td>Growth Booster Fertilizer</td>
                            <td>Fertilizer</td>
                            <td>Organic growth enhancer for improved yield and plant health.</td>
                            <td>850</td>
                        </tr>
                        <tr>
                            <td>Seed Treatment Kit</td>
                            <td>Seed Treatment</td>
                            <td>Complete seed protection package for better germination and early growth.</td>
                            <td>2,300</td>
                        </tr>
                        <tr>
                            <td>Soil Conditioner Pro</td>
                            <td>Soil Care</td>
                            <td>Improves soil structure and nutrient availability for optimal plant growth.</td>
                            <td>1,750</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>


