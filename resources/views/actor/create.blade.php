@extends('layouts.app')
@section('content')
    <form action="{{route('actor.store')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="date" name="birthday" placeholder="Birthday">
        <input type="text" name="nationality" placeholder="Nationality">
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection