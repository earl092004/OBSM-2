@extends('components.layouts')

@section('content')
<div class="container mt-5">
    <!-- Flexbox container for header and button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Add Book Button aligned to the left -->
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBookModal">
            <i class="fas fa-plus"></i> Add Book
        </button>

        <!-- Book Title aligned to the center -->
        <h1 class="text-center flex-grow-1 mb-0">Books</h1>
    </div>

    <!-- Book Table -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
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
                        <!-- Delete button -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $book->id }}">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </td>
                </tr>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $book->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $book->id }}">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the book "{{ $book->title }}"? This action cannot be undone.
                            </div>
                            <div class="modal-footer">
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

<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <!-- Title Field -->
                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <!-- Author Field -->
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" name="author" id="author" required>
                </div>

                <!-- Genre Field (Hardcoded options) -->
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select name="genre" id="genre" class="form-control" required>
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Drama">Drama</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Horror">Horror</option>
                        <option value="Romance">Romance</option>
                        <option value="Science Fiction">Science Fiction</option>
                        <option value="Mystery">Mystery</option>
                    </select>
                </div>

                <!-- Year Field -->
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" name="year" id="year" required>
                </div>

                <!-- Cover Image Field -->
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Cover Image URL</label>
                    <input type="url" class="form-control" name="cover_image" id="cover_image" required>
                </div>

                <!-- Price Field -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price" required min="0" max="100000" placeholder="Enter book price">
                </div>

                <!-- Quantity Field -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" required min="1" placeholder="Enter book quantity">
                </div>

                <!-- Short Description Field -->
                <div class="mb-3">
                    <label for="description" class="form-label">Short Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                    <small class="form-text text-muted">Provide a short description of the book.</small>
                </div>

                <!-- Rating Field -->
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

@endsection

<!-- Modal Styling -->
<style>
    .book-card {
        height: 400px;
        overflow: hidden;
        position: relative;
    }

    .book-card .card-body {
        height: 180px;
        overflow: hidden;
    }

    .book-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .book-card .btn-danger {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }

    .modal-dialog.modal-md {
        max-width: 800px; /* You can adjust the width here */
    }
    .modal-content {
        max-height: 500px; /* Set a fixed height for the modal */
        overflow-y: auto; /* Enable scrolling if content exceeds the set height */
    }
    .modal-body {
        max-height: 400px; /* Limit height of the modal body */
        overflow-y: auto; /* Enable scroll for the content */
    }
    .form-control {
        padding: 12px;  /* Ensure form fields look comfortable */
    }
</style>
