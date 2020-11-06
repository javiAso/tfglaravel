@extends('layout')
@section('contenido')



<form action="{{ route('pj.store') }}" method="POST">

    @csrf

    <div class="form-group">
        <label for="characterName">Nombre del personaje</label>
        <input type="text" class="form-control" id="characterName" name="characterName"
            placeholder="Nombre del personaje">
    </div>
    <label>Atributos del personaje</label>
    <div class="form-group">
        <label for="characterStrength">Fuerza</label>
        <input type="text" class="form-control" id="characterStrength"  name="characterStrength"
            placeholder="Fuerza">
    </div>
    <div class="form-group">
        <label for="characterDexterity">Destreza</label>
        <input type="text" class="form-control" id="characterDexterity"  name="characterDexterity"
            placeholder="Destreza">
    </div>
    <div class="form-group">
        <label for="characterConstitution">Constitución</label>
        <input type="text" class="form-control" id="characterConstitution" name="characterConstitution"
            placeholder="Constitución">
    </div>
    <div class="form-group">
        <label for="characterIntelligence">Inteligencia</label>
        <input type="text" class="form-control" id="characterIntelligence" name="characterIntelligence"
            placeholder="Inteligencia">
    </div>
    <div class="form-group">
        <label for="characterWisdom">Sabiduría</label>
        <input type="text" class="form-control" id="characterWisdom" name="characterWisdom"
            placeholder="Sabiduría">
    </div>
    <div class="form-group">
        <label for="characterCharisma">Carisma</label>
        <input type="text" class="form-control" id="characterCharisma" name="characterCharisma"
            placeholder="Carisma">
    </div>
    <div class="form-group">
        <label for="raceSelection">Raza del personaje</label>
        <select class="custom-select" id="raceSelection" name="raceSelection">
            <option value="1">Elfo</option>
            <option value="2">Mediano</option>
            <option value="3">Enano</option>
            <option value="4">Humano</option>
        </select>
    </div>
    <div class="form-group">
        <label for="clasSelection">Clase del personaje</label>
        <select class="custom-select" id="classSelection" name="classSelection">
            <option value="1">Guerrero</option>
            <option value="2">Hechicero</option>
            <option value="3">Bribón</option>
        </select>
    </div>
    <div class="form-group">
        <label>Elije 4 de estas 6 habilidades:</label>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheckAlert" name="customCheckAlert">
            <label class="custom-control-label" for="customCheckAlert">Alerta</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheckCommunication" name="customCheckCommunication">
            <label class="custom-control-label" for="customCheckCommunication">Comunicacion</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheckManipulation" name="customCheckManipulation">
            <label class="custom-control-label" for="customCheckManipulation">Manipulacion</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheckErudition" name="customCheckErudition">
            <label class="custom-control-label" for="customCheckErudition">Erudicion</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheckSubterfuge" name="customCheckSubterfuge">
            <label class="custom-control-label" for="customCheckSubterfuge">Subterfugio</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheckSurvival" name="customCheckSurvival">
            <label class="custom-control-label" for="customCheckSurvival">Supervivencia</label>
        </div>
    </div>
    <div class="form-group">
        <label for="backGround">Trasfondo</label>
        <input type="text" class="form-control" id="backGround" name="backGround"
            placeholder="Trasfondo">
    </div>
    <div class="form-group">
        <label for="expPoints">Puntos exp.</label>
        <input type="text" class="form-control" id="expPoints" name="expPoints"
            placeholder="Puntos exp.">
    </div>
    <div class="form-group">
        <label for="lvl">Nivel</label>
        <input type="text" class="form-control" id="lvl" name="lvl" placeholder="nivel">
    <button type="submit" class="btn btn-dark">Guardar</button>
    </div>
</form>
@endsection
