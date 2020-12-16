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
                        <th>View sheet</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($PJs as $pj)
                    <tr>
                        <td class="font-weight-bold">{{$pj->NAME}}</td>
                        <td>
                            <form action="{{ route('listPJ.viewSheet',$pj->COD_PJ) }}" method="GET">
                                <button type="submit" class="btn btn-success">Go</button>
                            </form></td>
                        <td><button type="button" class="btn btn-danger">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <form action="gameList.html">
                <button type="submit" class="btn btn-dark">Game list</button>
            </form>

        </div>
        <div class="col">
            <div class="btn-group float-right" role="group" aria-label="Basic example">
                <form action="newChar.html">
                    <button type="submit" class="btn btn-dark">New character</button>
                </form>
            </div>
        </div>
    </div>
@stop
