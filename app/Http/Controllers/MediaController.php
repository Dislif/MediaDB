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
        $request->validate([
        'name_it'=>'required', 
        'name'=>'required', 
        'release_date'=>'required|date', 
        'link_trailer'=>'nullable|url'
        ]);
        
        $media->name = $request->name;
        $media->name_it = $request->name_it;
        $media->release_date = $request->release_date;
        if(is_null($media->link_trailer)){
            $media->link_trailer = '';
        }
        else{
            $media->link_trailer = $request->link_trailer;
        }
        $media->save();
        return redirect()->route('media.index')->with('success','Media created successfully!');
    }
    public function index()
    {
        $media = Media::all();
        return view('media.list')->with('media', $media);
    }
    public function edit($media_id){
        $media = Media::Find($media_id);
        return view('media.edit')->with('media', $media);
    }

    public function update(Request $request, $media_id){
        $request->validate([
            'name_it'=>'required',
            'name'=>'required',
            'release_date'=>'required|date',
            'link_trailer'=>'nullable|url'
        ]);
        $media = Media::Find($media_id);
        $media->name_it = $request->name_it;
        $media->name = $request->name;
        $media->release_date = $request->release_date;
        if(is_null($media->link_trailer)){
            $media->link_trailer = '';
        }
        else{
            $media->link_trailer = $request->link_trailer;
            if (is_null($media->link_trailer)) {
                $media->link_trailer = '';
            }
        }
        $media->save();
        return redirect()->route('media.index');
    }
    public function destroy($media_id){
        $media = Media::Find($media_id);
        $media->delete();
        return redirect()->route('media.index');
    }
    public function show($media_id)
    {
        $media = Media::Find($media_id);
        return view('media.show')->with('media', $media);
    }

    public function assign(Request $request, $review_id){
        $review = Review::find($review_id);
        $media = Media::find($request->media_id);
        $media->reviews()->attach($review);
    }
}
