<?php

namespace Bantenprov\PendidikanDitamatkan\Http\Middleware;

use Closure;

/**
 * The PendidikanDitamatkanMiddleware class.
 *
 * @package Bantenprov\PendidikanDitamatkan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PendidikanDitamatkanMiddleware
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
        return $next($request);
    }
}
