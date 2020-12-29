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
        @foreach ($stories as $story)
      <div class="card">
        <div class="card-header">
          <h6 class="font-weight-bold">{{$story->TITTLE}}</h6>
        </div>
        <div class="card-body">
          <h6 class="card-title text-secondary">Uploaded by player</h6>
          <p class="card-text">
            {{$story->DESCRIPTION}}
          </p>

          <a href="{{route ('story.viewStory',$story->COD_STORY)}}" class="btn btn-info">Go story</a>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row pl-4 mt-4">
        <div class="col-10">

            <a href="{{ route('story.newStory',$game->COD_GAME)}}"><button class="btn btn-dark ml-4">New Story</button></a>
            <a href="{{ route('game.updateGame',$game->COD_GAME)}}" class="btn btn-dark ml-1">Update</a>
            <a href="{{ route('listgame.viewList')}}"><button class="btn btn-dark ml-4">Back</button></a>
        </div>

        <div class="col-2">
            <form action="{{ route('listgame.viewList')}}" method="post">
                @csrf
                <input type="hidden" name="delete_GAME" id="delete_GAME" value="{{$game->COD_GAME}}">
                <button type="submit" class="btn btn-danger ml-4">Delete</button>
            </form>
        </div>


    </div>




@endsection
