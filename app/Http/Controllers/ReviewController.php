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
            'rating' => 'required|in:0,1,2,3,4,5',
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
            'rating' => 'required|in:0,1,2,3,4,5',
        ]);
        $review = Review::find($review_id);
        $review->text_message = $request->text_message;
        $review->rating = $request->rating;
        $review->save();
        return redirect()->route('review.create');
    }

    public function destroy(Review $review){
        $review->delete();
        return redirect()->route('review.create');
    }
}