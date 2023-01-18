@extends('components.edit')
@section('genre_tag_update')
    <form action="{{route('genre.update', $genre)}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="genre" value={{$genre->genre}} placeholder="New genre here">
@endsection
@section('genre_tag_destroy')
    <form action="{{route('genre.destroy', $genre)}}" method="post">
        @csrf
        @method('DELETE')
@endsection