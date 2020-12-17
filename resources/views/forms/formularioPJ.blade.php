@extends('layout')
@section('contenido')



<form action="{{ route('pj.store') }}" method="POST">

    @csrf

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label>Character Name</label><br>
          <input type="text" placeholder="Place here your character name" id="characterName" name="characterName">
        </div>
        <div class="form-group">
          <label>Character Race</label><br>
          <select class="custom-select" id="raceSelection" name="raceSelection">
            <option value="1">Elfo</option>
            <option value="2">Mediano</option>
            <option value="3">Enano</option>
            <option value="4">Humano</option>
        </select>
        </div>
        <div class="form-group">
          <label>Character Class</label><br>
          <select class="custom-select" id="classSelection" name="classSelection">
            <option value="1">Guerrero</option>
            <option value="2">Hechicero</option>
            <option value="3">Bribón</option>
        </select>
        </div>
        <div class="form-group">
          <label>Character background</label><br>
          <input type="text" placeholder="Place here your character background" id="backGround" name="backGround">
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>XP:</label><br>
              <input type="number" placeholder="px" id="expPoints" name="expPoints" min="0">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>lvl:</label><br>
              <input type="number" placeholder="lvl" id="lvl" name="lvl" min="0">
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label>Choose 6 of those abilities:</label><br>
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col">
                  <input type="checkbox" name="alert" id="alert">
                  <label for="alert"> alert</label>
                </div>
                <div class="col">
                  <input type="checkbox" name="communication" id="communication">
                  <label for="communication"> communication</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col">
                  <input type="checkbox" name="manipulation" id="manipulation">
                  <label for="manipulation"> manipulation</label>
                </div>
                <div class="col">
                  <input type="checkbox" name="erudition" id="erudition">
                  <label for="erudition"> erudition</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col">
                  <input type="checkbox" name="subterfuge" id="subterfuge">
                  <label for="subterfuge"> subterfuge</label>
                </div>
                <div class="col">
                  <input type="checkbox" name="survival" id="survival">
                  <label for="survival"> survival</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label>Attributes:</label><br>
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col mb-3">
                    <input type="number" placeholder="Strenght" id="characterStrength"  name="characterStrength" min="0">
                  </div>
                  <div class="col mb-3">
                    <input type="number" placeholder="Dexterity" id="characterDexterity"  name="characterDexterity" min="0">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col mb-3">
                    <input type="number" placeholder="Constitution" id="characterConstitution" name="characterConstitution" min="0">
                  </div>
                  <div class="col mb-3">
                    <input type="number" placeholder="Wisdom" id="characterWisdom" name="characterWisdom" min="0">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col mb-3">
                    <input type="number" placeholder="Intelligence" id="characterIntelligence" name="characterIntelligence" min="0">
                  </div>
                  <div class="col mb-3">
                    <input type="number" placeholder="Charisma" id="characterCharisma" name="characterCharisma" min="0">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row pl-4">
      <button type="submit" class="btn btn-dark">Save</button>
      <button type="submit" class="btn btn-dark">Save</button>
    </div>
  </form>
@endsection
