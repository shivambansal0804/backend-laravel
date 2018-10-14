@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    All Categories
                </div>

                <div class="card-body pl-0 pr-0 pb-0">
                    @foreach ($categories as $item)
                    <div class="row">
                        <div class="col col-md-4 text-center">
                            <h4>
                                {{ $item->name }}
                            </h4>
                        </div>
                        <div class="col pt-1">
                            <a href="{{ route('categories.show', $item->slug)}}">
                                view
                            </a>
                        </div>
                        @if (auth()->user()->can('update-category'))
                            <div class="col pt-1">
                                <a href="{{ route('categories.edit', $item->id) }}" class="mt-1">Edit</a>
                            </div>
                        @endif
                        @if (auth()->user()->can('delete-category'))
                            <div class="col">
                                <form action="{{ route('categories.destroy', $item->id )}}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <hr class="mb">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection