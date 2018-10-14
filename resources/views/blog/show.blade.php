@extends('layouts.main') 
@section('content')
<div class="container">
    <h1>{{ $story->title }}</h1>
    <div>
        <p style="margin-top: .5rem;">
            {{ $story->biliner }}
        </p>
        <div class="img__wrap">
            <img class="img" src="{{ asset('/blog.jpeg')}}" alt="">
        </div>
        <div>
            {!! $story->body !!}
        </div>
        <hr>
        Created by <strong>{{ $story->user->name}}</strong>, {{ $story->created_at->diffForHumans() }}
    </div>
</div>
@endsection