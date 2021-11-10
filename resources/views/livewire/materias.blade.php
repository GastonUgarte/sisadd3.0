<x-slot name="header">
    <h1 class="text-gray-900">Gestionar Materias</h1>
</x-slot>

<div class="py-12">
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


            {{-- <button wire:click="crear()"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Crear Nueva Materia</button> --}}
            <x-jet-button wire:click="crear()">
                Crear Nueva Materia
            </x-jet-button>
            @if ($modal)
                @include('livewire.crear-materias')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">NOMBRE</th>
                        <th class="px-4 py-2">DESCRIPCION</th>
                        <th class="px-4 py-2">MODIFICAR/ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $materia)
                        <tr>
                            <td class="border px-4 py-2">{{ $materia->id }}</td>
                            <td class="border px-4 py-2">{{ $materia->nombre }}</td>
                            <td class="border px-4 py-2">{{ $materia->descripcion }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a class="cursor-pointer" wire:click="editar({{ $materia->id }})">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="cursor-pointer" wire:click="borrar({{ $materia->id }})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                {{-- <button wire:click="editar({{ $materia->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="borrar({{ $materia->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
