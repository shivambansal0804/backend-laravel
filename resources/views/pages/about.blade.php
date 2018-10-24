@extends('layouts.main') 
@section('content') 
<div class="title m-b-md">
    About
    <form action="{{ route('subscribers.join') }}" method="post">
        @csrf
        <input type="text" name="email">
    </form>
</div>


@endsection