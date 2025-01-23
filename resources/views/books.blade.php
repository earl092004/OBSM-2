@extends('components.layouts')

@section('content')
<div class="container py-5">
    {{-- Header Section --}}
    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="display-5 fw-bold text-primary mb-0">Books Management</h1>
            <p class="text-muted mt-2">Manage your book inventory efficiently</p>
        </div>
        <button class="btn btn-primary px-4 py-2 d-flex align-items-center shadow-sm hover:shadow-lg transition-all"
                data-bs-toggle="modal"
                data-bs-target="#addBookModal">
            <i class="fas fa-plus me-2"></i>Add New Book
        </button>

        <button class="btn btn-primary" id="triggerAIButton">Activate AI</button>

    </div>

    {{-- Table Section --}}
    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Author</th>
                        <th class="px-4 py-3">Genre</th>
                        <th class="px-4 py-3">Year</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="align-middle">
                            <td class="px-4 py-3 fw-medium">{{ $book->title }}</td>
                            <td class="px-4 py-3">{{ $book->author }}</td>
                            <td class="px-4 py-3">
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                                    {{ $book->genre }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $book->year }}</td>
                            <td class="px-4 py-3">
                                <span class="badge {{ $book->quantity > 0 ? 'bg-success' : 'bg-danger' }} bg-opacity-10
                                             text-{{ $book->quantity > 0 ? 'success' : 'danger' }} px-3 py-2 rounded-pill">
                                    {{ $book->quantity }}
                                </span>
                            </td>
                            <td class="px-4 py-3">${{ number_format($book->price, 2) }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editBookModal{{ $book->id }}">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $book->id }}">
                                        <i class="fas fa-trash-alt me-1"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editBookModal{{ $book->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content border-0">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title">Edit Book Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" name="title" id="title" value="{{ $book->title }}" required>
                                                        <label>Book Title</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" name="author" id="author" value="{{ $book->author }}" required>
                                                        <label>Author</label>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="genre" class="form-label">Genre</label>
                                                    <select type="text" class="form-control" name="genre" id="genre" required>
                                                    <option value="non fiction">non fiction</option>
                                                        <option value="Action">Action</option>
                                                        <option value="Adventure">Adventure</option>
                                                        <option value="Comedy">Comedy</option>
                                                        <option value="Crime and mystery">Crime and mystery</option>
                                                        <option value="Fantasy">Fantasy</option>
                                                        <option value="Historical">Historical</option>
                                                        <option value="Historical fiction">Historical fiction</option>
                                                        <option value="Horror">Horror</option>
                                                        <option value="Romance">Romance</option>
                                                        <option value="Satire">Satire</option>
                                                        <option value="Science fiction">Science fiction</option>
                                                        <option value="Cyberpunk and derivatives">Cyberpunk and derivatives</option>
                                                        <option value="Thriller">Thriller</option>
                                                        <option value="Isekai">Isekai</option>
                                                        <option value="fictional">fictional</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" name="year" id="year" required>
                                                            <option value="" selected disabled>Select Year</option>
                                                            @for ($year = 2025; $year >= 1970; $year--)
                                                                <option value="{{ $year }}">{{ $year }}</option>
                                                            @endfor
                                                        </select>
                                                        <label for="year">Year</label>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <input type="url" class="form-control" name="cover_image" id="cover_image" value="{{ $book->cover_image }}" required>
                                                        <label>Cover Image URL</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" step="0.01" class="form-control" name="price" id="price" value="{{ $book->price }}" required>
                                                        <label>Price ($)</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $book->quantity }}" required>
                                                        <label>Quantity</label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="description" id="description" style="height: 100px" required>{{ $book->description }}</textarea>
                                                        <label>Short Description</label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <select class="form-select" name="rating" id="rating" required>
                                                            <option value="{{ $book->rating }}" selected>{{ $book->rating }} Star</option>
                                                            <option value="1">1 Star</option>
                                                            <option value="2">2 Stars</option>
                                                            <option value="3">3 Stars</option>
                                                            <option value="4">4 Stars</option>
                                                            <option value="5">5 Stars</option>
                                                        </select>
                                                        <label>Rating</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-end mt-4">
                                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary px-4">Update Book</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Delete Modal --}}
                        <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Confirm Delete</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="text-center mb-4">
                                            <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
                                        </div>
                                        <p class="text-center mb-0">Are you sure you want to delete "<strong>{{ $book->title }}</strong>"? This action cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('books.delete', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-4">Delete</button>
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
</div>

{{-- Add Book Modal --}}
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
                        <select type="text" class="form-control" name="genre" id="genre" required>
                        <option value="non fiction">non fiction</option>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Crime and mystery">Crime and mystery</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Historical">Historical</option>
                            <option value="Historical fiction">Historical fiction</option>
                            <option value="Horror">Horror</option>
                            <option value="Romance">Romance</option>
                            <option value="Satire">Satire</option>
                            <option value="Science fiction">Science fiction</option>
                            <option value="Cyberpunk and derivatives">Cyberpunk and derivatives</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Isekai">Isekai</option>
                            <option value="fictional">fictional</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" name="year" id="year" required>
                                <option value="" selected disabled>Select Year</option>
                                @for ($year = 2025; $year >= 1970; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <label for="year">Year</label>
                        </div>
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

<script>
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', function(event) {
            // Remove any non-numeric characters, except for period and minus sign
            event.target.value = event.target.value.replace(/[^0-9]/g, '');
        });
    });
</script>

<script>
    // Add event listener to the 'Activate AI' button
    document.getElementById('triggerAIButton').addEventListener('click', function() {
        // Disable the button to prevent multiple clicks
        this.disabled = true;
        this.textContent = 'Processing...';

        // Make the POST request to trigger the fetch command
        fetch("{{ route('trigger.fetch.books') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({})
        })
        .then(response => {
            if (!response.ok) {
                return Promise.reject('Failed to fetch books');
            }
            return response.json();
        })
        .then(data => {
            // Notify the user about the success
            alert(data.message);
            this.textContent = 'Activate AI'; // Reset the button text
            this.disabled = false; // Enable the button again
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
            alert('Error: ' + error.message);
            this.textContent = 'Activate AI'; // Reset the button text
            this.disabled = false; // Enable the button again
        });
    });
</script>

<style>

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.025em;
}

.btn-group .btn {
    padding: 0.5rem 1rem;
    transition: all 0.2s;
}

.modal-content {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-floating > label {
    color: #6c757d;
}

.form-control:focus,
.form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
}

.badge {
    font-weight: 500;
}
</style>
@endsection
