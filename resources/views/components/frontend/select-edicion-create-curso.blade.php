<div class="mb-4"{{-- * Practica con Alpine x-data="{ edicionSeleccionada: ''  }"--}}>
    <label for=" edicion_id" class="block text-gray-700">
    Edición
    </label>

    <select name="edicion_id" id="edicion_id" class="w-full border-gray-300 rounded-md" required
        x-model="edicionSeleccionada">

      {{--   <option value="">Selecciona una edicion</option> --}}

        @foreach ($ediciones as $edicion) 
        @if ($loop->first)  {{-- <- * Practica con metodo del iterador del foreach --}}
<option value="">Selecciona una edicion</option> 
        @endif
            <option  value="{{ $edicion->id }}">Edicion:id = {{ $edicion->id }} . 'Edicion' . {{ $edicion->curso_escolar }}
            </option>
        @endforeach
   {{--      <option value="manual">Selecciona una edición manualmente</option> --}}

    </select>

   {{--  /*  * Practica con Alpine  --}}
 {{--    <hr>
    <br>
<p x-text="edicionSeleccionada"></p>
<br>
    <div x-show="edicionSeleccionada === 'manual'">
        <label for="id_edicion" class="block text-gray-700">
            Edición id
        </label>
        <input name="id_edicion" type="number" placeholder="id de la edicion">
    </div>*/ --}}


</div>
