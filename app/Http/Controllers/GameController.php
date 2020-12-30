<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\PJ;
use App\Models\Story;
use App\Models\USER;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class GameController extends Controller
{
    public function store(Request $request){



        $codUser= session('COD_USER');
        if (empty($request->cod_game)) {
            $game = new Game();
        } else {
            $game = Game::find($request->cod_game);
        }

        $game->TITTLE=$request->gameName;
        $game->INTRO=$request->gameDescription;
        $game->COD_USER=$codUser;
        $game->save();

        if ($request->file('gameFile')!=null) {
            Storage::deleteDirectory("public/Game$game->COD_GAME/GameImg");
            $game->URL_IMAGE=Storage::url($request->file('gameFile')->store("public/Game$game->COD_GAME/GameImg"));
            $game->save();
        }

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


        //user

        $user = USER::where('COD_USER',session('COD_USER'))->first();

        return view('Game', ['pjs' => $pjs , 'stories' => $stories, 'game' => $game , 'user' => $user]);

    }

    public function gameList(){
        $codUser= session('COD_USER');
        $gamesOwned= GAME::where('COD_USER',$codUser)->get();


        $gamesPlayed = DB::select('select g.TITTLE, g.COD_GAME, u.USERNAME FROM GAME g
        INNER JOIN PJ p
        ON g.COD_GAME = p.COD_GAME
        INNER JOIN USER u
        on u.COD_USER = g.COD_USER
        WHERE p.COD_USER = ?', [$codUser]);
        $user = USER::where('COD_USER',$codUser)->first();
        return view('gameList', ['gamesOwned' => $gamesOwned , 'gamesPlayed' => $gamesPlayed, 'user' => $user]);

    }

    public function manageGame(Request $request){

        // Si estamos ante un borrado
        if (!empty($request->delete_GAME)) {
            DB::update('update PJ set COD_GAME = NULL where COD_GAME = ?', [$request->delete_GAME]);
            STORY::where('COD_GAME',$request->delete_GAME)->delete();
            GAME::find($request->delete_GAME)->delete();
            Storage::deleteDirectory("public/Game$request->delete_GAME");
            return $this->gameList();
        }

        //Borrado de story
        if (!empty($request->deleteStory)) {
            STORY::find($request->deleteStory)->delete();
            Storage::deleteDirectory("public/Game$request->COD_GAME/Story$request->deleteStory");
            return $this->viewGame($request->COD_GAME);
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
