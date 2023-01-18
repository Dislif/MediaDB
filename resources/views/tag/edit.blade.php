@extends('components.edit')
@section('genre_tag_update')
    <form action="{{route('tag.update', $tag)}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" value={{$tag->tag}} placeholder="New tag here">
@endsection
@section('genre_tag_destroy')
    <form action="{{route('tag.destroy', $tag)}}" method="post">
        @csrf
        @method('DELETE')
@endsection