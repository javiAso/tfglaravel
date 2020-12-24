@extends('layout')
@section('titulo')
User name
@endsection
@section('contenido')


    <div class="card">
        <div class="col text-center"><h3 >Games owned</h3></div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Game tittle</th>
                        <th>Game master</th>
                        <th>View game</th>
                        <th>Leave game</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gamesOwned as $game)
                    <tr>
                        <td class="font-weight-bold">{{$game->TITTLE}}</td>
                        <td class="font-weight-bold">{{$master->USERNAME}}</td>
                        <td>
                            <form action="{{ route('listGame.viewGame',$game->COD_GAME) }}" method="GET">
                                <button type="submit" class="btn btn-success">Go</button>
                            </form>
                        </td>
                        <td><button type="button" class="btn btn-danger">Leave</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col text-center"><h3 >Games currently playing</h3></div>

        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Game tittle</th>
                        <th>Game master</th>
                        <th>View game</th>
                        <th>Leave game</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gamesPlayed as $game)
                    <tr>
                        <td class="font-weight-bold">{{$game->TITTLE}}</td>
                        <td class="font-weight-bold">{{$game->USERNAME}}</td>
                        <td>
                            <form action="{{ route('listGame.viewGame',$game->COD_GAME) }}" method="GET">
                                <button type="submit" class="btn btn-success">Go</button>
                            </form>
                        </td>
                        <td><button type="button" class="btn btn-danger">Leave</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <a href="{{route('listPJ.viewList')}}" class="btn btn-dark">User sheets</a>

            <div class="btn-group float-right" role="group" aria-label="Basic example">
                <a href="{{route('game.newGame')}}" class="btn btn-dark">Create game</a>
            </div>
        </div>
    </div>

@stop
