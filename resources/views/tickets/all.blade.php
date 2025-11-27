@extends('layouts.app')

@section('title', 'All Tickets')
@section('page_title', 'All Tickets')

@section('content')
<div id="allTicketsView">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            All Tickets
            <div>
                <button class="btn btn-sm btn-primary btn btn-sm btn-primary-primary" onclick="showCreateTicketModal()">
                    <i class="fas fa-plus"></i> Create New
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="allTicketsTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Customer</th>
                            <th>Category</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#TK-1024</td>
                            <td>Rice crop disease identification</td>
                            <td>Md. Rahman</td>
                            <td>Advisory</td>
                            <td><span class="badge badge-danger">High</span></td>
                            <td><span class="badge badge-warning">In Progress</span></td>
                            <td>Agent Ahmed</td>
                            <td>2023-09-20</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1024')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="editTicket('TK-1024')">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#TK-1023</td>
                            <td>Fertilizer application issue</td>
                            <td>Farmer Karim</td>
                            <td>Product Issue</td>
                            <td><span class="badge badge-warning">Medium</span></td>
                            <td><span class="badge badge-danger">Open</span></td>
                            <td>Unassigned</td>
                            <td>2023-09-20</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1023')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="editTicket('TK-1023')">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#TK-1022</td>
                            <td>Pest control for wheat field</td>
                            <td>Abdul Malek</td>
                            <td>Technical</td>
                            <td><span class="badge badge-warning">Medium</span></td>
                            <td><span class="badge badge-success">Resolved</span></td>
                            <td>Field Agent Khan</td>
                            <td>2023-09-19</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1022')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#TK-1021</td>
                            <td>Seed quality complaint</td>
                            <td>Retailer Hasan</td>
                            <td>Complaint</td>
                            <td><span class="badge badge-danger">High</span></td>
                            <td><span class="badge badge-warning">In Progress</span></td>
                            <td>Supervisor Jaman</td>
                            <td>2023-09-19</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1021')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="editTicket('TK-1021')">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#TK-1020</td>
                            <td>Irrigation system consultation</td>
                            <td>Partner Agro</td>
                            <td>Advisory</td>
                            <td><span class="badge badge-info">Low</span></td>
                            <td><span class="badge badge-secondary">Closed</span></td>
                            <td>Agent Fatema</td>
                            <td>2023-09-18</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1020')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#TK-1019</td>
                            <td>Organic fertilizer inquiry</td>
                            <td>Farmer Jamal</td>
                            <td>Product Inquiry</td>
                            <td><span class="badge badge-info">Low</span></td>
                            <td><span class="badge badge-success">Resolved</span></td>
                            <td>Agent Ahmed</td>
                            <td>2023-09-17</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1019')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#TK-1018</td>
                            <td>Crop yield optimization</td>
                            <td>Farmer Ali</td>
                            <td>Advisory</td>
                            <td><span class="badge badge-warning">Medium</span></td>
                            <td><span class="badge badge-warning">In Progress</span></td>
                            <td>Agent Fatema</td>
                            <td>2023-09-16</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1018')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="editTicket('TK-1018')">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#TK-1017</td>
                            <td>Pesticide application guidance</td>
                            <td>Farmer Karim</td>
                            <td>Technical</td>
                            <td><span class="badge badge-warning">Medium</span></td>
                            <td><span class="badge badge-success">Resolved</span></td>
                            <td>Field Agent Khan</td>
                            <td>2023-09-15</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewTicket('TK-1017')">
                                    <i class="fas fa-eye"></i>
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
<!-- Create Ticket Modal -->
<div class="modal" id="createTicketModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Ticket</h5>
                <button type="button" class="btn btn-sm btn-primary-close" onclick="closeModal('createTicketModal')"></button>
            </div>
            <div class="modal-body">
                <form id="createTicketForm">
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" id="ticketTitle" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Customer</label>
                        <select class="form-control form-control-sm" id="ticketCustomer" required>
                            <option value="">Select Customer</option>
                            <option value="customer1">Md. Rahman</option>
                            <option value="customer2">Farmer Karim</option>
                            <option value="customer3">Abdul Malek</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control form-control-sm" id="ticketCategory" required>
                            <option value="">Select Category</option>
                            <option value="advisory">Advisory</option>
                            <option value="product">Product Issue</option>
                            <option value="technical">Technical</option>
                            <option value="complaint">Complaint</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Priority</label>
                        <select class="form-control form-control-sm" id="ticketPriority" required>
                            <option value="">Select Priority</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control form-control-sm" id="ticketDescription" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Assign To</label>
                        <select class="form-control form-control-sm" id="ticketAssign">
                            <option value="">Unassigned</option>
                            <option value="agent1">Agent Ahmed</option>
                            <option value="agent2">Agent Fatema</option>
                            <option value="agent3">Field Agent Khan</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary btn btn-sm btn-primary-secondary" onclick="closeModal('createTicketModal')">Cancel</button>
                <button type="button" class="btn btn-sm btn-primary btn btn-sm btn-primary-primary" onclick="createTicket()">Create Ticket</button>
            </div>
        </div>
    </div>
</div>
@endsection
