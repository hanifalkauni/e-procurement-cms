<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProcurementController extends Controller
{
    // List all procurement requests
    public function index()
    {
        // Fetch procurement requests from the Procurement Service
        $response = Http::withToken(session('jwt_token'))->get(config('services.procurement_service.base_url') . '/procurement-requests');

        if ($response->successful()) {
            $procurements = $response->json();
            return view('procurements.index', compact('procurements'));
        }

        return back()->withErrors(['message' => 'Failed to fetch procurement requests']);
    }

    // Show form for creating a procurement request
    public function create()
    {
        return view('procurements.create');
    }

    // Store the procurement request
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.name' => 'required|string|max:255',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        // Post the procurement request to the Procurement Service
        $response = Http::withToken(session('jwt_token'))->post(config('services.procurement_service.base_url') . '/procurements', $request->all());

        if ($response->successful()) {
            return redirect()->route('procurements.index')->with('success', 'Procurement request created successfully.');
        }

        return back()->withErrors(['message' => 'Failed to create procurement request']);
    }

    // Approve procurement request
    public function approve($id)
    {
        $response = Http::withToken(session('jwt_token'))->put(config('services.procurement_service.base_url') . "/procurements/{$id}/approve");

        if ($response->successful()) {
            return back()->with('success', 'Procurement request approved.');
        }

        return back()->withErrors(['message' => 'Failed to approve procurement request']);
    }

    // Reject procurement request
    public function reject($id)
    {
        $response = Http::withToken(session('jwt_token'))->put(config('services.procurement_service.base_url') . "/procurements/{$id}/reject");

        if ($response->successful()) {
            return back()->with('success', 'Procurement request rejected.');
        }

        return back()->withErrors(['message' => 'Failed to reject procurement request']);
    }
}
