<?php

namespace App\Http\Controllers;

use App\Models\fromisMessage;
use Illuminate\Http\Request;


class message extends Controller
{
    public function messagePost(Request $request) {
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
    
}
