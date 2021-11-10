<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    //definimos unas variables
    public $search;
    public $users;
    public $name = '';
    public $lastname = '';
    public $dni = '';
    public $rol = '';
    public $email = '';
    public $password = '', $id_user;
    public $modal = false;

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'dni' => 'required',
        'rol' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        $this->users = User::where('name', 'like', '%' . $this->search . '%')->get();
        #$this->users = User::all();
        return view('livewire.users');
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
        $this->render();
        $this->modal = false;
    }
    public function limpiarCampos()
    {
        $this->name = '';
        $this->lastname = '';
        $this->dni = '';
        $this->rol = '';
        $this->email = '';
        $this->password = '';
        $this->id_user = '';
    }
    public function editar($id)
    {
        $user = User::findOrFail($id);
        $this->id_user = $id;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->dni = $user->dni;
        $this->rol = $user->rol;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }


    public function guardar()
    {
        #$validator = $this->validate();
        $this->validate();
        User::updateOrCreate(
            ['id' => $this->id_user],
            [
                'name' => $this->name,
                'lastname' => $this->lastname,
                'dni' => $this->dni,
                'rol' => $this->rol,
                'email' => $this->email,
                'password' => $this->password
            ]
        );

        session()->flash(
            'message',
            $this->id_user ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

        $this->limpiarCampos();
        $this->cerrarModal();
    }
}
