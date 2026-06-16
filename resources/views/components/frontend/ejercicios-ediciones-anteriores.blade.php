<div class="container">
    <h3>Ejercicios Ediciones Anteriores</h3>
    <p>Los ejercicios propuestos en las ediciones anteriores están publicados en un aula virtual a la que se accede con
        las siguientes credenciales:</p>
    <ul class="feature-icons">
        <li class="icon solid fa-user">
            <h4><b>Alumno de Grado Medio</b></h4>
            <ul>
                <li>Usuario: olimpiadas_gm</li>
                <li>Contraseña: olimpiadas_G1</li>
            </ul>
        </li>
        <li class="icon solid fa-user">
            <h4><b>Alumno de Grado Superior</b></h4>
            <ul>
                <li>Usuario: olimpiadas_gs</li>
                <li>Contraseña: olimpiadas_G2</li>
            </ul>
        </li>
    </ul>
    <p>La siguiente es la relación de ediciones en las que se han publicado los ejercicios de las últimas ediciones:</p>
    <ul>
        {{--  {{dd($edicionesYcursos)}} --}}
        @foreach ($edicionesYcursos as $edicionYcurso)
        
            @if ($edicionYcurso->curso?->url)
                <li class="icon solid">
                    <a href={{ $edicionYcurso->curso?->url }} target="_blank">
                        <h4><b>{{ $edicionYcurso->curso->nombre }}</b> (Curso
                            {{ $categoria->convertirARomano($loop->iteration) }})</h4>
                    </a>
                </li>
            @endif
        @endforeach

    </ul>

</div>
