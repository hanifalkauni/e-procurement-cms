@extends('layouts.app')

@section('title', 'Procurement Requests')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Procurement Requests</h4>
        <a href="{{ route('procurements.create') }}" class="btn btn-primary float-end">Create Procurement</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Request Code</th>
                    <th>User ID</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($procurements as $procurement)
                <tr>
                    <td>{{ $procurement['request_code'] }}</td>
                    <td>{{ $procurement['user_id'] }}</td>
                    <td>
                        <span class="badge bg-{{ $procurement['status'] == 'approved' ? 'success' : ($procurement['status'] == 'rejected' ? 'danger' : 'warning') }}">
                            {{ ucfirst($procurement['status']) }}
                        </span>
                    </td>
                    <td>${{ number_format($procurement['total_amount'], 2) }}</td>
                    <td>
                        @if($procurement['status'] == 'pending')
                            <a href="{{ route('procurements.approve', $procurement['id']) }}" class="btn btn-success btn-sm">Approve</a>
                            <a href="{{ route('procurements.reject', $procurement['id']) }}" class="btn btn-danger btn-sm">Reject</a>
                        @else
                            <span class="text-muted">Processed</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
