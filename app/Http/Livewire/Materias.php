<?php

namespace App\Http\Livewire;

use App\Models\Materia;
use Livewire\Component;

class Materias extends Component
{
    //definimos unas variables
    public $materias, $nombre, $descripcion, $id_materia;
    public $modal = false;

    public function render()
    {
        $this->materias = Materia::all();
        return view('livewire.materias');
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
        $this->nombre = '';
        $this->descripcion = '';
        $this->id_materia = '';
    }
    public function editar($id)
    {
        $materia = Materia::findOrFail($id);
        $this->id_materia = $id;
        $this->nombre = $materia->nombre;
        $this->descripcion = $materia->descripcion;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Materia::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Materia::updateOrCreate(
            ['id' => $this->id_materia],
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion
            ]
        );

        session()->flash(
            'message',
            $this->id_materia ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
