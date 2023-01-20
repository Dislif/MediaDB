@extends('layouts.app')
@section('content')
<div>
    <div class="card putrev">
        <form class="sec" action="{{route('review.store')}}" method="POST">
            @csrf
            <div class="dflex">
                <div class="secv p-3-custom">   
                    <label>Description:</label>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="p-3">
                    <textarea name="text_message" id="text_message" class="form-control mb-2" placeholder="Write here a review" rows="6" cols="30"></textarea>
                </div>
            </div>
            <div class="dflex">
            <div class="stack" style="--stacks: 3;">
                <span style="--index: 0;">Vota:</span>
                <span style="--index: 1;">Vota:</span>
                <span style="--index: 2;">Vota:</span>
            </div>
            <input class="special" type="number" name="rating" max="5" min="0">
        <div>
        </form>
    </div>
</div>
@endsection