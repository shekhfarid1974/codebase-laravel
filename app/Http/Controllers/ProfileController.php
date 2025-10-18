<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class ProfileController extends Controller
{
    /**
     * Display the user's profile page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request) // Added Request parameter
    {
        $user = Auth::user(); // Get the currently authenticated user

        if (!$user) {
            // Handle case where user is not authenticated (shouldn't happen if route is protected)
            abort(403, 'Unauthorized');
        }

        // You can pass the user data to the view
        return view('profile.show', compact('user')); // Assumes view is at resources/views/profile/show.blade.php
    }

    // Add other methods like edit, update if needed
    // public function edit() { ... }
    // public function update(Request $request) { ... }
}