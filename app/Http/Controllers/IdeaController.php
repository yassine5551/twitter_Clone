<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
       $validated = request()->validate([
            'content' => 'required|min:5|max:240',
        ]);

        $validated['user_id'] = auth()->id();
        Idea::create($validated );
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
       $validated = request()->validate([
            'content' => 'required|min:5|max:240',
        ]);
        $idea->update($validated);
        return redirect()->route('dashboard', $idea->id)->with('success', "Idea updated successfully!");
    }

    public function destroy(Idea $id){
            $id->delete();

            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        }
}
