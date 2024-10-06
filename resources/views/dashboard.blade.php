@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="mt-5">Welcome to Your Dashboard</h1>
            <p class="lead">Manage Vendors, Procurement Requests, and Approvals</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Vendor Management</h5>
                    <p class="card-text">Create, view, and manage vendors and their categories.</p>
                    <a href="{{ route('vendors.index') }}" class="btn btn-primary">Go to Vendors</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Procurement Management</h5>
                    <p class="card-text">Create and manage procurement requests and approvals.</p>
                    <a href="{{ route('procurements.index') }}" class="btn btn-primary">Go to Procurements</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
