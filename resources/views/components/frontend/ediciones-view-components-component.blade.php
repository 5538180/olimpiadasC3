<div>
     <strong>DINAMICAS</strong>
    <p>La siguiente es la relación de cursos en las que se han publicado los ejercicios de las últimas ediciones:</p>
    <ul>
        <li class="icon solid">
            <a href="https://cifpcarlos3.net/codeweek/course/view.php?id=13" target="_blank">
                <h4><b>XVI Olimpiadas</b> (Curso 2024-2025)</h4>
            </a>
        </li>
        <li class="icon solid">
            <a href="https://cifpcarlos3.net/codeweek/course/view.php?id=10" target="_blank">
                <h4><b>XV Olimpiadas</b> (Curso 2023-2024)</h4>
            </a>
        </li>
        <li class="icon solid">
            <a href="https://cifpcarlos3.net/codeweek/course/view.php?id=9" target="_blank">
                <h4><b>XIV Olimpiadas</b> (Curso 2022-2023)</h4>
            </a>
        </li>
        <li class="icon solid">
            <a href="https://cifpcarlos3.net/codeweek/course/view.php?id=7" target="_blank">
                <h4><b>XIII Olimpiadas</b> (Curso 2021-2022)</h4>
            </a>
        </li>
        <hr>
      <strong>DINAMICAS</strong>
              @foreach ($ediciones as $edicion)
            {{-- @if (!$edicion->curso) --}} {{-- * Si Edicion no tiene curso, salta a la siguiente iteracion,
                ? tambien podria hacerlo desde el conmponente que traiga solo los que tienen cursos --}}
            {{--     @continue

            @endif 
            * Al final lo hice en el componente (creo que tiene mas logica)
            --}}
            <li class="icon solid">
                <a href="{{'https://cifpcarlos3.net/codeweek/course/view.php?' . 'id=' . $edicion->curso?->id_curso_modle }}"
                    target="_blank">
                    <h4><b> Olimpiadas {{ $edicion->curso?->olimpiada }}</b> Curso : {{ $edicion->curso_escolar}}</h4>
                </a>
            </li>
        @endforeach
        
      
    </ul>
</div>