<div>
    <a class="btn btn-green" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name='title'>
            Editar el Usuario
        </x-slot>
        <x-slot name='content'>

            <div class="mb-4">
                <x-jet-label value="Name" />
                <x-jet-input wire:model="user.name" type="text" class="w-full" />

            </div>
            <div class="mb-4">
                <x-jet-label value="Lastname" />
                <x-jet-input wire:model="user.lastname" type="text" class="w-full" />

            </div>
            <div class="mb-4">
                <x-jet-label value="DNI" />
                <x-jet-input wire:model="user.dni" type="text" class="w-full" />

            </div>
            <div class="mb-4">
                <x-jet-label value="Rol" />
                <select wire:model="user.rol" name="ROL"
                    class=" w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    {{-- <option selected> Selleccione rol </option> --}}
                    <option selected value="Alumno">Alumno</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Directivo">Directivo</option>
                    <option value="Docente">Docente</option>
                </select>

            </div>
            <div class="mb-4">
                <x-jet-label value="Email" />
                <x-jet-input wire:model="user.email" type="text" class="w-full" />

            </div>
            <div class="mb-4">
                <x-jet-label value="Password" />
                <x-jet-input wire:model="user.password" type="text" class="w-full" />

            </div>

        </x-slot>
        <x-slot name='footer'>

            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loanding.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
