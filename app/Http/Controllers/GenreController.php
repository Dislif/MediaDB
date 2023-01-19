<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Media;

class GenreController extends Controller
{
    public function create(){
        return view('genre.create');
    }

    public function store(Request $request){
        $genre = new Genre();
        $request->validate([
            'name' => 'required'
        ]);
        $genre->name = $request->name;
        $genre->save();
        return redirect()->route('genre.create');
    } 
    
    public function edit($genre_id){
        $genre = Genre::find($genre_id);
        return view('genre.edit')->with('genre', $genre);
    }

    public function update(Request $request, $genre_id){
        $request->validate([
            'name' => 'required'
        ]);
        $genre = Genre::find($genre_id);
        $genre->name = $request->name;
        $genre->save();
        return redirect()->route('genre.create');
    }

    public function destroy($genre_id){
        $genre = Genre::find($genre_id);
        $genre->delete();
        return redirect()->route('genre.create');
    }

    public function assign(Request $request, $media_id)
    {
        $request->validate(['genre_id' => 'required|integer']);
        $media = Media::find($media_id);
        $genre = Genre::find($request->genre_id);
        if (!$media->genres->contains($genre)) {
            $media->genres()->attach($genre);
        }
        return redirect()->route('media.show', $media_id);
    }

    public function unassign($media_id, $genre_id)
    {
        $media = Media::find($media_id);
        $genre = Genre::find($genre_id);
        if ($media->genres->contains($genre)) {
            $media->genres()->detach($genre);
        }
        return redirect()->route('media.show', $media_id);
    }

    public function __construct(){
        $this->middleware('auth'); 
    }
}