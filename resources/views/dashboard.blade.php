<x-app-layout>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div> --}}
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-1">
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                        <i class="fas fa-users"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('users') }}"
                                    class="underline text-gray-900 dark:text-white">Usuarios</a>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                        <i class="fas fa-divide"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('anios') }}"
                                    class="underline text-gray-900 dark:text-white">Años y Divisiones</a>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                        <i class="fas fa-book"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('materias') }}"
                                    class="underline text-gray-900 dark:text-white">Materias</a>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                        <i class="fas fa-signature"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"><a
                                    href="{{ route('cursos') }}"
                                    class="underline text-gray-900 dark:text-white">Cursos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
