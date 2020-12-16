@extends('layout')
@section('titulo')
Shop
@endsection
@section('contenido')
<div class="card">
    <div class="row">
        <div class="col-9">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Item name</th>
                <th>Price</th>
                <th>Buy</th>
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
                          <button type="submit" class="btn btn-info">Buy</button>
                      </form>
                  </td>
              @endforeach
          </tbody>
          </table>
        </div>
        <div class="col-3">
            <div class="sticky-top">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>Item name</th>
                        <th>Price</th>
                        <th>Quantity</th>
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
                        <tr>
                            <td colspan="3"><label>Total compra:</label> {{$total}}</td>
                        </tr>
                    </tbody>
                  </table>
                  <div>

                      <a href="{{ route('listPJ.addEQ') }}"><button type="submit" class="btn btn-dark">End shopping</button></a>

                  </div>
            </div>

        </div>

      </div>
      <div class="row">
          <div class="col-9">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Item name</th>
                  <th>Price</th>
                  <th>Defense</th>
                  <th>Buy</th>
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
                              <button type="submit" class="btn btn-info">Comprar</button>
                          </form>
                      </td>
                    </tr>
          @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-3">
          </div>
      </div>
        <div class="row">
          <div class="col-9">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Item name</th>
                  <th>Price</th>
                  <th>Damage</th>
                  <th>Buy</th>
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
                            <button type="submit" class="btn btn-info">Comprar</button>
                        </form>
                    </td>
                    </tr>
            @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-3">
          </div>
        </div>
        <div class="row">
          <div class="col-9">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Item name</th>
                  <th>Price</th>
                  <th>Damage</th>
                  <th>Shots</th>
                  <th>Range</th>
                  <th>Buy</th>
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
                              <button type="submit" class="btn btn-info">Comprar</button>
                          </form>
                      </td>
                    </tr>
            @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-3">
          </div>
        </div>
</div>


@endsection

