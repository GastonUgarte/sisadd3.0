<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $open = false;

    public $user;

    protected $rules = [
        'user.name' => 'required',
        'user.lastname' => 'required',
        'user.dni' => 'required',
        'user.rol' => 'required',
        'user.email' => 'required',
        'user.password' => 'required',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        $this->validate();
        $this->user->save();

        $this->reset(['open']);
        $this->emitTo('show-post', 'render');

        $this->emit('alert', 'El usuario se actualizó satisfactoriamente');
    }

    public function render()
    {

        return view('livewire.edit-user');
    }
}
