@extends('layout')
@section('titulo')
{{$game->TITTLE}}
@endsection
@section('contenido')

    <div class="card-deck">
      <div class="row">
        <div class="col-8">
          <div class="card w-100">
            <div class="card-header">
              <h4 class="text-center font-weight-bold">Game introduction</h4>
            </div>

            <div class="card-body">
              <p class="card-text">{{$game->INTRO}}</p>
            </div>
          </div>
        </div>
        <div class="col-2">
            <div class="card w-100">
                <div class="card-header">
                    <p class="text-center font-weight-bold">Game code</p>
                  </div>

                  <div class="card-body">
                    <p class="card-text">Share it¡ : <b>{{$game->COD_GAME}}</b></p>
                  </div>
            </div>
          </div>
        <div class="col-2">
          <div class="card w-100">
            <img class="card-img" src="/images/pathToYourImage.png">
            <div class="card-img-overlay">
              <p class="card-text">Game img</p>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="card mt-4">
      <div class="card-header font-weight-bold">
        Listado de personajes
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Player Name</th>
              <th>PJ Name</th>
              <th>PJ Race</th>
              <th>PJ Class</th>
              <th>Level</th>
              <th>Sheet</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pjs as $pj)
            <tr>
              <td class="font-weight-bold">{{$pj->USERNAME}}</td>
              <td class="font-weight-bold">{{$pj->NAME}}</td>
              <td class="font-weight-bold">{{$pj->RACE}}</td>
              <td class="font-weight-bold">{{$pj->CLASS}}</td>
              <td class="font-weight-bold">{{$pj->LEVEL}}</td>
              <td>
                <form action="{{ route('listPJ.viewSheet',$pj->COD_PJ)}}" method="GET">
                    <button type="submit" class="btn btn-success">Go</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-columns mt-4">
      <div class="card">
        <div class="card-header">
          <h6 class="font-weight-bold">Story title</h6>
        </div>
        <div class="card-body">
          <h6 class="card-title text-secondary">Uploaded by player</h6>
          <p class="card-text">
            Aquí irá una breve información sobre lo que se puede ver en la
            story que haya subido un jugador.
          </p>
          <button type="button" class="btn btn-info">Go story</button>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h6 class="font-weight-bold">Story title</h6>
        </div>
        <div class="card-body">
          <h6 class="card-title text-secondary">Uploaded by player</h6>
          <p class="card-text">
            Aquí irá una breve información sobre lo que se puede ver en la
            story que haya subido un jugador.
          </p>
          <button type="button" class="btn btn-info">Go story</button>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h6 class="font-weight-bold">Story title</h6>
        </div>
        <div class="card-body">
          <h6 class="card-title text-secondary">Uploaded by player</h6>
          <p class="card-text">
            Aquí irá una breve información sobre lo que se puede ver en la
            story que haya subido un jugador.
          </p>
          <button type="button" class="btn btn-info">Go story</button>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h6 class="font-weight-bold">Story title</h6>
        </div>
        <div class="card-body">
          <h6 class="card-title text-secondary">Uploaded by player</h6>
          <p class="card-text">
            Aquí irá una breve información sobre lo que se puede ver en la
            story que haya subido un jugador.
          </p>
          <button type="button" class="btn btn-info">Go story</button>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h6 class="font-weight-bold">Story title</h6>
        </div>
        <div class="card-body">
          <h6 class="card-title text-secondary">Uploaded by player</h6>
          <p class="card-text">
            Aquí irá una breve información sobre lo que se puede ver en la
            story que haya subido un jugador.
          </p>
          <button type="button" class="btn btn-info">Go story</button>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h6 class="font-weight-bold">Story title</h6>
        </div>
        <div class="card-body">
          <h6 class="card-title text-secondary">Uploaded by player</h6>
          <p class="card-text">
            Aquí irá una breve información sobre lo que se puede ver en la
            story que haya subido un jugador.
          </p>
          <button type="button" class="btn btn-info">Go story</button>
        </div>
      </div>
    </div>
    <div class="row pl-4 mt-4">
        <div class="col">

            <a href=""><button class="btn btn-dark ml-4">New Story</button></a>
            <a href="{{ route('listgame.viewList')}}"><button class="btn btn-dark ml-4">Back</button></a>
        </div>


    </div>




@endsection