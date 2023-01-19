<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(){
        return view('review.create');
    }

    public function store(Request $request){
        $review = new Review();
        $request->validate([
            'text_message' => 'required',
            'rating' => 'required|max:5|min:0',
        ]);
        $review->text_message = $request->text_message;
        $review->rating = $request->rating;
        $review->save();
        return redirect()->route('review.create');
    } 
    
    public function edit($review_id){
        $review = Review::find($review_id);
        return view('review.edit')->with('review', $review);
    }

    public function update(Request $request, $review_id){
        $request->validate([
            'text_message' => 'required',
            'rating' => 'required|max:5|min:0',
        ]);
        $review = Review::find($review_id);
        $review->text_message = $request->text_message;
        $review->rating = $request->rating;
        $review->save();
        return redirect()->route('review.create');
    }

    public function destroy($review_id){
        $review = Review::find($review_id);
        $review->delete();
        return redirect()->route('review.create');
    }

    public function assign(Request $request, $media_id){
        $request->validate(['review_id' => 'required|integer']);
        $media = Media::find($media_id);
        $user = Auth::user();
        $review = Review::find($request->review_id);
        $review->media()->attach($media);
        $review->user()->attach($user);
    }

    public function __construct(){
        $this->middleware('auth'); 
    }
}