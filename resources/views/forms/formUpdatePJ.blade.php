@extends('layout')
@section('contenido')



<form action="{{ route('pj.store') }}" method="POST">

    @csrf

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label>Character Name</label><br>
          <input type="text" placeholder="{{$PJ->NAME}}" id="characterName" name="characterName" value="{{$PJ->NAME}}">
        </div>
        <div class="form-group">
          <label>Character Race</label><br>
          <select class="custom-select" id="raceSelection" name="raceSelection">
            @switch($PJ->COD_RACE)
            @case(1)
            <option value="1" selected>Elfo</option>
            <option value="2">Mediano</option>
            <option value="3">Enano</option>
            <option value="4">Humano</option>
                @break
            @case(2)
            <option value="1">Elfo</option>
            <option value="2" selected>Mediano</option>
            <option value="3">Enano</option>
            <option value="4">Humano</option>
                @break
            @case(3)
            <option value="1">Elfo</option>
            <option value="2">Mediano</option>
            <option value="3" selected>Enano</option>
            <option value="4">Humano</option>
                @break
            @default
            <option value="1">Elfo</option>
            <option value="2">Mediano</option>
            <option value="3">Enano</option>
            <option value="4" selected>Humano</option>
        @endswitch
        </select>
        </div>
        <div class="form-group">
          <label>Character Class</label><br>
          <select class="custom-select" id="classSelection" name="classSelection">
              @switch($PJ->COD_CLASS)
                  @case(1)
                  <option value="1" selected>Guerrero</option>
                  <option value="2">Hechicero</option>
                  <option value="3">Bribón</option>
                      @break
                  @case(2)
                  <option value="1">Guerrero</option>
                  <option value="2" selected>Hechicero</option>
                  <option value="3">Bribón</option>
                      @break
                  @default
                  <option value="1">Guerrero</option>
                  <option value="2">Hechicero</option>
                  <option value="3" selected>Bribón</option>
              @endswitch
        </select>
        </div>
        <div class="form-group">
          <label>Character background</label><br>
          <input type="text" placeholder="Place here your character background" id="backGround" name="backGround" value="{{$PJ->BACKGROUND}}">
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>XP:</label><br>
              <input type="number" placeholder="px" id="expPoints" name="expPoints" min="0" value="{{$PJ->XP}}">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>lvl:</label><br>
              <input type="number" placeholder="lvl" id="lvl" name="lvl" min="0" value="{{$PJ->LEVEL}}">
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
                    @if ($PJ->ALERT === 0)
                    <input type="checkbox" name="alert" id="alert">
                    @else
                    <input type="checkbox" name="alert" id="alert" checked>
                    @endif
                  <label for="alert"> alert</label>
                </div>
                <div class="col">
                    @if ($PJ->COMMUNICATION === 0)
                    <input type="checkbox" name="communication" id="communication">
                    @else
                    <input type="checkbox" name="communication" id="communication" checked>
                    @endif
                  <label for="communication"> communication</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col">
                    @if ($PJ->MANIPULATION === 0)
                    <input type="checkbox" name="manipulation" id="manipulation">
                    @else
                    <input type="checkbox" name="manipulation" id="manipulation" checked>
                    @endif
                  <label for="manipulation"> manipulation</label>
                </div>
                <div class="col">
                    @if ($PJ->ERUDITION === 0)
                    <input type="checkbox" name="erudition" id="erudition">
                    @else
                    <input type="checkbox" name="erudition" id="erudition" checked>
                    @endif
                  <label for="erudition"> erudition</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col">
                    @if ($PJ->SUBTERFUGE === 0)
                    <input type="checkbox" name="subterfuge" id="subterfuge">
                    @else
                    <input type="checkbox" name="subterfuge" id="subterfuge" checked>
                    @endif
                  <label for="subterfuge"> subterfuge</label>
                </div>
                <div class="col">
                    @if ($PJ->SURVIVAL === 0)
                    <input type="checkbox" name="survival" id="survival">
                    @else
                    <input type="checkbox" name="survival" id="survival" checked>
                    @endif
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
                    <input type="number" placeholder="Strenght" id="characterStrength"  name="characterStrength" min="0" value="{{$PJ->STRENGTH}}">
                  </div>
                  <div class="col mb-3">
                    <input type="number" placeholder="Dexterity" id="characterDexterity"  name="characterDexterity" min="0" value="{{$PJ->DEXTERITY}}">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col mb-3">
                    <input type="number" placeholder="Constitution" id="characterConstitution" name="characterConstitution" min="0" value="{{$PJ->CONSTITUTION}}">
                  </div>
                  <div class="col mb-3">
                    <input type="number" placeholder="Wisdom" id="characterWisdom" name="characterWisdom" min="0" value="{{$PJ->WISDOM}}">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col mb-3">
                    <input type="number" placeholder="Intelligence" id="characterIntelligence" name="characterIntelligence" min="0" value="{{$PJ->INTELLIGENCE}}">
                  </div>
                  <div class="col mb-3">
                    <input type="number" placeholder="Charisma" id="characterCharisma" name="characterCharisma" min="0" value="{{$PJ->CHARISMA}}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" id="cod_pj" name="cod_pj" value="{{$PJ->COD_PJ}}">


    </div>
    <div class="row pl-4">
      <button type="submit" class="btn btn-dark">Save</button>
      <a href="{{ route('listPJ.viewList')}}" class="btn btn-dark ml-4">Back</a>

    </form>
    </div>

@endsection
