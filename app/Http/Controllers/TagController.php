<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Media;

class TagController extends Controller
{
    public function create(){
        return view('tag.create');
    }

    public function store(Request $request){
        $tag = new Tag();
        $request->validate([
            'name' => 'required'
        ]);
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tag.create');
    } 
    
    public function edit($tag_id){
        $tag = Tag::find($tag_id);
        return view('tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, $tag_id){
        $request->validate([
            'name' => 'required'
        ]);
        $tag = Tag::find($tag_id);
        $tag->name = $request->tag;
        $tag->save();
        return redirect()->route('tag.create');
    }

    public function destroy($tag_id){
        $tag = Tag::find($tag_id);
        $tag->delete();
        return redirect()->route('tag.create');
    }

    public function assign(Request $request, $media_id)
    {
        $request->validate(['tags_id' => 'required|integer']);
        $media = Media::find($media_id);
        $tag = Tag::find($request->tags_id);
        if (!$media->tags->contains($tag)) {
            $media->tags()->attach($tag);
        }
        return redirect()->route('media.show', $media_id);
    }
    public function __construct(){
        $this->middleware('auth'); 
    }
}