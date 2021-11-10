<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Controllers\Controller;

class DocenteCursoController extends Controller
{
    public function show($id)
    {
        return view('docentes.index', ['curso' => Curso::findOrFail($id)]);
    }
}
