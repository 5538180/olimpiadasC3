<div>
    @foreach ($puntuacionesUsuario as $puntuacion)

    
        <tr>
   
            <td>Los puntos son: {{ $puntuacion->puntos }}</td>
            <td>Comentario: {{ $puntuacion->comentario }}</td>
            <td>La fecha: {{ $puntuacion->timestamps }}</td>
         
        </tr>

    @endforeach
</div>