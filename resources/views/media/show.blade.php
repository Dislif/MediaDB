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
        <thead><th>Italian Title</th><th>Title</th><th>release_date</th><th>Trailer Link</th><th></th><th></th></thead>
        <tbody>
            
            <td>{{ $media->name_it }}</td><td>{{ $media->name }}</td><td>{{ $media->release_date }}</td><td>{{ $media->link_trailer }}</td>
                <td>
                    <div class="formflex">
                        <form action="{{route('media.edit', $media->id)}}">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="{{route('media.destroy', $media->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <td style="padding-bottom: 12px">
                    <div class="tagsd">
                        
                        @if($tags->isNotEmpty())
                        @if ($available_tags->isNotEmpty())  
                    <form class="formflex" action="{{route('tag.assign', $media->id)}}" method="POST">
                        @csrf
                        <select class="form-control" name="tags_id" id="tag_id">
                            @foreach($available_tags as $tag)
                                <option value='{{$tag->id}}'>{{$tag->name}}</option>
                            @endforeach    
                        </select>
                        <div class="butxt">
                            <button class="btn btn-dark mt-2" type="submit">submit</button>
                        </div> 
                    </form>
                            @endif
                        <div class="formflex">
                        @forelse ($media->tags as $tag)
                            <div class="card paolo">
                                <div class="atext">
                                {{$tag->name}}
                                </div>
                                <form action="{{route('tag.unassign', [$media, $tag])}}">
                                    <button class="btn btn-danger minibutton" type="submit">X</button>
                                </form>
                            </div>
                        
                        @empty
                            No tag selected
                        @endforelse
                    @else
                        No tag found
                    @endif
                </div>
                    </div>
                    <div class="tagsd">
                    @if ($genres->isNotEmpty())
                    @if ($available_genres->isNotEmpty())
                        <form class="formflex" action="{{route('genre.assign', $media->id)}}" method="POST">
                            @csrf
                            <select class="form-control" name="genre_id" id="genre_id">
                                @foreach($available_genres as $genre)
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach    
                            </select>
                            <div class="butxt">
                            <button class="btn btn-dark mt-2" type="submit">submit</button>
                            </div> 
                        </form> 
                    @endif
                    <div>
                        <div class="formflex">
                        @forelse ($media->genres as $genre)
                            <div class="card paolo">
                                <div class="atext">
                                {{$genre->name}}
                            </div>  
                                <form action="{{route('genre.unassign', [$media, $genre])}}">
                                    <button class="btn btn-danger minibutton" type="submit">X</button>
                                </form>
                            </div>
                        @empty
                            No genre selected
                        @endforelse
                    
                    </div> 
                    @else
                        No genre found 
                    @endif
                    </div>
                    </div>
                </td>
                </td>
            </tbody>
        </table>
                @php
                $media->reviews = App\Models\Review::all();
                @endphp
                <tr>
                    <td>
                @foreach ($media->reviews as $review)
                        <div class="card" style="width: 10%">                        
                            <div class="card-body">
                                <p value='{{$review->id}}' class="card-text">{{$review->text_message}}</p>
                            </div>
                            
                        </div>
                        <div class="formflex">
                        <form action="{{route('review.edit', $review->id)}}" method="get">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="{{route('review.create')}}" method="get">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                        </div>
                @endforeach
                    </td>
                

    
</div>
@endsection