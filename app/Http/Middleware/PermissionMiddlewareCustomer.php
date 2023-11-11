<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 3/10/23 .
 * Time: 11:25 PM .
 */

namespace App\Http\Middleware;

use Spatie\Permission\Exceptions\UnauthorizedException;
use Closure;

class PermissionMiddlewareCustomer
{
    public function handle($request, Closure $next, $permission, $guard = 'admins')
    {
//        return $next($request);
        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if ($authGuard->user()->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
