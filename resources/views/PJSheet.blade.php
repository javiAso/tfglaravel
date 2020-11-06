@extends('layout')
@section('titulo')
{{$PJ->NAME}}
@endsection
@section('contenido')


<label><b>Raza: </b>{{$raceName->NAME}}</label>
<label><b>Clase: </b>{{$className->NAME}}</label>
<label><b>Trasfondo: </b>{{$PJ->BACKGROUND}}</label>
<label><b>Nivel: </b>{{$PJ->LEVEL}}</label>
<label><b>XP: </b>{{$PJ->XP}}</label>

<hr>

<label>Habilidades:</label><br>

<label><b>Alerta: </b>{{$PJ->ALERT}}</label>
<label><b>Comunicación: </b>{{$PJ->COMMUNICATION}}</label>
<label><b>Manipulación: </b>{{$PJ->MANIPULATION}}</label>
<label><b>Erudición: </b>{{$PJ->ERUDITION}}</label>
<label><b>Subterfugio: </b>{{$PJ->SUBTERFUGE}}</label>
<label><b>Supervivencia: </b>{{$PJ->SURVIVAL}}</label>

<hr>

<label>Atributos:</label><br>

<label><b>Fuerza: </b>{{$PJ->STRENGTH}}</label>
<label><b>Destreza: </b>{{$PJ->DEXTERITY}}</label>
<label><b>Constitución: </b>{{$PJ->CONSTITUTION}}</label>
<label><b>Inteligencia: </b>{{$PJ->INTELLIGENCE}}</label>
<label><b>Sabiduría: </b>{{$PJ->WISDOM}}</label>
<label><b>Carisma: </b>{{$PJ->CHARISMA}}</label>

<hr>

<label>Rasgos:</label><br>

<label><b>Puntos de vida: </b>{{$PJ->PV}}</label>
<label><b>Movimiento: </b>{{$PJ->MOVEMENT}} metros</label>
<label><b>Defensa: </b>{{$PJ->DEFENSE}}</label>
<label><b>Ataque cuerpo a cuerpo: </b>{{$PJ->ATTACKM}}</label>
<label><b>Ataque a distancia: </b>{{$PJ->ATTACKR}}</label>
<label><b>Instintos: </b>{{$PJ->INSTINCT}}</label>
<label><b>Poder: </b>{{$PJ->POWER}}</label>

<hr>

<label>Talentos: </label><br>

@foreach ($talents as $talent)
<label><b>{{$talent->NAME}}:  </b>{{$talent->DESCRIPTION}}</label>
@endforeach

<a href="{{ route('eq.store')}}"><button class="btn btn-dark">Comprar equipo</button></a>


@endsection
