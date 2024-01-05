<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;


class CheckRegisteredEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $checkEmail = User::where('user_email', $request->input('user_email'))->exists();
        if ($checkEmail) {
            // Redirect back or perform any other action as needed
            return redirect()->back()->with('error', 'Email is already registered.');
        }

        return $next($request);
    }
}