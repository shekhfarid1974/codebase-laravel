@extends('layouts.app')

@section('title', 'Add Categories')
@section('page_title', 'Add Categories')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Add New Category</h5>
    </div>

    <div class="card-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" placeholder="Enter category name">
            </div>

            <div class="mb-3">
                <label class="form-label">Category Description</label>
                <textarea class="form-control" rows="2" placeholder="Enter description (optional)"></textarea>
            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Save Category
            </button>
        </form>
    </div>
</div>
@endsection
