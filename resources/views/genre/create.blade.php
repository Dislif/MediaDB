@extends('components.create')
@section('genre_tag_create')
    <form action="{{route('genre.store')}}" method="post">
        @csrf
        <input type="text" name="genre" placeholder="New genre here">
@endsection