@extends('layouts.app')
@section('links')
    
@endsection 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Change Permissions') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.permission.update', $user->uuid) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('User Permissions') }}</label>

                            <div class="col-md-6">
                                @foreach ($userPermissions as $item)
                                    <span class="badge badge-secondary p-1">
                                        {{ $item->display_name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <select name="permissions" id="">
                                @foreach ($allPermissions as $item)
                                    <option value="{{$item->name}}">{{ $item->display_name }}</option>
                                @endforeach
                            </select>

                            (implement select 2 here and send and array of permissions id to post)
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection