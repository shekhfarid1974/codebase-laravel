@extends('layouts.app')

@section('title', 'Users Management')

@section('content')
<div class="content-header">
    <div>
        <h1 class="content-title">Users Management</h1>
        <p class="content-subtitle">Manage all users in the system</p>
    </div>
    @can('create users')
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        <i class="ri-add-line"></i>
        Add New User
    </a>
    @endcan
</div>

<div class="card">
    <div class="card-content">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge badge-primary">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input status-toggle" 
                                       type="checkbox" 
                                       data-user-id="{{ $user->id }}" 
                                       {{ $user->status ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            @can('edit users')
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>
                            @endcan
                            @can('delete users')
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle status toggle
    document.querySelectorAll('.status-toggle').forEach(function(toggle) {
        toggle.addEventListener('change', function() {
            const userId = this.dataset.userId;
            const isChecked = this.checked;
            
            fetch(`/users/${userId}/toggle-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Success message can be shown here
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Revert the toggle if there's an error
                this.checked = !isChecked;
            });
        });
    });
});
</script>
@endsection