@extends('layouts.app') 
@section('content') 
    <p>name: {{$user->name}} </p>    
    <p>email: {{$user->email}} </p>    
    <p>username: {{$user->username}} </p>    
    <p>bio: {{$user->bio}} </p>
    <p>avatar: {{$user->avatar}} </p>
    <p>activated: {{$user->activated}} </p>
    <p>data_of_birth: {{$user->data_of_birth}} </p>
    <p>linkedin: {{$user->linkedin}} </p>
    <p>facebook: {{$user->facebook}} </p>
    <p>instagram: {{$user->instagram}} </p>
    <p>display_mail: {{$user->display_mail}} </p>
    <p>medium: {{$user->medium}} </p>
@endsection