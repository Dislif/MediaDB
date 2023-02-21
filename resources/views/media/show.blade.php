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
                </tbody>
    </table>
    <h1>Reviews</h1>
    <div class="revbox">
        <h3>Reviews</h3>
        <div class="revs">
            <div class="secrev">
                @forelse ($media->reviews as $review)
                <div class="card rev">
                    <div class="card-body">
                        <p  class="card-text">{{$review->text_message}}</p>
                        <div class="bottomcard">
                            @if (Auth::user()->id==$review->user_id)
                            <div class="btns">
                                <form action="{{route('review.edit', $review->id)}}">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </form>
                                <form action="{{route('review.destroy', $review->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            @endif
                            <div>
                                <label>- 
                                    @dd($review->user)</label>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p  class="card-text">no reviews found</p>
                @endforelse
            </div>
            <div>
                <div class="card putrev">
                    <form class="sec" action="{{route('review.store', $media->id)}}" method="POST">
                        @csrf
                        <div>
                            <div class="secv p-3-custom">   
                                <label>Description: </label>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="p-3">
                                <textarea name="text_message" id="text_message" class="form-control mb-2" placeholder="Write here a review" rows="6" cols="30"></textarea>
                            </div>
                        </div>
                        <input type="number" name="rating" max="5" min="0">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection