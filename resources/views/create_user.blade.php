@extends('components.layouts')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Create User</h1>

    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


    <form action="{{ route('users.store') }}" method="POST" class="mt-4">
        @csrf
        <!-- Name Field -->
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter user name" required>
        </div>

        <!-- Email Field -->
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" required>
        </div>

        <div class="form-group mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter phone number" required>
        </div>


        <!-- Subscription Type -->
        <div class="form-group mb-3">
            <label for="subscription_type">Subscription Type</label>
            <select name="subscription_type" id="subscription_type" class="form-control" required>
                <option value="regular">Regular</option>
                <option value="silver">Silver</option>
                <option value="premium">Premium</option>
            </select>
            <small class="form-text text-muted">
                Choose a membership plan. Regular is free, Silver has added benefits, and Premium includes all features.
            </small>
        </div>

        <!-- Password Field -->
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            <small class="form-text text-muted" id="password-strength">Password must be at least 8 characters.</small>
        </div>

        <!-- Confirm Password Field -->
        <div class="form-group mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Create User</button>
    </form>
</div>
@endsection
