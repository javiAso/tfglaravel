<?php

namespace App\Http\Controllers;

use App\Models\ADVLVL;
use App\Models\CLASS_TALENT;
use App\Models\RACE_TALENT;
use App\Models\CLASSS;
use App\Models\PJ;
use App\Models\PJ_EQUIPMENT;
use App\Models\PJ_TALENT;
use App\Models\RACE;
use App\Models\TALENT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PJController extends Controller
{


    public function store(Request $request)
    {

        $pj = new PJ();

        $pj->NAME = $request->characterName;
        $pj->LEVEL = $request->lvl;
        $pj->XP = $request->expPoints;
        $pj->COD_USER = 2;
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
            $pjEquipment = new PJ_EQUIPMENT();
            $pjEquipment->COD_EQUIPMENT = $key;
            $pjEquipment->COD_PJ = session('COD_PJ');
            $pjEquipment->QUANTITY = $quantity["$key"];
            $pjEquipment->save();
        }

        return $this->pjList();

    }

    public function pjList(){
        //$classTalents = CLASS_TALENT::where('COD_CLASS', $pj->COD_CLASS)->get();
        $pjs = PJ::where('COD_USER',2)->get();
        //var_dump($pjs);
        //var_dump($pjs);
        //echo($pjs);
        return view('home', ['PJs' => $pjs]);

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

        session_start();
        session(['COD_PJ' => $pj->COD_PJ]);
        session(['CLASS_PJ' => $pj->COD_CLASS]);


        return view('PJSheet', ['PJ' => $pj , 'talents' => $pjTalents, 'raceName' => $raceName, 'className' => $className]);

    }
}
