<h3>Datos de equipo </h3>
@foreach($equipment as $item)
   <li>
      {{ $item->NAME.' '.$item->PRICE }}
    </li>
@endforeach
