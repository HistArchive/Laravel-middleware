<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Configuraciones;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class Mantenimiento
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Busca la entrada de 'mantenimiento' en la tabla de configuraciones
        $configuraciones = Configuraciones::where('name', 'mantenimiento')->first();
        // Si encuentra la entrada de 'mantenimiento', tiene estado 1 y no está iniciado sesión, redirije a /mantenimiento (not good)
        if ($configuraciones && $configuraciones->state && !Auth::check()){
            //return redirect('/mantenimiento');
            return response()->view('mantenimiento');
        }
        return $next($request);
    }
}
