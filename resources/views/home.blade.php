@extends('components.layouts')

@section('content')
<style>
    .dashboard-container {
        padding: 2rem 0;
    }
    .dashboard-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .dashboard-header h2 {
        color: white;
        margin: 0;
        font-weight: 600;
        font-size: 2rem;
    }
    .dashboard-card {
        height: 100%;
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    .card-header-custom {
        padding: 1.5rem;
        border: none;
        font-size: 1.25rem;
        font-weight: 600;
    }
    .users-header {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    }
    .admin-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    .books-header {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }
    .dashboard-card .card-body {
        padding: 2rem;
        background-color: white;
    }
    .dashboard-card p {
        color: #4b5563;
        font-size: 1rem;
        margin-bottom: 1.5rem;
        min-height: 3rem;
    }
    .dashboard-btn {
        padding: 0.75rem 2rem;
        border-radius: 10px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-users {
        background: #6366f1;
        color: white;
    }
    .btn-users:hover {
        background: #4f46e5;
        color: white;
    }
    .btn-admin {
        background: #10b981;
        color: white;
    }
    .btn-admin:hover {
        background: #059669;
        color: white;
    }
    .btn-books {
        background: #f59e0b;
        color: white;
    }
    .btn-books:hover {
        background: #d97706;
        color: white;
    }
    .dashboard-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }
</style>

<div class="dashboard-container">
    <div class="container">
        <div class="dashboard-header">
            <h2><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-header-custom users-header text-white text-center">
                        <i class="fas fa-users dashboard-icon"></i>
                        <div>Users Management</div>
                    </div>
                    <div class="card-body text-center">
                        <p>Manage and oversee all user accounts, permissions, and activities in the system.</p>
                        <a href="{{ route('users.index') }}" class="btn dashboard-btn btn-users">
                            <i class="fas fa-arrow-right me-2"></i>View Users
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-header-custom admin-header text-white text-center">
                        <i class="fas fa-user-shield dashboard-icon"></i>
                        <div>Admin Management</div>
                    </div>
                    <div class="card-body text-center">
                        <p>Configure and manage administrator accounts, roles, and system permissions.</p>
                        <a href="{{ route('admin_users.index') }}" class="btn dashboard-btn btn-admin">
                            <i class="fas fa-arrow-right me-2"></i>View Admins
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-header-custom books-header text-white text-center">
                        <i class="fas fa-book dashboard-icon"></i>
                        <div>Books Catalog</div>
                    </div>
                    <div class="card-body text-center">
                        <p>Manage your book inventory, categories, and maintain the digital library catalog.</p>
                        <a href="{{ route('books.index') }}" class="btn dashboard-btn btn-books">
                            <i class="fas fa-arrow-right me-2"></i>View Books
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
