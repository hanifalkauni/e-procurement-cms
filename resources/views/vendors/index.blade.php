@extends('layouts.app')

@section('title', 'Vendors List')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Vendors List</h4>
        <a href="{{ route('vendors.create') }}" class="btn btn-primary float-end">Create Vendor</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Categories</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendors as $vendor)
                <tr>
                    <td>{{ $vendor['name'] }}</td>
                    <td>{{ $vendor['email'] }}</td>
                    <td>{{ $vendor['phone_number'] }}</td>
                    <td>{{ $vendor['address'] }}</td>
                    <td>
                        @foreach($vendor['categories'] as $category)
                            {{ $category['name'] }}@if(!$loop->last), @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
