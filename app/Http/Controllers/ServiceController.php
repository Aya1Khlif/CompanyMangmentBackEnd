<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Display a list of all services (API)
    public function index()
    {
        $services = Service::all();
        return response()->json($services, 200);
    }

    // Show a single service (API)
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service, 200);
    }

    // Store a new service (API)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'card_image' => 'nullable|string|max:255',
            'status' => 'required|in:' . implode(',', Status::getValues()), // Assuming Status is an enum
        ]);

        $service = Service::create($validatedData);
        return response()->json([
            'message' => 'Service created successfully!',
            'service' => $service
        ], 201);
    }

    // Update an existing service (API)
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'card_image' => 'nullable|string|max:255',
            'status' => 'required|in:' . implode(',', Status::getValues()),
        ]);

        $service = Service::findOrFail($id);
        $service->update($validatedData);

        return response()->json([
            'message' => 'Service updated successfully!',
            'service' => $service
        ], 200);
    }

    // Delete a service (API)
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully!'], 200);
    }
}
