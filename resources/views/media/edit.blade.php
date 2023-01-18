@extends('layouts.app')
@section('content')
    <form action="{{route('media.update', $media->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name_it" value="{{$media->name_it}}">
    <input type="text" name="name" value="{{$media->name}}">
    <input type="date" name="release_date" value="{{$media->release_date}}">
    <input type="text" name="link_trailer" placeholder="optional" value="{{$media->link_trailer}}">
    <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection