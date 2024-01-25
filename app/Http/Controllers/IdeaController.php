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
    public function show(Idea $idea) {
        return view('ideas.show',compact('idea'));
    }
    
    public function edit(Idea $idea) {
        $editing = true;
        return view('ideas.show', compact('idea','editing'));
    }

    public  function update(Idea $idea) {
        request()->validate([
            'content' => 'required|min:5|max:240',
        ]);
        $idea->content = request()->get('content','');
        $idea->save();
        return redirect()->route('dashboard', $idea->id)->with('success', "Idea updated successfully!");
    }

    public function destroy(Idea $id){
            $id->delete();

            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        }
}
