@extends('layouts.app')
@section('content')
<div class="mcon">
    <table class="Films"> 
        <tbody>
            <tr>
                <td>{{ $media->name_it }}</td><td>{{ $media->name }}</td><td>{{ $media->release_date }}</td><td>{{ $media->link_trailer }}</td>
                <td>
                    <form action="{{route('media.edit', $media->id)}}">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form action="{{route('media.destroy', $media->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tbody>
    </table>
</div>
@endsection