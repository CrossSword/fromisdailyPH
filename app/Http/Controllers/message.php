<?php

namespace App\Http\Controllers;

use App\Models\fromisMessage;
<<<<<<< HEAD
use App\Models\registration_cse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class message extends Controller
{
    public function messagePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bias' => 'required',
            'message' => 'required'
        ]);

=======
use Illuminate\Http\Request;


class message extends Controller
{
    public function messagePost(Request $request) {
        $request->validate([
            'name' => 'required',
            'bias' => 'required', 
            'message' => 'required'
        ]);
    
>>>>>>> 06e04488236b8178da2f959b44205e0df2a21413
        $data = [
            'name' => $request->input('name'),
            'bias' => $request->input('bias'),
            'message' => $request->input('message')
        ];
<<<<<<< HEAD

        $fromis_message = fromisMessage::create($data);

        // You might want to return a response indicating success or failure
        return response()->json(['message' => 'Message created successfully'], 201);
    }

    public function registrationPost(Request $request)
    {
        try {
            // Validate the form data
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'contact_number' => 'nullable|string',
                'twitter_username' => 'nullable|string',
                'facebook_link' => 'nullable|url',
                'ticket_type' => 'required|in:walkin,non-walkin',
                'proof_of_payment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
            ]);

            // Handle file upload
            if ($request->hasFile('proof_of_payment')) {
                // Get the file from the request
                $file = $request->file('proof_of_payment');

                // Generate a unique filename
                $filename = time() . '_' . $file->getClientOriginalName();

                // Store the file in the public directory
                $file->storeAs('public/images', $filename);
            } else {
                // If no file uploaded, set filename to null
                $filename = null;
            }

            // Create a new registration record
            registration_cse::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'twitter_username' => $request->twitter_username,
                'facebook_link' => $request->facebook_link,
                'ticket_type' => $request->ticket_type,
                'proof_of_payment' => $filename, // Save the filename
            ]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Registration submitted successfully.');
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Error during registration: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }

    public function messageGet()
    {
        return view('message');
    }

    public function welcomeGet()
    {
        return view('welcome');
    }

    public function eventsGet()
    {
        return view('events');
    }

    public function registrationGet()
    {
        return view('registration');
    }
=======
    
        $fromis_message = fromisMessage::create($data);
    
        // You might want to return a response indicating success or failure
        return response()->json(['message' => 'Message created successfully'], 201);
    }
    
>>>>>>> 06e04488236b8178da2f959b44205e0df2a21413
}
