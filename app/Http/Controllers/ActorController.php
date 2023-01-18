<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Media;
class ActorController extends Controller
{
    public function create(){
        return view('actor.create');
    }

    public function store(Request $request){
        $actor = new Actor();
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'nationality' => 'required'
        ]);
        $actor->name = $request->name;
        $actor->birthday = $request->birthday;
        $actor->nationality = $request->nationality;
        $actor->save();
        return redirect()->route('actor.create');
    }
    public function edit($actor_id){
        $actor = Actor::find($actor_id);
        return view('actor.edit')->with('actor', $actor);
    }

    public function update(Request $request, $actor_id){
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'nationality' => 'required'
        ]);
        $actor = Actor::find($actor_id);
        $actor->name = $request->name;
        $actor->birthday = $request->birthday;
        $actor->nationality = $request->nationality;
        $actor->save();
        return redirect()->route('actor.create');
    }
    public function destroy($actor_id){
        $actor = Actor::find($actor_id);
        $actor->delete();
        return redirect()->route('actor.create');
    }

    public function assign(Request $request, $media_id){
        $request->validate(['actors_id' => 'required|integer']);
        $media = Media::find($media_id);
        $actor = Actor::find($request->actors_id);
        if (!$media->actors->contains($actor)) {
            $media->actors()->attach($actor);
        }
    }

    public function __construct(){
        $this->middleware('auth'); 
    }
}
