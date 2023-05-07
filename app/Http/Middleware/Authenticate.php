<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $login = 'login';
        
        if ($request->is('admin') || $request->is('admin/*')) {
            $login = 'admin.login';
        }

        return $request->expectsJson() ? null : route($login);
    }
}
