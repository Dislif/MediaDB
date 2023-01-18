<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create(){
        return view('tag.create');
    }

    public function store(Request $request){
        $tag = new Tag();
        $request->validate([
            'tag' => 'required'
        ]);
        $tag->tag = $request->tag;
        $tag->save();
        return redirect()->route('tag.create');
    } 
    
    public function edit($tag_id){
        $tag = Tag::find($tag_id);
        return view('tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, $tag_id){
        $request->validate([
            'tag' => 'required'
        ]);
        $tag = Tag::find($tag_id);
        $tag->tag = $request->tag;
        $tag->save();
        return redirect()->route('tag.create');
    }

    public function destroy($tag_id){
        $tag = Tag::find($tag_id);
        $tag->delete();
        return redirect()->route('tag.create');
    }

    public function __construct(){
        $this->middleware('auth'); 
    }
}