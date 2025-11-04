<div class="form-grid">
    <!-- Hidden field for customer category -->
    <input type="hidden" name="customer_category" value="Others">

    <!-- Example hardcoded Customer ID field (adjust as needed) -->
    <!--
    <div class="form-group">
        <label class="form-label">Customer ID</label>
        <input type="text" name="customer_id" class="form-control" readonly value="OTH - 001">
    </div>
    -->

    <div class="form-group">
        <label class="form-label required">Name <span class="sr-only">(required)</span></label>
        <input type="text" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label required">Mobile Number <span class="sr-only">(required)</span></label>
        <input type="text" name="phone_number" class="form-control readonly" readonly value="{{ $phone_number ?? '' }}" required>
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
        <label class="form-label">Customer Interests</label>
        <textarea name="interested_query" class="form-control" placeholder="Customer's interests" rows="2">{{ old('interested_query') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Additional Details</label>
        <textarea name="verbatim" class="form-control" placeholder="Any additional information" rows="2">{{ old('verbatim') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Customer Type</label>
        <select name="customer_type" class="form-select">
            <option value="">Select Customer Type</option>
            <option value="Researcher" {{ old('customer_type') == 'Researcher' ? 'selected' : '' }}>Researcher</option>
            <option value="Student" {{ old('customer_type') == 'Student' ? 'selected' : '' }}>Student</option>
            <option value="Government" {{ old('customer_type') == 'Government' ? 'selected' : '' }}>Government</option>
            <option value="NGO" {{ old('customer_type') == 'NGO' ? 'selected' : '' }}>NGO</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Lead Status</label>
        <select name="lead_status[]" class="form-select select2-multiple" multiple>
            <option value="Interested" {{ in_array('Interested', old('lead_status', [])) ? 'selected' : '' }}>Interested</option>
            <option value="Not Interested" {{ in_array('Not Interested', old('lead_status', [])) ? 'selected' : '' }}>Not Interested</option>
            <option value="Callback" {{ in_array('Callback', old('lead_status', [])) ? 'selected' : '' }}>Callback</option>
            <option value="Hot Lead" {{ in_array('Hot Lead', old('lead_status', [])) ? 'selected' : '' }}>Hot Lead</option>
            <option value="Cold Lead" {{ in_array('Cold Lead', old('lead_status', [])) ? 'selected' : '' }}>Cold Lead</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Lead Source</label>
        <select name="lead_source[]" class="form-select select2-multiple" multiple>
            <option value="Farmer Meeting" {{ in_array('Farmer Meeting', old('lead_source', [])) ? 'selected' : '' }}>Farmer Meeting</option>
            <option value="IFS" {{ in_array('IFS', old('lead_source', [])) ? 'selected' : '' }}>IFS</option>
            <option value="Website" {{ in_array('Website', old('lead_source', [])) ? 'selected' : '' }}>Website</option>
            <option value="Social Media" {{ in_array('Social Media', old('lead_source', [])) ? 'selected' : '' }}>Social Media</option>
            <option value="Referral" {{ in_array('Referral', old('lead_source', [])) ? 'selected' : '' }}>Referral</option>
            <option value="Advertisement" {{ in_array('Advertisement', old('lead_source', [])) ? 'selected' : '' }}>Advertisement</option>
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