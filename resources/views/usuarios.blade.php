<h3>Datos de usuarios </h3>
@foreach($usuarios as $usuario)
   <li>
      {{ $usuario->nombre.' '.$usuario->apellido }}
    </li>
@endforeach
