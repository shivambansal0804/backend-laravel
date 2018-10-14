@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    All Categories
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($categories as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('categories.show', $item->id) }}">
                                        {{$item->name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy', $item->id )}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection