@extends('components.layouts')

@section('content')
<style>
    /* Existing styles remain the same */
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
    .income-header {
        background: linear-gradient(135deg, #ec4899 0%, #be185d 100%);
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
    .btn-income {
        background: #ec4899;
        color: white;
    }
    .btn-income:hover {
        background: #be185d;
        color: white;
    }
    .dashboard-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }
    .stats-container {
        display: flex;
        justify-content: space-around;
        margin-bottom: 1.5rem;
    }
    .stat-item {
        text-align: center;
    }
    .stat-value {
        font-size: 1.5rem;
        font-weight: bold;
        color: #374151;
    }
    .stat-label {
        font-size: 0.875rem;
        color: #6b7280;
    }
</style>

<div class="dashboard-container">
    <div class="container">
        <div class="dashboard-header">
            <h2><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h2>
        </div>

        <div class="row g-4">
            <!-- Existing cards -->
            <div class="col-md-3">
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

            <div class="col-md-3">
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

            <div class="col-md-3">
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

            <!-- New Income & Stock Card -->
            <div class="col-md-3">
                <div class="card dashboard-card">
                    <div class="card-header-custom income-header text-white text-center">
                        <i class="fas fa-chart-line dashboard-icon"></i>
                        <div>Income & Purchases</div>
                    </div>
                    <div class="card-body text-center">
                        @php
                            // Calculate total income by summing the total_amount column in the transaction_histories table
                            $totalIncome = \App\Models\TransactionHistory::sum('total_amount');
                            // Get the total number of unique users who have purchased
                            $totalUsersPurchased = \App\Models\TransactionHistory::distinct('user_id')->count('user_id');
                        @endphp
                        <div class="stats-container">
                            <div class="stat-item">
                                <div class="stat-value">₱{{ number_format($totalIncome, 2) }}</div>
                                <div class="stat-label">Total Income</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $totalUsersPurchased }}</div>
                                <div class="stat-label">Users Purchased</div>
                            </div>
                        </div>
                        <a href="#" class="btn dashboard-btn btn-income">
                            <i class="fas fa-arrow-right me-2"></i>View Transactions
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
