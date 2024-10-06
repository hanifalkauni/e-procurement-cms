<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;

class AuthenticateWithJWT
{
    public function handle($request, Closure $next)
    {
        // Check if the JWT token is present in the session
        $token = session('jwt_token');

        if (!$token) {
            // If no token, redirect to the login page
            return redirect()->route('login');
        }

        // Optionally, you can verify the token with the User Auth Service here
        // Example: Verify token validity with the User Auth Service
        $response = Http::withToken($token)->get(config('services.user_auth_service.base_url') . '/validate-token');
        
        if ($response->failed()) {
            // If token is invalid or expired, redirect to login
            session()->forget('jwt_token');  // Clear invalid token
            return redirect()->route('login');
        }

        // If token is valid, proceed with the request
        return $next($request);
    }
}
