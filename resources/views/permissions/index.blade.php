@extends('layouts.app') 
@section('content') 
    <h3>All Permissions</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Display name</th>
                <th>Description</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($permissions as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->display_name}}</td>
                    <td>{{$item->description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection