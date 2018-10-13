@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All Roles
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Display name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach ($roles as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->display_name}}</td>
                                <td>{{$item->description}}</td>
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

