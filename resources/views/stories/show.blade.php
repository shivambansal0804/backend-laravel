@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $story->title }}</h2>
            
            created By <strong>{{$story->user->name}},</strong>  {{ $story->created_at->diffForHumans()}} 
            in <a class="pt-1" href="{{ route('categories.show', $story->category->slug)}}">{{ $story->category->name }}</a>    
            <a href="{{ route('stories.edit', $story->uuid)}}">( Edit )</a>
            <br>    
            <form class="d-inline" action="{{route('stories.destroy', $story->uuid)}}" method="post">
                @csrf @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-link p-0">
            </form>
            <hr> 
            
            <p>
                {{ $story->biliner }}
            </p>
            <hr>
            {!! $story->body !!}
            
        </div>
    </div>
</div>
@endsection


