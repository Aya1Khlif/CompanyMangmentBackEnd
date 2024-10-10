<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    // Display all messages (API)
    public function index()
    {
        $messages = ContactUs::all();
        return response()->json($messages, 200);
    }

    // Show a single message (API)
    public function show($id)
    {
        $message = ContactUs::findOrFail($id);
        return response()->json($message, 200);
    }

    // Store a new message (API)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $contactMessage = ContactUs::create($validatedData);

        return response()->json([
            'message' => 'Message sent successfully!',
            'contactMessage' => $contactMessage
        ], 201);
    }

    // Delete a message (API)
    public function destroy($id)
    {
        $message = ContactUs::findOrFail($id);
        $message->delete();

        return response()->json(['message' => 'Message deleted successfully!'], 200);
    }

}
