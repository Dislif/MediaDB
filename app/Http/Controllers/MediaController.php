<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
class MediaController extends Controller
{
    public function create()
    {
    return view('media.create');
    }
    public function store(Request $request)
    {           
        $media = new Media();
        $request->validate(['name_it'=>'required', 'name'=>'required', 'release_date'=>'required|date', 'link_trailer'=>'required|url']);
        $media->name = $request->name;
        $media->name_it = $request->name_it;
        $media->release_date = $request->release_date;
        
        $media->save();
        return redirect()->route('media.index')->with('success','Media created successfully!');
    }
        public function show(Media $media)
    {
    return view('media.show')->with('media', $media);
    }
    public function index()
    {
        $media = Media::all();
        return view('media.list')->with('media', $media);
    }
    public function edit(){
        return redirect()->route('media.edit');
    }

    public function update(Request $request, Media $media){
        $request->validate([
            'name_it'=>'required',
            'name'=>'required',
            'link_trailer'=>'nullable|url',
            'release_date'=>'required|date',
        ]);
        $media->name_it = $request->name_it;
        $media->name = $request->name;
        $media->link_trailer = $request->link_trailer;
        $media->release_date = $request->release_date;
        return redirect()->route('media.edit');
    }
}
