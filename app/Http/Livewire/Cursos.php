<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Anio;
use App\Models\Curso;
use App\Models\Division;
use App\Models\Materia;
use App\Models\User;

class Cursos extends Component
{
    public $cursos, $id_anio, $id_materia, $id_division, $id_curso;
    public $modal, $modalDocentes, $modalAlumnos;
    public $selectedDocentes = [];
    public $selectedAlumnos = [];

    public function render()
    {
        $this->cursos = Curso::all();
        return view('livewire.cursos', [
            'anios' => Anio::all(),
            'divisiones' => Division::all(),
            'materias' => Materia::all(),
            'users' => User::all(),
        ]);
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }
    public function limpiarCampos()
    {
        $this->id_anio = '';
        $this->id_materia = '';
        $this->id_division = '';
        $this->id_curso = '';
    }

    public function editar($id)
    {
        $curso = Curso::findOrFail($id);
        $this->id_curso = $id;
        $this->id_anio = $curso->anio->id;
        $this->id_materia = $curso->materia->id;
        $this->id_division = $curso->division->id;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Curso::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        if (Curso::find($this->id_curso)) {
            $curso = Curso::updateOrCreate([
                'id' => $this->id_curso,
            ]);
            $anio = Anio::findOrFail($this->id_anio);
            $curso->anio()->associate($anio);

            $materia = Materia::findOrFail($this->id_materia);
            $curso->materia()->associate($materia);

            $division = Division::findOrFail($this->id_division);
            $curso->division()->associate($division);

            $curso->save();
        } else {
            $curso = new Curso([
                'id' => $this->id_curso,
            ]);

            $anio = Anio::findOrFail($this->id_anio);
            $curso->anio()->associate($anio);

            $materia = Materia::findOrFail($this->id_materia);
            $curso->materia()->associate($materia);

            $division = Division::findOrFail($this->id_division);
            $curso->division()->associate($division);

            $curso->save();
        }
        session()->flash(
            'message',
            $this->id_curso ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

        $this->cerrarModal();
        $this->limpiarCampos();
    }

    public function abrirModalDocentes()
    {
        $this->modalDocentes = true;
    }
    public function cerrarModalDocentes()
    {
        $this->modalDocentes = false;
    }
    public function agregarDocentes($id)
    {
        //$curso = Curso::findOrFail($id);
        $this->id_curso = $id;

        $this->abrirModalDocentes();
    }

    public function guardarDocentes()
    {
        $curso = Curso::findOrFail($this->id_curso);
        $arregloDocentes = $this->selectedDocentes;
        $num = count($this->selectedDocentes);
        for ($i = 0; $i < $num; $i++) {
            $curso->users()->sync($arregloDocentes[$i]);
        }

        session()->flash('message', 'Docentes agregados correctamente');
        $this->reset(['selectedDocentes']);
        $this->cerrarModalDocentes();
    }

    public function abrirModalAlumnos()
    {
        $this->modalAlumnos = true;
    }
    public function cerrarModalAlumnos()
    {
        $this->modalAlumnos = false;
    }
    public function agregarAlumnos($id)
    {
        //$curso = Curso::findOrFail($id);
        $this->id_curso = $id;

        $this->abrirModalAlumnos();
    }

    public function guardarAlumnos()
    {
        $curso = Curso::findOrFail($this->id_curso);
        //$curso->users()->updateExistingPivot($this->id_curso, $this->selectedAlumnos, $touch = true);
        $arregloAlumnos = $this->selectedAlumnos;
        $num = count($this->selectedAlumnos);
        for ($i = 0; $i < $num; $i++) {
            $curso->users()->sync($arregloAlumnos[$i]);
            //$curso->users()->updateExistingPivot($arregloAlumnos[$i]);
        }

        //$id, array $attributes, $touch = true
        session()->flash('message', 'Alumnos agregados correctamente');
        $this->reset(['selectedAlumnos']);
        $this->cerrarModalAlumnos();
    }
}
