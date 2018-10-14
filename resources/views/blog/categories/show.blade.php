@extends('layouts.main') 
@section('content')
<div class="container">

    <h1>Blog / Categories / {{ $category->name }}</h1>

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
    <hr> @endforeach
</div>
@endsection