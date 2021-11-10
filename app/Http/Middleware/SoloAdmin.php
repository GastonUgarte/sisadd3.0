<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            switch (auth::user()->rol) {
                case ('Administrador'):
                    return $next($request); //continua al home
                    break;
                case ('Docente'):
                    return redirect('docente'); //redirige a la ruta docente
                    break;
                case ('Directivo'):
                    return redirect('directivo'); //redirige a la ruta directivo
                    break;
                case ('Alumno'):
                    return redirect('alumno'); //redirige a la ruta alumno
                    break;
            }
        } else {
            return redirect('/');
        }
        //return $next($request);
    }
}
