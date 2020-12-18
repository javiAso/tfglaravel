@extends('layout')
@section('titulo')
{{$PJ->NAME}}
@endsection
@section('contenido')


    <div class="row">
      <div class="col-6">
        <div class="row">
          <div class="col">
            <label>Character race: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$raceName}}</label>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Character class: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$className}}</label>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Character background: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->BACKGROUND}}</label>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>XP: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->XP}}</label>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>lvl </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->LEVEL}}</label>
          </div>
          <div class="col">
          </div>
        </div>

      </div>
      <div class="col-6">
        <div class="row">
          <div class="col">
            <label>Abilities: </label>
          </div>
          <div class="col">

          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Alert: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->ALERT}}</label>
          </div>
          <div class="col">
            <label>Erudition:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->ERUDITION}}</label>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Communication: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->COMMUNICATION}}</label>
          </div>
          <div class="col">
            <label>Subterfuge:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->SUBTERFUGE}}</label>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Manipulation: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->MANIPULATION}} </label>
          </div>
          <div class="col">
            <label>Survival:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->SURVIVAL}}</label>
          </div>
        </div>
      </div>

    </div>
    <hr>
    <div class="row">
      <div class="col-6">
        <div class="row">
          <div class="col">
            <label>Features: </label>
          </div>
          <div class="col">

          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>P V: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->PV}} </label>
          </div>
          <div class="col">
            <label>Melee attack:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->ATTACKM}}</label>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Movement: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->MOVEMENT}} meters</label>
          </div>
          <div class="col">
            <label>Ranged atack:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->ATTACKR}}</label>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Defense: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->DEFENSE}}</label>
          </div>
          <div class="col">
            <label>Instincts:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->INSTINCT}}</label>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Power: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->POWER}}</label>
          </div>
          <div class="col">

          </div>
          <div class="col">

          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="row">
          <div class="col">
            <label>Attributes: </label>
          </div>
          <div class="col">

          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Strength: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->STRENGTH}}</label>
          </div>
          <div class="col">
            <label>Intelligence:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->INTELLIGENCE}}</label>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Dexterity: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->DEXTERITY}}</label>
          </div>
          <div class="col">
            <label>Wisdom:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->WISDOM}}</label>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Constitution: </label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->CONSTITUTION}}</label>
          </div>
          <div class="col">
            <label>Charisma:</label>
          </div>
          <div class="col">
            <label class="font-weight-normal">{{$PJ->CHARISMA}} </label>
          </div>
        </div>
      </div>

    </div>

    <hr>
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col">
            <label>Talents: </label>
          </div>
        </div>
        @foreach ($talents as $talent)
        <div class="row">
            <div class="col-2">
              <label>{{$talent->NAME}} </label>
            </div>
            <div class="col-10">
              <label class="font-weight-normal">{{$talent->DESCRIPTION}}</label>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col">
            <label>Equipment: </label>
          </div>
        </div>
        @foreach ($equipment as $item)
        <div class="row">
            <div class="col-6">
              <label>{{$item->NAME}} </label>
            </div>
            <div class="col-6">
              <label class="font-weight-normal">{{$item->QUANTITY}}</label>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="row pl-4 mt-4">
        <div class="col-10">
            <a href="{{ route('eq.store')}}"><button class="btn btn-dark">Buy equipment</button></a>
            <a href="{{ route('sheet.updateSheet',$PJ->COD_PJ)}}"><button class="btn btn-dark ml-4">Update</button></a>
            <a href="{{ route('listPJ.viewList')}}"><button class="btn btn-dark ml-4">Back</button></a>
        </div>
        <div class="col-2">
            <form action="{{ route('sheet.deleteSheet')}}" method="post">
                @csrf
                <input type="hidden" name="COD_PJ" id="COD_PJ" value="{{$PJ->COD_PJ}}">
                <button type="submit" class="btn btn-danger ml-4">Delete</button>
            </form>

        </div>

    </div>


@endsection
