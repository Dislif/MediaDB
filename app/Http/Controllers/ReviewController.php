<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Review;
use App\Pivots\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function create(){
        return view('review.create');
    }

    public function store(Request $request, $media_id){
        $review = new Review();
        $request->validate([
            'text_message' => 'required',
            'rating' => 'required|max:5|min:0',
        ]);
        $review->text_message = $request->text_message;
        $review->rating = $request->rating;
        $collection = Collection::create([
            'user_id' => Auth::user()->id,
            'media_id' => intval($media_id),
        ]);
        $review->collection_id = $collection->id;
        $review->save();
        return redirect()->route('media.show', $media_id);
    } 
    
    public function edit($review_id){
        $review = Review::find($review_id);
        return view('review.edit')->with('review', $review);
    }

    public function update(Request $request, $review_id) {
        
        $review = Review::find($review_id);
        
        /*if (Auth::user()->id != $review->user->id) {
            return redirect()->route('media.create');
        }*/
        
        if (Carbon::now()->diffInHours($review->created_at) < 24) {
            return redirect()->route('media.index');
        }
        if (Carbon::now()->diffInHours($review->updated_at) < 24) {
            return redirect()->route('media.index');
        }
        
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'text_message' => 'required|string|max:255',
        ]);
        $review->rating = $request->rating;
        $review->text_message = $request->text_message;
        $review->save();
        return redirect()->route('media.show', $review->id)->with('success', 'review uptade with success');
    }

    public function destroy($review_id){
        $review = Review::find($review_id);
        $review->delete();
        return redirect()->route('review.create');
    }

    public function assign($review_id, $media_id){
        $media = Media::find($media_id);
        $user = Auth::user();
        $review = Review::find($review_id);
        $review->user()->attach($user->id, [
            'media_id' => $media->id
        ]);
    }


    public function __construct(){
        $this->middleware('auth'); 
    }

    public function averageRating($media_id)
    {
        $average = Review::where('media_id', $media_id)->avg('rating');
        return $average;
    }
    public function index()
    {
        $medias = Media::all();
        foreach($medias as $media)
        {
            $media->average_rating = $this->averageRating($media->id);
        }
        return view('media.list')->with('medias', $medias);
    }

}