@extends('layout')
@section('titulo')
Sign in
@endsection
@section('contenido')
<form action="{{route('login.login')}}" method="POST">
    @csrf
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <br><br>
    <p>Don't have an account? <a href="{{route ('register.register')}}" class="text-blue">Sign Up Here</a></p>


    <button type="submit" class="btn btn-dark">Login</button>


  </form>

@endsection
