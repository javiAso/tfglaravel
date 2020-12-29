@extends('layout')
@section('titulo')
Sign in
@endsection
@section('contenido')
<form action="{{route('register.register')}}" method="POST">
    @csrf
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="username" type="text" class="form-control" name="username"
            placeholder="username">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="password"
            placeholder="Password">
    </div>


    <br><br>
    <button type="submit" class="btn btn-dark">Register</button>


  </form>

@endsection
