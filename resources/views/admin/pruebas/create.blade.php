<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Prueba') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('pruebas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="categorias_ediciones_id" class="block text-gray-700">Categorias ediciones id</label>
                            <input type="text" name="categorias_ediciones_id" id="categorias_ediciones_id" value="{{ old('categorias_ediciones_id') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="patrocinador_id" class="block text-gray-700">Patrocinadores</label>
                            <select name="patrocinador_id" id="patrocinador_id" class="w-full border-gray-300 rounded-md">
                                @foreach ($patrocinadores as $patrocinador)
                                    <option value="{{ $patrocinador->id }}">
                                        {{ $patrocinador->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- <input type="text" name="patrocinador_id" id="patrocinador_id" value="{{ old('patrocinador_id') }}" class="w-full border-gray-300 rounded-md">
                            -->
                        </div>
                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
