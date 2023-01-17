@extends('layouts.app')
@section('content')
<div class="mcon">
    <table class="Films">
        <thead><th>Italian Title</th><th>Title</th><th>Release Date</th><th>Trailer Link</th></thead>
        <tbody>
            @foreach ($media as $m)
                <tr><td>{{$m->name_it}}</td><td> {{$m->name}} </td><td>{{$m->release_date}}</td><td>{{$m->link_trailer}}</td>
            @endforeach
                <div class="contr">
                    <form action="{{route('media.create')}}">
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </tbody>
    </table>
</div>
@endsection