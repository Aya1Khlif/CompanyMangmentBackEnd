<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Display all clients (API)
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients, 200);
    }

    // Show a single client (API)
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client, 200);
    }

    // Store a new client (API)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure logo is an image
        ]);

        // Handle file upload
        if ($request->hasFile('logo')) {
            // Store the file in the 'public/logos' directory
            $path = $request->file('logo')->store('logos', 'public');
            // Get the URL to the file
            $validatedData['logo'] = asset('storage/' . $path);
        }

        $client = Client::create($validatedData);

        return response()->json([
            'message' => 'Client created successfully!',
            'client' => $client
        ], 201);
    }

    // Update an existing client (API)
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure logo is an image
        ]);

        $client = Client::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('logo')) {
            // Store the file in the 'public/logos' directory
            $path = $request->file('logo')->store('logos', 'public');
            // Get the URL to the file
            $validatedData['logo'] = asset('storage/' . $path);
        }

        $client->update($validatedData);

        return response()->json([
            'message' => 'Client updated successfully!',
            'client' => $client
        ], 200);
    }

    // Delete a client (API)
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(['message' => 'Client deleted successfully!'], 200);
    }
}
