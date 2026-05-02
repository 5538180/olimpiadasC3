<div>
     <p>La siguiente es la relación de cursos en las que se han publicado los ejercicios de las últimas ediciones:</p>
    <ul>
        @foreach ($ediciones as $edicion )
        
        <li class="icon solid">

            <a href="{{ $edicion->curso->enlace_curso_modle != null  ? $edicion->curso->enlace_curso_modle : 'Enlace a pincho'  }}" target="_blank">
                <h4><b>XVI Olimpiadas {{ $loop->iteration }}</b>Curso : {{ $edicion->curso_escolar }}</h4>
            </a>
        </li>
        @endforeach
     
    </ul>
</div>
