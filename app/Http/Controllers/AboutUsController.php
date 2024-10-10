<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    // Display a list of all about_us entries (API)
    public function index()
    {
        $aboutUs = AboutUs::all();
        return response()->json($aboutUs, 200);
    }

    // Show a single about_us entry (API)
    public function show($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return response()->json($aboutUs, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'about_company' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'phone2' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'website' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'established_date' => 'nullable|date',
            'status' => 'required|in:' . implode(',', Status::getValues()),
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure logo is an image
        ]);

        // Handle file upload
        if ($request->hasFile('logo')) {
            // Store the file in the 'public/logos' directory
            $path = $request->file('logo')->store('logos', 'public');
            // Get the URL to the file
            $validatedData['logo'] = asset('storage/' . $path);
        }

        $aboutUs = AboutUs::create($validatedData);

        return response()->json([
            'message' => 'About Us entry created successfully!',
            'aboutUs' => $aboutUs
        ], 201);
    }

    // Update an existing about_us entry (API)
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'about_company' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'phone2' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'website' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'established_date' => 'nullable|date',
            'status' => 'required|in:' . implode(',', Status::getValues()),
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure logo is an image
        ]);

        $aboutUs = AboutUs::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('logo')) {
            // Store the file in the 'public/logos' directory
            $path = $request->file('logo')->store('logos', 'public');
            // Get the URL to the file
            $validatedData['logo'] = asset('storage/' . $path);
        }

        $aboutUs->update($validatedData);

        return response()->json([
            'message' => 'About Us entry updated successfully!',
            'aboutUs' => $aboutUs
        ], 200);
    }

    // Delete an about_us entry (API)
    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();

        return response()->json(['message' => 'About Us entry deleted successfully!'], 200);
    }
}
