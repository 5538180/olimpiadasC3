<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="edicion_id" class="block text-gray-700">edicion_id</label>
                            <input type="number" name="edicion_id" id="edicion_id" value="{{ old('edicion_id') }}"
                                class="w-full border-gray-300 rounded-md" required min="1">
                        </div>
                        <div class="mb-4">
                            <label for="enlace_curso_modle" class="block text-gray-700">enlace_curso_modle</label>
                            <input type="text" name="enlace_curso_modle" id="enlace_curso_modle"
                                value="{{ old('enlace_curso_modle') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="olimpiada" class="block text-gray-700">olimpiada</label>
                            <input type="number" name="olimpiada" id="olimpiada" pattern="^[0-9]+$" title="Formato: un numero" value="{{ old('olimpiada')}}"
                                class="w-full border-gray-300 rounded-md" required>
                        </div>
         
                        <div class="mb-4">
                            <div class="mb-4">
                                <label for="curso" class="block text-gray-700">curso</label>
                                <input type="text" name="curso" id="curso" value="{{ old('curso') }}"
                                    pattern="^20[0-9]{2}-20[0-9]{2}$" title="Introduce el curso con formato 2024-2025"
                                    class="w-full border-gray-300 rounded-md" placeholder="2024-2025" required>
                            </div>

                            <input type="submit" class="primary" value="Guardar" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>