<?php

namespace App\Http\Middleware;

use Closure;
use phpDocumentor\Reflection\Types\True_;

class CheckUserRole
{

    public function handle($request, Closure $next)
    {

        if ($request->user() === null) {
            return  redirect(route('login'));
        }

        $actions = $request->route()->getAction();
        $roles = $actions['roles'] ?? null;
        if ($request->user()->hasAnyRole($roles) && $roles = 'admin') {
            return $next($request);
        }
        abort('403' , 'Not Authorized');



    }
}
