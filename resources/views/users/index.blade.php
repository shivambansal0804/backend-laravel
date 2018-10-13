@extends('layouts.app') 
@section('content')
<h3>All Users</h3>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Email</th>
            <th>Username</th>            
            <th>Role</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>
                <a href="{{ route('users.show', $item->uuid) }}">
                    {{$item->name}}
                </a>
            </td>
            <td>
                <a href="{{ route('users.permission.edit', $item->uuid) }}">permission</a>               
                <a href="{{ route('users.role.edit', $item->uuid) }}"> role</a>
            </td>
            <td>{{$item->email}}</td>
            <td>{{$item->username}}</td>
            <td>
                @foreach ($item->roles as $item)
                    {{$item->display_name}}
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection