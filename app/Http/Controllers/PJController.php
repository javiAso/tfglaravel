<?php

namespace App\Http\Controllers;

use App\Models\ADVLVL;
use App\Models\CLASS_TALENT;
use App\Models\RACE_TALENT;
use App\Models\CLASSS;
use App\Models\Game;
use App\Models\PJ;
use App\Models\PJ_EQUIPMENT;
use App\Models\PJ_TALENT;
use App\Models\RACE;
use App\Models\TALENT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\USER;

class PJController extends Controller
{


    public function store(Request $request)
    {
        if (empty($request->cod_pj)) {
            $pj = new PJ();
        } else {
            $pj = PJ::find($request->cod_pj);
        }



        $pj->NAME = $request->characterName;
        $pj->LEVEL = $request->lvl;
        $pj->XP = $request->expPoints;
        $pj->COD_USER = session('COD_USER');;
        $pj->COD_RACE = $request->raceSelection;
        $pj->COD_CLASS = $request->classSelection;
        $pj->BACKGROUND = $request->backGround;


        //habilidades



        $pj->ALERT = $request->alert == 'on' ? 1 : 0;
        $pj->MANIPULATION = $request->manipulation == 'on' ? 1 : 0;
        $pj->ERUDITION = $request->erudition == 'on' ? 1 : 0;
        $pj->SUBTERFUGE = $request->subterfuge == 'on' ? 1 : 0;
        $pj->SURVIVAL = $request->survival == 'on' ? 1 : 0;
        $pj->COMMUNICATION = $request->communication == 'on' ? 1 : 0;

        //atributos

        $pj->STRENGTH = $request->characterStrength;
        $pj->DEXTERITY = $request->characterDexterity;
        $pj->CONSTITUTION = $request->characterConstitution;
        $pj->INTELLIGENCE = $request->characterIntelligence;
        $pj->WISDOM = $request->characterWisdom;
        $pj->CHARISMA = $request->characterCharisma;



        //rasgos

        $raza = RACE::where('COD_RACE', $pj->COD_RACE)->first();
        $clase = CLASSS::where('COD_CLASS', $pj->COD_CLASS)->first();
        $advlvl = ADVLVL::where('LVL', $pj->LEVEL)->where('COD_CLASS', $pj->COD_CLASS)->first();

        $pj->MOVEMENT = $raza->MOVEMENT;
        $pj->PV = $pj->calculatePV($clase->DA, $pj->CONSTITUTION, $pj->LEVEL);
        $pj->DEFENSE = $pj->calculateDefense($pj->DEXTERITY);
        $pj->ATTACKM = $pj->calculatePower($pj->STRENGTH, $advlvl->ATQ);
        $pj->ATTACKR = $pj->calculatePower($pj->DEXTERITY, $advlvl->ATQ);
        $pj->POWER = $pj->calculatePower($pj->INTELLIGENCE, $advlvl->POD);
        $pj->INSTINCT = $advlvl->INS;



        $pj->save();


        //talentos

        $classTalents = CLASS_TALENT::where('COD_CLASS', $pj->COD_CLASS)->get();
        $raceTalents = RACE_TALENT::where('COD_RACE', $pj->COD_RACE)->get();

        if (!empty($request->cod_pj)) {
            DB::delete('delete FROM PJ_TALENT where COD_PJ = ?', [$request->cod_pj]);
        }

        foreach ($classTalents as $classTalent) {

            $pjTalent = new PJ_TALENT();
            $pjTalent->COD_TALENT = $classTalent->COD_TALENT;
            $pjTalent->COD_PJ = $pj->COD_PJ;
            $pjTalent->save();

        }
        foreach ($raceTalents as $raceTalent) {
            $pjTalent = new PJ_TALENT();
            $pjTalent->COD_TALENT = $raceTalent->COD_TALENT;
            $pjTalent->COD_PJ = $pj->COD_PJ;
            $pjTalent->save();

        }


        return $this->viewSheet($pj->COD_PJ);




    }

    public function addEquipment(){

        $buyedItems = session('cesta')->getListadoProductos();
        $quantity = session('cesta')->getCantidadProductos();
        foreach ($buyedItems as $key => $value) {

            $pjEquipment = PJ_EQUIPMENT::where('COD_PJ','=', session('COD_PJ'))->where('COD_EQUIPMENT','=', $key)->first();

            if ($pjEquipment == null) {
                $pjEquipment = new PJ_EQUIPMENT();
                $pjEquipment->COD_EQUIPMENT = $key;
                $pjEquipment->COD_PJ = session('COD_PJ');
                $pjEquipment->QUANTITY = $quantity["$key"];
                $pjEquipment->save();
            } else {
                $pjEquipment->QUANTITY += $quantity["$key"];
                $pjEquipment->save();
            }

        }

        return $this->viewSheet(session('COD_PJ'));

    }

    public function pjList(){

        $pjs=DB::table('PJ')
        ->join('RACE', 'PJ.COD_RACE', '=', 'RACE.COD_RACE')
        ->join('CLASS', 'PJ.COD_CLASS', '=', 'CLASS.COD_CLASS')
        ->select('PJ.COD_PJ','PJ.NAME','PJ.LEVEL','CLASS.NAME as CLASS','RACE.NAME as RACE')
        ->where('PJ.COD_USER','=',session('COD_USER'))
        ->get();

        $user = USER::find(session('COD_USER'));

        return view('home', ['PJs' => $pjs , 'user'=>$user]);

    }

    public function viewSheet($id){

        $pj = PJ::where('COD_PJ',$id)->first();

        //talentos

        $pjTalents =[];

        $pjTalentsCOD =PJ_TALENT::where('COD_PJ',$id)->pluck('COD_TALENT');


        foreach ($pjTalentsCOD as $talentCOD) {
            $pjTalents[] = TALENT::where('COD_TALENT',$talentCOD)->first();
        }

        //nombre raza y clase

        $raceName= RACE::where('COD_RACE',$pj->COD_RACE)->pluck('NAME')->first();
        $className= CLASSS::where('COD_CLASS',$pj->COD_CLASS)->pluck('NAME')->first();

        //equipment


        $equipment =  DB::table('PJ_EQUIPMENT')
        ->join('EQUIPMENT', 'PJ_EQUIPMENT.COD_EQUIPMENT', '=', 'EQUIPMENT.COD_EQUIPMENT')
        ->select('PJ_EQUIPMENT.QUANTITY', 'EQUIPMENT.NAME')
        ->where('PJ_EQUIPMENT.COD_PJ','=',$pj->COD_PJ)
        ->get();

        session_start();
        session(['COD_PJ' => $pj->COD_PJ]);
        session(['CLASS_PJ' => $pj->COD_CLASS]);

        //nombre partida
        if ($pj->COD_GAME!=NULL) {
            $gameName = Game::find($pj->COD_GAME)->TITTLE;
        }else{
            $gameName="El personaje no se encuentra en ninguna partida";
        }

        //user
        $user = USER::where('COD_USER',session('COD_USER'))->first();

        return view('PJSheet', ['PJ' => $pj , 'talents' => $pjTalents, 'raceName' => $raceName, 'className' => $className, 'equipment' => $equipment, 'gameName' => $gameName, 'user' => $user]);

    }

    public function updateSheet($id){

        $pj = PJ::where('COD_PJ',$id)->first();

        // guardo códigos de talentos:

        $pjTalentsCOD =PJ_TALENT::where('COD_PJ',$id)->pluck('COD_TALENT');

        //Guardo nombre y descripción de talentos:

        $pjTalents =[];
        foreach ($pjTalentsCOD as $talentCOD) {
            $pjTalents[] = TALENT::where('COD_TALENT',$talentCOD)->first();
        }

        //nombre raza y clase

        $raceName= RACE::where('COD_RACE',$pj->COD_RACE)->pluck('NAME')->first();
        $className= CLASSS::where('COD_CLASS',$pj->COD_CLASS)->pluck('NAME')->first();

        //equipment


        $equipment =  DB::table('PJ_EQUIPMENT')
        ->join('EQUIPMENT', 'PJ_EQUIPMENT.COD_EQUIPMENT', '=', 'EQUIPMENT.COD_EQUIPMENT')
        ->select('PJ_EQUIPMENT.QUANTITY', 'EQUIPMENT.NAME')
        ->where('PJ_EQUIPMENT.COD_PJ','=',$pj->COD_PJ)
        ->get();

        session_start();
        session(['COD_PJ' => $pj->COD_PJ]);
        session(['CLASS_PJ' => $pj->COD_CLASS]);


        return view('forms.formUpdatePJ', ['PJ' => $pj , 'talents' => $pjTalents, 'raceName' => $raceName, 'className' => $className, 'equipment' => $equipment]);

    }

    public function deleteSheet(Request $request){//Tenemos que hacer un borrado en cascada:

        //Borramos los registros de la tabla de PJ_TALENT:
        DB::delete('delete FROM PJ_TALENT where COD_PJ = ?', [$request->COD_PJ]);

        //Borramos los registros de la tabla de PJ_EQUIPMENT:
        DB::delete('delete FROM PJ_EQUIPMENT where COD_PJ = ?', [$request->COD_PJ]);

        //Borramos el pj:
        DB::delete('delete FROM PJ where COD_PJ = ?', [$request->COD_PJ]);

        return $this->pjList();


    }


}
