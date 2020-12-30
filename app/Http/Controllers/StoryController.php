<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\USER;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class StoryController extends Controller
{

public function newStory($codGame){


return view('forms.formularioStory', ['codGame' => $codGame]);

}
public function viewStory($id){


    return view('Story', ['story' => Story::find($id)]);

    }

    public function store(Request $request){

        if (empty($request->codStory)){
            $story = new Story();
        } else {
            $story = Story::find($request->codStory);
        }

        $story->TITTLE=$request->storyName;
        $story->DESCRIPTION=$request->storyDescription;
        $story->COD_GAME=$request->codGame;
        $story->USERNAME=USER::find(session('COD_USER'))->USERNAME;
        $story->save();
        if ($request->file('storyFile')!=null) {
            Storage::deleteDirectory("public/Game$story->COD_GAME/Story$story->COD_STORY");
            $story->URL=Storage::url($request->file('storyFile')->store("public/Game$story->COD_GAME/Story$story->COD_STORY"));
            $story->save();
        }



        return $this->viewStory($story->COD_STORY);


        }

        public function updateStory($id){

            return view('forms.formularioUpdateStory', ['story' => Story::find($id)]);


            }



}
