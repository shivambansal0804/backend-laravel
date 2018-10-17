@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h2>{{ $story->title }}</h2>
            @include('inc.session')
            
            created By <strong>{{$story->user->name}},</strong>  {{ $story->created_at->diffForHumans()}} 
            in <a class="pt-1" href="{{ route('categories.show', $story->category->slug)}}">{{ $story->category->name }}</a>    
            <span class="badge badge-primary">{{ $story->status }}</span>
            
            @if ($story->status == 'pending')
                <hr>
                <form class="d-inline" action="{{ route('council.draft', $story->uuid)}}" method="post">
                    @csrf @method('PUT')
                    <input type="submit" value="Save back to draft" class="btn btn-link text-danger p-0" style="margin-top: -5px;">
                </form> 
                <a href="{{ route('council.publish', $story->uuid)}}" class="text-success">Publish</a>             
            @endif

            
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


