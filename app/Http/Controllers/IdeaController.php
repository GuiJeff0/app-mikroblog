<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){

        request()->validate([
            'idea' => 'required|min:5|max:250',
        ]);

        $idea = Idea::create(
            [
                "content"=> request()->get('idea', ''),
            ]
        );

        return redirect()->route('home')->with('success','Idea created succesfully');
    }
}
