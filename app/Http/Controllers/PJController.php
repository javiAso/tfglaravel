<?php

namespace App\Http\Controllers;

use App\Models\ADVLVL;
use App\Models\CLASS_TALENT;
use App\Models\RACE_TALENT;
use App\Models\CLASSS;
use App\Models\PJ;
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

        $pj->ALERT = $request->customCheckAlert == 'on' ? 1 : 0;
        $pj->MANIPULATION = $request->customCheckManipulation == 'on' ? 1 : 0;
        $pj->ERUDITION = $request->customCheckErudition == 'on' ? 1 : 0;
        $pj->SUBTERFUGE = $request->customCheckSubterfuge == 'on' ? 1 : 0;
        $pj->SURVIVAL = $request->customCheckSurvival == 'on' ? 1 : 0;
        $pj->COMMUNICATION = $request->customCheckCommunication == 'on' ? 1 : 0;

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
        $pjTalents =[];

        foreach ($classTalents as $classTalent) {
            $pjTalent = new PJ_TALENT();
            $pjTalent->COD_TALENT = $classTalent->COD_TALENT;
            $pjTalent->COD_PJ = $pj->COD_PJ;
            $pjTalent->save();
            $pjTalents[] = TALENT::where('COD_TALENT',$classTalent->COD_TALENT)->first();
        }
        foreach ($raceTalents as $raceTalent) {
            $pjTalent = new PJ_TALENT();
            $pjTalent->COD_TALENT = $raceTalent->COD_TALENT;
            $pjTalent->COD_PJ = $pj->COD_PJ;
            $pjTalent->save();
            $pjTalents[] = TALENT::where('COD_TALENT',$raceTalent->COD_TALENT)->first();
        }

        //nombre raza y clase

        $raceName= DB::select('select NAME from RACE where COD_RACE = ?',[$pj->COD_RACE])[0];
        $className = DB::select('select NAME from CLASS where COD_CLASS = ?',[$pj->COD_CLASS])[0];


        session_start();
        session(['COD_PJ' => $pj->COD_PJ]);
        session(['CLASS_PJ' => $pj->COD_CLASS]);


        return view('PJSheet', ['PJ' => $pj , 'talents' => $pjTalents, 'raceName' => $raceName, 'className' => $className]);



    }
}
