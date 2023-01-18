@extends('components.create')
@section('genre_tag_create')
    <form action="{{route('tag.store')}}" method="post">
        @csrf
        <input type="text" name="tag" placeholder="New tag here">
@endsection