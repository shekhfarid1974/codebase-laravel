@extends('layouts.app')

@section('title', 'Product List')
@section('page_title', 'Product List')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Product List</h5>
        <a href="{{ route('products.addProduct') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Product
        </a>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search product...">
            </div>
            <div class="col-md-4">
                <select class="form-control">
                    <option>Filter by Category</option>
                    <option>Insecticide</option>
                    <option>Fungicide</option>
                    <option>Herbicide</option>
                    <option>Fertilizer</option>
                    <option>Seed Treatment</option>
                    <option>Soil Care</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price (৳)</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Crop Protection Insecticide</td>
                        <td><span class="badge bg-info">Insecticide</span></td>
                        <td>Advanced formula for comprehensive crop protection.</td>
                        <td>1,250</td>
                        <td>
                            <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Fungicide Pro Max</td>
                        <td><span class="badge bg-primary">Fungicide</span></td>
                        <td>Effective fungal disease control.</td>
                        <td>980</td>
                        <td>
                            <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Weed Master Herbicide</td>
                        <td><span class="badge bg-success">Herbicide</span></td>
                        <td>Broad-spectrum weed control.</td>
                        <td>1,150</td>
                        <td>
                            <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Growth Booster Fertilizer</td>
                        <td><span class="badge bg-warning text-dark">Fertilizer</span></td>
                        <td>Organic growth enhancer.</td>
                        <td>850</td>
                        <td>
                            <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Seed Treatment Kit</td>
                        <td><span class="badge bg-secondary">Seed Treatment</span></td>
                        <td>Complete seed protection package.</td>
                        <td>2,300</td>
                        <td>
                            <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Soil Conditioner Pro</td>
                        <td><span class="badge bg-dark">Soil Care</span></td>
                        <td>Improves soil structure.</td>
                        <td>1,750</td>
                        <td>
                            <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
