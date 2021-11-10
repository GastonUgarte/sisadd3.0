{{-- <div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear Nuevo Usuario
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        
        <x-slot name="title">
            Crear Nuevo Usuario
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Name" />
                <x-jet-input type="text" class="w-full" wire:model="name" />

                <x-jet-input-error for="name" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Lastname" />
                <x-jet-input type="text" class="w-full" wire:model="lastname" />

                <x-jet-input-error for="lastname" />
            </div>
            <div class="mb-4">
                <x-jet-label value="DNI" />
                <x-jet-input type="text" class="w-full" wire:model="dni" />

                <x-jet-input-error for="dni" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Rol" />
                <select wire:model="rol" name="rol" class=" w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    {{--<option selected> Selleccione rol </option>
                    <option selected value="Alumno">Alumno</option>
                    <option value="Administrador">Administrador</option> 
                    <option value="Directivo">Directivo</option> 
                    <option value="Docente">Docente</option>
                </select>
               
            </div>
            <div class="mb-4">
                <x-jet-label value="Email" />
                <x-jet-input type="text" class="w-full" wire:model.defer="email" />

                <x-jet-input-error for="email" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Password" />
                <x-jet-input type="text" class="w-full" wire:model.defer="password"/>

                <x-jet-input-error for="password" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click.prevent="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            {{--<x-jet-danger-button wire:click="save" wire:loanding.attr="disabled" wire:target="save" class="disabled:opacity-25">
            <x-jet-danger-button wire:click.prevent="save">
                Crear Usuario
            </x-jet-danger-button>

            {{--<span wire:loanding wire:target="save">Cargando ...</span>
        </x-slot>
        
    </x-jet-dialog-modal>
</div> --}}
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="descripcion" wire:model.lazy="name">
                            @error('name')
                                <div>{{$message}}</div>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cantidad" wire:model.lazy="lastname">
                            @error('lastname')
                                <div>{{$message}}</div>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">DNI:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cantidad" wire:model.lazy="dni">
                            @error('dni')
                                <div>{{$message}}</div>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
                        <select wire:model.lazy="rol" name="rol"
                            class=" w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option selected value="">Seleccione el rol</option>
                            <option value="Alumno">Alumno</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Directivo">Directivo</option>
                            <option value="Docente">Docente</option>
                        </select>
                        {{-- <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cantidad" wire:model="rol"> --}}
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cantidad" wire:model.lazy="email">
                            @error('email')
                                <div>{{$message}}</div>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cantidad" wire:model.lazy="password">
                            @error('password')
                                <div>{{$message}}</div>
                            @enderror
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
                            {{-- <button wire:click="cerrarModal()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button> --}}
                        </span>
                    </div>

                </div>
            
        </div>


    </div>
</div>
