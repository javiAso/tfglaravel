<?php

namespace App\Http\Controllers;

use App\Models\PJ;
use Illuminate\Http\Request;

class PJController extends Controller
{


    public function store(Request $request){

        $pj = new PJ();

        $pj->NAME= $request->characterName;
        $pj->LEVEL = 1;
        $pj->XP = $request->expPoints;

        //atributos

        $pj->ALERT = $request->customCheckAlert == 'on' ? 1:0;
        $pj->MANIPULATION = $request->customCheckManipulation == 'on' ? 1:0;
        $pj->ERUDITION = $request->customCheckErudition == 'on' ? 1:0;
        $pj->SUBTERFUGE = $request->customCheckSubterfuge == 'on' ? 1:0;
        $pj->SURVIVAL = $request->customCheckSurvival == 'on' ? 1:0;
        $pj->COMMUNICATION = $request->customCheckCommunication == 'on' ? 1:0;

        //habilidades

        $pj->STRENGTH= $request->characterStrength;
        $pj->DEXTERITY= $request->characterDexterity;
        $pj->CONSTITUTION= $request->characterConstitution;
        $pj->INTELLIGENCE= $request->characterIntelligence;
        $pj->WISDOM= $request->characterWisdom;
        $pj->CHARISMA= $request->characterCharisma;

        $pj->BACKGROUND= $request->backGround;


        $pj->COD_USER= 2;
        $pj->COD_RACE= $request->raceSelection;
        $pj->COD_CLASS= $request->classSelection;

        $pj->save();

        return $request->all();

    }
}
