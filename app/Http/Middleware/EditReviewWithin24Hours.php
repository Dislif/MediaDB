<?php
namespace App\Http\Middleware;
use Closure;
use Carbon\Carbon;
use App\Review;

class EditReviewWithin24Hours
{
    public function handle($request, Closure $next)
    {
        $review = Review::find($request->route('review'));

        if (!$review) {
            return response()->json(['error' => 'Review not found'], 404);
        }

        $createdAt = new Carbon($review->created_at);
        $now = Carbon::now();

        if ($createdAt->diffInHours($now) < 24) {
            return response()->json(['error' => 'You can not edit a review within 24 hours of creating it'], 403);
        }

        return $next($request);
    }
}

