<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create(){
        return view('genre.create');
    }

    public function store(Request $request){
        $genre = new Genre();
        $request->validate([
            'genre' => 'required'
        ]);
        $genre->genre = $request->genre;
        $genre->save();
        return redirect()->route('genre.create');
    } 
    
    public function edit($genre_id){
        $genre = Genre::find($genre_id);
        return view('genre.edit')->with('genre', $genre);
    }

    public function update(Request $request, $genre_id){
        $request->validate([
            'genre' => 'required'
        ]);
        $genre = Genre::find($genre_id);
        $genre->genre = $request->genre;
        $genre->save();
        return redirect()->route('genre.create');
    }

    public function destroy($genre_id){
        $genre = Genre::find($genre_id);
        $genre->delete();
        return redirect()->route('genre.create');
    }
    
    public function __construct(){
        $this->middleware('auth'); 
    }
}