<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('cursos.update', ['curso' => $curso]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="id_curso_modle" class="block text-gray-700">ID curso Moodle</label>
                            <input type="number" name="id_curso_modle" id="id_curso_modle"
                                value="{{ old('id_curso_modle') ?? $curso->id_curso_modle }}" class="w-full border-gray-300 rounded-md" required min="1">
                        </div>
                        <div class="mb-4">
                            <label for="olimpiada" class="block text-gray-700">Olimpiada</label>
                            <input type="number" name="olimpiada" id="olimpiada" pattern="^[0-9]+$" title="Formato: un numero" value="{{ old('olimpiada') ?? $curso->olimpiada }}"
                                class="w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="edicion_id" class="block text-gray-700">Edición</label>
                            <input type="number" name="edicion_id" id="edicion_id" value="{{ old('edicion_id') ?? $curso->edicion_id }}"
                                class="w-full border-gray-300 rounded-md" required min="1">
                        </div>

                            {{--  <div class="mb-4">
                                <label for="css_file" class="block text-gray-700">File CSS</label>
                                <input type="file" name="css_file" id="css_file" class="w-full border-gray-300 rounded-md">
                            </div> --}}

                            <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
   {{--  @include('admin.curso._files', ['curso' => $curso]) --}}
</x-app-layout>
