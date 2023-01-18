@extends('layouts.app')
@section('content')
    <form action="{{route('actor.update', $actor->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{$actor->name}}">
    <input type="date" name="birthday" value="{{$actor->birthday}}">
    <input type="text" name="nationality" placeholder="optional" value="{{$actor->nationality}}">
    <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <form action="{{route('actor.destroy', $actor->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection