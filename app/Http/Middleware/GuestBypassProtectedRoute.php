<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
/**
 * Class GuestBypassProtectedRoute
 * 
 * @author Abhishek Prakash <prakashabhishek6262@gmail.com>
 * @package App\Http\Middleware
 */
class GuestBypassProtectedRoute
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // The route should be accessible for both authenticated and
        // guest users.
        if ($request->hasHeader('authorization')) {
            return app(Authenticate::class)->handle(
                $request,
                function ($request) use ($next) {
                    return $next($request);
                },
                'api'
            );
        }
        return $next($request);
    }
}
