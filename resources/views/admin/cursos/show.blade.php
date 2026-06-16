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
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <th class="border px-4 py-2 text-left">ID</th>
                                <td class="border px-4 py-2">{{ $curso->id }}</td>
                            </tr>
                            <tr>
                                <th class="border px-4 py-2 text-left">Nombre</th>
                                <td class="border px-4 py-2">{{ $curso->nombre }}</td>
                            </tr>
                            <tr>
                                <th class="border px-4 py-2 text-left">URL</th>
                                <td class="border px-4 py-2">
                                    <a href="{{ $curso->url }}" target="_blank" rel="noopener noreferrer" class="text-blue-500 underline">
                                        {{ $curso->url }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <a href="{{ route('ediciones.cursos.edit', ['edicion' => $edicion, 'curso' => $curso]) }}" class="btn btn-sm btn-warning">Editar</a>
                        <a href="{{ route('ediciones.cursos.index', ['edicion' => $edicion]) }}" class="button primary">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
