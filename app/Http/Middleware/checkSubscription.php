<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkSubscription
{
				/**
					* Handle an incoming request.
					*
					* @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
					*/
				public function handle(Request $request, Closure $next): Response
				{
								$user = auth()->user();
								if ($user && $user->subscription == 'premium') {
												return $next($request);
								}
								return redirect('/subscription')->with('error', 'Please Subscribe');
				}
}
