<x-slot name="header">
    <h1 class="text-gray-900">Gestionar Cursos</h1>
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

            <div class="px-6 py-4 flex item-center">
                <x-jet-button wire:click="crear()">
                    Crear Curso
                </x-jet-button>

            </div>

            @if ($modal)
                {{-- @include('livewire.crear-materias') --}}
                <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <form>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="mb-4">
                                        <label for="descripcion"
                                            class="block text-gray-700 text-sm font-bold mb-2">Año:</label>
                                        <select wire:model="id_anio" class="form-control">
                                            <option>Seleccione el año</option>
                                            @foreach ($anios as $anio)
                                                <option {{ $id_anio == $anio->id ? 'selected' : '' }}
                                                    value="{{ $anio->id }}">{{ $anio->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="descripcion"
                                            class="block text-gray-700 text-sm font-bold mb-2">División:</label>
                                        <select wire:model="id_division" class="form-control">
                                            <option>Seleccione la división</option>
                                            @foreach ($divisiones as $division)
                                                <option {{ $id_division == $division->id ? 'selected' : '' }}
                                                    value="{{ $division->id }}">
                                                    {{ $division->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="descripcion"
                                            class="block text-gray-700 text-sm font-bold mb-2">Materia:</label>
                                        <select wire:model="id_materia" class="form-control">
                                            <option>Seleccione la materia</option>
                                            @foreach ($materias as $materia)
                                                <option {{ $id_materia == $materia->id ? 'selected' : '' }}
                                                    value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <x-jet-button wire:click.prevent="guardar()">
                                                Guardar
                                            </x-jet-button>
                                        </span>

                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <x-jet-danger-button wire:click="cerrarModal()">
                                                Cancelar
                                            </x-jet-danger-button>
                                        </span>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            @if ($modalDocentes)
                <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <form>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                                    @foreach ($users as $user)
                                        @if ($user->rol == 'Docente')
                                            <input type="checkbox" wire:model="selectedDocentes"
                                                value="{{ $user->id }}">
                                            <label>{{ $user->name }} {{ $user->lastname }}</label>

                                        @endif
                                    @endforeach

                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <x-jet-button wire:click.prevent="guardarDocentes()">
                                                Guardar
                                            </x-jet-button>
                                        </span>

                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <x-jet-danger-button wire:click="cerrarModalDocentes()">
                                                Cancelar
                                            </x-jet-danger-button>
                                        </span>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            @if ($modalAlumnos)
                <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <form>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                                    @foreach ($users as $user)
                                        @if ($user->rol == 'Alumno')
                                            <input type="checkbox" wire:model="selectedAlumnos"
                                                value="{{ $user->id }}">
                                            <label>{{ $user->name }} {{ $user->lastname }}</label>

                                        @endif
                                    @endforeach

                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <x-jet-button wire:click.prevent="guardarAlumnos()">
                                                Guardar
                                            </x-jet-button>
                                        </span>

                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <x-jet-danger-button wire:click="cerrarModalAlumnos()">
                                                Cancelar
                                            </x-jet-danger-button>
                                        </span>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">

                        <th class="px-4 py-2">AÑO</th>
                        <th class="px-4 py-2">DIVISIÓN</th>
                        <th class="px-4 py-2">MATERIA</th>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>

                            <td class="border px-4 py-2">{{ $curso->anio->nombre }}</td>
                            <td class="border px-4 py-2">{{ $curso->division->nombre }}</td>
                            <td class="border px-4 py-2">{{ $curso->materia->nombre }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a class="cursor-pointer" wire:click="editar({{ $curso->id }})">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="cursor-pointer" wire:click="borrar({{ $curso->id }})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>
                                {{-- <a href="{{ route('docentes') }}">
                                    <i class="fas fa-edit">
                                        @livewire('agregar-docentes', ['curso' => $curso])
                                    </i>
                                </a> --}}
                                <a wire:click="agregarDocentes({{ $curso->id }})" class="btn btn-dark">Agregar
                                    Docentes</a>
                                <a wire:click="agregarAlumnos({{ $curso->id }})" class="btn btn-dark">Agregar
                                    Alumnos</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
