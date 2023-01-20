@extends('layouts.app')
@section('content')
<div>
    <div class="card putrev">
        <form action="{{route('review.update', $review)}}" method="post">
            @csrf
            @method('PUT')
            <div class="dflex">
                <div class="secv p-3-custom">   
                    <label>Description:</label>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <form action="{{route('review.destroy', $review)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="p-3">
                    <textarea class="form-control mb-2" name="text_message" id="text_message">{{$review->text_message}}</textarea>
                </div>
            </div>
            <div class="dflex">
            <div class="stack" style="--stacks: 3;">
                <span style="--index: 0;">Vota:</span>
                <span style="--index: 1;">Vota:</span>
                <span style="--index: 2;">Vota:</span>
            </div>
            <input class="special" type="number" name="rating" id="rating" max=5 min=0 value={{$review->rating}}>
        <div>
        </form>
        
    </div>
</div>
@endsection