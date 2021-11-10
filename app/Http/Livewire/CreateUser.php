<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class CreateUser extends Component
{
    public $open = false;

    public $name, $lastname, $dni, $rol, $email, $password;

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'dni' => 'required',
        'rol' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();

        User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'dni' => $this->dni,
            'rol' => $this->rol,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $this->reset(['open', 'name', 'lastname', 'dni', 'email', 'password']); //para resetear los campos de mi modal

        $this->emitTo('show-users', 'render'); //para emitir un evento a un componente en especifico
        $this->emit('alert', 'El Usuario se creó satisfactoriamente'); //para emitir un evento entre componentes
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
