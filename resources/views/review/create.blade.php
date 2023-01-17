@extends('layouts.app')
@section('content')
<form action="{{route('review.store')}}" method="post">
    @csrf
    <input type="number" name="rating" id="rating" max=5 min=0>
    <textarea name="text_message" id="text_message"></textarea>
    <button type="submit">Submit</button>
</form>
@endsection