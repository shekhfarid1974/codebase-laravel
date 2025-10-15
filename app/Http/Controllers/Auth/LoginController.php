<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); // Check if 'remember me' checkbox was checked

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed...
            $request->session()->regenerate(); // Regenerate session ID for security

            // Redirect to intended page or dashboard
            return redirect()->intended(route('dashboard.index')); // Use your dashboard route name
        }

        // Authentication failed...
        // The `withErrors` is handled automatically by Laravel's Auth facade if validation fails,
        // but for incorrect credentials, you might want to manually flash an error:
        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirect to login page after logout
    }
}