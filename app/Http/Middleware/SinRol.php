<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SinRol
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
		if(Auth::User()->isNone){
			if ($request->ajax() || $request->wantsJson()) {
				return response('Unauthorized.', 401);
			} else {
				return redirect()->guest('alerta');
			}
		}

		return $next($request);
	}
}
