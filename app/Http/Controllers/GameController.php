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

        $gamesOwned= GAME::where('COD_USER',2)->get();

/*         SELECT g.TITTLE FROM GAME g
INNER JOIN PJ p
ON g.COD_GAME = p.COD_GAME
WHERE p.COD_USER = 2 */

        $gamesPlayed = DB::select('select g.TITTLE, g.COD_GAME, u.USERNAME FROM GAME g
        INNER JOIN PJ p
        ON g.COD_GAME = p.COD_GAME
        INNER JOIN USER u
        on u.COD_USER = g.COD_USER
        WHERE p.COD_USER = ?', [2]);
        $master = USER::where('COD_USER',2)->first();
        return view('gameList', ['gamesOwned' => $gamesOwned , 'gamesPlayed' => $gamesPlayed, 'master' => $master]);

    }

    public function manageGame(Request $request){

        // Si estamos ante un borrado
        if (!empty($request->delete_GAME)) {
            DB::update('update PJ set COD_GAME = NULL where COD_GAME = ?', [$request->delete_GAME]);
            GAME::find($request->delete_GAME)->delete();
            return $this->gameList();
        }



        //Recuperamos el pj
        $pj = PJ::find($request->COD_PJ);

        //Si el valor de codGame es -1 estamos ante un leave
        if ($request->COD_GAME==-1) {//Ponemos a null y devolvemos la ficha
            $pj->COD_GAME=NULL;
            $pj->save();
            return $this->gameList();
        }
        //recuperamos el game
        $game = Game::where('COD_GAME',$request->COD_GAME)->first();
        if ($request->COD_GAME==0 || $game==NULL) {//Si es mal código o no existe volvemos devolvemos la ficha
            return $this->gameList();
        }

        //Estamos ante un join y un código válido, así que seteamos el codigo y devolvemos la ficha


        $pj->COD_GAME=$request->COD_GAME;
        $pj->save();

        return $this->gameList();




    }

    public function updateGame($id){


        return view('forms.formularioUpdateGame', ['game' => Game::find($id)]);

    }
}
