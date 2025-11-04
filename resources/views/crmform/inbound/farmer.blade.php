<div class="form-grid">
    <!-- Hidden field for customer category -->
    <input type="hidden" name="customer_category" value="Farmer">

    <!-- Example hardcoded Customer ID field (adjust as needed) -->
    <!--
    <div class="form-group">
        <label class="form-label">Customer ID</label>
        <input type="text" name="customer_id" class="form-control" readonly value="FMR - 001">
    </div>
    -->

    <div class="form-group">
        <label class="form-label required">Name <span class="sr-only">(required)</span></label>
        <input type="text" name="name" class="form-control" placeholder="Enter full name" value="Farid Test" required>
    </div>

    <div class="form-group">
        <label class="form-label required">Mobile Number <span class="sr-only">(required)</span></label>
        <input type="text" name="phone_number" class="form-control readonly" readonly value="{{ $phone_number ?? '' }}" required>
    </div>

    <div class="form-group">
        <label class="form-label">Phone Number Own</label>
        <select name="own_number" class="form-select select2-hide">
            <option value="Yes" {{ old('own_number') == 'Yes' ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ old('own_number') == 'No' ? 'selected' : (old('own_number') ? '' : 'selected') }}>No</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label required">Alternative Contact Number <span class="sr-only">(required)</span></label>
        <input type="text" name="alt_number" class="form-control" placeholder="Enter alternative contact number" value="{{ old('alt_number') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label required">Gender <span class="sr-only">(required)</span></label>
        <select name="gender" class="form-select select2-hide" required>
            <option value="" {{ old('gender') ? '' : 'selected' }}>Select Gender</option>
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">District</label>
        <select name="district_id" class="form-select">
            <option value="">Select District</option>
            <option value="1" {{ old('district_id') == '1' ? 'selected' : '' }}>Dhaka</option>
            <option value="2" {{ old('district_id') == '2' ? 'selected' : '' }}>Chittagong</option>
            <option value="3" {{ old('district_id') == '3' ? 'selected' : '' }}>Rajshahi</option>
            <option value="4" {{ old('district_id') == '4' ? 'selected' : '' }}>Khulna</option>
            <option value="5" {{ old('district_id') == '5' ? 'selected' : '' }}>Barishal</option>
            <option value="6" {{ old('district_id') == '6' ? 'selected' : '' }}>Sylhet</option>
            <option value="7" {{ old('district_id') == '7' ? 'selected' : '' }}>Rangpur</option>
            <option value="8" {{ old('district_id') == '8' ? 'selected' : '' }}>Mymensingh</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label required">Upazila <span class="sr-only">(required)</span></label>
        <select name="upazila_id" class="form-select" required>
            <option value="">Select Upazila</option>
            <option value="1" {{ old('upazila_id') == '1' ? 'selected' : '' }}>Dhaka</option>
            <option value="2" {{ old('upazila_id') == '2' ? 'selected' : '' }}>Chittagong</option>
            <option value="3" {{ old('upazila_id') == '3' ? 'selected' : '' }}>Rajshahi</option>
            <option value="4" {{ old('upazila_id') == '4' ? 'selected' : '' }}>Khulna</option>
            <option value="5" {{ old('upazila_id') == '5' ? 'selected' : '' }}>Barishal</option>
            <option value="6" {{ old('upazila_id') == '6' ? 'selected' : '' }}>Sylhet</option>
            <option value="7" {{ old('upazila_id') == '7' ? 'selected' : '' }}>Rangpur</option>
            <option value="8" {{ old('upazila_id') == '8' ? 'selected' : '' }}>Mymensingh</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label required">Union <span class="sr-only">(required)</span></label>
        <select name="union_id" class="form-select" required>
            <option value="">Select Union</option>
            <option value="1" {{ old('union_id') == '1' ? 'selected' : '' }}>Dhaka</option>
            <option value="2" {{ old('union_id') == '2' ? 'selected' : '' }}>Chittagong</option>
            <option value="3" {{ old('union_id') == '3' ? 'selected' : '' }}>Rajshahi</option>
            <option value="4" {{ old('union_id') == '4' ? 'selected' : '' }}>Khulna</option>
            <option value="5" {{ old('union_id') == '5' ? 'selected' : '' }}>Barishal</option>
            <option value="6" {{ old('union_id') == '6' ? 'selected' : '' }}>Sylhet</option>
            <option value="7" {{ old('union_id') == '7' ? 'selected' : '' }}>Rangpur</option>
            <option value="8" {{ old('union_id') == '8' ? 'selected' : '' }}>Mymensingh</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label required">Village <span class="sr-only">(required)</span></label>
        <input type="text" name="village" class="form-control" placeholder="Enter village name" value="{{ old('village') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label">Targeted Crop</label>
        <select name="targeted_crop[]" class="form-select select2-multiple" multiple>
            <option value="Rice" {{ in_array('Rice', old('targeted_crop', [])) ? 'selected' : '' }}>Rice</option>
            <option value="Maize" {{ in_array('Maize', old('targeted_crop', [])) ? 'selected' : '' }}>Maize</option>
            <option value="Onion" {{ in_array('Onion', old('targeted_crop', [])) ? 'selected' : '' }}>Onion</option>
            <option value="Brinjal" {{ in_array('Brinjal', old('targeted_crop', [])) ? 'selected' : '' }}>Brinjal</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Land Size (Decimal)</label>
        <input type="text" name="land_size" class="form-control" placeholder="Land size in decimals" value="{{ old('land_size') }}">
    </div>

    <div class="form-group">
        <label class="form-label">Products Interests</label>
        <select name="product_interest[]" class="form-select select2-multiple" multiple>
            <option value="Insecticide" {{ in_array('Insecticide', old('product_interest', [])) ? 'selected' : '' }}>Insecticide</option>
            <option value="Fungicide" {{ in_array('Fungicide', old('product_interest', [])) ? 'selected' : '' }}>Fungicide</option>
            <option value="Herbicide" {{ in_array('Herbicide', old('product_interest', [])) ? 'selected' : '' }}>Herbicide</option>
            <option value="Others" {{ in_array('Others', old('product_interest', [])) ? 'selected' : '' }}>Others</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Problem/Query</label>
        <textarea name="q_type" class="form-control" placeholder="Describe the problem" rows="2">{{ old('q_type') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Additional Details</label>
        <textarea name="verbatim" class="form-control" placeholder="Customer Provided notes or other crop info" rows="2">{{ old('verbatim') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Recommended Products</label>
        <select name="product_solution[]" class="form-select select2-multiple" multiple>
            <option value="Fertilizer A" {{ in_array('Fertilizer A', old('product_solution', [])) ? 'selected' : '' }}>Fertilizer A</option>
            <option value="Pesticide B" {{ in_array('Pesticide B', old('product_solution', [])) ? 'selected' : '' }}>Pesticide B</option>
            <option value="Herbicide C" {{ in_array('Herbicide C', old('product_solution', [])) ? 'selected' : '' }}>Herbicide C</option>
            <option value="Seed D" {{ in_array('Seed D', old('product_solution', [])) ? 'selected' : '' }}>Seed D</option>
            <option value="Equipment E" {{ in_array('Equipment E', old('product_solution', [])) ? 'selected' : '' }}>Equipment E</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Solution Details</label>
        <textarea name="product_solution_text" class="form-control" placeholder="Detailed solution information" rows="2">{{ old('product_solution_text') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Lead Status</label>
        <select name="lead_status[]" class="form-select select2-multiple" multiple>
            <option value="Regular" {{ in_array('Regular', old('lead_status', [])) ? 'selected' : '' }}>Regular</option>
            <option value="Irregular" {{ in_array('Irregular', old('lead_status', [])) ? 'selected' : '' }}>Irregular</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Lead Source</label>
        <select name="lead_source[]" class="form-select select2-multiple" multiple>
            <option value="Farmer Meeting" {{ in_array('Farmer Meeting', old('lead_source', [])) ? 'selected' : '' }}>Farmer Meeting</option>
            <option value="IFS" {{ in_array('IFS', old('lead_source', [])) ? 'selected' : '' }}>IFS</option>
            <option value="Website" {{ in_array('Website', old('lead_source', [])) ? 'selected' : '' }}>Website</option>
            <option value="DAE" {{ in_array('DAE', old('lead_source', [])) ? 'selected' : '' }}>DAE</option>
            <option value="Trade" {{ in_array('Trade', old('lead_source', [])) ? 'selected' : '' }}>Trade</option>
            <option value="Call Center" {{ in_array('Call Center', old('lead_source', [])) ? 'selected' : '' }}>Call Center</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">User of ACCL Product</label>
        <select name="existing_customer" class="form-select select2-hide">
            <option value="Yes" {{ old('existing_customer') == 'Yes' ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ old('existing_customer') == 'No' ? 'selected' : (old('existing_customer') ? '' : 'selected') }}>No</option>
        </select>
    </div>
</div>