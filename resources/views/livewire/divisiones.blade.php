<x-slot name="header">
    <h1 class="text-gray-900">Años y Divisiones</h1>

    <a href="{{ route('anios') }}"
        class="inline-flex pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition">Año</a>
    <a href="{{ route('divisiones') }}"
        class="inline-flex pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition">Divisiones</a>
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
            <div class="px-6 py-4 flex item-center">
                <x-jet-button wire:click="crear()">
                Crear Nueva División
            </x-jet-button>
            <x-jet-input class="flex-1 ml-4 mx-12" placeholder="Buscar..." type="text" wire:model="search" />
            </div>
            @if ($modal)
                @include('livewire.crear-divisiones')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">DIVISION</th>
                        <th class="px-4 py-2">MODIFICAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisiones as $division)
                        <tr>
                            <td class="border px-4 py-2">{{ $division->id }}</td>
                            <td class="border px-4 py-2">{{ $division->nombre }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a class="cursor-pointer" wire:click="editar({{ $division->id }})">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {{-- <a class="cursor-pointer" wire:click="borrar({{ $anio->id }})">
                                    <i class="far fa-trash-alt"></i>
                                </a> --}}
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
