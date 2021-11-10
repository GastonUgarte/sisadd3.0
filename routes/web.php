<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DirectivoController;
use App\Http\Controllers\DocenteCursoController;
use App\Http\Livewire\AgregarDocentes;
use App\Http\Livewire\Anios;
use App\Http\Livewire\Cursos;
use App\Http\Livewire\Divisiones;
use App\Http\Livewire\Materias;
use App\Http\Livewire\ShowUsers;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/alumno', AlumnoController::class);

Route::resource('/docente', DocenteController::class);

Route::resource('/directivo', DirectivoController::class);

Route::middleware(['auth:sanctum', 'verified', 'soloadmin'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('soloadmin')->get('/dashboard/materias', Materias::class)->name('materias');

Route::middleware('soloadmin')->get('/dashboard/users', Users::class)->name('users');

Route::middleware('soloadmin')->get('/dashboard/anios', Anios::class)->name('anios');

Route::middleware('soloadmin')->get('/dashboard/divisiones', Divisiones::class)->name('divisiones');

Route::middleware('soloadmin')->get('/dashboard/cursos', Cursos::class)->name('cursos');

//Route::middleware('soloadmin')->get('dashboard/cursos/docentes', AgregarDocentes::class)->name('docentes');

/*Route::get('/docente/{id_curso}', [
    'as' => 'docente',
    'uses' => 'DocenteCursoController@index',
]);*/

Route::get('/docente/{id}', [DocenteCursoControllerr::class, 'show'])->name('curso.show');
