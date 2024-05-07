<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\fromisMessage;
use App\Models\registration_cse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class message extends Controller
{
    public function adminPage()
    {
        // Retrieve all registration records
        $registrations = registration_cse::all();

        // Retrieve all message records
        $messages = fromisMessage::all();

        // Pass data to the admin page view
        return view('adminPage', compact('registrations', 'messages'));
    }

    public function messagePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bias' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->input('name'),
            'bias' => $request->input('bias'),
            'message' => $request->input('message')
        ];

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
                'proof_of_payment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // Validate image file
            ]);

            // Handle file upload
            if ($request->hasFile('proof_of_payment')) {
                // Get the file from the request
                $file = $request->file('proof_of_payment');

                // Get the sender's name from the request
                $senderName = $request->name;

                // Generate a unique filename based on the sender's name
                $filename = $senderName . '_' . time() . '_' . $file->getClientOriginalName();

                // Store the file in the public/images directory with the new filename
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
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function adminPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        // Get the input credentials
        $credentials = $request->only('name', 'password');

        // Retrieve the user from the database based on the provided username
        $user = User::where('name', $credentials['name'])->first();

        // Check if user exists and password matches
        if ($user && $user->password === $credentials['password']) {
            // Authentication successful
            // You may want to store the user ID or some other identifier in the session
            // before redirecting to the admin page.
            return redirect()->intended(route('adminPage'));
        }

        // Redirect back to the login page with an error message if authentication fails
        return redirect(route('welcomeGet'))->with("error", "Login details are incorrect");
    }

    public function downloadImage($id)
    {
        $registration = registration_cse::find($id);

        if (!$registration) {
            // Log error if registration not found
            Log::error('Registration not found for ID: ' . $id);
            abort(404);
        }

        // Retrieve the image data from the 'proof_of_payment' column
        $imageData = $registration->proof_of_payment;

        // Log binary information
        Log::debug('Binary data retrieved for registration ID: ' . $id);

        // Set the MIME type based on the image data
        $mimeType = $this->getMimeType($imageData);

        // Return the image data with appropriate headers
        return Response::make($imageData, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="proof_of_payment.' . $this->getExtension($mimeType) . '"'
        ]);
    }

    private function getMimeType($data)
    {
        // Determine the MIME type based on the image data
        if (strpos($data, "\xFF\xD8") === 0) {
            return 'image/jpeg'; // JPEG format
        } elseif (strpos($data, "\x89\x50\x4E\x47\x0D\x0A\x1A\x0A") === 0) {
            return 'image/png'; // PNG format
        } else {
            // Default to JPEG if the format is unknown
            return 'image/jpeg';
        }
    }

    private function getExtension($mimeType)
    {
        // Determine the file extension based on the MIME type
        switch ($mimeType) {
            case 'image/jpeg':
                return 'jpg';
            case 'image/png':
                return 'png';
            default:
                return 'jpg'; // Default to jpg if MIME type is unknown
        }
    }

    public function adminGet()
    {
        return view('admin');
    }

    public function adminPageGet()
    {
        return view('adminPage');
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
}
