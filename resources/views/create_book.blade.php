@extends('components.layouts')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Title Field -->
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter book title" required>
        </div>

        <!-- Author Field -->
        <div class="form-group mb-3">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="Enter author name" required>
        </div>

        <!-- Genre Field -->
        <div class="form-group mb-3">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" placeholder="Enter book genre" required>
        </div>

        <!-- Year Field -->
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" class="form-control" id="year" name="year" placeholder="Enter year" required>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image URL</label>
            <input type="text" class="form-control" id="cover_image" name="cover_image" placeholder="Enter cover image URL" required>
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Add Book</button>
    </form>
</div>
@endsection
