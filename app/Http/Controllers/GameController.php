<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\PJ;
use App\Models\Story;
use App\Models\USER;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
    public function store(Request $request){


        if (empty($request->cod_game)) {
            $game = new Game();
        } else {
            $game = Game::find($request->cod_game);
        }

        $game->TITTLE=$request->gameName;
        $game->INTRO=$request->gameDescription;
        $game->COD_USER=2;
        $game->save();
        //echo $game->COD_GAME;
        return $this->viewGame($game->COD_GAME);


    }

    public function viewGame($id){

        $game = GAME::where('COD_GAME',$id)->first();

        //personajes

        //$pjs = PJ::where('COD_GAME',$id)->get();

        $pjs=DB::table('PJ')
        ->join('RACE', 'PJ.COD_RACE', '=', 'RACE.COD_RACE')
        ->join('CLASS', 'PJ.COD_CLASS', '=', 'CLASS.COD_CLASS')
        ->join('USER', 'PJ.COD_USER', '=', 'USER.COD_USER')
        ->select('PJ.COD_PJ','PJ.NAME','PJ.LEVEL','CLASS.NAME as CLASS','RACE.NAME as RACE', 'USER.USERNAME as USERNAME')
        ->where('PJ.COD_GAME','=',$id)
        ->get();

        //stories

        $stories = Story::where('COD_GAME',$id)->get();




        return view('Game', ['pjs' => $pjs , 'stories' => $stories, 'game' => $game]);

    }

    public function gameList(){

        $games= GAME::where('COD_USER',2)->get();
        $master = USER::where('COD_USER',2)->first();
        return view('gameList', ['games' => $games , 'master' => $master]);

    }
}
