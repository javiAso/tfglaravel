@extends('layout')
@section('titulo')
Tienda
@endsection
@section('contenido')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Nombre item</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{$item->NAME}}</td>
            <td>{{$item->PRICE}}</td>
          </tr>
@endforeach
    </tbody>
  </table>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Nombre item</th>
        <th>Precio</th>
        <th>Defensa</th>
      </tr>
    </thead>
    <tbody>
        @foreach($armors as $item)
        <tr>
            <td>{{$item->NAME}}</td>
            <td>{{$item->PRICE}}</td>
            <td>{{$item->DEFENSE}}</td>
          </tr>
@endforeach
    </tbody>
  </table>
</table>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Nombre item</th>
      <th>Precio</th>
      <th>Daño</th>
    </tr>
  </thead>
  <tbody>
      @foreach($weaponsM as $item)
      <tr>
          <td>{{$item->NAME}}</td>
          <td>{{$item->PRICE}}</td>
          <td>{{$item->DAMAGE}}</td>
        </tr>
@endforeach
  </tbody>
</table>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Nombre item</th>
        <th>Precio</th>
        <th>Daño</th>
        <th>Tiros</th>
        <th>Alcance</th>
      </tr>
    </thead>
    <tbody>
        @foreach($weaponsR as $item)
        <tr>
            <td>{{$item->NAME}}</td>
            <td>{{$item->PRICE}}</td>
            <td>{{$item->DAMAGE}}</td>
            <td>{{$item->SHOTS}}</td>
            <td>{{$item->RANG}}</td>
          </tr>
  @endforeach
    </tbody>
  </table>
@endsection

