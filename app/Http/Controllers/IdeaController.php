<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        request()->validate([
            'idea' => 'required|min:5|max:240',
        ]);
        $idea = Idea::create([
            'content'=> request()->get('idea',''),
        ]);
        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
        
    }
    public function show(Idea $id) {
        return view('ideas.show',[
            'idea'=> $id,
        ]);
    }

    public function destroy(Idea $id){
            $id->delete();

            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        }
}
