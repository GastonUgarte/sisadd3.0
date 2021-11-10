<?php

namespace App\Http\Livewire;

use App\Models\Anio;
use Livewire\Component;

class Anios extends Component
{
    //definimos unas variables
    public $search;
    public $anios, $nombre, $id_anio;
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
        $this->anios = Anio::where('nombre', 'like', '%' . $this->search . '%')->get();
        #$this->anios = Anio::all();
        return view('livewire.anios');
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
        $this->id_anio = '';
    }
    public function editar($id)
    {
        $anio = Anio::findOrFail($id);
        $this->id_anio = $id;
        $this->nombre = $anio->nombre;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Anio::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        $this->validate();
        Anio::updateOrCreate(
            ['id' => $this->id_anio],
            [
                'nombre' => $this->nombre,
            ]
        );

        session()->flash(
            'message',
            $this->id_anio ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
