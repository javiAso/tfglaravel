@extends('layout')
@section('titulo')
Tienda
@endsection
@section('contenido')
<div class="card">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Nombre item</th>
            <th>Precio</th>
            <th>Comprar</th>
          </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->NAME}}</td>
                <td>{{$item->PRICE}}</td>
                <td>
                    <form action="{{ route('eq.addItem') }}" method="POST">
                        @csrf
                        <input id="itemID" name="itemID" type="hidden" value="{{$item->COD_EQUIPMENT}}">
                        <button type="submit">Comprar</button>
                    </form>
                </td>
    @endforeach
        </tbody>
      </table>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Nombre item</th>
            <th>Precio</th>
            <th>Defensa</th>
            <th>Comprar</th>
          </tr>
        </thead>
        <tbody>
            @foreach($armors as $item)
            <tr>
                <td>{{$item->NAME}}</td>
                <td>{{$item->PRICE}}</td>
                <td>{{$item->DEFENSE}}</td>
                <td>
                    <form action="{{ route('eq.addItem') }}" method="POST">
                        @csrf
                        <input id="itemID" name="itemID" type="hidden" value="{{$item->COD_EQUIPMENT}}">
                        <button type="submit">Comprar</button>
                    </form>
                </td>
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
          <th>Comprar</th>
        </tr>
      </thead>
      <tbody>
          @foreach($weaponsM as $item)
          <tr>
              <td>{{$item->NAME}}</td>
              <td>{{$item->PRICE}}</td>
              <td>{{$item->DAMAGE}}</td>
              <td>
                <form action="{{ route('eq.addItem') }}" method="POST">
                    @csrf
                    <input id="itemID" name="itemID" type="hidden" value="{{$item->COD_EQUIPMENT}}">
                    <button type="submit">Comprar</button>
                </form>
            </td>
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
            <th>Comprar</th>
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
                <td>
                    <form action="{{ route('eq.addItem') }}" method="POST">
                        @csrf
                        <input id="itemID" name="itemID" type="hidden" value="{{$item->COD_EQUIPMENT}}">
                        <button type="submit">Comprar</button>
                    </form>
                </td>
              </tr>
      @endforeach
        </tbody>
      </table>
</div>
<div class="card">
    <table class="table">
        <thead class="dark">
            <tr>
                <th>item</th>
                <th>precio</th>
                <th>cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buyedItems as $item)
            <tr>
                <td>{{$item->NAME}}</td>
                <td>{{$item->PRICE}}</td>
                <td>{{$totalItems["$item->COD_EQUIPMENT"]}}</td>
            </tr>
            @endforeach

        </tbody>

    </table>
    {{$total}}
</div>

<a href="{{ route('listPJ.addEQ') }}">Finalizar compra</a>

@endsection

