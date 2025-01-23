@extends('components.layouts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="text-center mb-4">Admin Users</h1>

    <!-- Display Current Admins -->
    <div class="table-responsive mb-5">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="text-center">
                            <!-- Edit Button (Trigger Update Modal) -->
                            <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editAdminModal{{ $admin->id }}">
                                <i class="fas fa-edit me-1"></i> Edit
                            </button>

                            <!-- Delete Button (Trigger Delete Modal) -->
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAdminModal{{ $admin->id }}">
                                <i class="fas fa-trash-alt me-1"></i> Delete
                            </button>
                        </td>
                    </tr>

                    <!-- Update Admin Modal -->
                    <div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1" aria-labelledby="editAdminModalLabel{{ $admin->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="editAdminModalLabel{{ $admin->id }}">Edit Admin User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin_users.update', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $admin->email }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password (Leave empty if not changing)</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update Admin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Admin Modal -->
                    <div class="modal fade" id="deleteAdminModal{{ $admin->id }}" tabindex="-1" aria-labelledby="deleteAdminModalLabel{{ $admin->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="deleteAdminModalLabel{{ $admin->id }}">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete the admin "<strong>{{ $admin->name }}</strong>"? This action cannot be undone.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('admin_users.destroy', $admin->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Admin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Admin Button -->
    <div class="text-center">
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addAdminModal">
            <i class="fas fa-user-plus"></i> Add Admin User
        </button>
    </div>



    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addAdminModalLabel">Add Admin User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin_users.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter admin name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter admin email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



<!-- Delete Admin Modal -->
<div class="modal fade" id="deleteAdminModal{{ $admin->id }}" tabindex="-1" aria-labelledby="deleteAdminModalLabel{{ $admin->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteAdminModalLabel{{ $admin->id }}">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the admin "<strong>{{ $admin->name }}</strong>"? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin_users.destroy', $admin->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
