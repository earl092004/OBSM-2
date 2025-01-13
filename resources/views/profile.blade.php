@extends('reg_users_layout.userlayouts')

@section('title', 'Profile')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        <h1>Your Profile</h1>
    </div>

    <!-- Profile Form -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Personal Information</h5>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT') <!-- This tells Laravel to treat the form as a PUT request -->

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" class="form-control" required>
                </div>

                <!-- Add other form fields as needed -->

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
            <!-- Account Deletion -->
            <div class="mt-4">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    Delete Account
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Deleting Account -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('profile.delete') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete My Account</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
