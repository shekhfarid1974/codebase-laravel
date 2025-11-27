@extends('layouts.app')

@section('title', 'Add Product')
@section('page_title', 'Add Product')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Add New Product</h5>
    </div>

    <div class="card-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" placeholder="Enter product name">
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-control">
                    <option>Select Category</option>
                    <option>Insecticide</option>
                    <option>Fungicide</option>
                    <option>Herbicide</option>
                    <option>Fertilizer</option>
                    <option>Seed Treatment</option>
                    <option>Soil Care</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter product description"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Price (৳)</label>
                <input type="number" class="form-control" placeholder="Enter price">
            </div>

            <button class="btn btn-success">
                <i class="fas fa-save"></i> Save Product
            </button>
        </form>
    </div>
</div>
@endsection
