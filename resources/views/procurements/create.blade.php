@extends('layouts.app')

@section('title', 'Create Procurement Request')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Create Procurement Request</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('procurements.store') }}">
            @csrf
            <div class="mb-3">
                <label for="items" class="form-label">Items</label>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="items[0][name]" class="form-control" required></td>
                            <td><input type="number" name="items[0][quantity]" class="form-control" required></td>
                            <td><input type="number" name="items[0][unit_price]" class="form-control" required></td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Submit Procurement Request</button>
            </div>
        </form>
    </div>
</div>
@endsection
