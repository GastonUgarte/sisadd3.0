<?php

namespace App\Http\Livewire;

use App\Models\Division;
use Livewire\Component;

class Divisiones extends Component
{
    //definimos unas variables
    public $search;
    public $divisiones, $nombre, $id_division;
    public $modal = false;

    protected $rules = [
        'nombre' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $this->divisiones = Division::where('nombre', 'like', '%' . $this->search . '%')->get();
        #$this->divisiones = Division::all();
        return view('livewire.divisiones');
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
        $this->id_division = '';
    }
    public function editar($id)
    {
        $division = Division::findOrFail($id);
        $this->id_division = $id;
        $this->nombre = $division->nombre;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Division::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        $this->validate();
        Division::updateOrCreate(
            ['id' => $this->id_division],
            [
                'nombre' => $this->nombre
            ]
        );

        session()->flash(
            'message',
            $this->id_division ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
