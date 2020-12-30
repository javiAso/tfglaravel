@extends('layout')
@section('titulo')
Update Story
@endsection
@section('contenido')



<form action="{{ route('story.saveStory')}}" method="POST" enctype="multipart/form-data">


    @csrf

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="storyName">Story name</label>
          <input type="text" class="form-control" id="storyName" name="storyName" placeholder="Nombre de la Story" value="{{$story->TITTLE}}">
        </div>
        <div class="form-group">
          <label for="storyFile">Select file</label><br>
          <input type="file" class="form-control-file" id="storyFile" name="storyFile">
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="storyDescription">Description</label><br>
          <textarea id="storyDescription" name="storyDescription" cols="30" rows="5">{{$story->DESCRIPTION}}</textarea>
        </div>
      </div>
    </div>
    <div class="row pl-4">
        <input type="hidden" name="codStory" id="codStory" value="{{$story->COD_STORY}}">
        <input type="hidden" name="codGame" id="codGame" value="{{$story->COD_GAME}}">
      <button type="submit" class="btn btn-dark">Save</button>
    </div>
  </form>
@endsection
