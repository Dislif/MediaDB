@extends('layouts.app')
@section('content')
    <form action="{{route('media.store')}}" method="post">
        @csrf
        <input type="text" name="name_it" placeholder="Italian Title">
        <input type="text" name="name" placeholder="Title">
        <input type="date" name="release_date" placeholder="Release date">
        <input type="text" name="link_trailer" placeholder="Link Trailer (optional)">
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection