@extends('layouts.app')

@section('title', 'Reset Lead Data')
@section('page_title', 'Reset Lead Data')

@section('content')
<div class="card">
    <div class="card-header">
        Reset Lead Data
    </div>
    <div class="card-body">
        <div class="alert alert-warning">
            <strong>Warning:</strong> This action will permanently delete lead data. This cannot be undone.
        </div>
        
        <div class="alert alert-info">
            <strong>নোটিস:</strong> সার্ভে লিড আপলোড করার আগে অবশ্যই My Outsourcing Ltd. এর সাথে যোগাযোগ করুন।
        </div>
        
        <form action="{{ route('leads.reset') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="reset_type">Select Reset Type</label>
                <select class="form-control" id="reset_type" name="reset_type" required>
                    <option value="">-- Choose Reset Type --</option>
                    <option value="all">All Leads</option>
                    <option value="today">Today's Leads Only</option>
                    <option value="last_7_days">Last 7 Days Leads</option>
                    <option value="last_30_days">Last 30 Days Leads</option>
                    <option value="unassigned">Unassigned Leads Only</option>
                    <option value="inactive">Inactive Leads Only</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="confirmation">Type "CONFIRM" to proceed</label>
                <input type="text" class="form-control" id="confirmation" name="confirmation" placeholder="Type CONFIRM here">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-danger" disabled id="reset-btn">
                    <i class="fas fa-trash"></i> Reset Selected Leads
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('confirmation').addEventListener('input', function() {
    const resetBtn = document.getElementById('reset-btn');
    resetBtn.disabled = this.value !== 'CONFIRM';
});
</script>
@endsection