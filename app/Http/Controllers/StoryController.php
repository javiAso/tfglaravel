<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
class StoryController extends Controller
{

public function newStory($codGame){


return view('forms.formularioStory', ['codGame' => $codGame]);

}
public function viewStory($id){


    return view('Story', ['story' => Story::find($id)]);

    }

    public function store(Request $request){

        if (empty($request->cod_story)){
            $story = new Story();
        } else {
            $story = Story::find($request->cod_story);
        }

        $story->TITTLE=$request->storyName;
        $story->DESCRIPTION=$request->storyDescription;
        $story->COD_GAME=$request->codGame;
        $story->save();
        var_dump($request->storyName);
        var_dump($request->storyDescription);
        var_dump($request->codGame);

        return $this->viewStory($story->COD_STORY);


        }

}
