<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      
         $action = $request->route()->getName();
         $permissions = Auth::user()->getAllPermissions();
         
        

        //dd($permissions, $action);
         
         //separating controller and method
         /*$_action = explode('@',$action);
         
         $controller = $_action[0];
         $method = end($_action);
         $permission_name = $controller. '_'. $method;

         dd( $permission_name);*/

        if (Auth::user()->type == 'admin') //If user has admin role
        {
            return $next($request);
        }

        /*if (Auth::user()->hasRole('User')) //If user has user role
        {
            if ($request->is('posts/create'))//If user is creating a post
            {
                if (!Auth::user()->hasPermissionTo('addPost'))
                {
                   abort('401');
                } 
                else {
                   return $next($request);
                }
            }
        }
        abort('401');*/
        return $next($request);
    }

}
