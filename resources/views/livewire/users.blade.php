<x-slot name="header">
    
    <h1 class="inline-flex text-gray-600">Gestionar Usuarios</h1>
</x-slot>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if (session()->has('message'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif 

            <div class="px-6 py-4 flex item-center">
            <x-jet-button wire:click="crear()">
                Crear Nuevo Usuario
            </x-jet-button>
            <x-jet-input class="flex-1 ml-4 mx-12" placeholder="Buscar..." type="text" wire:model="search" />
            
        </div>
            @if ($modal)
                @include('livewire.create-user')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">NOMBRE</th>
                        <th class="px-4 py-2">APELLIDO</th>
                        <th class="px-4 py-2">DNI</th>
                        <th class="px-4 py-2">ROL</th>
                        <th class="px-4 py-2">EMAIL</th>
                        {{-- <th class="px-4 py-2">PASSWORD</th> --}}
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->id }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->lastname }}</td>
                            <td class="border px-4 py-2">{{ $user->dni }}</td>
                            <td class="border px-4 py-2">{{ $user->rol }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            {{-- <td class="border px-4 py-2">{{ $user->password }}</td> --}}
                            <td class="border px-4 py-2 text-center">
                                <a class="cursor-pointer" wire:click="editar({{ $user->id }})">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="cursor-pointer" wire:click="borrar({{ $user->id }})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
