@extends('layouts.main') 
@section('content')
<div class="container">

    <h1>Blog / Categories</h1>

    @foreach ($categories as $item)
    <div>
        <h3 style="margin-bottom: 0rem;">
            {{ $item->name }} <a style="float:right;" href="{{ route('blog.categories.show', $item->slug )}}">view</a>
        </h3>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, cum sunt. Est explicabo non magnam harum nam quae impedit. Ut possimus labore adipisci accusamus atque rem aut cumque, ducimus sequi.</p>

        Created {{ $item->created_at->diffForHumans() }}
    </div>
    <hr> @endforeach
</div>
@endsection