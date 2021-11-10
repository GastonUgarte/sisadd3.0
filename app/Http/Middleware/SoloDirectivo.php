<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloDirectivo
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
                    return redirect('docente');
                    break;
                case ('Directivo'):
                    return $next($request);
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
