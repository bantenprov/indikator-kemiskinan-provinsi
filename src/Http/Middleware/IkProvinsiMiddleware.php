<?php namespace Bantenprov\IkProvinsi\Http\Middleware;

use Closure;

/**
 * The IkProvinsiMiddleware class.
 *
 * @package Bantenprov\IkProvinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class IkProvinsiMiddleware
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
