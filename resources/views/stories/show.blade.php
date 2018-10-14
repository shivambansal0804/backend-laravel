@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ $story->title }} 
                    <strong><a href="{{route('stories.edit', $story->uuid)}}"  class="text-black">Edit</a></strong>
                </div>

                <div class="card-body">
                    <strong>Biliner</strong> : {{ $story->biliner }}

                    <hr>

                    <strong>Category</strong> : {{ $story->category->name }}
                    <a href="{{ route('categories.show', $story->category->slug )}}">see related</a>
                    
                    <hr>

                    {!! $story->body !!}

                    <hr>

                    <strong>Meta_title</strong> : {{ $story->meta_title }}
                </div>

                <div class="card-footer">
                    created By {{$story->user->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


