@extends('layout')
@section('titulo')
User name
@endsection
@section('contenido')

    <div class="card">

        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Race</th>
                        <th>Class</th>
                        <th>Level</th>
                        <th>View sheet</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($PJs as $pj)
                    <tr>
                        <td class="font-weight-bold">{{$pj->NAME}}</td>
                        <td class="font-weight-bold">{{$pj->RACE}}</td>
                        <td class="font-weight-bold">{{$pj->CLASS}}</td>
                        <td class="font-weight-bold">{{$pj->LEVEL}}</td>
                        <td>
                            <form action="{{ route('listPJ.viewSheet',$pj->COD_PJ) }}" method="GET">
                                <button type="submit" class="btn btn-success">Go</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">

                <a href="{{route('listgame.viewList')}}" class="btn btn-dark">Game list</a>


        </div>
        <div class="col">
            <div class="btn-group float-right" role="group" aria-label="Basic example">
                <form action="newChar.html">
                    <a href="{{route('sheet.newSheet')}}" class="btn btn-dark">New character</a>
                </form>
            </div>
        </div>
    </div>
@stop
