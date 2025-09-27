<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure the user is authenticated (should be handled by 'auth' middleware, but keep as a safeguard)
        $user = $request->user();
        if (!$user) {
            return redirect('/')->with('error', 'الرجاء تسجيل الدخول أولاً.');
        }

        // If the user is not an admin, log them out and redirect to login
        if (empty($user->is_admin) || (int) $user->is_admin !== 1) {
            if (function_exists('auth')) {
                auth()->logout();
            }
            if ($request->hasSession()) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
            return redirect('/')->with('error', 'ليس لديك صلاحية للوصول إلى هذه الصفحة.');
        }

        return $next($request);
    }
}
