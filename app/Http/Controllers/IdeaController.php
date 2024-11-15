<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate([
            'idea-content' => 'required|min:2|max:250',
        ]);
        $idea = new Idea(["content" => request()->get("idea-content"), "user_id" => auth()->user()->id]);
        $idea->save();
        return redirect()->route('home')->with("success", "idea created successfully!");
    }
    public function destroy($id)
    {
        if ($id !== auth()->id()) {
            abort(403);
        }
        Idea::destroy($id);
        return redirect()->route('home')->with("success", "idea deleted successfully!");
        //other way
        // $idea=Idea::where('id',$id)->first()
        //$idea->delete()
    }
    public function show(Idea $id)
    {


        return view("single_idea", ['idea' => $id]);
    }

    public function update(Idea $id)
    {
        if ($id->id !== auth()->id()) {
            abort(403);
        }
        $formfields = ['content' => request()->get('idea-content')];
        $id->update($formfields);
        return redirect(route('home'))->with('message', 'updated successfully');
    }
    public function edit(Idea $id)
    {

        if ($id->id !== auth()->id()) {
            abort(403);
        }
        return view("shared.edit_form", ['idea' => $id]);
    }
}
