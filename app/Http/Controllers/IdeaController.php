<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{


    public function show(Idea $idea){
        return view('ideas.show', compact('idea'));
     }

    public function store(){

        request()->validate([
            'content' => 'required|min:5|max:250',
        ]);

        $idea = Idea::create(
            [
                "content"=> request()->get('content', ''),
            ]
        );

        return redirect()->route('home')->with('success','Idea created succesfully');
    }
    
    public function edit(Idea $idea){
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea){
        request()->validate([
            'content' => 'required|min:5|max:250',

        ]);
        
        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('home')->with('success','Idea updated succesfully');
    }

    public function destroy(Idea $idea){
        $idea->delete();
       

        return redirect()->route('home')->with('success','Idea deleted successfully');
    }
}
