@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Post
                    </div>

                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Biliner</th>
                                    <th>Slug</th>
                                    <th>Body</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($stories as $item)
                                    <tr>
                                        <td><a href="{{route('stories.show', $item->uuid)}}">{{$item->title}}</a></td>
                                        <td>manish</td>
                                        <td>{{ $item->biliner }}</td>                                        
                                        <td>{{ $item->slug }}</td>
                                        <td>{!! $item->body !!}</td>
                                        <td>{{ $item->status }}</td>
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