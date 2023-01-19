@extends('layouts.app')
@section('content')
@php
$genres = App\Models\Genre::all();
$tags = App\Models\Tag::all();
$available_genres = $genres->diff($media->genres);
$available_tags = $tags->diff($media->tags);
@endphp
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

                    @if($tags->isNotEmpty())
                    @if ($available_tags->isNotEmpty())
                        <form action="{{route('tag.assign', $media->id)}}" method="POST">
                            @csrf
                            <select name="tags_id" id="tag_id">
                                @foreach($available_tags as $tag)
                                    <option value='{{$tag->id}}'>{{$tag->name}}</option>
                                @endforeach    
                            </select>
                            <button type="submit">submit</button> 
                        </form>
                    @endif
                    <div>
                        @forelse ($media->tags as $tag)
                            <div>
                                {{$tag->name}}
                                <form action="{{route('tag.unassign', [$media, $tag])}}">
                                    <button type="submit">X</button>
                                </form>
                            </div>
                        @empty
                            No tag selected
                        @endforelse
                    </div>
                    @else
                        No tag found
                    @endif

                    @if ($genres->isNotEmpty())
                    @if ($available_genres->isNotEmpty())
                        <form action="{{route('genre.assign', $media->id)}}" method="POST">
                            @csrf
                            <select name="genre_id" id="genre_id">
                                @foreach($available_genres as $genre)
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach    
                            </select>
                            <button type="submit">submit</button> 
                        </form>
                    @endif
                    <div>
                        @forelse ($media->genres as $genre)
                            <div>
                                {{$genre->name}}
                                <form action="{{route('genre.unassign', [$media, $genre])}}">
                                    <button type="submit">X</button>
                                </form>
                            </div>
                        @empty
                            No genre selected
                        @endforelse
                    </div> 
                    @else
                        No genre found 
                    @endif
                </td>
                @foreach ($media->reviews as $review)
                        <div class="card">                        
                            <div class="card-body">
                                <p value='{{$review->id}}' class="card-text">{{$review->text_message}}</p>
                            </div>
                            
                        </div>

                @endforeach 
                </tbody>
    </table>
</div>
@endsection