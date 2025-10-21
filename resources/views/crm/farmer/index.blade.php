@extends('layouts.app')

@section('title', 'Farmer CRM')
@section('page_title', 'Farmer CRM')

@section('content')
    <div id="farmerCrmView">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                Farmer CRM
                <div>
                    <button class="btn btn-primary" onclick="showAddFarmerModal()">
                        <i class="fas fa-plus"></i> Add Farmer
                    </button>
                    <button class="btn btn-secondary" onclick="importFarmers()">
                        <i class="fas fa-file-import"></i> Import
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="farmerCrmTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>District</th>
                                <th>Upazila</th>
                                <th>Crop Type</th>
                                <th>Land Size</th>
                                <th>Registration Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#FR-1842</td>
                                <td>Md. Rahman</td>
                                <td>+8801712345678</td>
                                <td>Rajshahi</td>
                                <td>Paba</td>
                                <td>Rice</td>
                                <td>2.5 acres</td>
                                <td>2023-08-15</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFarmer('FR-1842')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFarmer('FR-1842')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFarmer('FR-1842')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#FR-1841</td>
                                <td>Abdul Karim</td>
                                <td>+8801812345678</td>
                                <td>Khulna</td>
                                <td>Dumuria</td>
                                <td>Wheat</td>
                                <td>3.2 acres</td>
                                <td>2023-08-14</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFarmer('FR-1841')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFarmer('FR-1841')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFarmer('FR-1841')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#FR-1840</td>
                                <td>Farmer Ali</td>
                                <td>+8801912345678</td>
                                <td>Dhaka</td>
                                <td>Savar</td>
                                <td>Vegetables</td>
                                <td>1.8 acres</td>
                                <td>2023-08-13</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFarmer('FR-1840')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFarmer('FR-1840')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFarmer('FR-1840')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#FR-1839</td>
                                <td>Hasan Mia</td>
                                <td>+8801711223344</td>
                                <td>Sylhet</td>
                                <td>Beanibazar</td>
                                <td>Jute</td>
                                <td>4.5 acres</td>
                                <td>2023-08-12</td>
                                <td><span class="badge badge-danger">Inactive</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFarmer('FR-1839')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFarmer('FR-1839')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFarmer('FR-1839')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#FR-1838</td>
                                <td>Farmer Jamal</td>
                                <td>+8801811223344</td>
                                <td>Rajshahi</td>
                                <td>Godagari</td>
                                <td>Rice</td>
                                <td>3.0 acres</td>
                                <td>2023-08-11</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="viewFarmer('FR-1838')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="editFarmer('FR-1838')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteFarmer('FR-1838')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <!-- Add Farmer Modal -->
    <div class="modal" id="addFarmerModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Farmer</h5>
                    <button type="button" class="btn-close" onclick="closeModal('addFarmerModal')"></button>
                </div>
                <div class="modal-body">
                    <form id="addFarmerForm">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="farmerName" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="farmerPhone" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">District</label>
                            <select class="form-control" id="farmerDistrict" required>
                                <option value="">Select District</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="khulna">Khulna</option>
                                <option value="sylhet">Sylhet</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Upazila</label>
                            <input type="text" class="form-control" id="farmerUpazila" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Crop Type</label>
                            <select class="form-control" id="farmerCrop" required>
                                <option value="">Select Crop</option>
                                <option value="rice">Rice</option>
                                <option value="wheat">Wheat</option>
                                <option value="jute">Jute</option>
                                <option value="vegetables">Vegetables</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Land Size</label>
                            <input type="text" class="form-control" id="farmerLandSize" placeholder="e.g., 2.5 acres"
                                required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        onclick="closeModal('addFarmerModal')">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveFarmer()">Save Farmer</button>
                </div>
            </div>
        </div>
    </div>
@endsection
