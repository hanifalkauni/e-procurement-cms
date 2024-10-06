@extends('layouts.app')

@section('title', 'Create Vendor')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Create Vendor</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('vendors.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Vendor Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Categories</label>
                <select name="categories[]" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Create Vendor</button>
            </div>
        </form>
    </div>
</div>
@endsection
