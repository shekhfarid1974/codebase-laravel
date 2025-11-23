<!-- Customer Form Card -->
<div class="card mb-3 shadow-none bg-none">
    <div class="card-header d-flex justify-content-between align-items-center bg-white">
        <h5 class="card-title ">
            <i class="fas fa-store dealer-icon"></i>
            <span>Retailer Information</span>
        </h5>

        <div class="agent-info">
            <i class="fas fa-user-tie"></i>
            @if (!empty($agent))
                <span>Agent: {{ $agent }}</span>
            @endif
        </div>
    </div>

<<<<<<< HEAD
    <div class="card-body">
        <form method="POST" id="store_or_update_form">
            @csrf
=======
    <div class="card mb-3 shadow-none bg-none">
        <div class="card-header bg-white d-flex align-items-center justify-content-between">
            <h4 class="card-title d-flex align-items-center gap-2">
                <i class="fas fa-history"></i>
                Products List
            </h4>
            <div class="">
                <input type="search" class="form-control" placeholder="Search...">
            </div>
        </div>
>>>>>>> 2a2f0a093ff23873b49ea1dfb6a1a00b6e00a3b6

            <input type="hidden" name="agent" value="{{ $agent ?? 'Default' }}">
            <input type="hidden" name="customer_category" id="customer_category" value="Dealer">
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

                <!-- Retailer Interests -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Retailer Interests</label>
                        <select name="retailer_interested_query[]" id="retailer_interested_query"
                            class="form-control select2" multiple>
                            <option value="New retailer accquisition">New retailer accquisition</option>
                            <option value="Dealer Information">Dealer Information</option>
                            <option value="Officer Information">Officer Information</option>
                            <option value="Complain">Complain</option>
                            <option value="Offers">Offers</option>
                        </select>
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label ">Additional Details</label>
                        <textarea name="verbatim" rows="2" class="form-control" placeholder="Any additional information"></textarea>
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

<div class="card mb-3 shadow-none bg-none">
    <div class="card-header bg-white">
        <h4 class="card-title d-flex  align-items-center gap-2">
            <i class="fas fa-history"></i>
            Products List
        </h4>
    </div>

    <div class="card-body">
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card h-100 shadow-none border">
                    <img src="https://placehold.co/600x400/EEE/31343C" class="card-img-top"
                        alt="Crop Protection Insecticide">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Crop Protection Insecticide</h5>
                        <p class="card-text"><strong>Category:</strong> Insecticide</p>
                        <p class="card-text">Advanced formula for comprehensive crop protection against various
                            insects.</p>
                        <h6 class="mt-auto">Price: ৳ 1,250</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-none border">
                    <img src="https://placehold.co/600x400/EEE/31343C" class="card-img-top" alt="Fungicide Pro Max">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Fungicide Pro Max</h5>
                        <p class="card-text"><strong>Category:</strong> Fungicide</p>
                        <p class="card-text">Effective fungal disease control for multiple crops with long-lasting
                            protection.</p>
                        <h6 class="mt-auto">Price: ৳ 980</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-none border">
                    <img src="https://placehold.co/600x400/EEE/31343C" class="card-img-top"
                        alt="Weed Master Herbicide">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Weed Master Herbicide</h5>
                        <p class="card-text"><strong>Category:</strong> Herbicide</p>
                        <p class="card-text">Broad-spectrum weed control solution for clean and healthy crops.</p>
                        <h6 class="mt-auto">Price: ৳ 1,150</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-none border">
                    <img src="https://placehold.co/600x400/EEE/31343C" class="card-img-top"
                        alt="Growth Booster Fertilizer">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Growth Booster Fertilizer</h5>
                        <p class="card-text"><strong>Category:</strong> Fertilizer</p>
                        <p class="card-text">Organic growth enhancer for improved yield and plant health.</p>
                        <h6 class="mt-auto">Price: ৳ 850</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-none border">
                    <img src="https://placehold.co/600x400/EEE/31343C" class="card-img-top" alt="Seed Treatment Kit">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Seed Treatment Kit</h5>
                        <p class="card-text"><strong>Category:</strong> Seed Treatment</p>
                        <p class="card-text">Complete seed protection package for better germination and early growth.
                        </p>
                        <h6 class="mt-auto">Price: ৳ 2,300</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-none border">
                    <img src="https://placehold.co/600x400/EEE/31343C" class="card-img-top"
                        alt="Soil Conditioner Pro">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Soil Conditioner Pro</h5>
                        <p class="card-text"><strong>Category:</strong> Soil Care</p>
                        <p class="card-text">Improves soil structure and nutrient availability for optimal plant
                            growth.</p>
                        <h6 class="mt-auto">Price: ৳ 1,750</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
