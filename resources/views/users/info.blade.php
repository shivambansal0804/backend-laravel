@extends('layouts.app') 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update Profile')}}
                       ( @foreach ($user->roles as $item) {{$item->name}} @endforeach )
                    </div>

                    <div class="card-body">
                        <form action="{{ route('me.update', $user->uuid) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">
                                    Email
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">
                                    Name
                                </label>
                            
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label text-md-right">
                                    Username
                                </label>
                            
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') ? old('username') : $user->username }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bio" class="col-sm-4 col-form-label text-md-right">
                                    Bio
                                </label>
                            
                                <div class="col-md-6">
                                    <input id="bio" type="text" class="form-control" name="bio" value="{{ old('bio') ? old('bio') : $user->bio }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="linkedin" class="col-sm-4 col-form-label text-md-right">
                                    linkedin
                                </label>
                            
                                <div class="col-md-6">
                                    <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{ old('linkedin') ? old('linkedin') : $user->linkedin }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook" class="col-sm-4 col-form-label text-md-right">
                                                                facebook
                                                            </label>
                            
                                <div class="col-md-6">
                                    <input id="facebook" type="text" class="form-control" name="facebook" value="{{ old('facebook') ? old('facebook') : $user->facebook }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="instagram" class="col-sm-4 col-form-label text-md-right">
                                                                                            instagram
                                                                                        </label>
                            
                                <div class="col-md-6">
                                    <input id="instagram" type="text" class="form-control" name="instagram" value="{{ old('instagram') ? old('instagram') : $user->instagram }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="medium" class="col-sm-4 col-form-label text-md-right">
                                                                                            medium
                                                                                        </label>
                            
                                <div class="col-md-6">
                                    <input id="medium" type="text" class="form-control" name="medium" value="{{ old('medium') ? old('medium') : $user->medium }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="display_mail" class="col-sm-4 col-form-label text-md-right">
                                    Display Mail
                                </label>
                            
                                <div class="col-md-6">
                                    <input id="display_mail" type="email" class="form-control" name="medium" value="{{ old('display_mail') ? old('display_mail') : $user->display_mail }}">
                                </div>
                            </div>

                            


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<p>avatar: {{$user->avatar}} </p>
<p>data_of_birth: {{$user->data_of_birth}} </p>

@endsection