<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Make a request to the User Auth Service
        $response = Http::authService()->post('/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        logger($response->body());

        if ($response->successful()) {
            // Store the JWT token in session
            session(['jwt_token' => $response['token']]);

            logger('Token stored in session: ' . session('jwt_token'));

            return redirect()->route('dashboard')->with('status', 'Logged in successfully');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle logout
    public function logout()
    {
        // Invalidate the token on User Auth Service
        Http::authService()->withToken(session('jwt_token'))->post('/logout');

        session()->forget('jwt_token');
        return redirect()->route('login');
    }
}
