<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Curso de la edicion') }} {{ $edicion->curso_escolar }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    @if (! $curso)
                        <a href="{{ route('ediciones.cursos.create', ['edicion' => $edicion]) }}" class="button primary mb-4">Crear Curso</a>
                    @endif
                    <a href="{{ route('ediciones.index') }}" class="button primary">Volver a Ediciones</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">URL</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($curso)
                                <tr>
                                    <td class="border px-4 py-2">{{ $curso->id }}</td>
                                    <td class="border px-4 py-2">{{ $curso->nombre }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ $curso->url }}" target="_blank" rel="noopener noreferrer" class="text-blue-500 underline">
                                            {{ $curso->url }}
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('ediciones.cursos.show', ['edicion' => $edicion, 'curso' => $curso]) }}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="{{ route('ediciones.cursos.edit', ['edicion' => $edicion, 'curso' => $curso]) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('ediciones.cursos.destroy', ['edicion' => $edicion, 'curso' => $curso]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="border px-4 py-2 text-center">Esta edicion no tiene curso asociado.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
