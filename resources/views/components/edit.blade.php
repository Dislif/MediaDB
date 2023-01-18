@extends('layouts.app')
@section('content')
@yield('genre_tag_update')
    <button type="submit">Submit</button>
</form>
@yield('genre_tag_destroy')
    <button type="submit">Delete</button>
</form>
@endsection