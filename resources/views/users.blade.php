@extends('components.layouts')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Users List</h1>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subscription Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->subscription_type) }}</td>
                <td>
                    <!-- View Button -->


                    <!-- Edit Button (opens modal) -->
                    <a href="javascript:void(0);" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Edit</a>

                    <!-- Delete Button -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Edit User Modal -->
           <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="subscription_type" class="form-label">Subscription Type</label>
                    <select name="subscription_type" class="form-control" required>
                        <option value="basic" {{ $user->subscription_type == 'basic' ? 'selected' : '' }}>Basic</option>
                        <option value="premium" {{ $user->subscription_type == 'silver' ? 'selected' : '' }}>Silver</option>
                        <option value="premium" {{ $user->subscription_type == 'premium' ? 'selected' : '' }}>Premium</option>
                    </select>
                </div>

                {{-- <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="current_password" id="current_password" required>
                </div> --}}

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
