<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloDocente
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
                    return redirect('dashboard');
                    break;
                case ('Docente'):
                    return $next($request);
                    break;
                case ('Directivo'):
                    return redirect('directivo');
                    break;
                case ('Alumno'):
                    return redirect('alumno');
                    break;
            }
        } else {
            return redirect('/');
        }
        //return $next($request);
    }
}
