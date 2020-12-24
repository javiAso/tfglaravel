@extends('layout')
@section('titulo')
New Game
@endsection
@section('contenido')



<form action="{{ route('game.store') }}" method="POST">

    @csrf

    <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="storyName">Game tittle</label>
            <input type="text" class="form-control" id="gameName" name="gameName" placeholder="Game tittle" value="{{$game->TITTLE}}">
          </div>
          <div class="form-group">
            <label for="gameFile">Select image</label><br>
            <input type="file" class="form-control-file" id="gameFile" name="gameFile">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="gameDescription">Game introduction</label><br>
            <textarea id="gameDescription" name="gameDescription" cols="30" rows="5" placeholder="Write an introduction for your new game">{{$game->INTRO}}</textarea>
          </div>
        </div>
      </div>
      <div class="row pl-4">
        <input type="hidden" id="cod_game" name="cod_game" value="{{$game->COD_GAME}}">
        <button type="submit" class="btn btn-dark">Save</button>
        <a href="{{route('listgame.viewList')}}" class="btn btn-dark ml-4">Back</a>
      </div>
  </form>
@endsection
