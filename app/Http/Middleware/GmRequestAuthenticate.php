<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class GmRequestAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = $request->header('Authorization');

        $user = User::where('uuid', $userId)->first();

        if($user == null)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Login Failed!', 'returnUrl' => '' ], 403);

        if($user->permission < 100)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Login Failed', 'returnUrl' => '' ], 403);

        return $next($request);
    }
}
