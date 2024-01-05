<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckUserCredentials
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loginData = $request->only('user_email', 'user_password');
        if (Auth::attempt(
            ['user_email' => $loginData['user_email'],
             'user_password' => $loginData['user_password']
             ])) {
            return redirect()->back()->with('error', 'Invalid Email Address / User Password');
        }
    
        return $next($request);
    }
}