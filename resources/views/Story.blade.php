@extends('layout')
@section('titulo')
{{$story->TITTLE}}
@endsection
@section('contenido')

<div class="card">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <p>{{$story->DESCRIPTION}}</p>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-3"></div>
        <div class="col-3">
            <label for="" class="ml-5">Story file: </label>
        </div>
        <div class="col-3">

            <a href="#" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-file"></span> File
              </a>
        </div>
    </div>
</div>
</div>
<div class="row pl-4 mt-4">
    <div class="col-10">
        <a href="{{route ('story.updateStory',$story->COD_STORY)}}" class="btn btn-dark">Update</a>
        <a href="{{route ('listGame.viewGame',$story->COD_GAME)}}" class="btn btn-dark">Back</a>
    </div>
    <div class="col-2">
        <form action="{{route ('listgame.viewList')}}" method="post">
            @csrf
            <input type="hidden" name="deleteStory" id="deleteStory" value="{{$story->COD_STORY}}">
            <input type="hidden" name="COD_GAME" id="COD_GAME" value="{{$story->COD_GAME}}">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

</div>

@endsection
