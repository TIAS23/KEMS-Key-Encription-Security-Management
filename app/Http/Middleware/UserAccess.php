<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (auth() -> user() -> role == $role) {
            return $next($request);
        }
        return redirect('admin');   
     }
}
