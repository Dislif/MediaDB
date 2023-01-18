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
                    <form action="{{route('tag.assign', $media->id)}}" method="POST">
                        @csrf
                    <select name="tags_id" id="tag_id">
                        @php
                            $available_tags = App\Models\Tag::all()->diff($media->tags);
                        @endphp
                        @foreach($available_tags as $tag)
                            <option value='{{$tag->id}}'>{{$tag->tag}}</option>
                        @endforeach    
                    </select>
                    <button type="submit">submit</button> 
                    </form>
                    <div>
                        @forelse ($media->tags as $tag)
                            <div>
                                {{$tag->tag}}
                            </div>
                        @empty
                            no tag found
                        @endforelse
                    </div>
                </td>
                </tbody>
    </table>
</div>
@endsection