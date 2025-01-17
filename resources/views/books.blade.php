@extends('components.layouts')

@section('content')
<style>
    /* Modern Dashboard Styling */
    .container {
        padding: 2rem;
    }

    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .page-header h1 {
        color: white;
        margin: 0;
        font-weight: 600;
    }

    .add-book-btn {
        background: #10b981;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .add-book-btn:hover {
        background: #059669;
        transform: translateY(-2px);
    }

    /* Table Styling */
    .table-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead {
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    }

    .table thead th {
        color: white;
        font-weight: 500;
        padding: 1rem;
        border: none;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
    }

    .table td {
        padding: 1rem;
        vertical-align: middle;
    }

    /* Action Buttons */
    .btn-delete {
        background: #ef4444;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background: #dc2626;
        transform: translateY(-1px);
    }

    /* Modal Styling */
    .modal-content {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px 15px 0 0;
        padding: 1.5rem;
    }

    .modal-header .modal-title {
        color: white;
        font-weight: 600;
    }

    .modal-body {
        padding: 2rem;
    }

    .form-label {
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    select.form-control {
        background-image: linear-gradient(45deg, transparent 50%, #667eea 50%),
                         linear-gradient(135deg, #667eea 50%, transparent 50%);
        background-position: calc(100% - 20px) calc(1em + 2px),
                           calc(100% - 15px) calc(1em + 2px);
        background-size: 5px 5px,
                        5px 5px;
        background-repeat: no-repeat;
        appearance: none;
    }

    /* Delete Modal */
    .delete-modal .modal-header {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .delete-modal .btn-secondary {
        background: #6b7280;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 6px;
    }

    .delete-modal .btn-danger {
        background: #ef4444;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 6px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        .table-container {
            overflow-x: auto;
        }

        .modal-dialog {
            margin: 0.5rem;
        }
    }
</style>

<div class="container">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1>Books Management</h1>
        <button class="btn add-book-btn text-white" data-bs-toggle="modal" data-bs-target="#addBookModal">
            <i class="fas fa-plus me-2"></i>Add New Book
        </button>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td>${{ $book->price }}</td>
                        <td class="text-center">
                            <button class="btn btn-delete text-white" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $book->id }}">
                                <i class="fas fa-trash-alt me-1"></i> Delete
                            </button>
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                    <div class="modal fade delete-modal" id="deleteModal{{ $book->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-0">Are you sure you want to delete "{{ $book->title }}"? This action cannot be undone.</p>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('books.delete', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Book</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Book Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" name="author" id="author" required>
                    </div>

                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" name="genre" id="genre" required>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control" name="year" id="year" required>
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Cover Image URL</label>
                        <input type="url" class="form-control" name="cover_image" id="cover_image" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" name="price" id="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Short Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-control" required>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Book</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
