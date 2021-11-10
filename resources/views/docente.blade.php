<x-app-layout>
    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- __('Name') --}}, Bienvenido!!!
        </h2-->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div> --}}
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <h4>Docente: <span>{{ $user->name }} {{ $user->lastname }}</span></h4>
                <h4 class="mx-auto" style="width: 200px;">Materias</h4>
                @if ($user->cursos->count())
                    @foreach ($user->cursos as $curso)
                        <div class="inline-flex mx-auto card" style="width: 15rem;">
                            <div class="card-body mx-auto">
                                <h5 class="card-title">{{ $curso->materia->nombre }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $curso->anio->nombre }}
                                    "{{ $curso->division->nombre }}"</h6>
                                <p class="card-text">{{ $curso->materia->descripcion }}</p>
                                <a href="{{ route('curso.show', ['id' => $curso->id]) }}"
                                    class="btn btn-primary card-link">Administrar curso</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No tiene cursos asignados</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
