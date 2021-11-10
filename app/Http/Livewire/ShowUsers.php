<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ShowUsers extends Component
{
    public $search, $user;
    public $sort = 'id';
    public $direction = 'desc';

    public $open_edit = false;

    protected $rules = [
        'user.name' => 'required',
        'user.lastname' => 'required',
        'user.dni' => 'required',
        'user.rol' => 'required',
        'user.email' => 'required',
        'user.password' => 'required',
    ];

    protected $listeners = ['render', 'render']; //cuando escuche el evento render ejecute el metodo render

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();

        return view('livewire.show-users', compact('users'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(User $user)
    {
        $this->user = $user;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        $this->user->save();

        $this->reset(['open_edit']);

        $this->emit('alert', 'El usuario se actualizó satisfactoriamente');
    }
}
