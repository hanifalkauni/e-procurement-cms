<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VendorController extends Controller
{
    // List all vendors
    public function index()
    {
        // Get the base URL from the configuration
        $baseUrl = config('services.vendor_service.base_url');

        // Make a request to the Vendor Service
        $response = Http::withToken(session('jwt_token'))
                        ->get("{$baseUrl}/vendors");

        if ($response->successful()) {
            $vendors = $response->json();
            return view('vendors.index', compact('vendors'));
        }

        return back()->withErrors(['message' => 'Failed to fetch vendors']);
    }

    // Show form for creating a vendor
    public function create()
    {
        // Get the base URL from the configuration
        $baseUrl = config('services.vendor_service.base_url');

        // Fetch vendor categories from the Vendor Service
        $response = Http::withToken(session('jwt_token'))
                        ->get("{$baseUrl}/categories");

        $categories = $response->successful() ? $response->json() : [];
        return view('vendors.create', compact('categories'));
    }

    // Store a new vendor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'categories' => 'nullable|array',
        ]);

        // Get the base URL from the configuration
        $baseUrl = config('services.vendor_service.base_url');

        // Send the vendor registration request to the Vendor Service
        $response = Http::withToken(session('jwt_token'))
                        ->post("{$baseUrl}/vendors", $request->all());

        if ($response->successful()) {
            return redirect()->route('vendors.index')->with('success', 'Vendor created successfully!');
        }

        return back()->withErrors(['message' => 'Failed to create vendor']);
    }
}


