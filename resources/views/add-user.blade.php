@extends('components.layouts')
@section('content')
<br>
    <div class="container ">
        <div class="card">
            <div class="card-header">Add New User</div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="formGroupExampleInput" placeholder="Enter First Name">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="formGroupExampleInput" placeholder="Enter Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Contact</label>
                        <input type="text" name="contact" class="form-control" value="{{ old('contact') }}" id="formGroupExampleInput2" placeholder="Enter Contact Number">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Phone Number</label>
                        <input type="number" name="contact_number" value="{{ old('contact_number') }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Phone Number">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="formGroupExampleInput2" placeholder="Enter Address">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
