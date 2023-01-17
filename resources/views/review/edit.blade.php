@extends('layouts.app')
@section('content')
<form action="{{route('review.update', $review)}}" method="post">
    @csrf
    @method('PUT')
    <input type="number" name="rating" id="rating" max=5 min=0 value={{$review->rating}}>
    <textarea name="text_message" id="text_message">{{$review->text_message}}</textarea>
    <button type="submit">Submit</button>
</form>
@endsection