@extends('layouts.main')

@section('content')
    <div class="container">

        <h1>Blog</h1>

        <div>
            <a href="{{ route('blog.categories.index') }}">Categories</a>            
        </div>

        @foreach ($stories as $item)
            <div>
                <h3 style="margin-bottom: 0rem;">
                    {{ $item->title }} <a style="float:right;" href="{{ route('blog.show', $item->slug )}}">view</a>
                </h3>

                <p style="margin-top: .5rem;">
                    {{ $item->biliner }}
                </p>

                Created by <strong>{{ $item->user->name}}</strong>, {{ $item->created_at->diffForHumans() }}
            </div>
            <hr>
        @endforeach
    </div>
@endsection