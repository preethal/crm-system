<?php
 
 public function handle($request, Closure $next, $guard = 'admin')
{
        if (!Auth::guard($guard)->check()) {
            return redirect('/authority/login');
        }
        return $next($request);
}

?>