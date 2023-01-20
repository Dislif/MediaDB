@extends('layouts.app')
@section('content')
<div class="mcon">
    <table class="Films">
        <thead><th>Italian Title</th><th>Title</th><th>Release Date</th><th>Trailer Link</th><th>Avarage rating</th><th></th><th></th><th></th></thead>
        <tbody>
            @foreach ($media as $m)
                <tr><td> {{$m->name_it}}</td><td> {{$m->name}} </td><td>{{$m->release_date}}</td><td>{{$m->link_trailer}}</td><td>{{ $m->average_rating }}</td>
                    <div>
                    <form action="{{route('media.show', $m->id)}}">
                 <td><button type="submit" class="btn btn-primary">Show</button></td>
                    </form>
                    <form action="{{route('media.edit', $m->id)}}">
                    <td><button type="submit" class="btn btn-primary">Edit</button></td>
                    </form>
                    <form action="{{route('media.destroy', $m->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                       <td><button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
                    </div>
            @endforeach
                <div class="dflex">
                    <h2>Media list:</h2>
                    <form action="{{route('media.create')}}">
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </tbody>
    </table>
</div>
@endsection