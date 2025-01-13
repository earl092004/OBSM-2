@extends('components.layouts')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Admin Dashboard</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-header bg-primary text-white">Users</div>
                                <div class="card-body">
                                    <p>Manage all users in the system.</p>
                                    <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-header bg-success text-white">Admin Users</div>
                                <div class="card-body">
                                    <p>Manage all admin users in the system.</p>
                                    <a href="{{ route('admin_users.index') }}" class="btn btn-success">View Admin Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-header bg-warning text-white">List of Books</div>
                                <div class="card-body">
                                    <p>Browse and manage the list of books.</p>
                                    <a href="{{ route('books.index') }}" class="btn btn-warning">View Books</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
