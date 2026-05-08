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



                    <form action="{{ route('cursos.store') }}" method="POST">
                        @csrf



                        <div class="mb-4">
                            <label for="id_curso_modle" class="block text-gray-700">
                                ID curso Moodle
                            </label>

                            <input type="number" name="id_curso_modle" id="id_curso_modle"
                                class="w-full border-gray-300 rounded-md" required min="1">


                        </div>

                        <div class="mb-4">
                            <label for="olimpiada" class="block text-gray-700">
                                Olimpiada
                            </label>

                            <input type="number" name="olimpiada" id="olimpiada"
                                class="w-full border-gray-300 rounded-md" required min="1"
                                title="Ejemplo: 16 para la XVI Olimpiada">

                        </div>
            <x-frontend.select-edicion-create-curso></x-frontend.select-edicion-create-curso>

                        <input type="submit" class="primary" value="Guardar">
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
