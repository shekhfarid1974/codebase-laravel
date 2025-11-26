@extends('layouts.app')

@section('title', 'FAQ Categories')
@section('page_title', 'FAQ Categories')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            FAQ Categories
            <div>
                <a href="{{ route('faqs.categories') }}" class="btn btn-sm btn-primary btn btn-sm btn-primary-primary" >
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select form-select-sm" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary btn btn-sm btn-primary-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('modals')

@endsection

@push('scripts')
    <script>

    </script>
@endpush

<style>
    .crop-image {
        max-width: 100px;
        max-height: 80px;
        object-fit: cover;
        border-radius: 4px;
    }

    .problem-description,
    .solution-description {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
    }

    .modal-lg {
        max-width: 800px;
    }

    .modal-content {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 0.3rem;
        outline: 0;
    }
</style>
