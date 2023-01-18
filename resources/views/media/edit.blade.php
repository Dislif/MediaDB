@extends('layouts.app')
@section('content')
<form action="{{route ('media.update', $media->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name_it" value="{{$media->name_it}}">
    <input type="text" name="name" value="{{$media->name}}">
    <input type="text" name="link_trailer" value="{{$media->link_trailer}}">
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection